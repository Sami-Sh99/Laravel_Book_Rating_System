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
                <img src="/storage/img/profile/{{ Auth::user()->photo_link }}" class="img-responsive" alt="">
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
                <li class="nav-item">
                <a href="{{url('home')}}" class="nav-link">
                              <i class="fa fa-home"></i>
                              Overview </a>
                </li>
                <li class=" active nav-item">
                  <a class="active nav-link" href="{{url('setting')}}">
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
            <div class="h1 col-6">Edit Profile</div>
              <hr>
              <form class="form-horizontal" method="POST" action="{{ url('user/update') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                    <label for="username" class="col-md-4 control-label">Username</label>

                    <div class="col-md-4">
                        <input id="username" type="text" class="form-control" name="username" value="{{ $data[0] }}" required autofocus>

                        @if ($errors->has('username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('job') ? ' has-error' : '' }}">
                  <label for="job" class="col-md-4 control-label">Job</label>
                    <div class="col-md-6">
                      <select name="job" id="job" class=" form-control col-md-12 input-lg " data-dependent="state">              
                      <option value="{{ $data[2] }}">{{ $data[2] }}</option>
                          @foreach($data[3] as $job)
                              <option value="{{ $job->name }}">{{ $job->name }}</option>
                          @endforeach
                      </select>    
                    </div>
                  </div>

                <div class="form-group{{ $errors->has('bio') ? ' has-error' : '' }}">
                    <label for="bio" class="col-md-4 control-label">Bio</label>

                    <div class="col-md-6">
                        <textarea id="bio" type="text" class="form-control" name="bio" value="{{ $data[1] }}" required>{{ $data[1] }}</textarea>

                        @if ($errors->has('bio'))
                            <span class="help-block">
                                <strong>{{ $errors->first('bio') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Save Profile
                        </button>
                    </div>
                </div>
            </form>
            </div>
              
          </div>
        </div>
      </div>
    </div>
@endsection()