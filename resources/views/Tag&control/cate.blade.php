@extends("layouts.app")

@section("content")
<form method="POST" action={{(isset($data['id'])? 'category/' . $data['id']:'category')}} enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Category</label>
      <input value="{{ old('name') }}" type="text" value="{{$data['name']??''}}" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="category name">
      @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>


@endsection
