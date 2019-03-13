<?php

namespace Common\Http\Handlers;

use Parsedown;

class DocHandler
{
    public function __invoke($module, $name)
    {
        // 仅开发环境可以访问
        if (!(config('app.env') == 'dev' || config('app.env') == 'local')) {
            return [];
        }

        $doc = base_path('modules/' . $module . '/Doc/');

        $config = file_get_contents($doc . 'config.json');
        $config = json_decode($config, true);

        if ($name === 'index') {
            $docPath = $doc . 'readme.md';
        } else {
            $name    = urldecode($name);
            $name    = str_replace('-', '/', $name);
            $docPath = $doc . $name;
        }

        $parseDown = new Parsedown();
        $html      = $parseDown->text(file_get_contents($docPath));

        return view('doc')
            ->with('doc', $doc)
            ->with('module', $module)
            ->with('html', $html)
            ->with('config', $config);
    }
}
