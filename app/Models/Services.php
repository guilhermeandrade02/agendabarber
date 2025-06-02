<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    
    
    use HasFactory;

    protected $table = 'services';

    protected $fillable = [
        'name', // Adicionado campo 'name'
        'value',
        'category_id',   
        'status',       
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

    public function categories()
    {
        return $this->belongsTo(CategoryService::class, 'category_id', 'id');
    }

   
    
}
