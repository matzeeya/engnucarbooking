@extends('layouts.front-end.default')
@section('title')
    Home backend
@stop
@section('css_script')
  <meta name="csrf-token" content="{{ csrf_token() }}" />
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
      @yield('listVehicle')
    </div>
</div>
@endsection

@section('footer')@endsection
@section('js_plugin')

    <!-- jQuery plugins/scripts - end -->
@endsection
