<?php


namespace Modules\Admin\Http\Controllers;


use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\PDF;

class PDFController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Welcome to Tutsmake.com',
            'date' => date('m/d/Y')
        ];

        $name = '';
        $pdf = (new PDF)->loadView($name, $data);

        return $pdf->download('tutsmake.pdf');
    }
}
