<?php

namespace App\Http\Controllers;

use App\Models\Calc;
use Illuminate\Http\Request;

class CalcController extends Controller
{
    
    public function add(Request $request)
    {
        $num1 = $request->input('num1');
        $num2 = $request->input('num2');
        $result = $num1 + $num2;
    
        Calc::create([
            'num1' => $num1,
            'num2' => $num2,
            'result' => $result
        ]);
        
        return response()->json(['result' => $result]);
        
    }

    public function sub(Request $request)
    {
        $num1 = $request->input('num1');
        $num2 = $request->input('num2');
        $result = $num1 - $num2;

        Calc::create([
            'num1' => $num1,
            'num2' => $num2,
            'result' => $result
        ]);

        return response()->json(['result' => $result]);
    }

    public function mul(Request $request)
    {
        $num1 = $request->input('num1');
        $num2 = $request->input('num2');
        $result = $num1 * $num2;

        Calc::create([
            'num1' => $num1,
            'num2' => $num2,
            'result' => $result
        ]);

        return response()->json(['result' => $result]);
    }

    public function div(Request $request)
    {
        $num1 = $request->input('num1');
        $num2 = $request->input('num2');
        $result = $num1 / $num2;

        Calc::create([
            'num1' => $num1,
            'num2' => $num2,
            'result' => $result
        ]);
        
        return response()->json(['result' => $result]);
    }

    public function operations()
    {
        $operations = Calc::all();
        return response()->json(['operations' => $operations]);
    }
}
