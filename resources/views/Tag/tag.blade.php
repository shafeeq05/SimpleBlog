@extends("layouts.app")

@section("content")

{{-- {{$data['edit']}} --}}
<form method="POST" action={{(isset($data['tag']['id'])? '/tags/' . $data['tag']['id']:'tags')}} enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1"><h3>{{$data['entry']}} Tag</h3></label>
      <input  type="text" value="{{$data['tag']['name']??''}}" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="tag name">
      @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>

    <button type="submit" class="btn btn-primary">{{$data['entry']}} Tag</button>
  </form>

  <a href="/alltags" class="btn btn-primary mt-3">Show tags</a>
  {{-- <div class="contant">
    @yield('alltag')
  </div> --}}


@endsection
