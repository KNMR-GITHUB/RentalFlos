<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\expenselist;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class expenseController extends Controller
{
    public function display(){
        $property = Property::all();
        $sum = Expense::all()->sum('amount');
        $data = null;
        return view('menus.expenses.expenses',['property' => $property, 'sum' => $sum, 'data' => $data]);
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

    public function filter(){
        $fromDate = date('Y-m-d', strtotime(request('fromDate')));
        $toDate = date('Y-m-d', strtotime(request('toDate')));
        $property = Property::all();
        $sum = Expense::all()->sum('amount');
        $data = Expense::where('propertyName','=',request('propertyName'))->whereBetween('date',[$fromDate,$toDate])->get();
        $currentRoute = request()->route()->getName();

        return view('menus.expenses.expenses',['data' => $data,'property' => $property, 'route' => $currentRoute, 'sum' => $sum]);
    }

    public function show(Expense $expense){
        return view('menus.expenses.expenseDetails',['expense' => $expense]);
    }

    public function edit(Expense $expense){
        $property = Property::all();
        $expenseType = expenselist::all();
        return view('menus.expenses.editExpenses',['expense' => $expense, 'property' => $property, 'expenseType' => $expenseType]);
    }


}
