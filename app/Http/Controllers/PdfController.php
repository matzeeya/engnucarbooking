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

        $this->fpdf->AddFont('THSarabun','','THSarabun.php');
        $this->fpdf->AddFont('THSarabun','B','THSarabun Bold.php');
        $this->fpdf->AddFont('THSarabun','I','THSarabun Italic.php');
        $this->fpdf->AddFont('THSarabun','BI','THSarabun Bold Italic.php');

        $this->fpdf->AddPage('P','A4');

        $this->fpdf-> Image('https://matzeeya.github.io/engnucarbooking/public/images/logo.jpg',24,12,15,15,'jpg');
    	$this->fpdf->SetFont('THSarabun','B',26);
        $this->fpdf->SetXY(20,8);
        $this->fpdf->Cell(170,24,iconv( 'UTF-8','cp874' , 'บันทึกข้อความ' ),0,1,'C',false);

        $this->fpdf->SetFont('THSarabun','',16);
        $this->fpdf->Text( 26 , 40 ,  iconv( 'UTF-8','cp874' , 'ส่วนราชการ คณะวิศวกรรมศาสตร์ ภาควิชาวิศวกรรมไฟฟ้าและคอมพิวเตอร์ โทร. 4315' ));
        $this->fpdf->Text( 26 , 48 ,  iconv( 'UTF-8','cp874' , 'ที่ อว ๐๖๐๓   ..........................' ));
        $this->fpdf->Text( 100 , 48 ,  iconv( 'UTF-8','cp874' , 'วันที่ 20 กรกฏาคม 2565' ));
        $this->fpdf->Text( 26 , 56 ,  iconv( 'UTF-8','cp874' , 'เรื่อง  ...............................................................' ));
        $this->fpdf->Text( 26 , 76 ,  iconv( 'UTF-8','cp874' , 'เรียน คณบดีคณะวิศวกรรมศาสตร์' ));
        $this->fpdf->Text( 36 , 84 ,  iconv( 'UTF-8','cp874' , 'ตามที่ ..................................' ));
        $this->fpdf->Text( 26 , 114 ,  iconv( 'UTF-8','cp874' , 'โดยมีเหตุผลในการใช้รถ' ));
        $this->fpdf->Text( 26 , 121 ,  iconv( 'UTF-8','cp874' , 'เพื่อ .......................' ));
        $this->fpdf->Text( 26 , 128 ,  iconv( 'UTF-8','cp874' , 'เบอร์โทรติดต่อ' ));
        $this->fpdf->Text( 26 , 135 ,  iconv( 'UTF-8','cp874' , '08x-000-0000' ));
        $this->fpdf->Text( 50 , 142 ,  iconv( 'UTF-8','cp874' , 'ในการนี้ ภาควิชาวิศวกรรมไฟฟ้าและคอมพิวเตอร์ คณะวิศวกรรมศาสตร์ ได้จองรถ' ));
        $this->fpdf->Text( 26 , 149 ,  iconv( 'UTF-8','cp874' , 'พร้อมพนักงานขับรถ จำนวน 1 คัน รหัสการจอง BXX000000000 ทำการจองในวันที่ 20 กรกฏาคม' ));
        $this->fpdf->Text( 26 , 157 ,  iconv( 'UTF-8','cp874' , '2565 โดยมีรายละเอียดดังนี้' ));

        $this->fpdf->SetXY(26,165);
        $this->fpdf->Cell(36,8,iconv( 'UTF-8','cp874' , 'สถานที่ไป: ' ),1,1,'L',false);
        $this->fpdf->SetXY(62,165);
        $this->fpdf->Cell(120,8,iconv( 'UTF-8','cp874' , ' พิษณุโลก' ),1,1,'L',false);
        $this->fpdf->SetXY(26,173);
        $this->fpdf->Cell(36,8,iconv( 'UTF-8','cp874' , 'เวลาที่เดินทาง: ' ),1,1,'L',false);
        $this->fpdf->SetXY(62,173);
        $this->fpdf->Cell(120,8,iconv( 'UTF-8','cp874' , ' 22 ก.ค. 65 เวลา 08:00' ),1,1,'L',false);
        $this->fpdf->SetXY(26,181);
        $this->fpdf->Cell(36,8,iconv( 'UTF-8','cp874' , 'เวลาเดินทางกลับ: ' ),1,1,'L',false);
        $this->fpdf->SetXY(62,181);
        $this->fpdf->Cell(120,8,iconv( 'UTF-8','cp874' , ' 24 ก.ค. 65 เวลา 17:00' ),1,1,'L',false);
        $this->fpdf->SetXY(26,189);
        $this->fpdf->Cell(36,8,iconv( 'UTF-8','cp874' , 'รถที่ขอใช้: ' ),1,1,'L',false);
        $this->fpdf->SetXY(62,189);
        $this->fpdf->Cell(120,8,iconv( 'UTF-8','cp874' , ' รถตู้' ),1,1,'L',false);

        $this->fpdf->Text( 50 , 206 ,  iconv( 'UTF-8','cp874' , 'จึงเรียนมาเพื่อโปรดพิจารณาอนุมัติ' ));
        $this->fpdf->Text( 100 , 233 ,  iconv( 'UTF-8','cp874' , 'ลงชื่อ.....................................ผู้ขออนุญาต' ));
        $this->fpdf->Text( 102 , 242 ,  iconv( 'UTF-8','cp874' , '(..........................................................)' ));
        $this->fpdf->Text( 102 , 256 ,  iconv( 'UTF-8','cp874' , 'ลงชื่อ.....................................ผู้อนุมัติ' ));
        $this->fpdf->Text( 102 , 264 ,  iconv( 'UTF-8','cp874' , '(..........................................................)' ));

        $this->fpdf->Output();

        exit;
    }
}
