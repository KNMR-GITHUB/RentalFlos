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

        request()->validate([
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

        Property::create([
            'title' => request()->get('title'),
            'address_line_1' => request()->get('address_line_1'),
            'address_line_2' => request()->get('address_line_2'),
            'country' => request()->get('country'),
            'state' => request()->get('state'),
            'city' => request()->get('city'),
            'pincode' => request()->get('pincode'),
            'rent' => request()->get('rent'),
            'description' => request()->get('description'),
            'file_upload' => request()->get('file_upload'),
            'map' => request()->get('map')
        ]);

        return redirect()->route('properties');
    }
}
