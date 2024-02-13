<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class propertiesController extends Controller
{

    // displays all properties for logged in user
    public function display(){

        // getting the authenticated user id
        $container = auth()->user();
        $tenants = Tenant::where('propertyName','=',null)->get();
        // calling data with auth user
        $properties = $container->properties;

        // alternatively, not using the above
        // $properties = Property::where('user_id','=',auth()->id());

        return view('menus.properties.properties',['properties' => $properties, 'tenants' => $tenants]);
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
            'latitude' => 'nullable',
            'longitude' => 'nullable',
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

        return view('menus.properties.propertyEdit')->with([
            'property' => $property,

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
            'latitude' => 'nullable',
            'longitude' => 'nullable',
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

    public function assignTenant(Property $property){
        $data = request()->all();
        $tenant = Tenant::where("id",'=',$data['tenantName'])->first();

        $property->tenantId = $data['tenantName'];
        $property->tenantName = $tenant->name;

        $tenant->propertyId = $property->id;
        $tenant->propertyName = $property->title;
        $tenant->rent = $data['rent'];
        $tenant->startDate = $data['startDate'];
        $tenant->endDate = $data['endDate'];

        $property->save();
        $tenant->save();

        return redirect()->route('properties')->with('success',"tenant assigned to property.");
    }

    public function unAssignTenant(Property $property){
        $tenant = Tenant::where("id",'=',$property->tenantId)->first();

        $property->tenantId = null;
        $property->tenantName = null;

        $tenant->propertyId = null;
        $tenant->propertyName = null;
        $tenant->rent = null;
        $tenant->startDate = null;
        $tenant->endDate = null;

        $property->save();
        $tenant->save();

        return redirect()->route('properties')->with('success',"tenant unAssigned from property.");
    }
}
