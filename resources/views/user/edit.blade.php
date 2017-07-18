@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2"  style="margin-top:5em;">
                @if(count($users) > 0)
                    <table class="table table-bordered">
                        <tr>
                            <th>#</th>
                            <th>{{ __('message.name') }}</th>
                            <th>{{ __('message.email') }}</th>
                            <th>{{ __('message.actions') }}</th>
                        </tr>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{ route('user.show', $user) }}">{{ __('message.see') }}</a></li>
                                            <li><a href="{{ route('user.edit', $user) }}">{{ __('message.modify') }}</a></li>
                                            <li>
                                                <a href="{{ route('user.destroy', $user) }}"
                                                   onclick="event.preventDefault();
                                                     document.getElementById('delete-form-{{$user->id}}').submit();">
                                                    {{ __('message.delete') }}
                                                </a>

                                                <form id="delete-form-{{$user->id}}" action="{{ route('user.destroy', $user) }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="DELETE">
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @else
                    <p>{{ __('message.errorUser') }}</p>
                @endif
            </div>
        </div>
    </div>
@endsection
