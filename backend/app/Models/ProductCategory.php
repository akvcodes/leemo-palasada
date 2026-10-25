<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $primaryKey = 'category_id';
    public $timestamps = false;

    protected $fillable = [
        'category_name', 'parent_category_id', 'icon_path',
    ];

    public function parent()
    {
        return $this->belongsTo(ProductCategory::class, 'parent_category_id', 'category_id');
    }

    public function children()
    {
        return $this->hasMany(ProductCategory::class, 'parent_category_id', 'category_id');
    }

    public function stallProducts()
    {
        return $this->hasMany(StallProduct::class, 'category_id', 'category_id');
    }
}