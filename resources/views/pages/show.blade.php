@section('title')
    {{$book -> name}}
@endsection
@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>
            Book name: <br>

        </h1>
        <h3>
            {{$book -> name}}
        </h3>
        <p>
            Book price:
            {{$book ->price}}
        </p>

        <p>
            Book pages:
            {{$book ->pages}}
        </p>
        <p>
            Book ISBN:
            {{$book ->ISBN}}
        </p>
        <p>
            Book publish date:
            {{$book ->published_at}}
        </p>
        <p>
            owner: {{$book->user->name}}
        </p>
        category:
        @foreach($book->categories as $category)
            <em>
                {{$category->name.','}}
            </em>
        @endforeach
        <p>
            <br>
            comments:
        <hr>
        <br>
        @foreach($book->comments as $comment)
            {{ $comment->user->name .' : ' }}
            {{$comment->comment}}
            <hr>
            <br>
            @endforeach
            </p>
            @auth

            <form method="POST" action="{{route('comment.store' ,$book->id)}}">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="commentable_id" value="{{ $book->id }}" >
                    <input type="hidden" name="commentable_type" value="{{ get_class($book) }}">
                    <input type="hidden" name="parent_id" value="0">
                    <div class="form-group">
                        <label for="comment">Comment:</label>
                        <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">send</button>
            </form>
            @endauth

    </div>
@endsection

