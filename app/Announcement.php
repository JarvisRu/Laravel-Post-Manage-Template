<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable = [
        'user_id', 'title','content' ,'category','reference', 'reach'
    ];

    public function user() {
    	return $this->belongsTo('App\User');
    }

    public function getLink() {
        return route('announcement', ['announcement' => $this->id]);
    }

    public function getTitle() {
        return $this->title;
    }

    public function getContent() {
        return $this->content;
    }

    public function getCategory() {
        return $this->category;
    }

    public function getReach() {
        return $this->reach;
    }
}
