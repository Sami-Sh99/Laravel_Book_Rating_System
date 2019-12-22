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
                {{ Auth::user()->username }}
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
            <div class="h1">My Books<a class="btn btn-success btn-lg pull-right m-5">New Book</a></div>
            
              <div class="media">
                <img class="mr-3 img-fluid post-thumb d-none d-md-flex" src="https://picsum.photos/300/300" alt="image">
                <div class="media-body">
                    <h3 class="media-title">Book 1 <a class="btn btn-danger pull-right m-5">Delete</a></h3>
                    <div class="meta mb-1">hello world, 20 pages, rating 3.5</div>
                    <div class="media-intro"></div>
                </div>
              </div>

              <div class="media">
                <img class="mr-3 img-fluid post-thumb d-none d-md-flex" src="https://picsum.photos/301/300" alt="image">
                <div class="media-body">
                    <h3 class="media-title">Book 2 <a class="btn btn-danger pull-right m-5">Delete</a></h3>
                    <div class="meta mb-1">hello world, 20 pages, rating 3.5</div>
                    <div class="media-intro"></div>
                </div>
              </div>

              
          </div>
        </div>
      </div>
    </div>
@endsection()