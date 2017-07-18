@extends('layout.app')

@section('style')
<style>
html,
body {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  min-height: 100%;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
      -ms-flex-direction: column;
          flex-direction: column;
  font-family: sans-serif;
}

ul,
li {
  list-style: none;
  margin: 0;
  padding: 0;
}

.tg-list {
  text-align: center;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
}

.tg-list-item {
  margin: 0 2em;
}

h2 {
  color: #777;
}

h4 {
  color: #999;
}

.tgl {
  display: none;
}
.tgl, .tgl:after, .tgl:before, .tgl *, .tgl *:after, .tgl *:before, .tgl + .tgl-btn {
  box-sizing: border-box;
}
.tgl::-moz-selection, .tgl:after::-moz-selection, .tgl:before::-moz-selection, .tgl *::-moz-selection, .tgl *:after::-moz-selection, .tgl *:before::-moz-selection, .tgl + .tgl-btn::-moz-selection {
  background: none;
}
.tgl::selection, .tgl:after::selection, .tgl:before::selection, .tgl *::selection, .tgl *:after::selection, .tgl *:before::selection, .tgl + .tgl-btn::selection {
  background: none;
}
.tgl + .tgl-btn {
  outline: 0;
  display: block;
  width: 4em;
  height: 2em;
  position: relative;
  cursor: pointer;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
}
.tgl + .tgl-btn:after, .tgl + .tgl-btn:before {
  position: relative;
  display: block;
  content: "";
  width: 50%;
  height: 100%;
}
.tgl + .tgl-btn:after {
  left: 0;
}
.tgl + .tgl-btn:before {
  display: none;
}
.tgl:checked + .tgl-btn:after {
  left: 50%;
}


.tgl-skewed + .tgl-btn {
  overflow: hidden;
  -webkit-transform: skew(-10deg);
          transform: skew(-10deg);
  -webkit-backface-visibility: hidden;
          backface-visibility: hidden;
  -webkit-transition: all .2s ease;
  transition: all .2s ease;
  font-family: sans-serif;
  background: #888;
}
.tgl-skewed + .tgl-btn:after, .tgl-skewed + .tgl-btn:before {
  -webkit-transform: skew(10deg);
          transform: skew(10deg);
  display: inline-block;
  -webkit-transition: all .2s ease;
  transition: all .2s ease;
  width: 100%;
  text-align: center;
  position: absolute;
  line-height: 2em;
  font-weight: bold;
  color: #fff;
  text-shadow: 0 1px 0 rgba(0, 0, 0, 0.4);
}
.tgl-skewed + .tgl-btn:after {
  left: 100%;
  content: attr(data-tg-on);
}
.tgl-skewed + .tgl-btn:before {
  left: 0;
  content: attr(data-tg-off);
}
.tgl-skewed + .tgl-btn:active {
  background: #888;
}
.tgl-skewed + .tgl-btn:active:before {
  left: -10%;
}
.tgl-skewed:checked + .tgl-btn {
  background: #86d993;
}
.tgl-skewed:checked + .tgl-btn:before {
  left: -100%;
}
.tgl-skewed:checked + .tgl-btn:after {
  left: 0;
}
.tgl-skewed:checked + .tgl-btn:active:after {
  left: 10%;
}


</style>
@endsection

@section('content')
  <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2"  style="margin-top:5em;">
            <form action="{{ route('image.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">{{ __('message.titleImg') }}</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="form-group">
                    <label for="image">{{ __('message.chooseFile') }}</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/jpeg image/x-png image/gif" required>
                </div>
                <div class="form-group">
                  <label for="public">{{ __('message.public') }}</label>
                  <ul class="tg-list">
                    <li class="tg-list-item">
                      <input type="checkbox" id="cb3" class="tgl tgl-skewed form-control" name="public"/>
                      <label class="tgl-btn" data-tg-off="{{ __('message.no') }}" data-tg-on="{{ __('message.yes') }}", for="cb3" />
                    </li>
                  </ul>
                  </label>


                </div>



                <button type="submit" class="btn btn-default">{{ __('message.save') }}</button>
            </form>
        </div>
    </div>
  </div>
@endsection
