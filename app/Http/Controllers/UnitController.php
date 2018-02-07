<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Unit;                                       //Model
use App\Http\Resources\Unit as UnitResource;        //Unit Resource

class UnitController extends Controller
{
    public function index()
    {
        $units = Unit::paginate(20);
        $units = Unit::where('isdel', 0)->get();

        return UnitResource::collection($units);
    }

    public function store(Request $request)
    {
        $unit = $request->isMethod('put') ? Unit::findOrFail($request->unit_id) : new Unit;
        $unit->id = $request->unit_id;
        if(!empty($request->computer_name)) {
            $unit->computer_name = $request->computer_name;
        }
        if(!empty($request->model)) {
            $unit->model = $request->model;
        }
        if(!empty($request->brand)) {
            $unit->brand = $request->brand;
        }
        if(!empty($request->hdd)) {
            $unit->hdd = $request->hdd;
        }
        if(!empty($request->ram)) {
            $unit->ram = $request->ram;
        }
        if(!empty($request->processor)) {
            $unit->processor = $request->processor;
        }
        if(!empty($request->os)) {
            $unit->os = $request->os;
        }
        if(!empty($request->mac)) {
            $unit->mac = $request->mac;
        }
        if(!empty($request->isdel)) {
            $unit->isdel = $request->isdel;
        }
 
        if($unit->save()){
            return new UnitResource($unit);
        }
    }

    public function show($id)
    {
        $unit = Unit::findOrFail($id);

        return new UnitResource($unit);
    }

    public function destroy(Request $request)
    {
        $unit = $request->isMethod('delete') ? Unit::findOrFail($request->unit_id) : new Unit;

        $unit->id = $request->unit_id;
        $unit->isdel = 1;

        if($unit->save()){
            return response()->json([
                'response' => 'Unit ' . $request->unit_id . ' has been deleted.'
            ]);
        } 
    }
}
