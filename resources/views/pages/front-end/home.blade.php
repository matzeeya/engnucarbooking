@extends('layouts.front-end.default')
@section('title')
    Home frontend
@stop
@section('css_script')
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection

@section('content')
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
    $('#calendar').fullCalendar({
      header: {
        left: 'prev, next today',
        center: 'title',
        right: 'month, agendaWeek, agendaDay',
      },
      selectable: true,
      selectHelper: true,
      select: function(start, end, allDays) {

      }
    });
  });
</script>
@endsection

@section('footer')@endsection
@section('js_plugin')

    <!-- jQuery plugins/scripts - end -->
@endsection
