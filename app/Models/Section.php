<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

   protected $guarded = [''];

    /*public function role()
    {
        return $this->belongsTo(Role::class);
    }*/

    public static function sections()
    {
        $getSections = Section::where('status',1)->limit(3)->with('categories')->get();
        $getSections = json_decode(json_encode($getSections), true);

        return $getSections;
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'section_id')
                    ->where(['parent_id' => 'ROOT', 'status'=>1])
                    ->with('subCategories');
    }
}
