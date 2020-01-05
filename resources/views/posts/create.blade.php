@extends('/layouts/app')

@section('content')


<div class='container mt-5'>

<form method='post' action='/posts'>
@csrf
  <div class="form-group">
    <label for="exampleFormControlInput1" class='font-weight-bold'>Title</label>
    <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Your title here">
  </div>

  <div class="form-group">
  <label for="exampleFormControlInput2" class='font-weight-bold'>Description</label>
  <input class="form-control" name="description" aria-label="With textarea" ></input>
</div>

<!-- <div class="form-group">
    <label for="exampleFormControlInput1" class='font-weight-bold'>Post Creator</label>
    <input type="text"  class="form-control" id="exampleFormControlInput1" >
  </div> -->

  <button type="submit" class="btn btn-success">Create</button>

  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

</form>

  </div>

@endsection
