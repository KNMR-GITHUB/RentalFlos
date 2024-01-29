<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;

class tenantsController extends Controller
{
    public function display(){

        // getting the authenticated user id
        $container = auth()->user();

        // calling data with auth user
        $tenants = $container->tenants;

        // alternatively, not using the above
        // $properties = Property::where('user_id','=',auth()->id());

        return view('menus.tenants.tenants',['tenants' => $tenants]);
    }

    public function create(){
        return view('menus.tenants.createTenants');
    }

    public function store(){

        $container = request()->validate([
            'name' => 'required|min:2|max:30',
            'contactNo' => 'required|numeric|min_digits:10|max_digits:10',
            'email' => 'required|email',
            'address' => 'required|min:5|max:50'
        ]);

        $container['user_id'] = auth()->id();

        $tenant = Tenant::create($container);

        return redirect()->route('tenants');
    }

    public function show(Tenant $tenant){
        return view('menus.tenants.tenantsDetails',[
            'tenant' => $tenant
        ]);
    }

    public function edit(Tenant $tenant){
        return view('menus.tenants.tenantsEdit',[
            'tenant' => $tenant
        ]);
    }

    public function update(Tenant $tenant){

        $validated = request()->validate([
            'name' => 'required|min:2|max:30',
            'contactNo' => 'required|numeric|min_digits:10|max_digits:10',
            'email' => 'required|email',
            'address' => 'required|min:5|max:50'
        ]);

        $tenant->name = $validated['name'];
        $tenant->contactNo = $validated['contactNo'];
        $tenant->email = $validated['email'];
        $tenant->address = $validated['address'];

        $tenant->save();

        return redirect()->route('showTenants',$tenant->id)->with('success',"tenant updated successfully.");
    }
}
