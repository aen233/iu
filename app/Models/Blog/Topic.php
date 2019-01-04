<?php

namespace App\Models\Blog;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $table = 'blog_topics';
    //
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
