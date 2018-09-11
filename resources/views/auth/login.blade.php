@extends('layouts.header')

@section('content')
    <!--start l-contents-->
    <div class="l-container u-clear">

        <!--start l-main-->
        <main class="l-main js-main">
            <div class="l-main-block"></div>
            <form action="{{ url('/login') }}" method="POST" class="form">
                {{ csrf_field() }}
                <label for="user-id" class="form-title">USER ID</label>
                <input type="text" id="user_id" name="user_id" class="input input-text">
                <label for="password" class="form-title">PASSWORD</label>
                <input type="text" id="password" name="password" class="input input-text">
                <div class="nav-item">
                    @include('inc.messages')
                </div>
                <label for="submit" class="form-button">
                    <div class="button">
                       <p class="button-text">Login</p>
                     </div>
                </label>
                <input type="submit" id="submit" class="input input-submit">
            </form>
        </main>
        <!--end l-main-->

    </div>
    <!--end l-contents-->
    
    <script type="text/javascript">
        $(document).ready(function(){
            $('#submit').on('click',function(e){
                if($('#user_id').val() == "" && $('#password').val() == ""){
                    $('.nav-item').html('Error');
                    e.preventDefault();
                }
            });
        });   
    </script>
@endsection 
