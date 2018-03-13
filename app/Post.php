<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Table name
    protected $table = 'posts';

    // Primary key
    public $primaryKey = 'id';

    // Timestamps
    public $timestamps = true;

    // A function to call when fetching data
    // from the 'Users' table who created this post
    public function user()
    	{
    		// Create a 'One-To-Many' Relationship
    		// where 'Post' is the 'Many'
    		return $this->belongsTo('App\User');
    	}
}
