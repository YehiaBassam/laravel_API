@extends('/layouts/app')

@section('content')

    
<div class='container mt-5'>

<form method='post' action='/posts/{{$postdata->id}}'>
{{method_field('PUT')}}
@csrf
  <div class="form-group">
    <label for="exampleFormControlInput1" class='font-weight-bold'>Title</label>
    <input type="text" class="form-control" name="title" value="{{$postdata->title}}" id="exampleFormControlInput1" placeholder="Your title here">
  </div>

  <div class="form-group">
  <label for="exampleFormControlInput2" class='font-weight-bold'>Description</label>
  <textarea class="form-control" name="description" aria-label="With textarea" rows="8">{{$postdata->description}}</textarea>
</div>

<!-- <div class="form-group">
    <label for="exampleFormControlInput1" class='font-weight-bold'>Post Creator</label>
    <input type="text" class="form-control" name="creator" value="{{$postdata->creator}}" id="exampleFormControlInput1" >
  </div> -->

  <button type="submit" class="btn btn-primary mb-3">Edit</button>

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

