@extends("layouts.app")

@section("content")

{{isset($data['article']['category'])?$data['article']['category']:'hjsdgfjh'}}
<form method="POST" action={{(isset($data['article']['id'])? 'store/' . $data['article']['id']:'create/store')}} enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Article Title</label>
      <input value="{{ old('title') }}" type="text" value="{{$data['article']['title']??''}}" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="title">
      @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Description</label>
      <textarea  class="form-control" value="{{$data['article']['description']??''}}" name="description" id="exampleInputPassword1" placeholder="Description" ></textarea>
      @error('description')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror
    </div>
    <div class="form-group">
        <label for="category">Select category</label>
        <select name="category">
            <option selected disabled value="">select category</option>
            @if (isset($data['cat']))
            @foreach ($data["cat"] as $item )
            <option value={{$item['name']}} {{isset($data['article']['category'])&&$item['name']==$data['article']['category']?'selected':''}}>{{$item['name']}}</option>


            @endforeach
            @endif
        </select>
      </div>
      <div class="form-group">
        <label for="Tag">Select Tag</label>
        <select name="tag" class="">
            <option selected disabled> select tag</option>
            @if (isset($data['tag']))
            @foreach ($data["tag"] as $item)
            <option  value={{$item['name']}} {{ (isset($data['article']['tag']) && $item['name'] == $data['article']['tag']) ? 'selected' : '' }}> {{$item['name']}}</option>
            @endforeach
            @endif
        </select>
      </div>
      <div class="form-group">
        <input type="file" name="image" id="image">
      </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection
