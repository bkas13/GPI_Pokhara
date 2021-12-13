<?php

namespace App;

use App\Model\CourseCategory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Course extends Model
{
    use Sluggable;
    protected $fillable = [
        'title','slug','image','file','description', 'category_id',
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


    public function course_category(){
        return $this->belongsTo(CourseCategory::class, 'category_id');
    }
}
