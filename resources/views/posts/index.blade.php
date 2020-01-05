@extends('/layouts/app')

@section('content')


<div class='d-flex justify-content-center align-items-center m-5'>
<a href="/posts/create"><button type="button" class="btn btn-success">Create Post</button></a>
</div>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Slug</th>
      <th scope="col">Posted by</th>
      <th scope="col">Created at</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  @foreach($myposts as $index => $value)  
    <tr>
      <th scope="row">{{$value['id']}}</th>
      <td>{{$value['title']}}</td>
      <td>{{$value['slug']}}</td>
      <td>{{$value['description']}}</td>
      <td>{{$value['created_at']}}</td>


      <td class="d-flex ">
      <a href="{{route('posts.show',['post' => $value['id']])}}" class="mx-2"><button type="button" class="btn btn-info">View Details</button></a>
      <a href="{{route('posts.edit',['post' => $value['id']])}}" class="mx-2"><button type="button" class="btn btn-warning">Edit</button></a>
      <form method="post" action="posts/{{$value['id']}}">
      {{method_field('DELETE')}}
      @csrf
      <button type="submit" class="btn btn-danger" onclick='return confirm("Do you Really Want to Delete ?!!")'>Delete</button>
      </form>
      </td>
    </tr>
    @endforeach

    
  </tbody>
</table>

<h4>{{$myposts->links()}}</h4>
@endsection

