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
        // if($request->isMethod('put')){
        //     return new UnitResource(Unit::findOrFail($request->unit_id));
        // }
        !empty($request->unit_id) 
        // $unit->id = $request->unit_id;
        // $unit->computer_name = $request->computer_name;
        // $unit->model = $request->model;
        // $unit->brand = $request->brand;
        // $unit->hdd = $request->hdd;
        // $unit->ram = $request->ram;
        // $unit->processor = $request->processor;
        // $unit->os = $request->os;        
        // $unit->mac = $request->mac;
        // $unit->isdel = $request->isdel;
        
        
        // if($unit->save()){
        //     return new UnitResource($unit);
        // }
    }

    public function show($id)
    {
        $unit = Unit::findOrFail($id);

        return new UnitResource($unit);
    }

    public function destroy($id)
    {
        $unit = Unit::findOrFail($id);

        // if($unit->id){
            return new UnitResource($unit);
        // }
    }
}
