<?php

namespace App\Http\Controllers;

use Parsedown;

class DocController extends Controller
{
    public function index($name)
    {
        // 仅开发环境可以访问
        if (!(config('app.env') == 'dev'||config('app.env') == 'local')) {
            return success();
        }

        $doc = storage_path('doc/');
//        $doc = realpath(__Dir__.'/../../Doc/').'/';
        $config = file_get_contents($doc.'config.json');
        $config = json_decode($config, true);

        if ($name === 'index') {
            $docPath = $doc.'readme.md';
        } else {
            $name = urldecode($name);
            $name = str_replace('-', '/', $name);
            $docPath = $doc.$name;
        }

        $parseDown = new Parsedown();
        $html = $parseDown->text(file_get_contents($docPath));

        return view('document')
            ->with('doc', $doc)
            ->with('html', $html)
            ->with('config', $config);
    }
}
