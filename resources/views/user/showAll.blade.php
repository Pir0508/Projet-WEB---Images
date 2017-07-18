@extends('layout.app')

@section('title')
  Index | MyWebSite
@endsection

@section('style')
#allpictures{
  position:relative;
}
@endsection

@section('content')
    @if (Auth::check())
      <div class="container" id="allpictures">
        <div class="btn-group">
          <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{ __('message.filter') }} <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
              <li><a href="{{ route('image.index', array('filtre'=>'asc')) }}">{{ __('message.dateAsc') }}</a></li>
              <li><a href="{{ route('image.index', array('filtre'=>'desc')) }}">{{ __('message.dateDesc') }}</a></li>
              <li><a href="{{ route('image.index', array('filtre'=>'nom')) }}">{{ __('message.name') }}</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          @foreach($images as $element)
            <div class="col-xs-3">
              <a href="#" class="thumbnail">
                <img src="/img/{{$element->user_id}}/{{$element->nom}}" alt="img" class="pictures" id="picture_{{$element->user_id}}_{{$element->nom}}"/>
              </a>
            </div>
          @endforeach
        </div>
      </div>
    @endif
@endsection

@section('script')
<script type="text/javascript">
  function filter(params){
    alert('debut');
    $.ajax({
      type: "POST",
      url: '/filterImg',
      data: { id: params }
    })
    .done(function( response ) {
      alert( 'ok' );
    });
    .error(function(){
      alert("nok");
    });
    .always(function(){
      alert("always");
    });
  }

  function test(params){

  }
</script>
@endsection
