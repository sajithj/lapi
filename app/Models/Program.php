<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
      'program_title', 'program_age_rating', 'program_description', 'program_type'  
    ];
    
    use HasFactory;
}
