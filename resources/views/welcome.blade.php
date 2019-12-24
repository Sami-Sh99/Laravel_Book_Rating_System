@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/main/zerogrid.css') }}">
	<link rel="stylesheet" href="{{ asset('css/main/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main/responsive.css') }}">
    
<!--////////////////////////////////////Container-->
<section id="container">
	<div class="wrap-container zerogrid">
		<div id="main-content" class="col-2-3">
			<div class="wrap-content">
				<div class="movie">
					<div class="row type">
						<div class="title">
							<center><h2>Books</h2></center>
						</div>
						{{-- <ul>
							<li>
								<select>
									<option value="audi" selected>Type</option>
									<option value="volvo">Text Text</option>
									<option value="saab">Text Text</option>
									<option value="volvo">Text Text</option>
									<option value="saab">Text Text</option>
									<option value="volvo">Text Text</option>
									<option value="saab">Text Text</option>
									<option value="volvo">Text Text</option>
									<option value="saab">Text Text</option>
									<option value="volvo">Text Text</option>
									<option value="saab">Text Text</option>
								</select>
							</li>
							<li><a class="button " href="#">Search</a></li>
						</ul> --}}
					</div>
					<div class="row">
						@foreach($Books as $Book)
						<div class="col-1-4">
							<div class="wrap-col">
								<div class="post">
									<div class="view effect">  
									 <img class="thumb" src="/storage/img/cover_images/{{ $Book->cover_link }}"  />
									  <div class="mask">  
									  <a href="{{url('books/'.$Book->bid)}}" class="info" title="Full Image"><img src="/storage/img/cover_images/{{ $Book->cover_link }}" /></a>  
									  </div>    
									</div>
										<div class="clear"></div>
										<a href="{{url('books/'.$Book->bid)}}"><h3>{{$Book->Title}}</h3></a>
										<span>{{$Book->Subtitle}}</span>
									</div>
								</div>
							</div>
						@endforeach
					{{-- <center><div class="pagination">
						<a href="#" class="page gradient">first</a><a
						href="#" class="page gradient">2</a><a href="#"
						class="page gradient">3</a><span class=
						"page active">4</span><a href="#" class=
						"page gradient">5</a><a href="#" class=
						"page gradient">6</a><a href="#" class=
						"page gradient">last</a>
					</div></center> --}}
				</div>
			</div>
		</div>
		</div>
		<div id="sidebar" class="col-1-3">
			<div class="wrap-sidebar">
				<!---- Start Widget ---->
				<div class="widget wid-new-updates">
					<div class="wid-header">
						<h5>Hot Updates !</h5>
					</div>
					<div class="wid-content">
						<ul>
						<li><a href="#">Mad Max: Fury Road</a><span><img src="/storage/img/hot.png" /></span></li>
						<li><a href="#">The Age of Adaline</a><span><img src="/storage/img/hot.png" /></span></li>
						<li><a href="#">Pound of Flesh</a><span><img src="/storage/img/hot.png" /></span></li>
						<li><a href="#">Bloodbath Island</a><span><img src="/storage/img/hot.png" /></span></li>
						<li><a href="#">Pound of Flesh</a><span><img src="/storage/img/hot.png" /></span></li>
						</ul>
					</div>
				</div>
				<!---- Start Widget ---->
				<div class="widget wid-tag">
					<div class="wid-header">
						<h5>Tags</h5>
					</div>
					<div class="wid-content">
						<ul>
						<li><a href="#">Anthology</a></li>
						<li><a href="#">Classic</a></li>
						<li><a href="#">Comic and Graphic Novel</a></li>
						<li><a href="#">Crime and Detective</a></li>
						<li><a href="#">Drama</a></li>
						<li><a href="#">Fable</a></li>
						<li><a href="#">Fairy Tale</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<script src="{{ asset('css/main/js/css3-mediaqueries.js') }}"></script>
<script src="{{ asset('css/main/js/jquery.min.js') }}"></script>
@endsection()