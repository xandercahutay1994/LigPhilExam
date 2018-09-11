@extends('layouts.header')

@section('content')
    <!--start l-contents-->
    <div class="l-container u-clear">
        <!--start l-main-->
        <main class="l-main js-main">
            <div class="l-main-block"></div>
			<form method="POST" action="{{ url('/postSubmit') }}" class="form" enctype="multipart/form-data">
                <!-- csrf_token access to the page -->
                {{ csrf_field() }}
                <label for="image" class="form-title">EYE CATCH IMAGE
                    <div class="form-file u-clear">
                        {{ $id ? $id->image : '' }}
                        <span class="form-file-button">UPLOAD</span>
                    </div>
                </label>
                <input type="file" name="image" id="image" class="input input-image">
                <label for="title" class="form-title">TITLE</label>
                <div class="form-body">
                    <input type="text" id="title" name="title" class="input input-text" onkeypress="textOnly(event)" value="{{ $id ? $id->title : '' }}">
                </div>
                <label for="contents" class="form-title">CONTENTS</label>
                <div class="form-textarea">
                    <textarea name="inquiry" id="inquiry" cols="30" rows="10" class="input input-contents" onkeypress="textOnly(event)">{{ $id ? $id->content : '' }}</textarea>
                </div>
                <!-- Error Message -->
                <div class="nav-item">
                    @include('inc.messages')
                </div>
                <input type="hidden" name="user_id" value="{{ $id ? $id->id : null }}">
                <label for="submit" class="form-button">
                    <div class="button">
					    <p class="button-text">Submit</p>
					</div>
                </label>
                <input type="submit" id="submit" class="input input-submit">
                <a href="{{ url('/adminLists') }}" class="form-button">
                    <div class="button">
					    <p class="button-text">Back</p>
					</div>
                </a>
            </form>
        </main>
        <!--end l-main-->

    </div>
    <!--end l-contents-->
    <!-- script -->
    <script type="text/javascript">

    	$(document).ready(function(){
            var imageLength = $("#image")[0].files.length;

            // Check if image length is not empty and append data to FORM-FILE DIV
            $('#image').on('change', function(){
                // check if empty
                if(imageLength == 0){
                    $('.form-file').html(''); //empty the div first before appending new one
                    $('.form-file').append($('#image').val());  
                }else{
                    $('.form-file').append($('#image').val()); //append to div if div has no value
                }
            });

    		// Triggers when submit button is clicked
            // Form validation
    		$('.form').on('submit',function(e){
                var image = $("#image")[0].files.length;
	    		// Check if input fields are not empty
	    		if(image == "" || $('#title').val() == "" || $('#inquiry').val() == ""){
	    			$('.nav-item').html('Error'); 
	    			e.preventDefault(); 
	    		}
	    	});
	    });

        // function to check if input is text only
        function textOnly(event){
            // g = global, i = allow uppercase, \s = allow spaces
            var regexp = /[\sa-z]/gi;
            var ch = String.fromCharCode(event.which);
            if(!(regexp.test(ch)))
                event.preventDefault();
        }
    </script>
    <!-- end of script -->
@endsection