<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\expenselist;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;

class expenseController extends Controller
{
    public function display(){
        $property = Property::where('user_id',auth()->id())->get();
        $propertylist = $property->pluck('title')->toArray();
        $sum = Expense::whereIn('propertyName', $propertylist)->sum('amount');
        $data = null;
        $values = null;
        return view('menus.expenses.expenses',['property' => $property, 'sum' => $sum, 'data' => $data , 'values' => $values]);
    }

    public function create(){
        $property = Property::where('user_id',auth()->id())->get();
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

        if(request()->has('files')){
            $expenses = request()->validate([
                'files.*' => 'file',
            ]);

            $filePaths = [];

            foreach(request()->file('files') as $file) {
                $fileName = $file->getClientOriginalName();
                $filePath = $file->storeas($property->user_id.'/expenses'.'/'.$property->id.'/file',$fileName,'public');
                $file = $filePath;
                $filePaths[] = $filePath;
            }

            // Serialize the array of file paths before saving to the database
            $newExpense->file = serialize($filePaths);
            $newExpense->save();
        }

        $newExpense->save();

        return redirect()->route('expenses')->with('success','new expense created successfully');
    }

    public function filter(){
        $fromDate = date('Y-m-d', strtotime(request('fromDate')));
        $toDate = date('Y-m-d', strtotime(request('toDate')));

        $property = Property::where('user_id',auth()->id())->get();

        $propertylist = $property->pluck('title')->toArray();
        $sum = Expense::whereIn('propertyName', $propertylist)->sum('amount');

        $data = Expense::where('propertyName','=',request('propertyName'))->whereBetween('date',[$fromDate,$toDate])->get();

        $values = request();

        return view('menus.expenses.expenses',['data' => $data,'property' => $property, 'values' => $values, 'sum' => $sum, 'list' => $propertylist]);
    }

    public function show(Expense $expense){
        return view('menus.expenses.expenseDetails',['expense' => $expense]);
    }

    public function edit(Expense $expense){
        $property = Property::where('user_id',auth()->id())->get();
        $expenseType = expenselist::all();
        return view('menus.expenses.editExpenses',['expense' => $expense, 'property' => $property, 'expenseType' => $expenseType]);
    }

    public function update(Expense $expense){
        $updatedValues = request()->validate([]);

        $expense->update($updatedValues);

        if(request()->hasFile('files')) {

            if($expense->file !== null){
                $toDelete = unserialize($expense->file);
                for ($i=0; $i < count($toDelete) ; $i++) {
                    Storage::disk('public')->delete($toDelete[$i]);
                }

            }

            $validated_files = request()->validate([
                'files.*' => 'file',
            ]);

            $filePaths = [];

            foreach(request()->file('files') as $file) {
                $fileName = $file->getClientOriginalName();
                $filePath = $file->storeas($expense->user_id.'/expenses'.'/'.$expense->id.'/file',$fileName,'public');
                $file = $filePath;
                $filePaths[] = $filePath;
            }

            // Serialize the array of file paths before saving to the database
            $expense->file = serialize($filePaths);
            $expense->save();
        }

        return redirect()->route('expenseDetails',$expense->id);
    }


}
