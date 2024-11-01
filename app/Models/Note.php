<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    // Tambahkan kolom 'title', 'content', dan 'category_id' ke dalam fillable
    protected $fillable = ['title', 'content', 'category_id', 'status'];

    // Definisikan relasi dengan model Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
