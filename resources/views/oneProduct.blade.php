
@extends('layouts.app')

@section('content')


<div style="" class="col-md-10 col-sm-10 col-xl-10 ml-sm-5 ml-sm-0 ml-md-5 ml-xl-5">
        <div class="card  mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <h3 class="mb-0">
                <h3 class="text-dark m-0" href="#">{{$data->title}}</h3>
              </h3>
              <div class="mb-1 text-muted">Price:{{ $data->price }}</div>
              <p style="overflow:hidden;min-height:100px;" class="card-text mb-auto">
Description:<br>
{{ $data->body }}
</p>

            </div>
            <div class="jumbotron position-relative center">
            <img  style="box-sizing:border-box;width:100%;" class=" card-img-right flex-auto d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [200x250]" style="width: 200px; height: 250px;"  src="{{ asset('/storage/'.$data->path) }}" data-holder-rendered="true">
            </div>

        </div>

</div>

<!-- ///toast -->
@if(session('add'))
<script>
setTimeout(() => {
  M.toast({html: 'Coment added!', classes: 'rounded'});
}, 1000);
</script>
@endif

<button style="color:#fff;background:#555;" class="btn pulse"><i class="material-icons large">forum</i></button>

@foreach($coments as $coment)
<div class="card container m-0 mb-4" style="">
  <div class="card-body">
    <h5 class="card-title">{{ $coment->title }}</h5>
    <h6 class="card-subtitle mb-2 text-muted">{{ $coment->userName }} | {{ $coment->userEmail }}</h6>
    <p class="card-text">{{ $coment->body}}.</p>
    <p href="#" class="card-link">date created:{{ $coment->created_at }}</p>
  </div>
</div>
@endforeach


@if ($errors->any())
<div class="card-panel container" style="margin-left:50px;">
        <ul>
            @foreach ($errors->all() as $error)
            <span class="red-text text-darken-2">{{ $error }}</span>
            @endforeach
        </ul>
    </div>
@endif

<div class="row container" >
      <form action="/product/{{ $data->id }}/add" method="get" class="col s5">
      @csrf
        <div class="row">
          <div class="input-field col s3">
            <input name="title" id="input_text" type="text" data-length="3">
            <label for="input_text">Title</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s5">
            <textarea name="body" id="textarea2" class="materialize-textarea" data-length="10"></textarea>
            <label for="textarea2">Description</label>
          </div>
        </div>
        <button class="btn waves-effect waves-light" type="submit">Add coment
    <i class="material-icons right">send</i>
  </button>
      </form>
    </div>



@endsection