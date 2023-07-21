@extends('layouts.app')

@section('content')

{!!$msg??''!!}
<div class="container">


    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">{{ __('Blog') }} <a class="btn btn-text float-end mr-3 ml-3 " href="/article/create">Create Article</a>
                    <a class="btn btn-text float-end mr-3 " href="/tags">Create Tag</a>
<a class="btn btn-text float-end mr-3 " href="/category">Create Category</a>
                </div>


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        @if (isset($data))


                    @foreach ($data as $item )

                        <div class="row">
                    <div class="card col-12 w-100 mb-3 mt-3" style="width: 18rem;" >
                        <img class="card-img-top" src="..." alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title">{{$item['title']}}</h5>
                          <p class="card-text">{{$item['description']}}</p>
                          <p class="card-text">category : {{$item['category']}} </p>
                          <p class="card-text">Tag : {{$item['tag']}} </p>
                          <a href="/article/create/{{$item['id']}}" class="btn btn-secondary">Edit</a>
                          <a href="/article/delete/{{$item['id']}}" class="btn btn-danger">Delete</a>
                        </div>
                      </div>
                    </div>

                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
