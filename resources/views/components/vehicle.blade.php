@extends('pages.back-end.vehicle')
@section('listVehicle')
<table class="table table-hover">
<thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">ประเภทรถ</th>
      <th scope="col">ทะเบียน</th>
      <th scope="col">ยี่ห้อ</th>
      <th scope="col">สถานะ</th>
      <th scope="col">รายละเอียดเพิ่มเติม</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data as $list)
    <tr>
      <td scope="row">{{$list->id}}</td>
      <td scope="row">{{$list->type}}</td>
      <td scope="row">{{$list->vehicle_number}}</td>
      <td scope="row">{{$list->brand}}</td>
      <td scope="row">
      @if($list->status =='1')
        ปกติ
      @elseif($list->status =='2')
        แจ้งซ่อม
      @else
        จำหน่าย
      @endif
      </td>
      <td scope="row">รายละเอียด</td>
    </tr>
  @endforeach
  </tbody>
</table>
@endsection



