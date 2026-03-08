<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    // These must perfectly match your migration columns
    protected $fillable = [
        'user_id', 
        'type', 
        'title', 
        'description', 
        'file_path', 
        'thumbnail_path'
    ];
}