<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class propertiesController extends Controller
{

    public function display(){
        $properties = Property::all();

        return view('menus.properties.properties',['properties' => $properties]);
    }

    public function create(){
        return view('menus.properties.createProperties');
    }

    public function store(){

        $validated = request()->validate([
            'title' => 'required|min:8|max:50',
            'address_line_1' => 'required|min:2|max:30',
            'address_line_2' => 'required|min:2|max:30',
            'country' => 'required|min:2|max:30',
            'state' => 'required|min:2|max:30',
            'city' => 'required|min:2|max:30',
            'pincode' => 'required|min_digits:6|numeric',
            'rent' => 'required|digits_between:4,10|numeric',
            'description' => 'nullable|max:200',
        ]);

        $validated['user_id'] = auth()->id();

        $property = Property::create($validated);

        return redirect()->route('properties');
    }

    public function show(Property $property){
        return view('menus.properties.propertyDetails',[
            'property' => $property
        ]);
    }

    public function edit(Property $property){
        return view('menus.properties.propertyEdit',[
            'property' => $property
        ]);
    }

    public function update(Property $property){

        $validated = request()->validate([
            'title' => 'required|min:8|max:50',
            'address_line_1' => 'required|min:2|max:30',
            'address_line_2' => 'required|min:2|max:30',
            'country' => 'required|min:2|max:30',
            'state' => 'required|min:2|max:30',
            'city' => 'required|min:2|max:30',
            'pincode' => 'required|min_digits:6|numeric',
            'rent' => 'required|digits_between:4,10|numeric',
            'description' => 'nullable|max:200',
        ]);

        $property->title = $validated['title'];
        $property->address_line_1 = $validated['address_line_1'];
        $property->address_line_2 = $validated['address_line_2'];
        $property->country = $validated['country'];
        $property->state = $validated['state'];
        $property->city = $validated['city'];
        $property->pincode = $validated['pincode'];
        $property->rent = $validated['rent'];
        $property->description = $validated['description'];

        $property->save();

        return redirect()->route('showProperties',$property->id)->with('success',"property updated successfully.");
    }
}
