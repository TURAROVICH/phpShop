@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    <div class="col s12">
      <div class="row">
      <form style="width:100%;" action="/main" method="POST">
      @csrf
        <div class="input-field col s12 d-flex">
        <i class="material-icons prefix s2">search</i>
          <input name="req" type="text" id="autocomplete-input" class="autocomplete s8">
          <label for="autocomplete-input">Product title</label>
          <button type="submit" class="btn s2 text-white">find</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>

@isset($error)

<div id="error" class="container alert alert-danger bg-danger text-white">
{{ $error }}
</div>
<script>
let error = document.getElementById('error');
setTimeout(() => {
    error.style.display="none"
}, 3000);
</script>
@endisset


@isset($data)
@foreach($data as $item)
<div style="word-wrap: break-word;" class="col-md-4 center col-sm-6 col-xl-3">
        <div class="card  mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <h3 class="mb-0">
                <h3 class="text-dark m-0" style="overflow:hidden;overflow-wrap: break-word;word-wrap: break-word;" href="#">{{$item->title}}</h3>
              </h3>
              <div class="mb-1 text-muted">Price:{{ $item->price }}</div>
              <p style="overflow:hidden;overflow-wrap: break-word;word-wrap: break-word;text-align:center;" class="card-text mb-auto">
Description:<br>
{{ $item->body }}
</p>
            </div>
            <div class="jumbotron position-relative center">
            <img  style="box-sizing:border-box;width:100%;" class=" card-img-right flex-auto d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [200x250]" style="width: 200px; height: 250px;"  src="{{ asset('/storage/'.$item->path) }}" data-holder-rendered="true">
            <a href="/product/{{$item->id}}/basket" class="pulse btn-floating btn-large waves-effect waves-light red" style="margin-top:-50px;"><i class="material-icons">add</i></a>
            </div>
            <a href="/product/{{$item->id}}"><button class="btn btn-dark">Further</button></a>
        </div>

</div>
@endforeach
@endisset
@endsection
