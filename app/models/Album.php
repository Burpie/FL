<?php

class Album extends Eloquent {
    
    /**
     * The table used by this model
     *
     * @var string
     **/
    protected $table = 'albums';

    /**
     * The primary key
     *
     * @var string
     **/
    protected $primaryKey = 'album_id';

    /**
     * The fields that are guarded cannot be mass assigned
     *
     * @var array
     **/
    protected $guarded = array();

    /**
    *  Enabling soft deleting
    *
    *  @var boolean
    **/
     protected $softDelete = true;

    /**
     * Defining the relationship, an album could have many photos
     *
     * @return \JeroenG\LaravelPhotoGallery\Models\Photo
     **/
    public function photos()
    {
    return $this->hasMany('Photo');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function comments()
    {
        return $this->morphMany('Fbf\LaravelComments\Comment', 'commentable');
    }

}