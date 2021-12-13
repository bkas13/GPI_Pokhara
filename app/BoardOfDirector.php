<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Cviebrock\EloquentSluggable\Sluggable;


class BoardOfDirector extends Model
{
    use Sluggable;
    use SoftDeletes;
    protected $fillable = [

        'name',
        'slug',
        'job_title',
        'join_date',
        'address',
        'gender',
        'DOB',
        'phone',
        'email',
        'school_id',

    ];

    use LogsActivity;
    protected static $logOnlyDirty = true;
    protected static $logAttributes = ['name', 'slug','job_title','join_date','address','gender','DOB','phone','email','staff_type_id','schoo_id'];

    public function getDescriptionForEvent($eventName)
    {
        return "{$eventName}";
    }


    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }


}
