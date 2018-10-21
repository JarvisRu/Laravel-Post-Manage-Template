<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name'
    ];

    # 有哪些公告
    public function announcements() {
        return $this->hasMany(Announcement::class);
    }
}
