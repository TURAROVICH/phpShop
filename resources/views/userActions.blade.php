@extends('layouts.app')

@section('content')
@if(session('deleted'))
<script>
setTimeout(() => {
  M.toast({html: 'Product deleted!', classes: 'rounded'});
}, 1000);
</script>
@endif

@if(session('inbasketDelete'))
<script>
setTimeout(() => {
  M.toast({html: 'Product deleted in basket!', classes: 'rounded'});
}, 1000);
</script>
@endif



<div class="container center border-bottom">
<h4>name:{{ Auth::user()->name }}</h4>
<div class="alert alert-default">
<h5>email:{{ Auth::user()->email }}</h5>
<p>created date:{{ Auth::user()->created_at }}</p>
</div>
</div>

<div class="d-flex">
<i class="medium material-icons">add_shopping_cart
</i><h4>in basket {{ $num }} product<i style="padding-top:0px;" class="medium material-icons ">keyboard_arrow_down</i></h4>
</div>

<div class='d-flex align-items-start row-flex flex-wrap' style="flex-flow: row wrap;">
@foreach($basket as $item)
<div style="word-wrap: break-word;" class="col-md-4 center col-sm-6 col-xl-3">
        <div class="card  mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <h3 class="mb-0">
                <h3 class="text-dark " href="#">{{$item->title}}</h3>
              </h3>
              <div class="mb-1 text-muted">Price:{{ $item->price }}</div>
              <p style="overflow:hidden;overflow-wrap: break-word;word-wrap: break-word;" class="card-text mb-auto">
Description:<br>
{{ $item->body }}
</p>
            </div>
            <div class="jumbotron position-relative center">
            <img  style="box-sizing:border-box;width:100%;" class=" card-img-right flex-auto d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [200x250]" style="width: 200px; height: 250px;"  src="{{ asset('/storage/'.$item->path) }}" data-holder-rendered="true">
          </div>
          <div class="d-flex position-realitive center">
            <a href="/product/{{$item->productId}}"><button class="btn btn-dark"><i class="material-icons">forum</i></button></a>
            <a href="/product/{{$item->id}}/delete"><button class="btn red"> <i class="material-icons">delete</i></button></a>
            </div>
            </div>

</div>

@endforeach
</div>







<h3 class = "border-top" style="margin-top:0px;">My actions</h3>
<div class='d-flex flex-wrap'>
@if($data==null)
<div style="margin-left:70%;widht:100%;box-sizing:border-box;" class="alert alert-info">
You have not act!
<button class="btn"><a style="text-decoration:none;" class="white-text" href="/add">Add actions</a></button>
</div> 
@endif



<div class="d-flex flex-wrap center">
@foreach($data as $item)
<div style="" class="col-md-4 justify-content-around">
        <div class="card  mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
   
                <h3 class="text-dark m-0" href="#">{{$item->title}}</h3>
    
              <div class="mb-1 text-muted">Price:{{ $item->price }}</div>
              <p style="overflow:hidden;min-height:100px;" class="card-text mb-auto">
Description:<br>
{{ $item->body }}
</p>

            </div>
            <div class="jumbotron position-relative center">
            <img  style="box-sizing:border-box;width:100%;" class=" card-img-right flex-auto d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [200x250]" style="width: 200px; height: 250px;"  src="{{ asset('/storage/'.$item->path) }}" data-holder-rendered="true">
            </div>

             <div class="d-flex">
            <a href="/product/{{$item->id}}"><button class="btn btn-dark"><i class="material-icons">forum</i></button></a>
            <form method='post' action="/delete/{{$item->id}}">
            @csrf
            <input style="display:none;" name="id" type="text" value="{{ $item->id }}">
        
            <button type='submit' class="btn btn-dark red darken-1">delete</button>
            </form>
            </div>

        </div>

</div>
@endforeach
</div>
</div>
@endsection
