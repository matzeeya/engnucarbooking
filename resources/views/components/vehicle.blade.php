@extends('pages.back-end.vehicle')
@section('listVehicle')
<div class="input-group mb-3">
  <label class="input-group-text">ค้นหาข้อมูล</label>
  <input type="text" class="form-control" placeholder="ค้นหาจากทะเบียนรถ">
  <button class="btn btn-outline-secondary" type="button" id="btnSearch">ตกลง</button>
</div>
<div class="input-group mb-3">
  <button class="btn btn-outline-secondary" 
    type="button" 
    id="btnAdd">
    เพิ่ม
  </button>
  <label class="input-group-text">ข้อมูลรถ</label>
</div>
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

<!-- Modal Add Data -->
<div class="modal fade" id="modalAdd" data-bs-backdrop="static" 
  data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" 
    aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลรถ</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- form control -->
        <form>
          <div class="mb-3">
            <div class="row">
              <div class="col">
                <label for="vehicle_number" class="col-form-label">ทะเบียน:</label>
                <input type="text" class="form-control" id="vehicle_number">
              </div>
              <div class="col">
                <label for="province" class="col-form-label">จังหวัด:</label>
                <select class="form-select" id="province">
                  <option selected>กรุณาเลือกจังหวัด</option>
                </select>
              </div>
              <div class="col">
                <label for="status" class="col-form-label">สถานะ:</label>
                <select class="form-select" id="status">
                  <option>กรุณาเลือกสถานะการใช้งาน</option>
                  <option value="1" selected>ปกติ</option>
                  <option value="2">แจ้งซ่อม</option>
                  <option value="2">จำหน่าย</option>
                </select>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <div class="row">
              <div class="col">
                <label for="vehicle_type" class="col-form-label">ประเภทของรถ:</label>
                <select class="form-select" id="vehicle_type">
                  <option selected>กรุณาเลือกประเภทรถ</option>
                </select>
              </div>
              <div class="col">
                <label for="brand" class="col-form-label">ยี่ห้อ:</label>
                <select class="form-select" id="brand">
                  <option selected>กรุณาเลือกยี่ห้อรถ</option>
                </select>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <div class="row">
              <div class="col">
                <label for="model" class="col-form-label">โมเดล/รุ่น:</label>
                <input type="text" class="form-control" id="model">
              </div>
              <div class="col">
                <label for="color" class="col-form-label">สี:</label>
                <input type="text" class="form-control" id="color">
              </div>
              <div class="col">
                <label for="fuel" class="col-form-label">เชื้อเพลิง:</label>
                <select class="form-select" id="fuel">
                  <option selected>กรุณาเลือกน้ำมันที่ใช้</option>
                  <option value="1">แก๊สโซฮอล์</option>
                  <option value="2">เบนซิน</option>
                  <option value="3">ดีเซล</option>
                  <option value="4">แก๊ส NGV</option>
                  <option value="5">แก๊ส LPG</option>
                </select>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <div class="row">
              <div class="col">
                <label for="serial_number" class="col-form-label">หมายเลขเครื่อง:</label>
                <input type="text" class="form-control" id="serial_number">
              </div>
              <div class="col">
                <label for="serial_body" class="col-form-label">หมายเลขตัวถัง:</label>
                <input type="text" class="form-control" id="serial_body">
              </div>
              <div class="col">
                <label for="price" class="col-form-label">ราคา:</label>
                <input type="text" class="form-control" id="price">
              </div>
              <div class="col">
                <label for="seat" class="col-form-label">จำนวนที่นั่ง:</label>
                <input type="text" class="form-control" id="seat">
              </div>
            </div>
          </div>
          <div class="mb-3">
            <div class="row">
              <div class="col">
                <label for="date_buy" class="col-form-label">วันที่ซื้อ:</label>
                <input type="date" class="form-control" id="date_buy">
              </div>
              <div class="col">
                <label for="date_input" class="col-form-label">วันที่รับเข้า:</label>
                <input type="date" class="form-control" id="date_input">
              </div>
              <div class="col">
                <label for="date_register" class="col-form-label">วันที่จดทะเบียน:</label>
                <input type="date" class="form-control" id="date_register">
              </div>
              <div class="col">
                <label for="expire_register" class="col-form-label">ทะเบียนหมดอายุ:</label>
                <input type="date" class="form-control" id="expire_register">
              </div>
            </div>
          </div>
          <div class="mb-3">
            <div class="row">
              <div class="col">
                <label for="responsible_man" class="col-form-label">ผู้รับผิดชอบ:</label>
                <select class="form-select" id="responsible_man">
                  <option selected>กรุณาเลือกผู้รับผิดชอบ</option>
                </select>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <div class="row">
              <div class="col">
                <div class="input-group">
                  <input type="file" accept="image/*" class="form-control" id="uploadfile" aria-describedby="inputGroupFileAddon04" aria-label="Upload" >
                  <!--<button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">Button</button>-->
                </div>
              </div>
            </div>
          </div>
        </form>
        <!-- End form control -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="saveBtn">เพิ่มข้อมูล</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal -->

<script>
  $(document).ready(function() {
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#btnAdd').click(function(){
      $('#modalAdd').modal('toggle');
    });
    //get vehicle type
    $.ajax({
      url:"{{ url('dashboard'), '' }}" +'/type/',
      method:"GET",
      success:function(res)
      {
        res.forEach(doc=>{
          $('#vehicle_type').append('<option value="'+doc.id+'">'+doc.name+'</option>');
          //console.log(doc.name);
        })
      },
      error:function(err)
      {
        console.log(err);
      }
    });
    //get brand
    $.ajax({
      url:"{{ url('dashboard'), '' }}" +'/brand/',
      method:"GET",
      success:function(res)
      {
        res.forEach(doc=>{
          $('#brand').append('<option value="'+doc.id+'">'+doc.name+'</option>');
          //console.log(doc.name);
        })
      },
      error:function(err)
      {
        console.log(err);
      }
    });
      //get driver
    $.ajax({
      url:"{{ url('dashboard'), '' }}" +'/driver/',
      method:"GET",
      success:function(res)
      {
        res.forEach(doc=>{
          $('#responsible_man').append('<option value="'+doc.id+'">'+doc.name+'</option>');
          //console.log(doc.name);
        })
      },
      error:function(err)
      {
        console.log(err);
      }
    });
    //get province
    $.ajax({
      url:"{{ url('dashboard'), '' }}" +'/province/',
      method:"GET",
      success:function(res)
      {
        res.forEach(doc=>{
          $('#province').append('<option value="'+doc.id+'">'+doc.name+'</option>');
          //console.log(doc.name);
        })
      },
      error:function(err)
      {
        console.log(err);
      }
    });

    $('#saveBtn').click(function() {
        var vehicle_number = $('#vehicle_number').val();
        var vehicle_province = $('#province').val();
        var status = $('#status').val();
        var vehicle_type = $('#vehicle_type').val();
        var brand_id = $('#brand').val();
        var model = $('#model').val();
        var color = $('#color').val();
        var fuel = $('#fuel').val();
        var serial_number = $('#serial_number').val();
        var serial_body = $('#serial_body').val();
        var price = $('#price').val();
        var seat = $('#seat').val();
        var date_buy = $('#date_buy').val();
        var date_input = $('#date_input').val();
        var date_register = $('#date_register').val();
        var expire_register = $('#expire_register').val();
        var responsible_man = $('#responsible_man').val();
        var photo = $('#uploadfile').val();

          $.ajax({
            url:"{{ route('dashboard.addCar') }}",
            type:"POST",
            dataType:'json',
            data:{
              vehicle_number,
              vehicle_province,
              status,
              vehicle_type,
              brand_id ,
              model,
              color,
              fuel,
              serial_number,
              serial_body,
              price,
              seat,
              date_buy,
              date_input,
              date_register,
              expire_register,
              responsible_man,
              photo
            },
            success:function(res)
            {
              console.log(res);
              $('#modalAdd').modal('hide')
            },
            error:function(err)
            {
              console.log(err);
            },
          });
        })
  });
</script>
@endsection