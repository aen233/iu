<?php
/**
 * Created by PhpStorm.
 * User: qian
 * Date: 2019/1/4
 * Time: 15:56
 */

namespace App\Observers;

use App\Jobs\Blog\TranslateSlug;
use App\Models\Blog\Topic;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored
class TopicObserver
{
    public function saved(Topic $topic)
    {
        // 如 slug 字段无内容，即使用翻译器对 title 进行翻译
        if (!$topic->slug) {
//            \DB::table('blog_topics')->where('id', $topic->id)->update(['slug' => '111']);
//            // 推送任务到队列
            dispatch(new TranslateSlug($topic));
        }
    }
}