<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{

    /**
     * @param Request $request
     *
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|null|string
     */
    public function index(Request $request)
    {
        // 如果是开发环境才输出日志
        if (app()->environment('local', 'dev')) {
            $file = empty($request->get('file')) ? date('Y/m/d') . '-iu.log' : $request->get('file');
            $file = storage_path('logs/' . $file);

            if (!file_exists($file)) {
                return '日志不存在';
            }

            $data = file_get_contents($file);

            return view('logging')
                ->with('file', $file)
                ->with('data', $data);
        }

        return ['version' => 'v.01'];
    }

}
