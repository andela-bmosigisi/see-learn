<?php

namespace Learn;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'youtube_id',
        'title',
        'description',
        'user_id',
    ];

    /**
     * A video belongs to a particular user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\Relation
     */
    public function user()
    {
        return $this->belongsTo('Learn\User');
    }
}
