@extends('layouts.app')

@section('content')

@if ($errors->any())
<div class="card-panel">
        <ul>
            @foreach ($errors->all() as $error)
            <span class="blue-text text-darken-2">{{ $error }}</span>
            @endforeach
        </ul>
    </div>
@endif


 <div style="width:70%;" class="row">
    <form method="POST" action="{{ url('/add/product') }}" class="col s12" enctype="multipart/form-data">
    @csrf
      <div class="row">
        <div class="input-field col s6">
          <input name="title" id="first_name" type="text" class="validate">
          <label for="first_name">Title</label>
        </div>
        <div class="input-field col s6">
          <input name="price" id="last_name" type="text" class="validate">
          <label for="last_name">Price</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <input name="body" id="password" type="text" class="validate">
          <label for="password">Body</label>
        </div>
      </div>



                  
      <div class="file-field input-field">
      <div class="btn">
        <span>IMG</span>
        <input name="img" type="file">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>

  <button class="btn waves-effect waves-light" type="submit">Send</button>
    </form>
  </div>
 
@endsection