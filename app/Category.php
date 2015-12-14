<?php

namespace Learn;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'user_id',
    ];

    /**
     * A category is made by a particular user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\Relation
     */
    public function user()
    {
        return $this->belongsTo('Learn\User');
    }

    /**
     * A category may have many videos.
     *
     * @return \Illuminate\Database\Eloquent\Relations\Relation
     */
    public function videos()
    {
        return $this->hasMany('Learn\Video');
    }
}
