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
            'footer-center'    => '【壳保养智慧门店，每天爱车多一点】',
            'footer-font-size' => 8,
            'footer-spacing'   => 5,
            'margin-bottom'    => 20
        ];
        return SnappyPdf::loadFile($url)->setOption('footer-center','【壳保养智慧门店，每天爱车多一点】')->inline('report.pdf');
    }

}
