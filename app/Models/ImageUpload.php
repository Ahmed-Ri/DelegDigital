<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageUpload extends Model
{
    use HasFactory;
    protected $fillable = [
        'filename',       
    ];
    public function compagne()
    {
        return $this->belongsTo(compagne::class,'compagne_id');
    }
}
