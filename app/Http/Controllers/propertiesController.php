<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class propertiesController extends Controller
{

    // displays all properties for logged in user
    public function display(){

        // getting the authenticated user id
        $container = auth()->user();

        // calling data with auth user
        $properties = $container->properties;

        // alternatively, not using the above
        // $properties = Property::where('user_id','=',auth()->id());

        return view('menus.properties.properties',['properties' => $properties]);
    }

    // route to create property page
    public function create(){
        return view('menus.properties.createProperties');
    }

    // store property data
    public function store(){

        $validated = request()->validate([
            'title' => 'required|min:8|max:50',
            'address_line_1' => 'required|min:2|max:30',
            'address_line_2' => 'required|min:2|max:30',
            'country' => 'required|min:2|max:30',
            'state' => 'required|min:2|max:30',
            'city' => 'required|min:2|max:30',
            'pincode' => 'required|min_digits:6|max_digits:6|numeric',
            'rent' => 'required|digits_between:4,10|numeric',
            'description' => 'nullable|max:300',
        ]);

        $validated['user_id'] = auth()->id();

        $property = Property::create($validated);

        if(request()->has('file')){

            $validated_file = request()->validate([
                'file' => 'file',
            ]);

            $filePath = request()->file('file')->store($property->user_id.'/property'.$property->id.'/file'.'/','public');
            $validated_file['file'] = $filePath;

            $property->file = $validated_file['file'];

            $property->save();
        }

        return redirect()->route('properties');
    }

    // display single property
    public function show(Property $property){
        return view('menus.properties.propertyDetails',[
            'property' => $property
        ]);
    }

    // route to edit page
    public function edit(Property $property){
        return view('menus.properties.propertyEdit',[
            'property' => $property
        ]);
    }

    // update
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

        $property->update($validated);

        if(request()->has('file')){

            $validated_file = request()->validate([
                'file' => 'file',
            ]);

            $filePath = request()->file('file')->store($property->user_id.'/property'.'/'.$property->id.'/file'.'/','public');
            $validated_file['file'] = $filePath;

            $property->file = $validated_file['file'];

            $property->save();
        }

        return redirect()->route('showProperties',$property->id)->with('success',"property updated successfully.");
    }
}
