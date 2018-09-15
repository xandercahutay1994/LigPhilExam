@extends('layouts.header')

@section('content')
	<!-- include hamburger menu  -->
	@include('inc.hamburger')
	<!--start l-main-->
    <main class="l-main js-main">
        <div class="l-main-block"></div>
            <div class="single">
            	@if(count($showArticle) > 0)
	                <img src="{{ asset($showArticle[0]->image) }}" alt="" class="single-image">
	                <div class="l-container u-clear">
	                    <h1 class="single-title">{{ $showArticle[0]->title }}</h1>
	                    <time class="single-date" datetime="{{ $showArticle[0]->posted_at }}">
	                    	{{ \Carbon\Carbon::parse($showArticle[0]->posted_at)->format('d-M-Y') }}
	                    </time>
	                    <p class="single-desc">
	                    	{{ $showArticle[0]->content }}
	                    </p>
		                <div class="single-button">
		                	<a href="{{ url('/index') }}">
		                        <div class="button">
								    <p class="button-text">Top</p>
								</div>
							</a>
	                    </div>
	                </div>
                @endif
            </div>
        </div>
    </main>
    <!--end l-main-->
@endsection