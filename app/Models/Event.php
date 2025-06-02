<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'start_date', 
        'end_date', 
        'background_color', 
        'border_color', 
        'text_color', 
        'employee_id'
    ];

    protected $dates = ['start_date', 'end_date'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
