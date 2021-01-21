@section('title')
    create post
@endsection
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-body">
                <h5 class="card-title">
                    create a category
                </h5>
                <form method="POST" action="{{route('category.store')}}">
{{--                    {{csrf_field()}} or @csrf--}}
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" placeholder="Enter name" name="name" id="name"
                               value="{{old('name')}}">
                    </div>

                    {{--print error--}}
                    @include('partial.massage')

                    <button type="submit" class="btn btn-success">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection

