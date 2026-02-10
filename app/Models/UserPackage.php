<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'lesson_package_id',
        'status',
        'notes'
    ];

    protected $casts = [
        'status' => 'string',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function lessonPackage() {
        return $this->belongsTo(LessonPackage::class);
    }
    
    public function scopeConfirmed($query)
    {
        return $query->where('status', 'confirmed');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeCancelled($query)
    {
        return $query->where('status', 'cancelled');
    }

}
