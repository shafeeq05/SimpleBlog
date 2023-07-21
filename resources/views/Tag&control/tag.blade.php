@extends("layouts.app")

@section("content")
<form method="POST" action={{(isset($data['id'])? 'tag/' . $data['id']:'tag')}} enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Tag</label>
      <input value="{{ old('name') }}" type="text" value="{{$data['name']??''}}" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="tag name">
      @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>


@endsection
