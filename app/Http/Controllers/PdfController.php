<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;

class PdfController extends Controller
{
    protected $fpdf;
 
    public function __construct()
    {
        $this->fpdf = new Fpdf;
    }

    public function index($id) 
    {
        $booking_number = $id;

        $this->fpdf->AddFont('angsana','','angsa.php');
        $this->fpdf->AddFont('angsana','B','angsab.php');
        $this->fpdf->AddFont('angsana','I','angsai.php');
        $this->fpdf->AddFont('angsana','BI','angsaz.php');

        $this->fpdf->AddPage('P','A4');
        
        $this->fpdf-> Image('http://www.kruchiangrai.net/wp-content/uploads/2013/06/%E0%B8%95%E0%B8%A3%E0%B8%B2%E0%B8%84%E0%B8%A3%E0%B8%B8%E0%B8%91.jpg',19,12,20,20,'jpg');
    	$this->fpdf->SetFont('angsana','B',26);
        $this->fpdf->SetXY(20,20);
        $this->fpdf->Cell(170,10,iconv( 'UTF-8','cp874' , 'บันทึกข้อความ' ),0,1,'C',false);  
         
        $this->fpdf->Output();

        exit;
    }
}
