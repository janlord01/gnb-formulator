<?php

namespace App\Http\Controllers;

use App\Models\FormulaIngredientModel;
use App\Models\FormulaModel;
use Illuminate\Http\Request;
use Throwable;

class FormulaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $formulas = FormulaModel::all();

            return response()->json([
                'status' => 200,
                'data' => $formulas
            ]);
        }catch(Throwable $e){
            return response()->json([
                'status' => 500,
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->all();
        try{
            $request->validate([
                'name' => ['required'],
                'ingredients' => ['required']
            ]);
            $formula = new FormulaModel();
            $formula->name = $request->name;
            $a = 0;
            if($formula->save()){
                foreach($request->ingredients as $key => $item){
                    $ingredient = new FormulaIngredientModel();
                    $ingredient->formula_id = $formula->id;
                    $ingredient->raw = $item['name'];
                    $ingredient->code_name = $item['code'];
                    $ingredient->percent = $item['percentage'];
                    $ingredient->save();
                    $a++;
                }
                if($a > 0){
                    return response()->json([
                        'status' => 200,
                        'message' => 'Formula Saved!'
                    ]);
                }else{
                    return response()->json([
                        'status' => 404,
                        'message' => 'Something went wrong!'
                    ]);
                }
            }

        }catch(Throwable $e){
            return response()->json([
                'status' => 500,
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(FormulaModel $formulaModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FormulaModel $formulaModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FormulaModel $formulaModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FormulaModel $formulaModel)
    {
        //
    }
}
