<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;

class PdfController extends Controller
{
    /*(public function thainumDigit($num){
        return str_replace(
            array( '0' , '1' , '2' , '3' , '4' , '5' , '6' ,'7' , '8' , '9' ),
            array( "o" , "๑" , "๒" , "๓" , "๔" , "๕" , "๖" , "๗" , "๘" , "๙" ),$num);
    }*/

    /*public function getData($id){
        $bookings = DB::table('bookings')
        ->where('bookings.id','=',$id)
        ->join('vehicles','vehicles.id','=','bookings.vehicle_id')
        ->join('users','users.id','=','bookings.chauffeur')
        ->select('bookings.*','vehicles.photo','vehicles.vehicle_number','users.name')
        ->get();

        return $bookings;
    }*/

    protected $fpdf;

    public function __construct()
    {
        $this->fpdf = new Fpdf;
    }

    public function index($id)
    {
        $bookings = DB::table('bookings')
        ->where('bookings.id','=',$id)
        ->where('bookings.place','=','2')
        ->join('vehicle_type','bookings.vehicle','=','vehicle_type.id')
        //->join('vehicles','vehicles.id','=','bookings.vehicle_id')
        ->join('users','users.username','=','bookings.user')
        ->select('bookings.*',
            'vehicle_type.name AS type',
            //'vehicles.photo',
            //'vehicles.vehicle_number',
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

    public function memo($id)
    {
        $bookings = DB::table('bookings')
        ->where('bookings.id','=',$id)
        ->where('bookings.place','=','1')
        ->join('vehicle_type','bookings.vehicle','=','vehicle_type.id')
        ->join('users','users.username','=','bookings.user')
        ->select('bookings.*',
            'vehicle_type.name AS type',
            'users.name')
        ->get();

        $recieve_date=explode(" ", "18 เม.ย. 2556");

        foreach($bookings as $data)
        {
          $create_date=explode(" ", $data->created_at);

          $this->fpdf->AddFont('THSarabun','','THSarabun.php');
          $this->fpdf->AddFont('THSarabun','B','THSarabun Bold.php');
          $this->fpdf->AddFont('THSarabun','I','THSarabun Italic.php');
          $this->fpdf->AddFont('THSarabun','BI','THSarabun Bold Italic.php');

          $this->fpdf->AddPage('L','A5');

          $this->fpdf->SetFont('THSarabun','B',16);
          $this->fpdf->Text( 55 , 20 ,  iconv( 'UTF-8','cp874' , 'ใบขออนุญาตใช้รถส่วนกลาง คณะวิศวกรรมศาสตร์ มหาวิทยาลัยนเรศวร' ));

          //วันเดือนปี
          $this->fpdf->SetFont('THSarabun', '',16);
          $this->fpdf->Text( 100, 30 , iconv( 'UTF-8','cp874', 'วันที่') );
          $this->fpdf->Text( 108, 30, iconv( 'UTF-8', 'cp874', $recieve_date[0]));
          $this->fpdf->Line(108,31,116,31);
          $this->fpdf->Text( 117, 30, iconv( 'UTF-8','cp874', 'เดือน'));
          $this->fpdf->Text( 135, 30, iconv( 'UTF-8', 'cp874', $recieve_date[1]));
          $this->fpdf->Line(126,31,149,31);
          $this->fpdf->Text( 150, 30, iconv( 'UTF-8','cp874','พ.ศ.'));
          $this->fpdf->Text( 158, 30, iconv( 'UTF-8', 'cp874', $recieve_date[2]));
          $this->fpdf->Line(158,31,170,31);

          //topic
          $this->fpdf->Text( 30, 42, iconv( 'UTF-8','cp874', 'เรียน (ผู้มีอำนาจสั่งใช้รถ) หัวหน้าสำนักงานเลขานุการคณะวิศวกรรมศาสตร์'));

          // detail
          // ชื่อ
          $this->fpdf->Text( 46, 53, iconv( 'UTF-8', 'cp874', 'ข้าพเจ้า'));
          $this->fpdf->Text( 59, 53, iconv( 'UTF-8', 'cp874', $data->name));
          $this->fpdf->Line(58,54,110,54);

          //ตำแหน่ง
          $this->fpdf->Text(112, 53, iconv( 'UTF-8', 'cp874', 'ตำแหน่ง'));
          $this->fpdf->Text(130, 53, iconv( 'UTF-8', 'cp874', ' '));
          $this->fpdf->Line(125,54,180,54);

          //สังกัด
          $this->fpdf->Text(30, 62, iconv('UTF-8', 'cp874', 'สังกัด'));
          $this->fpdf->Text(41, 62, iconv( 'UTF-8', 'cp874', ' '));
          $this->fpdf->Line(40,63,85,63);

          //ขออนุญาต
          $this->fpdf->Text(86, 62, iconv('UTF-8', 'cp874', 'ขออนุญาตใช้รถ(สถานที่ไป)'));
          $this->fpdf->Text(131, 62, iconv( 'UTF-8', 'cp874', $data->location));
          $this->fpdf->Line(130,63,180,63);

          //เพื่อ
          $this->fpdf->Text(30, 70, iconv('UTF-8', 'cp874', 'เพื่อ'));
          $this->fpdf->Text(38,70, iconv('UTF-8', 'cp874', $data->detail));
          $this->fpdf->Line(37,71,135,71);

          //คนนั่ง
          $this->fpdf->Text(138, 70, iconv('UTF-8', 'cp874', 'มีคนนั่ง'));
          $this->fpdf->Text(155,70, iconv('UTF-8', 'cp874', $data->travelers));
          $this->fpdf->Line(151,71,164,71);
          $this->fpdf->Text(175, 70, iconv('UTF-8', 'cp874', 'คน'));

          //วันที่
          $this->fpdf->Text(30, 78, iconv('UTF-8', 'cp874', 'ในวันที่'));
          $this->fpdf->Text(44,78, iconv('UTF-8', 'cp874', $data->start_date));
          $this->fpdf->Line(43,79,70,79);

          $this->fpdf->Text(72, 78, iconv('UTF-8', 'cp874', 'เวลา'));
          $this->fpdf->Text(81, 78, iconv('UTF-8', 'cp874', $data->start_time.' น.'));
          $this->fpdf->Line(80,79,102,79);

          $this->fpdf->Text(103, 78, iconv('UTF-8', 'cp874', 'ถึงวันที่'));
          $this->fpdf->Text(117, 78, iconv('UTF-8', 'cp874', $data->end_date));
          $this->fpdf->Line(116,79,143,79);

          $this->fpdf->Text(144, 78, iconv('UTF-8', 'cp874', 'เวลา'));
          $this->fpdf->Text(153, 78, iconv('UTF-8', 'cp874', $data->end_time.' น.'));
          $this->fpdf->Line(152,79,180,79);

          //หมายเลขทะเบียน
          $this->fpdf->Text(30, 87, iconv('UTF-8', 'cp874', 'ประเภทรถที่ต้องการจอง'));
          $this->fpdf->Text(70, 87, iconv('UTF-8', 'cp874', $data->type));
          $this->fpdf->Line(69,88,180,88);

          //ผู้ขออนุญาต
          $this->fpdf->Text(141, 105, iconv('UTF-8', 'cp874', 'ผู้ขออนุญาต'));
          $this->fpdf->Text(91, 105, iconv('UTF-8', 'cp874', $data->name));
          $this->fpdf->Line(90,106,139,106);

          $this->fpdf->Text(141, 115, iconv('UTF-8', 'cp874', '(วัน เดือน ปี)'));
          $this->fpdf->Text(91, 115, iconv('UTF-8', 'cp874', $create_date[0]));
          $this->fpdf->Line(90,116,139,116);
        }

          $this->fpdf->Output();

        exit;
    }
}
