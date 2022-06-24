@extends('layouts.front-end.default')
@section('title')
    Home Backend
@stop
@section('css_script')
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-4">
        <form method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
            <img class="mb-4 rounded mx-auto d-block" src="{{URL::asset('/images/login.png')}}" alt="" height="57">
            <h1 class="h3 mb-3 text-center fw-normal">Please sign in</h1>

            <div class="form-floating{{ $errors->has('username') ? ' has-error' : '' }}">
                <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" required autofocus>
                <label for="username">Username</label>
                @if ($errors->has('username'))
                    <span class="help-block">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-floating{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" class="form-control" id="password" name="password" required>
                <label for="password">Password</label>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="checkbox mb-3 text-center">
            <label>
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} value="remember-me"> Remember me
            </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        </form>
    </div>
    </div>
</div>
@endsection

@section('footer')@endsection
@section('js_plugin')

    <!-- jQuery plugins/scripts - end -->
@endsection
