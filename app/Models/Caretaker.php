<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caretaker extends Model
{
    use HasFactory;

    protected $fillable = [
        'fname','lname','email','contactNo','propertyId',
    ];

    public function properties(){
        return $this->belongsTo(Property::class);
    }
}
