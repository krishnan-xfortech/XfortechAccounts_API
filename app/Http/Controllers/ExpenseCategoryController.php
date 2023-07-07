<?php

namespace App\Http\Controllers;

use App\Models\ExpenseCategory;
use Illuminate\Http\Request;

class ExpenseCategoryController extends Controller
{
    public function index(){
        $category = ExpenseCategory::all();
        return response()->json([
            "success" => true,
            "data" => $category
        ]);
    }

    public function create(Request $request){
        $category = new ExpenseCategory;
        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->save();
        return response()->json([
            "success" => true,
        ]);
    }

    public function update(Request $request, $id)
    {
        $category = ExpenseCategory::findOrFail($id);
        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->save();
        return response()->json([
            "success" => true,
        ]);
    }

    public function delete($id)
    {
        $category = ExpenseCategory::findOrFail($id);
        if ($category) {
            $category->delete();
            return response()->json([
                "success" => true
            ]);
        }
    }
}
