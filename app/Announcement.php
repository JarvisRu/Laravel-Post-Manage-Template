<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable = [
        'category_id', 'title','content' ,'reference', 'reach'
    ];

    # 發文者
    public function user() {
    	return $this->belongsTo('App\User');
    }

    # 分類
    public function category() {
        return $this->belongsTo(Category::class);
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
