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
        $url = request('url');
        return SnappyPdf::loadFile($url)->inline('report.pdf');
    }

}
