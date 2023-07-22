@extends("layouts.app")

@section("content")
<table class="table">
    <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">name</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @if (isset($data))

        @foreach ($data as $item )
        <tr>
            <th scope="row">{{$item['id']}}</th>
            <td>{{$item['name']}}</td>
            <td class="float-right"><a href="/category/{{$item['id']}}" class="btn btn-secondary mt-3">Edit</a> <a href="/delete/{{$item['id']}}" class="btn btn-danger mt-3">Delete</a></td>
        </tr>

        @endforeach
        @endif
    </tbody>
  </table>



@endsection
