@extends('layouts.dashboard')
@section('content')
  <div class="container content">
      <div class="row profile">
        <div class="col-md-3">
          <div class="profile-sidebar position-fixed">
            <!-- SIDEBAR USERPIC -->
            <div class=" profile-userpic image-upload">
              <form class="form-horizontal" method="POST" action="{{ url('user/profile') }}" enctype="multipart/form-data">
              <label for="file-input">
                <a  data-toggle="tooltip" data-placement="bottom" title="Change Picture">
                  <img src="/storage/img/profile/{{ Auth::user()->photo_link }}" class="img-responsive" alt="">
                </a>
              </label>
            
              <input id="file-input"style="display:none;" name="profile" onchange="javascript:this.form.submit();" type="file" />
              {{ csrf_field() }}
              </form>
            </div>
            <!-- END SIDEBAR USERPIC -->
            <!-- SIDEBAR USER TITLE -->
            <div class="profile-usertitle">
              <div class="profile-usertitle-name">
                {{ Auth::user()->username }}
              </div>
              <div class="profile-usertitle-job">
                {{ Auth::user()->job ? Auth::user()->job : "Newbie" }}
              </div>
            </div>
            <!-- END SIDEBAR USER TITLE -->
            <!-- SIDEBAR BUTTONS -->
            <div class="profile-userbuttons">
              {{ Auth::user()->bio ? Auth::user()->bio : "" }}
            </div>
            <!-- END SIDEBAR BUTTONS -->
            <!-- SIDEBAR MENU -->
            <div class="profile-usermenu sidebar-sticky">
              <ul class="nav flex-column">
                <li class="active nav-item">
                  <a href="#" class="nav-link active">
                              <i class="fa fa-home"></i>
                              Overview </a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{url('setting')}}">
                              <i class="fa fa-user"></i>
                              Account Settings </a>
                </li>
                {{-- <li class="nav-item">
                  <a class="nav-link" href="#" target="_blank">
                              <i class="fa fa-check"></i>
                              Tasks </a>
                </li> --}}
                <li class="nav-item">
                  <a class="nav-link" href="#">
                              <i class="fa fa-flag"></i>
                              Help </a>
                </li>
              </ul>
            </div>
            <!-- END MENU -->
          </div>
        </div>
        <div class="col-md-9">
          <div class="profile-content">
            <div class="h1">My Books<a href="{{ url('/books/new') }}" class="btn btn-success btn-lg pull-right m-5 dbtn">New Book</a></div>
            <hr>
            @foreach($books as $book)
              <div class="media">
              <img class="mr-3 img-fluid post-thumb d-none d-md-flex" src="/storage/img/cover_images/{{$book->cover_link}}" alt="image">
                <div class="media-body">
                <h3 class="media-title">{{$book->Title}}<a href="{{ url('/books/d/')}}{{'/'.$book->bid}}" class="btn btn-danger pull-right m-5">Delete</a></h3>
                    <div class="meta mb-1">{{$book->Subtitle}}, {{$book->nb_of_pages ? $book->nb_of_pages.' pages, ' : '' }} {{$book->price ? $book->price.' $, ' : '' }}</div>
                    <div class="media-intro"></div>
                </div>
              </div>
            @endforeach
              </div>


          </div>
        </div>
      </div>
    </div>
    <script>
      $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();   
      });
      </script>
@endsection()