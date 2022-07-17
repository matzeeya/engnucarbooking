@extends('pages.back-end.home')
@section('listBooking')
<table class="table table-hover">
<thead>
    <tr>
      <th scope="col" colspan="3">รายการจองใช้รถประจำเดือน</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data as $list)
    <tr>
      <td scope="row"><img src="{{URL::asset('/images/cars/')}}/{{$list->photo}}" width="100"></td>
      <td scope="row">
      <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
        <div class="d-flex gap-2 w-100 justify-content-between">
          <div>
            <h6 class="mb-0">ทะเบียน: {{$list->vehicle_number}}</h6>
            @if($list->chauffeur !='1')
            <p class="mb-0 opacity-75">คนขับรถ: {{$list->name}}</p>
            @endif
            <p class="mb-0 opacity-75">
              วันที่ใช้รถ: {{$list->start_date}}
              เวลา: {{$list->start_date}}
              ถึงวันที่: {{$list->end_date}}
              เวลา: {{$list->end_date}}
            </p>
            <p class="mb-0 opacity-75">
              ผู้ขอใช้: {{$list->user}}
              สำหรับแผนก: {{$list->vehicle_number}}
            </p>
            <p class="mb-0 opacity-75">จองใช้รถเพื่อ: {{$list->title}}</p>
          </div>
          <small class="opacity-50 text-nowrap">
            @if($list->status =='0')
              รอตรวจสอบ
            @elseif($list->status =='1')
              อนุมัติ
            @elseif($list->status =='2')
              ไม่อนุมัติ
            @elseif($list->status =='3')
              ยกเลิกโดยผู้จอง
            @else
              ยกเลิกโดยผู้ดูแลระบบ
            @endif
          </small>
        </div>
      </a>
      </td>
      <td>รายละเอียด</td>
    </tr>
  @endforeach
  </tbody>
  <tfoot>
    <tr>
      <td colspan="3">Page 1</td>
    </tr>
  </tfoot>
</table>
@endsection