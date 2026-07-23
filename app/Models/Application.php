<?php
// app/Models/Application.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Application extends Model
{
    use HasUuids;
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'description',
        'category_id',
        'department',
        'owner',
        'url',
        'environment',
        'status',
        'display_order',
        'icon',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}