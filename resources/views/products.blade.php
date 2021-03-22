@extends('layouts.app')

@section('content')
<!-- ///toast -->
@if(session('add'))
<script>
setTimeout(() => {
  M.toast({html: 'Product added!', classes: 'rounded'});
}, 1000);
</script>
@endif

@if(session('inBasket'))
<script>
setTimeout(() => {
  M.toast({html: 'Added to basket!', classes: 'rounded'});
}, 1000);
</script>
@endif


<h3 style="margin-top:-50px;">Products</h3>
<div class='d-flex align-items-start row-flex flex-wrap space-between' style="flex-flow: row wrap;justify-content: space-around;">



@foreach($data as $item)
<div class="col-md-5  text-wrap  col-sm-6 col-xl-3" style="word-wrap: break-word;">
        <div class="card  mb-4 box-shadow h-md-250" style="word-wrap: break-word;">
            <div class="card-body d-flex flex-column align-items-start">
              <h3 class="mb-0" >
                <h3 class="text-dark m-0 " href="#" style="word-wrap: break-word;">{{$item->title}}</h3>
              </h3>
              <div class="mb-1 text-muted " style="word-wrap: break-word;">Price:{{ $item->price }}</div>
              <p style="font-size:13px;overflow:hidden;overflow-wrap: break-word;word-wrap: break-word;" class="flow-text text-wrap card-text  mb-auto" style="word-wrap: break-word;">
Description:<br>
{{ $item->body }}
</p>
            </div>
            <div class="jumbotron position-relative center">
            <img  style="box-sizing:border-box;width:100%;" class=" card-img-right flex-auto d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [200x250]" style="width: 200px; height: 250px;"  src="{{ asset('/storage/'.$item->path) }}" data-holder-rendered="true">
          
            <a href="/product/{{$item->id}}/basket" class="pulse btn-floating btn-large waves-effect waves-light red" style="margin-top:-50px;"><i class="material-icons pulse">add</i></a>
           
            </div>
  
            <a href="/product/{{$item->id}}"><button class="btn btn-dark">Further</button></a>
        </div>

</div>

@endforeach
</div>

@endsection


