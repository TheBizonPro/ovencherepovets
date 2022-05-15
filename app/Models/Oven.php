<?php

namespace App\Models;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use SleepingOwl\Admin\Form\Related\Forms\BelongsTo;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Oven extends Model
{
    use HasFactory; use HasSlug;
    protected $fillable=['title','price','slug','description','short_description'];

  public static function oven($slug){
      return Oven::where('slug',$slug)->get();
  }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
    //Связи
    public function orders(): Relation
    {
        return $this->hasMany(Order::class);
    }

    public function categories() :Relation
    {
       return $this->belongsToMany(Category::class);
    }

    public static function scopeActive($query){
        return $query->where('active',1)->get();
    }
}
