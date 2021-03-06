@extends('layouts.header')

@section('content')
	<!-- include hamburger menu  -->
	@include('inc.hamburger')
    <!--start l-contents-->
    <div class="l-container u-clear">
        <!--start l-main-->
        <main class="l-main js-main">
            <div class="l-main-block"></div>
               <div class="archive">
                    <ul class="archive-list">
                    	@if(count($allArticle) > 0)
                    		@foreach($allArticle as $key => $value)
			                    <li class="archive-item">
			                        <article class="card">
			                            <a href="{{ url('/single/' . $value->id) }}" class="card-link">
			                                <img src="{{ asset('/articleImages/' . $value->image) }}" alt="Article Image" class="card-image">
			                                <div class="card-bottom">
			                                    <h1 class="card-title">{{ strToUpper($value->title) }}</h1>
			                                    <time class="card-date" datetime="{{$value->created_at}}">
			                                    	{{ strToUpper(\Carbon\Carbon::parse($value->created_at)->format('d M, Y')) }}
			                                    </time>
			                                </div>
			                            </a>
			                        </article>
			                    </li>
			                @endforeach
			            @else
			            	<li class="archive-item">
		                        <article class="card">
		                            <a href="#" class="card-link">
		                                <img src="" alt="" class="card-image">
		                                <div class="card-bottom">
		                                    <h1 class="card-title sns">No article posted</h1>
		                                </div>
		                            </a>
		                        </article>
		                    </li>
		                @endif
	                </ul>
	            </div>
           		<a href="{{ url('/archive' )}}" class="archive-button">
	                <div class="button">
					    <p class="button-text">More</p>
					</div>
	            </a>
		    </div>
        </main>
        <!-- end l-main -->
    </div>
    <!-- end of l-contents -->
@endsection
