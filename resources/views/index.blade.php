@extends('layout.app')

@section('title')
  Index | MyWebSite
@endsection

@section('style')
  .pictures{
    max-width : 200px;
  }

  #profil_picture{
    max-height : 100px;
  }

  .info{
    position:fixed;
    margin-top:-15em;
  }

  .pict{
    position:absolute;
    left:30em;
    margin-top:-15em;
  }
#myModal_profile{
  z-index:9999;
  position:fixed;
}

@endsection

@section('content')
    @if (Auth::check())
      <div class="container">
        <div class="row">
        <div class="col-md-3 info">
            <div class="panel panel-default">
          <div class="panel-body">
          @if($user->profil_picture=="")
              <img src="/img/default.jpg" alt="profil Picture" class="profil_picture" data-toggle="modal" data-target="#myModal_profile" id="profil_picture" />
          @else
              <img src="/img/avatar/{{$user->profil_picture}}" alt="profil_picture" class="profil_picture" data-toggle="modal" data-target="#myModal_profile" id="profil_picture" />
          @endif



          <div>
            {{ __('message.name') }} : {{$user->name}}
          </div>
          <div>
            {{ __('message.email') }} : {{$user->email}}
          </div>
          </div>
        </div>
      </div>

      <div class="col-md-8 pict">
        <div class="panel panel-default">
          <div class="panel-body">
            @foreach($images as $element)
              <div class="col-xs-3">
                <a href="#" class="thumbnail">
                  <img src="/img/{{$element->user_id}}/{{$element->nom}}" alt="img" class="pictures" data-toggle="modal" data-target="#myModal_{{$element->user_id}}_{{$element->fullname}}" id="picture_{{$element->user_id}}_{{$element->nom}}"/>
                </a>
              </div>
              <div id="myModal_{{$element->user_id}}_{{$element->fullname}}"  class="modal fade">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">{{$element->fullname}}</h4>
                          </div>
                          <div class="modal-body">
                            <img src="img/{{$element->user_id}}/{{$element->nom}}" alt="img" class="pictures" id="picture_{{$element->user_id}}_{{$element->nom}}"/>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-primary" data-dismiss="modal">{{ __('message.close') }}</button>
                              <a href="{{route('image.destroy', $element)}}" onclick="event.preventDefault(); document.getElementById('delete-form_{{$element->user_id}}_{{$element->fullname}}').submit();">
                                <button type="button" class="btn btn-primary">{{ __('message.delete') }}</button>
                              </a>
                              <form id="delete-form_{{$element->user_id}}_{{$element->fullname}}" action="{{ route('image.destroy', $element) }}" method="POST" style="display: none;">
                                  {{ csrf_field() }}
                                  <input type="hidden" name="_method" value="DELETE">
                              </form>
                        </div>
                    </div>
                </div>
              </div>




      @endforeach
    </div>
  </div>
    </div>
</div>
</div>

<div id="myModal_profile"  class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">{{ __('message.profilePicture') }}</h4>
            </div>
            <div class="modal-body">
              <form action="{{ route('user.update', $user) }}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <input type="hidden" name="_method" value="put">
                  <div class="form-group">
                      <label for="image">{{ __('message.chooseFile') }}</label>
                      <input type="file" class="form-control" id="profil_picture" name="profil_picture">
                  </div>
                  <button type="submit" class="btn btn-default">{{ __('message.save') }}</button>
              </form>
            </div>
      </div>
  </div>
</div>
    @endif
@endsection

@section('script')
<script type="text/javascript">
  function filter(params){
    $.ajax({
          type: "POST",
          url: 'ImageController@Show',
          data: {"id" : params},
          success: function(response) {
              alert(response);
          }
          error:function(){
            alert('nok');
          }
          always:function(){
            alert('always');
          }
      })
    });
</script>
@endsection
