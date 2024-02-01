<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function store(Tenant $tenant){

        $container = request()->validate([
            'name' => 'required|min:2|max:30',
            'contactNo' => 'required|numeric|min_digits:10|max_digits:10',
            'email' => 'required|email|unique:tenants,email',
            'address' => 'required|min:5|max:50'
        ]);

        $container['user_id'] = auth()->id();

        $newTenant = Tenant::create($container);

        if(request()->has('image')){
            $imagePath = request()->file('image')->store($newTenant->user_id.'/tenant'.'/profile'.'/'.$newTenant->id,'public');
            $container['image'] = $imagePath;

            $newTenant->image = $container['image'];

            $newTenant->save();
        }



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

        if(request()->has('image')){
            $imagePath = request()->file('image')->store($tenant->user_id.'/tenant'.'/'.$tenant->id,'public');
            $validated['image'] = $imagePath;

            if($tenant->image !== null){
                Storage::disk('public')->delete($tenant->image);
            }

        }

        $tenant->update($validated);

        return redirect()->route('showTenants',$tenant->id)->with('success',"tenant updated successfully.");
    }
}
