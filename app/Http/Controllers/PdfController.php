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
        $options = [
            'footer-center'    => 'qiaopai1234壳牌',
            'footer-font-size' => 8,
            'footer-spacing'   => 5,
            'margin-bottom'    => 20
        ];
        return SnappyPdf::loadFile($url)->setOptions($options)->inline('report.pdf');
    }

}
