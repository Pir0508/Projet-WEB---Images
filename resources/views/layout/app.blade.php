<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="css\style.css" rel="stylesheet" type"text/css" />
        <link href="css\font-awesome.min.css" rel="stylesheet">
        <!-- Styles -->
        <style>

            @yield('style')

            .flag{
              max-width: 20px;
            }

            .flagListe{
              width: 20px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
                <nav class="navbar navbar-default navbar-fixed-top">
                  <div class="container">
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand" href="#">{{ __('message.title') }}</a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                      <ul class="nav navbar-nav">
                        @if (Auth::check())
                          <li><a href="{{ url('/home') }}"><span class="glyphicon glyphicon-home">&nbsp;</span>{{ __('message.home') }}</a></li>
                          <li><a href="{{ route('image.create') }}"><span class="glyphicon glyphicon-plus">&nbsp;</span>{{ __('message.addPicture') }}</a></li>
                          <li><a href="{{ route('image.index') }}"><span class="glyphicon glyphicon-globe">&nbsp;</span>{{ __('message.seePicture') }}</a></li>
                        @if(Auth::user()->admin == 1)
                          <li><a href="{{ route('user.create') }}"><span class="glyphicon glyphicon-user">&nbsp;</span>{{ __('message.addUser') }}</a></li>
                          <li><a href="{{ route('user.show', auth()->user()->id) }}"><span class="glyphicon glyphicon-pencil">&nbsp;</span>{{ __('message.modifUser') }}</a></li>
                        @endif
                          <li><a href="{{ route('user.edit', auth()->user()->id) }}"><span class="glyphicon glyphicon-cog">&nbsp;</span>{{ __('message.manageAccount') }}</a></li>
                        @else
                          <li><a href="{{ url('/login') }}"><span class="glyphicon glyphicon-log-in">&nbsp;</span>{{ __('message.connexion') }}</a></li>
                          <li><a href="{{ url('/register') }}"><span class="glyphicon glyphicon-save">&nbsp;</span>{{ __('message.signin') }}</a></li>
                        @endif
                      </ul>
                      <div class="btn-group" style="top:10px;">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="glyphicon glyphicon-flag"></span>&nbsp;{{__(ucfirst(App::getLocale()))}}
                        </button>
                        <ul class="dropdown-menu flagListe">
                          @foreach (Config::get('languages') as $lang => $language)
                             @if ($lang != App::getLocale())
                                 <li>
                                     <a href="{{ route('lang.switch', $lang) }}">{{$language}}</a>
                                 </li>
                             @endif
                         @endforeach
                        </ul>
                      </div>
                    </div>
                  </div>
                </nav>
            <div class="content">
                @yield('content')
            </div>
        </div>
    </body>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="jquery-3.2.1.min.js"></script>
    <script type="text/javascript">
      function changeLang(lang){

      }
    </script>
    @yield('script')

</html>
