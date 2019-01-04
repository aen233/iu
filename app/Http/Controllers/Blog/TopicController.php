<?php

namespace App\Http\Controllers\Blog;

use App\Jobs\Blog\TranslateSlug;
use App\Models\Blog\Topic;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @param Topic                     $topic
     *
     * @return array|null
     */
    public function store(Request $request, Topic $topic)
    {
        $topic->fill($request->all());
        $topic->user_id = Auth::id() ?? User::first()->id;

        // 生成话题摘录
        $topic->excerpt = $this->make_excerpt($topic->body);
        $topic->save();

        return success($topic);
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param Topic   $topic
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Topic $topic)
    {
        if (!empty($topic->slug) && $topic->slug != $request->slug) {
            return redirect($topic->link(), 301);
        }

        return success($topic);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    protected function make_excerpt($value, $length = 200)
    {
        $excerpt = trim(preg_replace('/\r\n|\r|\n+/', ' ', strip_tags($value)));

        return str_limit($excerpt, $length);
    }
}
