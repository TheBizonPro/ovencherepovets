<?php

namespace App\Models;
use App\Models\Oven;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use SleepingOwl\Admin\Form\Related\Forms\BelongsTo;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Category extends Model
{
    use HasFactory;
    use HasSlug;

    protected $fillable=['title','slug'];
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public static function category() {

       return Category::scopeActive(Category::query())->get();

    }


    public static function card($slug){

        return Category::scopeFindOfSlug(Category::query(),$slug);

    }

    public static function scopeFindOfSlug($query,$slug){
        return $query->where('slug',$slug)->with('ovens')->get();
    }

    public static function scopeActive($query){
        return $query->where('active',1);
    }
    public function ovens(): Relation{
       return $this->belongsToMany(Oven::class)->where('active',1);
    }
}
