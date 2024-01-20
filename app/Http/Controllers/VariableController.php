<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Variable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VariableController extends Controller
{
    public function index()
    {
        $variables = Variable::where('user_id',auth()->user()->id)->get();
        return view('variable.list', compact('variables'));
    }

    public function updateShow($id)
    {
        $this_variable = Variable::find($id);
        return view('variable.update', compact(['this_variable']));
    }

    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'label' => 'required|unique:variables,label,'. $id . ',id,deleted_at,NULL',
            'hint' => 'max:255',
        ],
        [
            'label.required' => 'The name field is required.',
            'label.unique' => 'The name is already taken. Please input another name',
            'hint.max' => 'The maximum length of hint field is 255 characters.'
        ]);
        
        $variable = Variable::find($id);
        DB::beginTransaction();
        try {
            $variable->label = $request->label;
            $variable->name = strtolower(str_replace(' ', '_', $request->label));
            $variable->hint = $request->hint;
            $variable->save();
            DB::commit();
            return redirect()->back()->with('success', 'Variable updated successfully');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to update variable: ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $this_variable = Variable::findOrFail($id);
            $isVariableUsed = Data::where('variable_id',$id)->exists();
            if(!$isVariableUsed){
                $this_variable->delete();
                DB::commit();
                return response()->json(['success' => 'Variable deleted successfully'], 200);
            }
            else{
                return response()->json(['failure' => 'This variable is still in use in the data.'], 500);
            }

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['failure' => 'Failed to delete data'], 500);
        }
    }
}
