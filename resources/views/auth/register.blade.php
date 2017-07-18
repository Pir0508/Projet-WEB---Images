@extends('layout.app')

@section('style')
  #passwd {
      position: relative;
  }

  #passwd input[type="password"] {
      padding-right: 30px;
  }

  #passwd .glyphicon {
      right: 30px;
      position: absolute;
      top: 10px;
  }

  #repasswd {
      position: relative;
  }

  #repasswd input[type="password"] {
      padding-right: 30px;
  }

  #repasswd .glyphicon {
      right: 30px;
      position: absolute;
      top: 10px;
  }
@endsection


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ __('message.signin') }}</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">{{ __('message.name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">{{ __('message.email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}" id="passwd">
                            <label for="password" class="col-md-4 control-label">{{ __('message.password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>
                                <span onmouseover="showPassword('password');" onmouseout="hidePassword('password');" class="glyphicon glyphicon-eye-open"></span>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group" id="repasswd">
                            <label for="password-confirm" class="col-md-4 control-label">{{ __('message.repassword') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                <span onmouseover="showPassword('password-confirm');" onmouseout="hidePassword('password-confirm');" class="glyphicon glyphicon-eye-open"></span>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('message.signin') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

<script type="text/javascript">
  function showPassword(id){
    var input = document.querySelector('#'+id).type = "text";
  }

  function hidePassword(id){
    var input = document.querySelector('#'+id).type = "password";
  }
</script>

@endsection
