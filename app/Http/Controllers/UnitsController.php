<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unit;

class UnitsController extends Controller
{
    //
    public function index() {
        $units = Unit::where('isdel', 0)->get();

        $response = response()->json([
            'results' => $units
        ]);

        return $response;
    }

    public function view($id) {
        $unit = Unit::find($id);

        $response = response()->json([
            'result' => $unit
        ]);

        if ($unit['isdel'] != 1){
            return $response;
        } 
        else {
            return response()->json([
                'result' => 'Resource not Found'
            ]);
        }
        
    }

    public function create() {

    }
    
    public function update(Request $request, $id)
    {
        $unit = Unit::find($id);
        $uri = $request->path();
        //Changes here
        //Another here
        return response()->json([
            'result' => $unit
        ]);
    }

    public function delete($id) {

    }
}
