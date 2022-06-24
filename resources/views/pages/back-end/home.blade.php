@extends('layouts.front-end.default')
@section('title')
    Home Backend
@stop
@section('css_script')
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
@endsection

@section('Auth')
  @if(Auth::user()!=null)
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{\Auth::user()->name." ".\Auth::user()->lastname." (".\Auth::user()->usr_lvl.")"}}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
          </div>
          @csrf
        </form>
      </li>
    </ul>
  @endif
@endsection

@section('content')
    <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <div class="panel-heading">Dashboard</div>
              <div class="panel-body">
                You are logged in!, Hello {{\Auth::user()->name." ".\Auth::user()->lastname." (".\Auth::user()->usr_lvl.")"}}
              </div>
            </div>
          </div>
      </div>
    </div>
@endsection

@section('footer')@endsection
@section('js_plugin')

    <!-- jQuery plugins/scripts - end -->
@endsection
