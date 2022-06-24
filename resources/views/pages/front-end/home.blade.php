@extends('layouts.front-end.default')
@section('title')
    Home frontend
@stop
@section('css_script')
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('/plugins/fullcalendar/fullcalendar.min.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('/plugins/bootstrap-select/css/bootstrap-select.css')}}" />
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
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <!--<div id="calendar"></div>-->
          <div class="panel panel-default">
            <div class="panel-heading">Home</div>
              @if(Auth::user()!=null)
                <div class="panel-body">
                  You are logged in!, Hello {{\Auth::user()->name." ".\Auth::user()->lastname." (".\Auth::user()->usr_lvl.")"}}
                </div>
              @endif
          </div>
        </div>
        <div class="col-md-8 col-md-offset-2">
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
    </div>
</div>
@endsection

@section('footer')@endsection
@section('js_plugin')

    <!-- jQuery plugins/scripts - end -->
@endsection
