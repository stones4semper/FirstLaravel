@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-7">
            @include('inc.messages')
            <h3>Multi Upload</h3>
            <form method="post" action="{{ route('test.store') }}" id="testMultiple" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Select pictures:</label>
                    <input type="file" name="files[]" multiple>
                </div> 
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Upload Am</button>
                </div>
                <div id="show_data"></div>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            var frm = $('#testMultiple');
            frm.submit(function(e){
                console.log('data')
                e.preventDefault();
                $.ajax({
                    type: frm.attr('method'),
                    url: frm.attr('action'),
                    data:  new FormData(this),
                    contentType: false,
                    processData:false,
                    success: function (data){ 
                        frm[0].reset();  
                        console.log(data.success)
                        $("#show_data").fadeIn().html(data.success)
                    },
                    error: function(data){            
                        $("#show_data").html(data.success);
                    },
                });
            });
        })
    </script>
@endsection