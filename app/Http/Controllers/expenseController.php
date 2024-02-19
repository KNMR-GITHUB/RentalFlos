<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\expenselist;
use App\Models\Property;
use Illuminate\Http\Request;

class expenseController extends Controller
{
    public function display(){
        $property = Property::all();
        $expense = Expense::all();
        return view('menus.expenses.expenses',['property' => $property, 'expense' => $expense]);
    }

    public function create(){
        $property = Property::all();
        $expenseType = expenselist::all();

        return view('menus.expenses.createExpenses',['property' => $property, 'expenseType' => $expenseType]);
    }

    public function store(){
        $property = Property::where('id','=',request()->propertyName)->first();

        $expenses = request()->validate([
            'expenseType' => 'required',
            'date' => 'required|date',
            'amount' => 'required|numeric',
            'expenseDescription' => 'nullable',
            'file' => 'nullable',
        ]);

        $expenses['propertyName'] = $property->title;

        $newExpense = Expense::create($expenses);

        $newExpense->tenantName = $property->tenantName;

        $newExpense->save();

        return redirect()->route('expenses')->with('success','new expense created successfully');
    }


}
