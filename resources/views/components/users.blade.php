@extends('pages.back-end.home')
@section('contents')
<div class="input-group mb-3">
  <label class="input-group-text">ค้นหาข้อมูล</label>
  <input type="text" class="form-control" placeholder="ค้นหาจากชื่อ">
  <button class="btn btn-outline-secondary" type="button" id="btnSearch">ตกลง</button>
</div>
<table class="table table-hover">
<thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">ชื่อ-นามสกุล</th>
      <th scope="col">อีเมล</th>
      <th scope="col">เบอร์โทร</th>
      <th scope="col">แก้ไขข้อมูล</th>
      <th scope="col">รายละเอียดเพิ่มเติม</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data as $list)
    <tr>
      <td scope="row">{{$list->id}}</td>
      <td scope="row">{{$list->name}}</td>
      <td scope="row">{{$list->email}}</td>
      <td scope="row">{{$list->phone}}</td>
      <td scope="row"><a herf="#">แก้ไข</a></td>
      <td scope="row">รายละเอียด</td>
    </tr>
  @endforeach
  </tbody>
</table>

<script>
  $(document).ready(function() {
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  });
</script>
@endsection
