<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Region;
use App\Models\Upload;
use App\Models\Variable;
use Illuminate\Http\Request;

class AnalysisController extends Controller
{
    public function index()
    {
        $currentYear = date("Y");
        for ($year = $currentYear; $year >= 1990; $year--) {
          $years[] = $year;
        }

        return view('analysis', compact('years'));
    }

    public function getDataDropdown(Request $request)
    {
        $selectedPeriod = $request->input('period');
        $data = Upload::where('year', $selectedPeriod)->get(['id','title']);

        return response()->json(['data' => $data]);
    }

    public function getDependentVariableDropdown (Request $request)
    {
        $selectedData = $request->input('data');
        $variable_ids = Data::where('upload_id', $selectedData)->distinct()->get('variable_id');

        $variables = [];
        foreach($variable_ids as $variable_id){
            $variables[] = ['id' => $variable_id->variable_id, 'label' => $variable_id->variables->label];
        }

        return response()->json(['data' => $variables]);
    }

    public function getIndependentVariableDropdown (Request $request)
    {
        $selectedDependentVariable = $request->input('dependentVariable');
        $selectedData = $request->input('data');
        $variable_ids = Data::where('upload_id', $selectedData)->where('variable_id','!=',$selectedDependentVariable)->distinct()->get('variable_id');

        $variables = [];
        foreach($variable_ids as $variable_id){
            $variables[] = ['id' => $variable_id->variable_id, 'label' => $variable_id->variables->label];
        }

        return response()->json(['data' => $variables]);
    }

    public function create(Request $request)
    {
        ini_set('max_execution_time', 120);
        $validateData = $request->validate([
            'period' => 'required',
            'data' => 'required',
            'dependentVariable' => 'required',
            'independentVariable' => 'required'
        ],
        [
            'period.required' => 'The period field is required.',
            'data.required' => 'The data field is required.',
            'dependentVariable.required' => 'The dependent variable field is required.',
            'independentVariable.required' => 'The independent variable field is required.'
        ]);

        $requestData = $request->all();
        $thisUpload = Upload::where('id','=',$requestData['data'])->first();

        $regions = Region::pluck('name', 'id');
        $variables = Variable::pluck('name', 'id');
        $groupedData = [];        

        foreach ($thisUpload->datas as $data) {
            $regionName = $regions[$data->region_id];
            $variableName = $variables[$data->variable_id];        
            $groupedData[$regionName][$variableName] = $data->value;
        }

        $selectedIndependentVariables = $requestData['independentVariable'];
        $independentVariable = Variable::whereIn('id', $selectedIndependentVariables)->pluck('name')->toArray();
    
        $combinedIndependentVariable = implode('+', $independentVariable);

        $chosen_dependent_variable = $requestData['dependentVariable'];
        $dependentVariable = Variable::where('id', $chosen_dependent_variable)->pluck('name');

        $path_to_file=public_path('storage\R\Script.R');
    
        $shapefile_path=public_path('storage\ntt_shapefile\supernew_ntt.shp');
        $shapefile_path = str_replace('\\', '/', $shapefile_path);

        $user_id = auth()->user()->id;

        $jsonInput = json_encode([
            'groupedData' => $groupedData,
            'combinedIndependentVariable' => $combinedIndependentVariable,
            'dependentVariable' => $dependentVariable,
            'shapefile_path' => $shapefile_path,
            'user_id' => $user_id
        ]);

        $tmpFile = tempnam(sys_get_temp_dir(), 'input_data_');
        file_put_contents($tmpFile, $jsonInput);    
        putenv("INPUT_DATA={$tmpFile}");

        $command = "Rscript " . escapeshellarg($path_to_file);
        $output = shell_exec($command);

        if ($output === null) {
            return redirect()->back()->with('failure','Error executing script! Please try again!');
        } else {
            $results = json_decode($output, true);

            $independentVariableLabel = Variable::whereIn('id', $selectedIndependentVariables)->pluck('label')->toArray();
            $independentVariableModel = ["Intercept"];
            foreach ($independentVariableLabel as $value) {
                array_push($independentVariableModel, $value);
            }

            $significance=[];
            for($i=0; $i<count($results['model1Quant']); $i++){
                if($results['model1Quant'][$i] <= 0 && $results['model3Quant'][$i] >= 0){
                    $significance[$i] = "Not Significant";
                }
                else{
                    $significance[$i] = "Significant";
                }
            }

            $modelSummary = [
                    'independentVariable' => $independentVariableModel,
                    'mean' => $results['modelMean'],
                    'quant1' => $results['model1Quant'],
                    'quant3' => $results['model3Quant'],
                    'significance' => $significance
            ];

            $coefficients = $results['modelMean'];
            $variableNames = $independentVariableLabel;
            $intercept = array_shift($coefficients);

            $spatialModel = sprintf(" = %0.4f ", $intercept);

            foreach ($coefficients as $key => $coefficient) {
                $sign = ($coefficient >= 0) ? '+' : '-';                
                $spatialModel .= sprintf("%s %0.4f*%s ", $sign, abs($coefficient), $variableNames[$key]);
            }            

            $regionSorted = Region::all()->sortBy('name');
            $predict = [
                'region' => $regionSorted->pluck('name'),
                'value' => $results['predict']
            ];

            $dependentVariableLabel = Variable::where('id', $chosen_dependent_variable)->pluck('label');
            $mapName = 'predict_map_' . auth()->user()->id . '_.jpg';

            return redirect()->route('analysis')->with(['results'=>$results,
                'period'=>$requestData['period'],
                'data'=>$thisUpload->title,
                'dependentVariable'=>$dependentVariableLabel,
                'independentVariables'=>implode(', ', $independentVariableLabel),
                'morans' => $results['morans'][0],
                'modelSummary' => $modelSummary,
                'predict' => $predict,
                'spatialModel' => $spatialModel,
                'mapName' =>$mapName
            ]);
        }   
    }
}
