@section('title')
    create post
@endsection
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-body">
                <h5 class="card-title">
                    edit a category
                </h5>
                <form method="POST" action="{{route('update.category' ,$category->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" placeholder="Enter name" name="name" id="name"
                               value="{{$category->name}}">
                    </div>

                    {{--print error--}}
                    @include('partial.massage')

                    <button type="submit" class="btn btn-success">update</button>
                </form>
            </div>
        </div>
    </div>
@endsection

