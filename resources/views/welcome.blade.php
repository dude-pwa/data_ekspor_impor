@extends('app')

@section('content')
{{-- <style>
    body{
        background: url('/src/images/bg.jpg') no-repeat;
        background-size: cover;
    }
</style> --}}
<div class="container">
    <div class="row">
        @if (Auth::guest())
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default panel-transparent">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <table border="0">
                        <tr>
                        <td rowspan="2"><img src="{{URL::to('/src/images/logo mini.png')}}" alt="" class="" width="160" height="160"></td>
                        <td width="600" align="left" valign="center">
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-3 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        </td>
                        </tr>

                        <tr>
                        <td>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-3 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-7 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Klik disini jika lupa password</a>
                            </div>
                        </div>
                        </td>
                        </tr>

                        

                        </table>
                    </form>
                </div>
            </div>
        </div>
        @else
        <div class="col-md-10 col-md-offset-4">
            <br>
            <h1><a href="/exports" class="btn btn-primary col-md-5">Daftar Komoditi Export Berdasarkan Per HS</a></h1><br>
            <h1><a href="/imports" class="btn btn-primary col-md-5">Daftar Komoditi Import Berdasarkan Per HS</a></h1><br>
            <h1><a href="/countries" class="btn btn-primary col-md-5">Daftar Negara</a></h1><br>
            <h1><a href="/harbor" class="btn btn-primary col-md-5">Daftar Pelabuhan</a></h1><br>
            <h1><a href="/items" class="btn btn-primary col-md-5">Daftar Item</a></h1><br>

            <br><br>
            <h1><a href="{{ url('/logout') }}" class="col-md-1 col-md-offset-4 btn btn-danger "><i class="fa fa-btn fa-sign-out"></i>Exit</a></h1>
        </div>
        @endif
    </div>
</div>
@endsection
