<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $table='feedbacks';

    protected $fillable = [
        
        'content',
    ];
    
    

    public function category()
{
    return $this->belongsTo(Category::class, 'category_id');
}

   
}

