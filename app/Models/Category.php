<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function subCategories()
    {
        return $this->hasMany(Category::class, 'parent_id')->where('status',1);
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id')->select('id', 'name');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id')->select('id', 'name');
    }




    /**
     * Get the index name for the model.
     *
     * @return string
     */


}
