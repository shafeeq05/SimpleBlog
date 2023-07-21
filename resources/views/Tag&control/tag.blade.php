@extends("layouts.app")

@section("content")

{{-- {{$data['name']}} --}}
<form method="POST" action={{(isset($data['id'])? '/tags/' . $data['id']:'tags')}} enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Tag</label>
      <input  type="text" value="{{$data['name']??''}}" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="tag name">
      @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

  <a href="/alltags" class="btn btn-primary mt-3">show tags</a>


@endsection
