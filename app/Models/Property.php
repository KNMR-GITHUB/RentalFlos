<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'address_line_1',
        'address_line_2',
        'country',
        'state',
        'city',
        'pincode',
        'rent',
        'description',
        'tenants',
        'caretakers',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
