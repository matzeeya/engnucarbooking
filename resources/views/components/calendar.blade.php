@extends('pages.back-end.home')
@section('contents')
<!--Modal -->
<div class="modal fade" id="bookingModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">รายละเอียดการจอง</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- form control -->
        <form>
          <div class="mb-3" id="userRequest">
            <label for="username" class="col-form-label">ผู้จอง:</label>
            <input type="text" class="form-control" id="username" value="{{\Auth::user()->username}}" disabled>
          </div>
          <div class="mb-3">
            <div class="row">
              <div class="col">
                <label for="booking_number" class="col-form-label">รหัสการจอง:</label>
                <input type="text" class="form-control" id="booking_number" disabled>
                <span id="bookingNumberError" class="text-danger"></span>
              </div>
              <div class="col">
                <label for="numbers" class="col-form-label">เลขที่ อว:</label>
                <input type="text" class="form-control" id="numbers">
                <span id="NumbersError" class="text-danger"></span>
              </div>
              <div class="col">
                <label for="phone" class="col-form-label">เบอร์ภายใน:</label>
                <input type="text" class="form-control" id="phone">
                <span id="phoneError" class="text-danger"></span>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <label for="detail" class="col-form-label">เนื้อหา:</label>
            <textarea class="form-control" id="detail" placeholder="เนื่องด้วย ภาควิชา..." style="Height:200px;"></textarea>
            <span id="detailError" class="text-danger"></span>
          </div>
          <div class="mb-3">
            <label for="title" class="col-form-label">เหตุผลที่ขอใช้:</label>
            <input type="text" class="form-control" id="title">
            <span id="titleError" class="text-danger"></span>
          </div>
          <div class="mb-3">
            <div class="row">
              <div class="col">
                <label for="start_date" class="col-form-label">วันที่ใช้รถ:</label>
                <input type="date" class="form-control" id="start_date">
                <span id="startDateError" class="text-danger"></span>
              </div>
              <div class="col">
                <label for="start_time" class="col-form-label">เวลา:</label>
                <input type="time" class="form-control" id="start_time">
                <span id="startTimeError" class="text-danger"></span>
              </div>
              <div class="col">
                <label for="end_date" class="col-form-label">ถึงวันที่:</label>
                <input type="date" class="form-control" id="end_date">
                <span id="endDateError" class="text-danger"></span>
              </div>
              <div class="col">
                <label for="end_time" class="col-form-label">เวลา:</label>
                <input type="time" class="form-control" id="end_time">
                <span id="endTimeError" class="text-danger"></span>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <div class="row">
              <div class="col">
                <label for="vehicle" class="col-form-label">ประเภทของรถ:</label>
                <select class="form-select" id="vehicle" aria-label="Default select example">
                  <option selected>กรุณาเลือกประเภทรถที่ต้องการจอง</option>
                </select>
              </div>
              <div class="col">
                <label for="travelers" class="col-form-label">จำนวนผู้โดยสาร:</label>
                <input type="text" class="form-control" id="travelers">
              </div>
            </div>
          </div>
          <div class="mb-3">
            <div class="row">
              <div class="col">
                <label for="place" class="col-form-label">ขอบเขตการใช้งาน:</label>
                <select class="form-select" id="place" aria-label="Default select example">
                  <option selected>กรุณาเลือกขอบเขตการใช้งาน</option>
                  <option value="1">ภายในมหาลัยและอำเภอเมือง</option>
                  <option value="2">ภายนอกมหาลัย(ยกเว้นอำเภอเมือง)</option>
                </select>
              </div>
              <div class="col">
                <label for="location" class="col-form-label">สถานที่ปลายทาง (ระบุสถานที่):</label>
                <input type="text" class="form-control" id="location">
              </div>
            </div>
          </div>
          <div class="mb-3">
            <div class="row">
              <div class="col-2">
                การจองใช้งาน:
            </div>
              <div class="col-3">
                <div class="form-check is-left">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="useto2" checked>
                  <label class="form-check-label" for="useto2">
                    จองใช้งานเอง
                  </label>
                </div>
              </div>
              <div class="col-7">
                <div class="form-check is-left">
                  <input class="form-check-input" type="radio" name="flexRadioDefault" id="useto1">
                  <label class="form-check-label" for="useto1">
                    จองให้ผู้อื่น
                  </label>
                </div>
              </div>
            </div>
          </div>
          <!-- admin -->
          @if(Auth::user()->usr_lvl=="admin")
          <div class="mb-3" id="divAdmin">
            <div class="row">
              <div class="col">
                <label for="vehicle_id" class="col-form-label">ระบุรถ:</label>
                <select class="form-select" id="vehicle_id" aria-label="Default select example">
                  <option selected>กรุณาเลือกรถที่ใช้งาน</option>
                </select>
              </div>
              <div class="col">
                <label for="chauffeur" class="col-form-label">ระบุคนขับ:</label>
                <select class="form-select" id="chauffeur" aria-label="Default select example">
                  <option selected>กรุณาเลือกเลือกคนขับ</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <label for="status" class="col-form-label">สถานะการจอง:</label>
                <select class="form-select" id="status" aria-label="Default select example">
                  <option selected>กรุณาเลือกสถานะการจอง</option>
                  <option value="0">รอตรวจสอบ</option>
                  <option value="1">อนุมัติ</option>
                  <option value="2">ไม่อนุมัติ</option>
                  <option value="3">ยกเลิกโดยผู้จอง</option>
                  <option value="4">ยกเลิกโดยผู้ดูแลระบบ</option>
                </select>
              </div>
              <div class="col">
                <label for="reason" class="col-form-label">ระบุเหตุผล:</label>
                <input type="text" class="form-control" id="reason" disabled>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <input type="hidden" class="form-control" id="approver" value="{{\Auth::user()->username}}" disabled>
            <input type="hidden" class="form-control" id="datenow" disabled>
          </div>
          @endif
        </form>
        <!-- End form control -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
          <button type="button" id="approveBtn" class="btn btn-primary">ยืนยัน</button>
          <button type="button" id="saveBtn" class="btn btn-primary">บันทึก</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal -->

<!-- fullcalendar -->
<div class="col-md-11 col-md-offset-2">
  <div class="my-3 p-3 bg-body rounded shadow-sm">
    <img class="me-3" src="{{URL::asset('/images/calendar.png')}}" alt="" height="48">
    <div class="lh-1">
      <h1 class="h6 mb-0 lh-1">ปฏิทินการใช้รถ</h1>
      <small>Since {{date('Y-m-d H:i:s');}}</small>
    </div>
    <hr>
    <div class="d-flex text-muted pt-3">
      <div id="calendar"></div>
    </div>
  </div>
</div>
<!-- End fullcalendar -->

<script>
  $(document).ready(function() {
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#userRequest').hide();
    function clearData(){
        $('#booking_number').val('');
        $('#phone').val('');
        $('#title').val('');
        $('#detail').val('');
        $('#travelers').val('');
        $('#location').val('');
        $('#start_time').val('');
        $('#end_time').val('');
        $('#vehicle').prop('selectedIndex', 0);
        $('#place').prop('selectedIndex', 0);
        $('#chauffeur').prop('selectedIndex', 0);
        $('#vehicle_id').prop('selectedIndex', 0);
        $('#status').prop('selectedIndex', 0);
    }
    //get booking_number
    var getId = '';
    $.ajax({
    url:"{{ url('dashboard'), '' }}" +'/get',
    method:"GET",
    success:function(res)
      {
        var year = parseInt(new Date().getFullYear())+543;
        if(res.length>0){
          var id = parseInt(res[0].booking_number.substring(4, 7));
          if(id == 0){
            getId = 'ENGV001' + year;
          }else if(id>=1 && id<9){
            getId = 'ENGV00'+(id+1) + year;
          }else if(id>=9 && id<99){
            getId = 'ENGV0'+(id+1) + year;
          }else if(id>=99 && id<366){
            getId = 'ENGV'+(id+1) + year;
          }else{
            getId = 'ENGV000' + year;
          } 
        }else{
          getId = 'ENGV001' + year;
        }
        //console.log('booking ',getId);
      },
      error:function(err)
      {
        console.log(err);
      }
    });
    var booking = @json($events);
    $('#calendar').fullCalendar({
      header: {
        left: 'prev, next today',
        center: 'title',
        right: 'month, agendaWeek, agendaDay',
      },
      events: booking,
      selectable: true,
      selectHelper: true,
      select: function(start, end, allDays) {
        //console.log(getId);
        $('#bookingModal').modal('toggle');
        clearData();
        $('#booking_number').val(getId);
        $('#divAdmin').hide();
        $('#approveBtn').hide();
        $('#saveBtn').show();
        $('#start_date').val(moment(start).format('YYYY-MM-DD'));
        $('#end_date').val(moment(end).subtract(1, 'days').format('YYYY-MM-DD'));
        /*$('#start_time').val(moment().format('h:mm:ss a'));
        $('#end_time').val(moment().format('h:mm:ss a'));*/
        $('#saveBtn').click(function() {
          var booking_number = $('#booking_number').val();
          var numbers = $('#numbers').val();
          var username = $('#username').val();
          var title = $('#title').val();
          var start_date = $('#start_date').val();
          var start_time = $('#start_time').val();
          var end_date = moment(end).format('YYYY-MM-DD');
          var end_time = $('#end_time').val();
          var detail = $('#detail').val();
          var vehicle = $('#vehicle').val();
          var travelers = $('#travelers').val();
          var place = $('#place').val();
          var location = $('#location').val();
          var phone = $('#phone').val();

          $.ajax({
            url:"{{ route('dashboard.store') }}",
            type:"POST",
            dataType:'json',
            data:{
              booking_number,
              numbers,
              username,
              title,
              start_date,
              start_time,
              end_date,
              end_time,
              detail,
              vehicle,
              travelers,
              place,
              location,
              phone
            },
            success:function(response)
            {
              console.log(response);
              $('#bookingModal').modal('hide')
              $('#calendar').fullCalendar('renderEvent', response);
              //clearData();
            },
            error:function(error)
            {
              if(error.responseJSON.errors) {
                $('#titleError').html(error.responseJSON.errors.title);
              }
            },
          });
        })
      },
      eventClick: function(event){
        var id = event.id;
        console.log(id);
        $('#divAdmin').show();
        $.ajax({
          url:"{{ url('dashboard'), '' }}" +'/view/'+ id,
          method:"GET",
          success:function(response)
          {
            console.log(response);
            var approved_date = moment().format('YYYY-MM-DD');
            //var start = response.start_date.split(" ");
            //var end = response.end_date.split(" ");
            $('#bookingModal').modal('show');
            $('#saveBtn').hide();
            $('#approveBtn').show();
            $('#booking_number').val(response.booking_number); //.prop('disabled', true)
            $('#numbers').val(response.numbers); //.prop('disabled', true)
            $('#username').val(response.user);//.prop("type", "text")
            $('#title').val(response.title);
            $('#start_date').val(response.start_date);
            $('#end_date').val(response.end_date);
            $('#start_time').val(response.start_time);
            $('#end_time').val(response.end_time);
            $('#detail').val(response.detail);
            $('#vehicle').val(response.vehicle).change();//.hide() /.show()
            $('#travelers').val(response.travelers);
            $('#place').val(response.place).change();
            $('#location').val(response.location);
            $('#phone').val(response.phone);
            $('#datenow').val(approved_date);

            $('#approveBtn').click(function() {
              var chauffeur = $('#chauffeur').val();
              var vehicle_id = $('#vehicle_id').val();
              var status = $('#status').val();
              var reason = $('#reason').val();
              var approver = $('#approver').val();

              $.ajax({
                url:"{{ route('dashboard.edit', '') }}" +'/'+ id,
                type:"POST",
                dataType:'json',
                data:{
                  chauffeur,
                  vehicle_id,
                  status,
                  reason,
                  approver,
                  approved_date
                },
                success:function(response)
                {
                  console.log("edit: "+response);
                  $('#bookingModal').modal('hide')
                  swal("Good job!", "Event Updated!", "success");
                  $('#calendar').fullCalendar( 'refetchEvents');
                  $('#calendar').fullCalendar( 'renderEvent', response);
                  clearData();
                },
                error:function(error)
                {
                  console.log(error);
                },
              });
            })
          },
          error:function(error)
          {
            console.log(error);
          },
        });
      }
    });
    $("#bookingModal").on("hidden.bs.modal", function () {
      $('#saveBtn').unbind();
    });

    /*$('#location').select(function() {
        console.log("hi");
    });*/

    //get vehicle type
    $.ajax({
      url:"{{ url('dashboard'), '' }}" +'/type/',
      method:"GET",
      success:function(res)
      {
        res.forEach(doc=>{
          $('#vehicle').append('<option value="'+doc.id+'">'+doc.name+'</option>');
          //console.log(doc.name);
        })
      },
      error:function(err)
      {
        console.log(err);
      }
    });
    //get vehicle
    $.ajax({
      url:"{{ url('dashboard'), '' }}" +'/car/',
      method:"GET",
      success:function(res)
      {
        res.forEach(doc=>{
          $('#vehicle_id').append('<option value="'+doc.id+'">'+doc.vehicle_number+'</option>');
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
          $('#chauffeur').append('<option value="'+doc.id+'">'+doc.name+'</option>');
        })
      },
      error:function(err)
      {
        console.log(err);
      }
    });
  });
</script>
@endsection
