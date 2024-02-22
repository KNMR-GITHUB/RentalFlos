<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Tenant;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function display(){
        $property = Property::where('user_id',auth()->id())->where('status','Active')->get();
        $tenant = Tenant::where('user_id',auth()->id())->where('status','Active')->get();

        return view('menus.dashboard.dashboard',['property' => $property, 'tenant' => $tenant]);
    }
}
