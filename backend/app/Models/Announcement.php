<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $primaryKey = 'announcement_id';

    protected $fillable = [
        'superadmin_id', 'title', 'content', 'target_role', 'is_published', 'published_at',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function superadmin()
    {
        return $this->belongsTo(User::class, 'superadmin_id', 'id');
    }
}