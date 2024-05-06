<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indicateur extends Model
{
    use HasFactory;
    protected $fillable = [
        'trafic_facebook',
        'trafic_instagram',
        'trafic_google',
        'trafic_site',
        'note_facebook',
        'note_instagram',
        'note_google',
        'note_site',
        'date',
        'apparitionSite',
        'commentaire_facebook',
        'commentaire_instagram',
        'commentaire_google',
        'commentaire_site',
        'observation',
        'termes'
        
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
  
}
