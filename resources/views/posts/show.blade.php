@extends('/layouts/app')

@section('content')

    <div class='container'>
    

<div class="card bg-light mb-3 mt-5 w-75">
  <div class="card-header">Post info</div>
  <div class="card-body">
  <h5 class="card-title">Title : </h5>
    <p class="card-text">{{$postdata->title}}</p>
    <h5 class="card-title">Description : </h5>
    <p class="card-text">{{$postdata->description}}</p>
  </div>
</div>


<div class="card bg-light mb-3 mt-5 w-75">
  <div class="card-header">Post Creator info</div>
  <div class="card-body">
  <h5 class="card-title">Name : </h5>
  
    <p class="card-text">{{$postdata->user->name}}</p>
    <h5 class="card-title">Email : </h5>
    <p class="card-text">{{$postdata->user->email}}</p>
    <h5 class="card-title">Created At : </h5>
    <p class="card-text">{{$postdata->user->created_at}}</p>
  </div>
</div>

@endsection
