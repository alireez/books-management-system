@section('title')
    create post
@endsection
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-body">
                <h5 class="card-title">
                    create a post
                </h5>
                <form method="POST" action="{{route('pages.store')}}">
{{--                    {{csrf_field()}} or @csrf--}}
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" placeholder="Enter name" name="name" id="name"
                               value="{{old('name')}}">
                    </div>

                    <div class="form-group">
                        <label for="pages">pages:</label>
                        <input type="number" class="form-control" placeholder="Enter pages" name="pages" id="pages"
                               value="{{old('pages')}}">
                    </div>

                    <div class="form-group">
                        <label for="ISBN">ISBN:</label>
                        <input type="text" class="form-control" placeholder="Enter ISBN" name="ISBN" id="ISBN"
                               value="{{old('ISBN')}}">
                    </div>

                    <div class="form-group">
                        <label for="price">price:</label>
                        <input type="number" class="form-control" placeholder="Enter price" name="price" id="price"
                               value="{{old('price')}}">
                    </div>

                    <div class="form-group">
                        <label for="category">Categories:</label>
                        <select name="category_id[]" id="category" class="form-control" multiple>
                        @foreach($categories as $category)
                                <option value="{{$category->id}}">
                                    {{$category->name}}
                                </option>
                            @endforeach
                        </select>

                    </div>

                    <div class="form-group">
                        <label for="date">published at:</label>
                        <input type="date" class="form-control" placeholder="Enter published at" name="published_at"
                               id="published_at" value="{{old('published_at')}}">
                    </div>

                    <div class="form-group">
                        <label for="status">status:</label>
                        <select name="status" id="status">
                            <option value="0">Enable</option>
                            <option value="1">Disable</option>
                        </select>
                    </div>
                    {{--print error--}}
                    @include('partial.massage')

                    <button type="submit" class="btn btn-success">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection

