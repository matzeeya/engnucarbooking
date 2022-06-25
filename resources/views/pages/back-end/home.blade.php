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
        <h5 class="modal-title" id="exampleModalLabel">Booking Title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- form control -->
        <form>
          <div class="mb-3">
            <label for="title" class="col-form-label">title:</label>
            <input type="text" class="form-control" id="title">
            <span id="titleError" class="text-danger"></span>
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
            <label for="detail" class="col-form-label">detail:</label>
            <textarea class="form-control" id="detail"></textarea>
            <span id="detailError" class="text-danger"></span>
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
      <!-- table car list -->
      <div class="col-md-11 col-md-offset-2">
        <div class="list-group w-auto">
          <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
            <img src="https://github.com/twbs.png" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">
            <div class="d-flex gap-2 w-100 justify-content-between">
              <div>
                <h6 class="mb-0">List group item heading</h6>
                <p class="mb-0 opacity-75">Some placeholder content in a paragraph.</p>
              </div>
              <small class="opacity-50 text-nowrap">now</small>
            </div>
          </a>
          <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
            <img src="https://github.com/twbs.png" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">
            <div class="d-flex gap-2 w-100 justify-content-between">
              <div>
                <h6 class="mb-0">Another title here</h6>
                <p class="mb-0 opacity-75">Some placeholder content in a paragraph that goes a little longer so it wraps to a new line.</p>
              </div>
              <small class="opacity-50 text-nowrap">3d</small>
            </div>
          </a>
          <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
            <img src="https://github.com/twbs.png" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">
            <div class="d-flex gap-2 w-100 justify-content-between">
              <div>
                <h6 class="mb-0">Third heading</h6>
                <p class="mb-0 opacity-75">Some placeholder content in a paragraph.</p>
              </div>
              <small class="opacity-50 text-nowrap">1w</small>
            </div>
          </a>
        </div>
      </div>
      <!-- End table car list -->
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
          var title = $('#title').val();
          var start_date = $('#start_date').val();
          var end_date = moment(end).format('YYYY-MM-DD');

          $.ajax({
            url:"{{ route('dashboard.store') }}",
            type:"POST",
            dataType:'json',
            data:{ title, start_date, end_date  },
            success:function(response)
            {
              console.log(response);
              $('#bookingModal').modal('hide')
              $('#calendar').fullCalendar('renderEvent', {
                'title': response.title,
                'start' : response.start,
                'end'  : response.end
              });
              $('#title').val('');
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
  });
</script>
@endsection

@section('footer')@endsection
@section('js_plugin')

    <!-- jQuery plugins/scripts - end -->
@endsection
