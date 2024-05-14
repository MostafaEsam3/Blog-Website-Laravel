<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<div class="container  col-5 mt-5">

<form action='/posts/{{$editPost['id']}}' method='post'>

@method('put')
@csrf


<div class="mb-3 w-75">

  <label for="formGroupExampleInput" class="form-label">Name</label>
  <input name="name" value="{{$editPost['name']}}" type="text" class="form-control border-danger" id="formGroupExampleInput ">
</div>
<div class="mb-3 w-75 ">
  <label for="formGroupExampleInput2" class="form-label" > ADD Tittle </label>
  <input  name="tittle" value="{{$editPost['tittle']}}" type="text" class="form-control border-danger" id="formGroupExampleInput2">
</div>

<div class="mb-3 w-75 ">
  <label for="formGroupExampleInput2" class="form-label" >post id </label>
  <input   type="text" class="form-control border-danger" id="formGroupExampleInput2" >
</div>
<div class="mb-3">
  <button type="submit" class="btn btn-warning">Submit</button>
</div>
</form>
</div>


<div class="bg-dark">
@if($errors->any())
@foreach($errors->all() as $error)
<p class="text-white">
{{$error}}
</p>
@endforeach

@endif
</div>