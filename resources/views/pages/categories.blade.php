@section('title')
    categories
@endsection
@extends('layouts.app')
@section('content')
    <div class="container">
        @foreach($categories as $category)
            <h1 class="display-6">
                <a href={{"/category/".$category->id}}>
                    {{$category->name}}
                </a>
            </h1>
        @endforeach
    </div>
@endsection

