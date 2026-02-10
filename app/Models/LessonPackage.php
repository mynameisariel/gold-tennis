<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LessonPackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'number_of_lessons',
        'price',
        'image',
        'is_active'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    public function lesson() {
        return $this->hasMany(Lesson::class);
    }

    public function userPackages() {
        return $this->hasMany(UserPackage::class);
    }
}