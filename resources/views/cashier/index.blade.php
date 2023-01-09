@extends('layouts.crud')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.0/jquery.min.js" integrity="sha512-suUtSPkqYmFd5Ls30Nz6bjDX+TCcfEzhFfqjijfdggsaFZoylvTj+2odBzshs0TCwYrYZhQeCgHgJEkncb2YVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<h1> THIS is cashier</h1>
<div class="container">
    <div class="row" id="table-detail"></div>
    <div class="row justify-content-center">
       <div class="columns-6">
        <button class="btn btn-primary btn-block" id="btn-show-table">Show Tables</button>
       <div id="selected-table"></div>
       <div id="order-detail"></div>
       </div>
       <div class="columns-6">
        <nav>
            <ul class="nav nav-tabs" id="nav-tab" role="tablist">
                @foreach ($categories as $category)
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" data-id={{$category->id}}>
                        {{$category->name}}
                    </a>
                </li>
                @endforeach
                </ul>
        </nav>
        <div id="list-menu" class="row mt-2"></div>
       </div>
    </div>
</div>
<script>
$(document).ready(function(){
        //Hide tables
    $("#table-detail").hide();

//Show tables
$("#btn-show-table").click(function(){
    if($("#table-detail").is(":hidden"))
    {
        $.get('/cashier/getTable', function(data){
            
            $("#table-detail").html(data);
            $("#table-detail").slideDown('fast');
            $("#btn-show-table").html('Hide Tables').removeClass('btn-primary').addClass('btn-warning');
        });
    }else{
        $("#table-detail").slideUp('fast');
        $("#btn-show-table").html('Show Tables').removeClass('btn-warning').addClass('btn-primary');

    }
});

    });
</script>
@endsection