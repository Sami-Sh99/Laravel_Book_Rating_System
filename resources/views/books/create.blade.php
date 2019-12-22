@extends('layouts.dashboard')
@section('content')
  <div class="container content">
      <div class="row profile">
        <div class="col-md-3">
          <div class="profile-sidebar position-fixed">
            <!-- SIDEBAR USERPIC -->
            <div class="profile-userpic">
              <img src={{ isset($img) ? $img : "\img\unknown.png" }} class="img-responsive" alt="">
            </div>
            <!-- END SIDEBAR USERPIC -->
            <!-- SIDEBAR USER TITLE -->
            <div class="profile-usertitle">
              <div class="profile-usertitle-name">
                {{ Auth::user()->title }}
              </div>
              <div class="profile-usertitle-job">
                {{ isset($job) ? $job : "Newbie" }}
              </div>
            </div>
            <!-- END SIDEBAR USER TITLE -->
            <!-- SIDEBAR BUTTONS -->
            <div class="profile-userbuttons">
              <button type="button" class="btn btn-success btn-sm">Follow</button>
              <button type="button" class="btn btn-danger btn-sm">Message</button>
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
                  <a class="nav-link" href="https://codepen.io/jasondavis/pen/jVRwaG?editors=1000">
                              <i class="fa fa-user"></i>
                              Account Settings </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#" target="_blank">
                              <i class="fa fa-check"></i>
                              Tasks </a>
                </li>
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
            <div class="h1 mb10">New Book<a href="{{ url('/home') }}" class="btn btn-primary btn-lg pull-right m-5">View Books</a></div>
            <form class="form-horizontal" method="POST" action="{{ url('books/new') }}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="title" class="col-md-4 control-label">Title</label>

                    <div class="col-md-4">
                        <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus>

                        @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('subtitle') ? ' has-error' : '' }}">
                    <label for="subtitle" class="col-md-4 control-label">Subtitle</label>

                    <div class="col-md-6">
                        <input id="subtitle" type="subtitle" class="form-control" name="subtitle" value="{{ old('subtitle') }}" required>

                        @if ($errors->has('subtitle'))
                            <span class="help-block">
                                <strong>{{ $errors->first('subtitle') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('publisher') ? ' has-error' : '' }}">
                    <label for="publisher" class="col-md-4 control-label">Publisher</label>

                    <div class="col-md-6">
                        <input id="publisher" type="text" class="form-control"value="{{ old('publisher') }}" name="publisher" required>

                        @if ($errors->has('publisher'))
                            <span class="help-block">
                                <strong>{{ $errors->first('publisher') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('number of pages') ? ' has-error' : '' }}">
                    <label for="number of pages" class="col-md-4 control-label">Number of Pages</label>

                    <div class="col-md-3">
                        <input id="number of pages" type="number" class="form-control" value="{{ old('nb_pages') }}" name="nb_pages" required>

                        @if ($errors->has('number of pages'))
                            <span class="help-block">
                                <strong>{{ $errors->first('number of pages') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                    <label for="price" class="col-md-4 control-label">Price</label>

                    <div class="col-md-3">
                        <input id="price" type="number" class="form-control" name="price" value="{{ old('price') }}" required>

                        @if ($errors->has('price'))
                            <span class="help-block">
                                <strong>{{ $errors->first('price') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('cover_image') ? ' has-error' : '' }}">
                    <label for="cover" class="col-md-4 control-label">Cover</label>

                    <div class="col-md-6">
                        <input id="cover" type="file" class="form" name="cover_image">

                        @if ($errors->has('cover_image'))
                            <span class="help-block">
                                <strong>{{ $errors->first('cover_image') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Add Book
                        </button>
                    </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection()