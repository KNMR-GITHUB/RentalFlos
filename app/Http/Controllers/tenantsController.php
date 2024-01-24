<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class tenantsController extends Controller
{
    public function create(){
        return view('menus.tenants.createTenants');
    }
}
