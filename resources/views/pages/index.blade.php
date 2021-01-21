@section('title')
    all books
@endsection
@extends('layouts.app')
@section('content')
    <div class="container">
        @foreach($posts as $post)
            {{--   show enable post  --}}
{{--        0 is enable     --}}
            @if($post->status =='0')
                <h1 class="display-4">
                    <a href={{"/blog/".$post->id}}>
                        {{$post->name}}

                    </a>

                </h1>
                <p>creator: {{$post->user->name}}</p>

                category:
                @foreach($post->categories as $category)
                    <em>
                        {{$category->name.','}}
                    </em>

                @endforeach
                <a href={{"/blog/edit/".$post->id}}>
                    <button type="button" class="btn btn-warning">edit</button>
                </a>
                <hr>
            @endif
        @endforeach
    </div>

    {{--   show disable post  --}}
    <center>
    <p class="bg-danger text-white">disable post show here</p></center>
    <div class="container">
        @foreach($posts as $post)
            @if($post->status =='1')
                <h1 class="display-4">
                    <a href={{"/blog/".$post->id}}>
                        {{$post->name}}

                    </a>

                </h1>
                <p>creator: {{$post->user->name}}</p>

                category:
                @foreach($post->categories as $category)
                    <em>
                        {{$category->name.','}}
                    </em>

                @endforeach
                <a href={{"/blog/edit/".$post->id}}>
                    <button type="button" class="btn btn-warning">edit</button>
                </a>
                <hr>
            @endif
        @endforeach
    </div>
@endsection

