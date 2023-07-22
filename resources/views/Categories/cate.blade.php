@extends("layouts.app")


@section("content")

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
{{-- {{$data['category']['id']}} --}}
<form method="POST" action={{(isset($data['category']['id'])? '/category/' . $data['category']['id']:'category')}} enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">{{$data['entry']}} Category</label>
      <input  type="text" value="{{$data['category']['name']??''}}" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="category name">
      @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>

    <button type="submit" class="btn btn-primary">{{$data['entry']}} Category</button>
  </form>
  <a href="/allcategory" class="btn btn-primary mt-3">Show category</a>
  <br>
  <a href="/home" class="btn btn-text mt-3">Home</a>




@endsection
