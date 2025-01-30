<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use InteractsWithMedia;
    
    // Personalizar la ruta de almacenamiento para evitar subcarpetas
    public function getMediaPathAttribute(): string
    {
        return public_path('uploads') . '/' . $this->getFirstMedia('images')->file_name; // Cambia 'uploads' por cualquier carpeta raíz que desees
    }

    protected $fillable = [
        'description',
        'price',
        'id_category',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category'); 
    }

}
