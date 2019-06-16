<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	protected $fillable = ['title','description','url','image'];
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    public function profileImage()
    {
     
        return ($this->image)?$this->image:'profile/default.png';
    }

    public function followers()
    {
        return $this->belongsToMany(User::class);
    }
}
