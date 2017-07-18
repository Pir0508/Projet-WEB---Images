@extends('layout.app')

@section('style')
  #passwd {
      position: relative;
  }

  #passwd input[type="password"] {
      padding-right: 30px;
  }

  #passwd .glyphicon {
      right: 10px;
      position: absolute;
      top: 35px;
  }
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-top:5em;">
            <form action="{{ route('user.update', $user) }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="put">
                <div class="form-group">
                    <label for="name">{{ __('message.name') }}</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                </div>
                <div class="form-group">
                    <label for="email">{{ __('message.email') }}</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                </div>
                <div class="form-group" id="passwd">
                    <label for="password">{{ __('message.password') }}</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                    <span onmouseover="showPassword();" onmouseout="hidePassword();" class="glyphicon glyphicon-eye-open"></span>
                </div>
                <button type="submit" class="btn btn-default">{{ __('message.update') }}</button>
            </form>

            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                <button type="button" class="btn btn-danger">{{ __('message.disconnect') }}</button>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection

@section('script')

<script type="text/javascript">
  function showPassword(){
    var input = document.querySelector('#password').type = "text";
  }

  function hidePassword(){
    var input = document.querySelector('#password').type = "password";
  }
</script>

@endsection
