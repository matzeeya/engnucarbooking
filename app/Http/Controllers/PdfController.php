<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;

class PdfController extends Controller
{
    public function thainumDigit($num){
        return str_replace(
            array( '0' , '1' , '2' , '3' , '4' , '5' , '6' ,'7' , '8' , '9' ),
            array( "o" , "๑" , "๒" , "๓" , "๔" , "๕" , "๖" , "๗" , "๘" , "๙" ),$num);
    }

    public function getData($id){
        $bookings = DB::table('bookings')
        ->where('bookings.id','=',$id)
        ->join('vehicles','vehicles.id','=','bookings.vehicle_id')
        ->join('users','users.id','=','bookings.chauffeur')
        ->select('bookings.*','vehicles.photo','vehicles.vehicle_number','users.name')
        ->get();

        return $bookings;
    }

    protected $fpdf;

    public function __construct()
    {
        $this->fpdf = new Fpdf;
    }

    public function index($id)
    {
        $bookings = DB::table('bookings')
        ->where('bookings.id','=',$id)
        ->join('vehicle_type','bookings.vehicle','=','vehicle_type.id')
        ->join('vehicles','vehicles.id','=','bookings.vehicle_id')
        ->join('users','users.username','=','bookings.user')
        ->select('bookings.*',
            'vehicle_type.name AS type',
            'vehicles.photo',
            'vehicles.vehicle_number',
            'users.name')
        ->get();

        foreach($bookings as $data)
        {
          $this->fpdf->AddFont('THSarabun','','THSarabun.php');
          $this->fpdf->AddFont('THSarabun','B','THSarabun Bold.php');
          $this->fpdf->AddFont('THSarabun','I','THSarabun Italic.php');
          $this->fpdf->AddFont('THSarabun','BI','THSarabun Bold Italic.php');

          $this->fpdf->AddPage('P','A4');

          $this->fpdf-> Image('https://matzeeya.github.io/engnucarbooking/public/images/logo.jpg',24,12,15,15,'jpg');
          $this->fpdf->SetFont('THSarabun','B',26);
          $this->fpdf->SetXY(20,8);
          $this->fpdf->Cell(170,24,iconv( 'UTF-8','cp874' , 'บันทึกข้อความ' ),0,1,'C',false);

          $this->fpdf->SetFont('THSarabun','B',16);
          $this->fpdf->Text( 26 , 40 ,  iconv( 'UTF-8','cp874' , 'ส่วนราชการ ' ));
          $this->fpdf->Text( 142 , 40 ,  iconv( 'UTF-8','cp874' , 'โทร. ' ));
          $this->fpdf->Text( 26 , 48 ,  iconv( 'UTF-8','cp874' , 'ที่ ' ));
          $this->fpdf->Text( 100 , 48 ,  iconv( 'UTF-8','cp874' , 'วันที่ ' ));
          $this->fpdf->Text( 26 , 56 ,  iconv( 'UTF-8','cp874' , 'เรื่อง ' ));
          $this->fpdf->Text( 26 , 68 ,  iconv( 'UTF-8','cp874' , 'เรียน ' ));

          $this->fpdf->SetFont('THSarabun','',16);
          $this->fpdf->Text( 46 , 40 ,  iconv( 'UTF-8','cp874' , 'คณะวิศวกรรมศาสตร์ ภาควิชาวิศวกรรมไฟฟ้าและคอมพิวเตอร์ ' ));
          $this->fpdf->Text( 150 , 40 ,  iconv( 'UTF-8','cp874' , $data->phone ));
          $this->fpdf->Text( 30 , 48 ,  iconv( 'UTF-8','cp874' , 'อว ๐๖๐๓  ' ));
          $this->fpdf->Text( 110 , 48 ,  iconv( 'UTF-8','cp874' , '20 กรกฏาคม 2565' ));
          $this->fpdf->Text( 36 , 56 ,  iconv( 'UTF-8','cp874' , 'ขออนุมัติใช้'.$data->type.' พร้อมพนักงานขับรถ' ));
          //$this->fpdf->Line( 26 , 60 , 180 , 60);

          $this->fpdf->Text( 36 , 68 ,  iconv( 'UTF-8','cp874' , 'คณบดีคณะวิศวกรรมศาสตร์' ));
          $this->fpdf->Text( 50 , 76 ,  iconv( 'UTF-8','cp874' , 'เนื่องด้วย  ..................................' ));
          //$this->fpdf->Text( 26 , 114 ,  iconv( 'UTF-8','cp874' , 'โดยมีเหตุผลในการใช้รถ' ));
          //$this->fpdf->Text( 26 , 121 ,  iconv( 'UTF-8','cp874' , 'เพื่อ .......................' ));
          //$this->fpdf->Text( 26 , 128 ,  iconv( 'UTF-8','cp874' , 'เบอร์โทรติดต่อ' ));
          //$this->fpdf->Text( 26 , 135 ,  iconv( 'UTF-8','cp874' , '08x-000-0000' ));
          $this->fpdf->Text( 50 , 142 ,  iconv( 'UTF-8','cp874' , 'ในการนี้ ภาควิชาวิศวกรรมไฟฟ้าและคอมพิวเตอร์ คณะวิศวกรรมศาสตร์ ได้ขออนุมัติใช้รถ' ));
          $this->fpdf->Text( 26 , 149 ,  iconv( 'UTF-8','cp874' , 'พร้อมพนักงานขับรถ จำนวน 1 คัน รหัสการจอง '.$data->booking_number.' ในวันที่ 20 กรกฏาคม' ));
          $this->fpdf->Text( 26 , 157 ,  iconv( 'UTF-8','cp874' , '2565 โดยมีรายละเอียดดังนี้' ));

          $this->fpdf->SetXY(26,165);
          $this->fpdf->Cell(36,8,iconv( 'UTF-8','cp874' , 'สถานที่ไป: ' ),1,1,'L',false);
          $this->fpdf->SetXY(62,165);
          $this->fpdf->Cell(120,8,iconv( 'UTF-8','cp874' , ' '.$data->location ),1,1,'L',false);
          $this->fpdf->SetXY(26,173);
          $this->fpdf->Cell(36,8,iconv( 'UTF-8','cp874' , 'เวลาที่เดินทาง: ' ),1,1,'L',false);
          $this->fpdf->SetXY(62,173);
          $this->fpdf->Cell(120,8,iconv( 'UTF-8','cp874' , ' '.$data->start_date.' เวลา '.$data->start_time.' น.' ),1,1,'L',false);
          $this->fpdf->SetXY(26,181);
          $this->fpdf->Cell(36,8,iconv( 'UTF-8','cp874' , 'เวลาเดินทางกลับ: ' ),1,1,'L',false);
          $this->fpdf->SetXY(62,181);
          $this->fpdf->Cell(120,8,iconv( 'UTF-8','cp874' , ' '.$data->end_date.' เวลา '.$data->end_time.' น.' ),1,1,'L',false);
          $this->fpdf->SetXY(26,189);
          $this->fpdf->Cell(36,8,iconv( 'UTF-8','cp874' , 'รถที่ขอใช้: ' ),1,1,'L',false);
          $this->fpdf->SetXY(62,189);
          $this->fpdf->Cell(120,8,iconv( 'UTF-8','cp874' , ' '.$data->type ),1,1,'L',false);

          $this->fpdf->Text( 50 , 206 ,  iconv( 'UTF-8','cp874' , 'จึงเรียนมาเพื่อโปรดพิจารณาอนุมัติ' ));
          $this->fpdf->Text( 100 , 233 ,  iconv( 'UTF-8','cp874' , 'ลงชื่อ.....................................ผู้ขอใช้รถ' ));
          $this->fpdf->Text( 109 , 242 ,  iconv( 'UTF-8','cp874' , '( '.$data->name.' )' ));
          $this->fpdf->Text( 102 , 256 ,  iconv( 'UTF-8','cp874' , 'ลงชื่อ.....................................ผู้อนุมัติ' ));
          //$this->fpdf->Text( 102 , 264 ,  iconv( 'UTF-8','cp874' , '(..........................................................)' ));
        }
        $this->fpdf->Output();

        exit;
    }
}
