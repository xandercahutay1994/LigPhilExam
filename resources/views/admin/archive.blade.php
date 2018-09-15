@extends('layouts.header')

@section('content')
	<!-- include hamburger menu  -->
	@include('inc.hamburger')
	<!--start l-contents-->
    <div class="l-container u-clear">
        <!--start l-main-->
        <main class="l-main js-main">
            <div class="l-main-block"></div>
                <div class="page-number">
                    Page <span >{{$article->currentPage()}}/{{$article->lastPage()}}</span>
                </div>
                <div class="archive">
                    <ul class="archive-list">
                    	<!-- Check and loop all articles  -->
                	 	@if(count($article) > 0)
                    		@foreach($article as $key => $value)
		                        <li class="archive-item">
		                            <article class="card">
									    <a href="{{ url('/single/' . $value->id) }}" class="card-link">
									        <img src="{{ asset('/articleImages/' . $value->image) }}" alt="" class="card-image">
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
		                <!-- end if & loop -->
					</ul>
				</div>

				<!-- Pagination -->
		        <div class="paginate">
		        	<!-- if currentPage is 1 disable prev button and make it color gray -->
			        <a href="{{ $article->url(1) }}" class="{{ $article->currentPage() == 1 ? 'paginate-prev is-disable' : 'paginate-prev'}}">
			        	<span class="paginate-prev-arrow "></span>
			        </a>

			        <!-- loop in all items then display -->
			        @for ($i = 1; $i <= $article->lastPage(); $i++)
				        <span class="{{ ($article->currentPage() == $i) ? 'paginate-number is-current' : 'paginate-number' }}">
				            <a href="{{ $article->url($i) }}">{{ $i }}</a>
				        </span>
				    @endfor

				    <!-- if currentPage = lastPage make next arrow disable and color gray the currentPage -->
			        <a href="{{ $article->url($article->lastPage()) }}" class="{{ $article->currentPage() == $article->lastPage() ? 'paginate-next is-disable' : 'paginate-next'}}">
			        	<span class="paginate-next-arrow "></span>
			        </a>
                </div>
                <!-- end of pagination -->
			</div>
		</main>
		<!-- end l-main -->
	</div>
	<!-- end l-contents -->
@endsection