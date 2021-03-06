@extends('pages.back-end.home')
@section('contents')
<table class="table table-hover">
<thead>
    <tr>
      <th scope="col" colspan="3">รายการจองของฉัน</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data as $list)
    @if($list->status != 1)
    <tr>
      <td scope="row">
        @if($list->vehicle == 1)
        <img src="{{URL::asset('/images/cars/van_default.jpg')}}" width="100">
        @else
        <img src="{{URL::asset('/images/cars/car_default.jpg')}}" width="100">
        @endif
    </td>
      <td scope="row">
      <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
        <div class="d-flex gap-2 w-100 justify-content-between">
          <div>
            <h6 class="mb-0">ประเภทรถที่ต้องการ: {{$list->name}} </h6>
            <p class="mb-0 opacity-75">
              วันที่ใช้รถ: {{$list->start_date}}
              เวลา: {{$list->start_time}}
              ถึงวันที่: {{$list->end_date}}
              เวลา: {{$list->end_time}}
            </p>
            <p class="mb-0 opacity-75">
              ผู้ขอใช้: {{$list->user}}
              สำหรับแผนก: {{$list->faculty}}
            </p>
            <p class="mb-0 opacity-75">จองใช้รถเพื่อ: {{$list->detail}}</p>
          </div>
          <small class="opacity-50 text-nowrap">
            @if($list->status == 0)
              รอตรวจสอบ
            @elseif($list->status == 1)
              อนุมัติ
            @elseif($list->status == 2)
              ไม่อนุมัติ
            @elseif($list->status == 3)
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
    @endif
  @endforeach
  </tbody>
  <tfoot>
    <tr>
      <td colspan="3">Page 1</td>
    </tr>
  </tfoot>
</table>
@endsection
