@extends('layouts.header')

@section('content')
    <div class="l-container u-clear">

        <!--start l-main-->
        <main class="l-main js-main">
            <div class="l-main-block"></div>
            <form action="{{ url('/register') }}" method="POST" class="form">
                {{ csrf_field() }}
                <label for="password" class="form-title">Password</label>
                <input type="password" id="password" name="password" class="input input-text" required="">
                <div class="nav-item">
                    @include('inc.messages')
                </div>
                <label for="submit" class="form-button">
                    <div class="button">
                       <p class="button-text">Create</p>
                     </div>
                </label>
                <input type="submit" id="submit" class="input input-submit">
                <a href="{{ url('/login') }}" class="form-button">
                    <div class="button">
                        <p class="button-text">Login</p>
                    </div>
                </a>
            </form>
        </main>
        <!--end l-main-->

    </div>
    <!--end l-contents-->
<!-- 
    <script type="text/javascript">
        $.ajax({
            url: '/ligphilexam/public/index.php/checkReg',
            type: 'GET',
            dataType: 'JSON',
            success:function(data){
                console.log(data);
            },
            error: function(error){
                console.log('error');
            }
        });

    </script> -->
@endsection