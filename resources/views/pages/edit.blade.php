@section('title')
    create
@endsection
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-body">
                <h5 class="card-title">
                    create a book
                </h5>
                <form method="POST" action="{{route('update.book' ,$book->id)}}">
{{--                    {{csrf_field()}} or @csrf--}}
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" placeholder="Enter name" name="name" id="name"
                               value="{{$book->name}}">
                    </div>

                    <div class="form-group">
                        <label for="pages">pages:</label>
                        <input type="number" class="form-control" placeholder="Enter pages" name="pages" id="pages"
                               value="{{$book->pages}}">
                    </div>

                    <div class="form-group">
                        <label for="ISBN">ISBN:</label>
                        <input type="text" class="form-control" placeholder="Enter ISBN" name="ISBN" id="ISBN"
                               value="{{$book->ISBN}}">
                    </div>

                    <div class="form-group">
                        <label for="price">price:</label>
                        <input type="number" class="form-control" placeholder="Enter price" name="price" id="price"
                               value="{{$book->price}}">
                    </div>

                    <div class="form-group">
                        <label for="category">Categories:</label>
                        <select name="category_id[]" id="category" class="form-control" multiple>
                        @foreach($categories as $category)
                                <option value="{{$category->id}}"
                                {{$book->categories->contains('id' ,$category->id) ? 'selected' : ''}}>
                                    {{$category->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="price">published at:</label>
                        <input type="date" class="form-control" placeholder="Enter published at" name="published_at"
                               id="published_at" value="{{$book->published_at}}">
                    </div>

                    <div class="form-group">
                        <label for="status">status:</label>

{{--                        <input type="radio" id="status" name="status" value="0">--}}
{{--                        <label for="male">Enable</label><br>--}}
{{--                        <input type="radio" id="status" name="status" value="1">--}}
{{--                        <label for="female">Disable</label><br>--}}

                        <select name="status" id="status" class="form-control">
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

