@extends('layouts.header')

@section('content')
    <!--start l-contents-->
    <div class="l-container u-clear">

        <!--start l-main-->
        <main class="l-main js-main">
            <div class="l-main-block"></div>
            <a href="{{ url('/adminPosts') }}" class="l-main-button">
                <div class="button">
                    <p class="button-text">New Article</p>
                </div>
            </a>
            <ul class="archive archive-admin">
                <!-- check if there is an article -->
                @if(count($allArticle) > 0)
                    <!-- Loop all posted article -->
                    @foreach($allArticle as $key => $value)
                        <li class="archive-item">
                            <a href="{{ url('/adminPosts/' . $value->id ) }}" class="post-article">
                                <time class="post-article-date" datetime="{{$value->posted_date}}">                    {{$value->posted_date}}
                                </time>
                                <h1 class="post-article-title">{{ $value->title }}</h1>
                            </a>
                        </li>
                    @endforeach
                @else
                    <li class="archive-item sns">
                        <h1 class="post-article-title"> No article posted </h1>
                    </li>
                @endif       
            </ul>
        </main>
        <!--end l-main-->

    </div>
    <!--end l-contents-->
@endsection