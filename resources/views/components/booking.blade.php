@extends('pages.back-end.home')
@section('contents')
<table class="table table-hover">
<thead>
    <tr>
      <th scope="col" colspan="3">รายการจองใช้รถประจำเดือน</th>
    </tr>
  </thead>
  <tbody>
  @foreach($approve as $list)
    <tr>
      <td scope="row">
        <img src="{{URL::asset('/images/cars/')}}/{{$list->photo}}" width="100">
    </td>
      <td scope="row">
      <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
        <div class="d-flex gap-2 w-100 justify-content-between">
          <div>
            <h6 class="mb-0">ทะเบียน: {{$list->vehicle_number}}</h6>
            <p class="mb-0 opacity-75">คนขับรถ: {{$list->name}}</p>
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
      <td>
        <button type="button" id="view" class="btn btn-primary">ดูรายละเอียด</button>
        <button type="button" id="exportPdf" class="btn btn-success" value="{{$list->id}}">PDF</button>
      </td>
    </tr>
  @endforeach
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
      <td>
        <button type="button" id="view2" class="btn btn-primary">ดูรายละเอียด</button>
        <button type="button" id="exportPdf2" class="btn btn-success" value="{{$list->id}}">PDF</button>
      </td>
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
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#exportPdf').click(function(){
      console.log($('#exportPdf').val());
      var id = $('#exportPdf').val();
      $.ajax({
        url:"{{ url('dashboard'), '' }}" +'/pdf/'+ id,
        method:"GET",
        success:function(res)
        {
          console.log(res);
        },
        error:function(err)
        {
          console.log(err);
        }
      });
    });
  })
</script>
