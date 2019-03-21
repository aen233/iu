<?php

namespace App\Http\Controllers;

use Barryvdh\Snappy\Facades\SnappyPdf;

class PdfController extends Controller
{

    /**
     * @return mixed
     */
    public function index()
    {
        $url     = request('url');
        $options = request('options', []);

        $options = $options ? json_decode($options, true) : [];

        return SnappyPdf::loadFile($url)->setOptions($options)->inline('report.pdf');
    }

}
