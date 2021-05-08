<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PDF;
class PDFController extends Controller

{
  public function pdf()
    {   
         $data = [

            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y')
        ];
        return view('myPDF', $data);
    }

    
    public function generatePDF()
    {
        $data = [

            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y')
        ];
        $pdf = PDF::loadView('myPDF', $data);
        return $pdf->download('itsolutionstuff.pdf');
    }
}