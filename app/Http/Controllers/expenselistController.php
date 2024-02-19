<?php

namespace App\Http\Controllers;

use App\Models\expenselist;
use Illuminate\Http\Request;

class expenselistController extends Controller
{
    function store(){
        $validated = request()->validate([
            'name' => 'required',
        ]);

        $newExpenseType = expenselist::create($validated);

        return redirect()->route('createExpenses')->with('success','new expense type created successfully.');
    }
}
