<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    
    
    use HasFactory;

    protected $table = 'employees';

    protected $fillable = [
        'name', // Adicionado campo 'name'
        'status',
        'email',
        'phone',
        'birthdate',
        'address',
    ];
   
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];


    
}
