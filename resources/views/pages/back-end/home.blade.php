@extends('layouts.front-end.default')
@section('title')
    Home backend
@stop
@section('css_script')
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection

@section('Auth')
  @if(Auth::user()!=null)
    <form id="logout-form" action="{{ route('logout') }}" method="POST">
      <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        {{\Auth::user()->name." ".\Auth::user()->lastname." (".\Auth::user()->usr_lvl.")"}}
        <img src="{{URL::asset('/images/user.png')}}" alt="mdo" width="32" height="32" class="rounded-circle">
      </a>
      <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a></li>
      </ul>
      @csrf
    </form>
  @endif
@endsection

@section('content')
<!--Modal -->
<div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">รายละเอียดการจอง</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- form control -->
        <form>
          <div class="mb-3">
            <div class="row">
              <div class="col">
                <input type="hidden" class="form-control" id="username" value="{{\Auth::user()->username}}">
                <label for="booking_number" class="col-form-label">Booking Number:</label>
                <input type="text" class="form-control" id="booking_number" required>
                <span id="bookingNumberError" class="text-danger"></span>
              </div>
              <div class="col">
                <label for="phone" class="col-form-label">เบอร์ภายใน:</label>
                <input type="text" class="form-control" id="phone">
                <span id="phoneError" class="text-danger"></span>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <label for="title" class="col-form-label">หัวข้อ:</label>
            <input type="text" class="form-control" id="title">
            <span id="titleError" class="text-danger"></span>
          </div>
          <div class="mb-3">
            <label for="detail" class="col-form-label">รายละเอียด:</label>
            <textarea class="form-control" id="detail"></textarea>
            <span id="detailError" class="text-danger"></span>
          </div>
          <div class="mb-3">
            <div class="row">
              <div class="col">
                <label for="start_date" class="col-form-label">start:</label>
                <input type="text" class="form-control" id="start_date" disabled>
                <span id="startDateError" class="text-danger"></span>
              </div>
              <div class="col">
                <label for="start_time" class="col-form-label">time:</label>
                <input type="text" class="form-control" id="start_time">
                <span id="startTimeError" class="text-danger"></span>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <div class="row">
              <div class="col">
                <label for="end_date" class="col-form-label">end:</label>
                <input type="text" class="form-control" id="end_date" disabled>
                <span id="endDateError" class="text-danger"></span>
              </div>
              <div class="col">
                <label for="end_time" class="col-form-label">time:</label>
                <input type="text" class="form-control" id="end_time">
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
                  <option value="1">รถตู้</option>
                  <option value="2">รถกระบะ</option>
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
                  <option value="1">ภายในมหาวิทยาลัย</option>
                  <option value="2">ภายนอกมหาวิทยาลัย</option>
                  <option value="3">ภายในจังหวัด</option>
                  <option value="4">ภายนอกจังหวัด</option>
                </select>
              </div>
              <div class="col">
                <label for="location" class="col-form-label">สถานที่ปลายทาง:</label>
                <input type="text" class="form-control" id="location">
              </div>
            </div>
          </div>
          <div class="mb-3">
            <div class="row">
              <div class="col">
                เพิ่มเติม:
              </div>
              <div class="col">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="option1">
                  <label class="form-check-label" for="option1">
                    น้ำมันเต็มถัง
                  </label>
                </div>
              </div>
              <div class="col">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="option2">
                  <label class="form-check-label" for="option2">
                    เครื่องเสียง
                  </label>
                </div>
              </div>
              <div class="col">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="useto1">
                  <label class="form-check-label" for="useto1">
                    จองให้ผู้อื่น
                  </label>
                </div>
              </div>
              <div class="col">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="useto2">
                  <label class="form-check-label" for="useto2">
                    จองใช้งานเอง
                  </label>
                </div>
              </div>
            </div>
          </div>
        </form>
        <!-- End form control -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="saveBtn" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal -->
<div class="container">
    <div class="row">
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
      <!-- table booking list -->
        @include('layout.booking')
      <!-- End table booking list -->
    </div>
</div>

<script>
  $(document).ready(function() {
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
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
        $('#bookingModal').modal('toggle');
        $('#start_date').val(moment(start).format('YYYY-MM-DD'));
        $('#end_date').val(moment(end).subtract(1, 'days').format('YYYY-MM-DD'));
        /*$('#start_time').val(moment().format('h:mm:ss a'));
        $('#end_time').val(moment().format('h:mm:ss a'));*/
        $('#saveBtn').click(function() {
          var booking_number = $('#booking_number').val();
          var username = $('#username').val();
          var title = $('#title').val();
          var start_date = $('#start_date').val();
          var end_date = moment(end).format('YYYY-MM-DD');
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
              username, 
              title, 
              start_date, 
              end_date, 
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
              $('#calendar').fullCalendar('renderEvent', {
                'title': response.title,
                'start' : response.start,
                'end'  : response.end
              });
              $('#booking_number').val('');
              $('#title').val('');
              $('#detail').val('');
              $('#travelers').val('');
              $('#location').val('');
            },
            error:function(error)
            {
              if(error.responseJSON.errors) {
                $('#titleError').html(error.responseJSON.errors.title);
              }
            },
          });
        })
      }
    });
    $("#bookingModal").on("hidden.bs.modal", function () {
      $('#saveBtn').unbind();
    });
  });
</script>
@endsection

@section('footer')@endsection
@section('js_plugin')

    <!-- jQuery plugins/scripts - end -->
@endsection
