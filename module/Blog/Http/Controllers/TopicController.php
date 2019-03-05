<?php

namespace Blog\Http\Controllers;

use App\Exceptions\BaseException;
use Blog\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param Topic   $topic
     *
     * @return array
     */
    public function index(Request $request, Topic $topic)
    {
        throw new BaseException('ert',403,['rty','678']);
        return $topic->paginate($request->per_page ?? 15);
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
     * @param Request $request
     * @param Topic   $topic
     *
     * @return Topic
     */
    public function store(Request $request, Topic $topic)
    {
        $request->validate([
            'title'       => 'required',
            'body'        => 'required',
            'category_id' => 'required'
        ]);
        $topic->fill($request->all());
        $topic->user_id = Auth::id() ?? User::first()->id;

        // 生成话题摘录
        $topic->excerpt = $this->make_excerpt($topic->body);
        $topic->save();

        return $topic;
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param Topic   $topic
     *
     * @return Topic|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function show(Request $request, Topic $topic)
    {
        if (!empty($topic->slug) && $topic->slug != $request->slug) {
            return redirect($topic->link(), 301);
        }

        return $topic;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param Topic   $topic
     *
     * @return void
     */
    public function edit(Request $request, Topic $topic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return array
     */
    public function update(Request $request, $id)
    {
        return [
            'data' => [
                [112],
                [222]
            ],
            'meta' => [
                'total'    => 2,
                'per_page' => 2
            ]
        ];
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
