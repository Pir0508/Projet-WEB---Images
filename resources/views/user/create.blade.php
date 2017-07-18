@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2"  style="margin-top:5em;">
            <form action="{{ route('user.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">{{ __('message.name') }}</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">{{ __('message.email') }}</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">{{ __('message.password') }}</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-default">{{ __('message.save') }}</button>
            </form>
        </div>
    </div>
@endsection
