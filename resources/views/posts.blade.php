@extends('layouts.app')

@section('content')



<div  class="mb-3 bg-light">
<a href="/posts/create"><button class="btn btn-dark"> Add post</button> </a>
</div>

<table class="table">

<th scope="col">id</th>
    <th scope="col">name</th>
    <th scope="col">tittle</th>
    <th scope="col">username</th>
    <th scope="col">view</th>
    <th scope="col">edit</th>
    <th scope="col">delete</th>
@foreach($posts as $post)

<tr>

<td>{{$post['id']}}</td>
<td>{{$post['name']}}</td>
<td>{{$post['tittle']}}</td>
<td>{{ $post->user->name }}</td>


<td><a href="/posts/{{$post['id']}}"> <button class="btn btn-warning">view</button></a></td>
<td><a href="/posts/{{$post['id']}}/edit"> <button class="btn btn-success">edit</button></a></td>

<td>
    <form action="/posts/{{$post['id']}}" method="post">
   @method('delete')
   @csrf
    <a href=""> <button type="submit" class="btn btn-danger">delete</button></a>

    </form>

</td>


</tr>

@endforeach



</table>

 <div class="pagination">
    {{ $posts->links() }}
</div> 
@endsection

















 
