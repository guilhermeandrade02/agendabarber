<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryService extends Model
{
    
    
    use HasFactory;

    protected $table = 'category_services';

    protected $fillable = [
       
        
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

    public function service()
    {
        return $this->hasMany(Services::class, 'category_id', 'id');
    }


    
}
