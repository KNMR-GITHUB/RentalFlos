<?php

namespace App\Http\Controllers;

use App\Models\Caretaker;
use App\Models\Property;
use Illuminate\Http\Request;

class CaretakerController extends Controller
{
    public function createAndStore(Property $property){
        $validated = request()->validate([
            'lname' => 'required',
            'fname' => 'required',
            'contactNo' => 'required',
            'email' => 'required'
        ]);

        $newCaretaker = Caretaker::create($validated);

        $property->careTakerId = $newCaretaker->id;

        $property->save();

        return redirect()->route('properties')->with('success','caretaker assigned successfully');
    }

    public function assignCaretakerFromList(Property $property){
        $caretaker = Caretaker::where("id",'=',request()->selected_caretaker)->first();
        $property->careTakerId = $caretaker->id;

        $caretaker->save();
        $property->save();

        return redirect()->route('properties')->with('success','caretaker assigned successfully');
    }

    public function unAssignCaretaker(Property $property){
        $caretaker = Caretaker::where("id",'=',$property->careTakerId)->first();

        $property->careTakerId = null;

        $caretaker->save();
        $property->save();

        return redirect()->route('properties')->with('success','caretaker unassigned successfully');
    }
}
