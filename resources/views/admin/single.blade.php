@extends('layouts.header')

@section('content')
	<!-- include hamburger menu  -->
	@include('inc.hamburger')
	<!--start l-main-->
    <main class="l-main js-main">
        <div class="l-main-block"></div>
            <div class="single">
            	@if(count($showArticle) > 0)
	                <img src="{{ asset('/articleImages/' . $showArticle[0]->image) }}" alt="" class="single-image">
	                <div class="l-container u-clear">
	                    <h1 class="single-title">{{ strToUpper($showArticle[0]->title) }}</h1>
	                    <time class="single-date" datetime="{{ $showArticle[0]->created_at }}">
			                {{ strToUpper(\Carbon\Carbon::parse($showArticle[0]->created_at)->format('d M, Y')) }}
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
	            @else
	            	<div class="l-container u-clear">
	            		<p class="sns single-desc">No article post</p>
	            	</div>
                @endif
            </div>
        </div>
    </main>
    <!--end l-main-->
@endsection