@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/main/zerogrid.css') }}">
<link rel="stylesheet" href="{{ asset('css/main/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/main/responsive.css') }}">
<section id="container">
    @php
    $book=$data[0];
	$user=$data[1];
	$rate=$data[2];
	$Comments=$data[3];
    @endphp
	<div class="wrap-container zerogrid">
		<div id="main-content" class="col-2-3">
			<div class="wrap-content">
                <h1 class="bh1">{{$book->Title}}</h1>
				<article>
					<div class="art-header">
						<div class="col-1-3">
							<div class="wrap-col">
								<img src="/storage/img/cover_images/{{ $book->cover_link }}" />
							</div>
						</div>
						<div class="col-2-3">
							<div class="wrap-col">
								<ul>
									<li><p>Title: <a href="#">{{$book->Title}}</a></p></li>
									<li><p>Subtitle: <a href="#">{{$book->Subtitle}}</a></p></li>
									<li><p>Publisher: <a href="#">{{$book->Publisher}}</a></p></li>
									<li><p>Author: <a href="#">{{$user}}</a></p></li>
                                    <li><p>Price: <a href="#">{{$book->pirce or '0.00'}}$</a></p></li>
                                    <li><p>Pages: <a href="#">{{$book->nb_of_pages or 0}}</a></p></li>
									<li><p>Upload: <a href="#">{{$book->created_at->diffForHumans()}}</a></p></li>
                                    
                                    @if(Auth::user())
                                    <li>
										<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Rate" data-whatever="@mdo">Rate</button>
										<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Comment" data-whatever="@mdo">Comment</button>
                                    </li>
									@endif
									{{-- //TODO Dynamic Rating --}}
								<li><h1 class="bh1"><b>Rate: {{$rate}}</b></h1></li>
								</ul>
							</div>
						</div>
						<div class="clear"></div>
					</div>
				</article>
				<div class="row bootstrap snippets">
					<div class="col-md-12 col-sm-12">
						<div class="comment-wrapper">
							<div class="panel panel-info">
								<div class="panel-heading">
									Comment panel
								</div>
								<div class="panel-body">
									<ul class="media-list">
										@foreach($Comments as $comment)
										<li class="media">
											<a href="#" class="pull-left">
												<img src="/storage/img/profile/{{$comment[1]}}" alt="" class="img-circle">
											</a>
											<div class="media-body">
												<span class="text-muted pull-right">
													{{-- <small class="text-muted">30 min ago</small> --}}
												</span>
												<strong class="text-success">@ {{$comment[0]}}</strong>
												<p style="color:#777">
													{{$comment[2]}}
												</p>
											</div>
										</li>
										@endforeach
									</ul>
								</div>
							</div>
						</div>
				
					</div>
				</div>

@endsection

<div class="modal fade" id="Comment" tabindex="-1" role="dialog" aria-labelledby="CommentLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="CommentLabel">New Comment</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
		<form action="{{url('/comment/'.$book->bid.'/'.$book->user_uid)}}" method="POST">
			{{ csrf_field() }}
			<div class="form-group">
			  <label for="message-text" class="col-form-label">Comment</label>
			  <textarea class="form-control"name="message-text" id="message-text"></textarea>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Submit Comment</button>
			</div>
		  </form>
		</div>
	  </div>
	</div>
  </div>

  <div class="modal fade" id="Rate" tabindex="-1" role="dialog" aria-labelledby="RateLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="RateLabel">Rate</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
		<form action="{{url('/rate/'.$book->bid.'/'.$book->user_uid)}}" method="POST">
			{{ csrf_field() }}
			<div class="form-group">
				<label class="radio-inline"><input type="radio" value="1" name="optradio">1</label>
				<label class="radio-inline"><input type="radio" value="2" name="optradio">2</label>
				<label class="radio-inline"><input type="radio" value="3" name="optradio"checked>3</label>
				<label class="radio-inline"><input type="radio" value="4" name="optradio">4</label>
				<label class="radio-inline"><input type="radio" value="5" name="optradio">5</label>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Submit Rating</button>
			</div>
		  </form>
		</div>
	  </div>
	</div>
  </div>