<?php

namespace Blog\Models;

use App\Models\User;
use Blog\Observers\TopicObserver;

class Topic extends Base
{

    public static function boot()
    {
        parent::boot();
        static::observe(TopicObserver::class);
    }

    protected $fillable = [
        'title',
        'body',
        'user_id',
        'category_id',
        'reply_count',
        'view_count',
        'last_reply_user_id',
        'order',
        'excerpt',
        'slug'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function link($params = [])
    {
        return route('topics.show', array_merge([$this->id, $this->slug], $params));
    }
}
