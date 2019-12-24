@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/main/zerogrid.css') }}">
<link rel="stylesheet" href="{{ asset('css/main/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/main/responsive.css') }}">
<section id="container">
    @php
    $book=$data[0];
    $user=$data[1];
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
                                        <a class="button bt1" disabled href="#">Rate</a>
                                        <a class="button bt1" href="#">Comment</a>
                                    </li>
                                    @endif
                                    <li class="star"><h1 class="bh1"><b>Rate:2.5</b></h1></li>
								</ul>
							</div>
						</div>
						<div class="clear"></div>
					</div>
					<div class="art-content">
						<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy 
						eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. 
						At vero eos et accusam et justo duo dolores et ea rebum. Consetetur sadipscing elitr, 
						sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, 
						sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</p>
						<img src="images/0.jpg" />
						<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy 
						eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. 
						At vero eos et accusam et justo duo dolores et ea rebum. Consetetur sadipscing elitr, 
						sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, 
						sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</p>
						<blockquote><p>Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet vultatup duista.</p></blockquote>
						<img src="images/17.jpg" />
						<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy 
						eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. 
						At vero eos et accusam et justo duo dolores et ea rebum. Consetetur sadipscing elitr, 
						sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,aaszx asqr amet vultatup duista.justo duo dolores et ea rebum</p>
						<div class="note">
						  <ol>
							<li>Lorem ipsum</li>
							<li>Sit amet vultatup nonumy</li>
							<li>Duista sed diam</li>
						  </ol>
						  <div class="clear"></div>
						</div>
						<img src="images/16.jpg" />
						<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy 
						eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. 
						At vero eos et accusam et justo duo dolores et ea rebum. Consetetur sadipscing elitr, 
						sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, 
						sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</p>
						<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy 
						eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. 
						At vero eos et accusam et justo duo dolores et ea rebum. Consetetur sadipscing elitr, 
						sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, 
						sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</p>
						<div class="clear"></div>
					</div>
				</article>

@endsection