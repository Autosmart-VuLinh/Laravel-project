<?php

namespace Modules\Categories\src\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    public $table = 'categories';
    protected $fillable = [
        'name',
        'slug',
        'parent_id',
    ];

    public function children()
    {
        return $this->hasMany(Categories::class, 'parent_id');
    }
    public function subCategories()
    {
        return $this->children()->with('subCategories');
    }
}
