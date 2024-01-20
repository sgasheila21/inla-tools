<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Region;
use App\Models\Upload;
use App\Models\Variable;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Maatwebsite\Excel\Facades\Excel;

class DataController extends Controller
{
    public function index()
    {
        $uploads = Upload::where('user_id','=', auth()->user()->id)->get();
        $malaria_upload = Upload::where('title','Data Kasus Malaria Tahun 2020')->where('year','2020')->first();

        return view('data.list', compact(['malaria_upload','uploads']));
    }

    public function createShow()
    {
        $currentYear = date("Y");
        for ($year = $currentYear; $year >= 1990; $year--) {
          $years[] = $year;
        }
        return view('data.create', compact('years'));
    }

    public function create(Request $request)
    {
        $validateData = $request->validate([
            'period' => 'required',
            'dataFile' => 'required|file|mimes:xlsx,xls',
            'title' => 'required'
        ],
        [
            'period.required' => 'The period field is required.',
            'dataFile.required' => 'The file field is required.',
            'dataFile.file' => 'The file field must be a file.',
            'dataFile.mimes' => 'File must be in the format of either .xlsx or .xls.',
            'title.required' => 'The title field is required.'
        ]);

        $year = $request->input('period');
        $title = $request->input('title');

        $existing = Upload::where('title',$title)->where('year',$year)->first();
        
        if($existing){
            return redirect()->back()->withInput()->with('failure', 'There is already data with the title "'.$title.'" in the period '.$year.', please change the title or choose another period.');
        }

        $regionSorted = [
            "Region",
            "Sumba Barat",
            "Sumba Timur",
            "Kupang",
            "Timor Tengah Selatan",
            "Timor Tengah Utara",
            "Belu",
            "Alor",
            "Lembata",
            "Flores Timur",
            "Sikka",
            "Ende",
            "Ngada",
            "Manggarai",
            "Rote Ndao",
            "Manggarai Barat",
            "Sumba Tengah",
            "Sumba Barat Daya",
            "Nagekeo",
            "Manggarai Timur",
            "Sabu Raijua",
            "Malaka",
            "Kota Kupang"
        ];

        $path = $request->file('dataFile')->getRealPath();
        $datas = Excel::toArray([], $path)[0];

        //cek template
        $regionsInExcel = array_column($datas, 0);
        $matching = true;
        foreach ($regionSorted as $index => $expectedValue) {
            if (!isset($regionsInExcel[$index]) || $regionsInExcel[$index] !== $expectedValue) {
                $matching = false;
                break;
            }
        }

        $dataWithoutHeader = array_slice($datas, 1);

        $values = array_map(function ($row) {
            return array_slice($row, 1);
        }, $dataWithoutHeader);

        $numericCheck = array_filter(array_merge(...$values), 'is_numeric') === array_merge(...$values);

        if ($matching && $numericCheck) {
            DB::beginTransaction();
            try {
                //create upload
                $upload = Upload::create([
                    'user_id' => auth()->user()->id,
                    'year' => $request->period,
                    'upload_date' => Carbon::now(),
                    'title' => $request->title
                ]);
                //create variable
                $variables = array_slice($datas[0], 1);

                foreach($variables as $variable) {
                    $this_variable_name = strtolower(str_replace(' ', '_', $variable));
                    $existing_variable = Variable::where('name', $this_variable_name)->where('user_id', auth()->user()->id)->first();
                    
                    if(!$existing_variable){
                        $created_variable = Variable::firstOrCreate([
                            'label' => $variable,
                            'user_id' => auth()->user()->id
                        ]);

                        $created_variable->name = $this_variable_name;
                        $created_variable->save();
                    }
                }

                $header = $datas[0];  
                for ($i = 1; $i < count($datas); $i++) {
                    $item = $datas[$i];
                    $result = [];
        
                    for ($j = 0; $j < count($header); $j++) {
                        $result[$header[$j]] = $item[$j];
                    }

                    $region = Region::where('name','=',$result['Region'])->first();
    
                    foreach($result as $variableName => $value) {
                        if ($variableName === 'Region') continue;
                        //create data
                        $this_variable_name = strtolower(str_replace(' ', '_', $variableName));
                        $variable = Variable::where('name','=',$this_variable_name)->where('user_id','=',auth()->user()->id)->first();
                        Data::create([
                            'upload_id' => $upload->id,
                            'variable_id' => $variable->id,
                            'region_id' => $region->id,
                            'value' => $value
                        ]);
                    }
                }
                DB::commit();
                return redirect()->route('data.detail',['id'=>$upload->id])->with('success','Data created successfully.');

            } catch (\Throwable $e) {
                DB::rollBack();
                return redirect()->back()->with(['failure' => 'Failed to create data']);
            }
        } else {
            return redirect()->back()->with('failure', 'The file you uploaded does not match the required format. Ensure that each row in the region column is in sequence with the column named "Region". Also, make sure that the input values are filled and must be numeric. Please upload the file again in accordance with the provided format. The format can be accessed in the hint.')->withInput();
        }
    }

    public function detail($id)
    {
        $this_upload = Upload::find($id);
        $regions = Region::pluck('name', 'id');
        $variables = Variable::withTrashed()->get();
        $groupedData = [];
        $variable_ids = [];
        
        foreach ($this_upload->datas as $data) {
            $groupedData[$data->region_id][$data->variable_id] = $data->value;
            $variable_ids[$data->variable_id] = true;
        }

        return view('data.detail', compact(['this_upload','groupedData','variable_ids','regions','variables']));
    }

    public function updateShow($id)
    {
        $this_upload = Upload::find($id);
        $regions = Region::pluck('name', 'id');
        $variables = Variable::withTrashed()->get();

        $groupedData = [];
        $variable_ids = [];
        
        foreach ($this_upload->datas as $data) {
            $groupedData[$data->region_id][$data->variable_id] = $data->value;
            $variable_ids[$data->variable_id] = true;
        }
        
        return view('data.update', compact(['this_upload','groupedData','variable_ids','regions','variables']));
    }

    public function update($id, Request $request)
    {
        DB::beginTransaction();

        try {
            $validator = FacadesValidator::make($request->all(),[
                'values.*.*' => 'required|numeric'
            ]);
            if($validator->fails()){
                return redirect()->back()->with('failure', 'All value field must be filled and must be numeric.');
            }

            $inputValues = $request->input('values');
            foreach ($inputValues as $regionId => $values) {
                foreach ($values as $variableId => $value) {
                    $data = Data::where('upload_id',$id)
                        ->where('region_id', $regionId)
                        ->where('variable_id', $variableId)
                        ->first();
    
                    if ($data && $data->value !== $value) {
                        $data->update(['value' => $value]);
                    }
                }
            }

            DB::commit();
            return redirect()->route('data.detail',['id'=>$id])->with('success', 'Data updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal memperbarui data: ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $this_upload = Upload::findOrFail($id);
            $all_data = Data::where('upload_id', '=', $this_upload->id)->get();
    
            foreach ($all_data as $data) {
                $data->delete();
            }
    
            $this_upload->delete();
    
            DB::commit();
            return response()->json(['success' => 'Data deleted successfully'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['failure' => 'Failed to delete data'], 500);
        }
    }
}
