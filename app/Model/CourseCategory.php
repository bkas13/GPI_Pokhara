<?php

namespace App\Model;

use App\Course;
use Illuminate\Database\Eloquent\Model;

class CourseCategory extends Model
{
    protected $table='course_categories';

    protected $fillable = [
        'title', 'description','status',
    ];

    public function courses(){
        return $this->hasMany(Course::class, 'category_id');
    }
}
