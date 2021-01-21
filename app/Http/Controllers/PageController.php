<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use App\Comment;
use App\Http\Requests\StoreBlogPostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    //show(pages id show \pages\{id}) & index(show all pages here \pages)
    public function index()
    {
        $posts = Book::with(['user', 'categories'])->get();
        $comments = Comment::all();
        //dd($pages->toArray());
        return view('pages.index', compact(['posts']));
    }

    public function categories()
    {
        $categories = Category::all();
        return view('pages.categories', compact('categories'));
    }

    public function ShowCategories()
    {

    }

    public function show($id)
    {
        $book = Book::with('categories', 'comments')->find($id);
        // $comments = Comment::all();
//        foreach ($book->categories as $category){
//            dump($category->toArray());
//    }
//        dd();
//        dd($book->toArray());
        //, 'comments'
        return view('pages.show', compact(['book']));
    }

    public function create()
    {
        $categories = Category::all();
        return view('pages.create', compact('categories'));
    }

    public function category()
    {
        $categories = Category::all();
        return view('pages.category', compact('categories'));
    }

//    public function store(StoreBlogPostRequest $request)
//    {
//        $validated = $request->validated();
//    }

    public function store(Request $request)
    {
//        dd($request->all());
        $request->validate([
            'name' => 'required',
            'pages' => 'required|numeric',
            'price' => 'required|numeric',
            'ISBN' => 'required',
            'status' => 'required'
        ]);
//        dd($request->toArray());

        $book = Auth::user()->books()->create($request->except('_token'));
        $book->categories()->attach($request->get('category_id'));
        $book->status = $request->input('status');
        $book->update();
        return redirect('/');
//        $ebook = Book::create($request->except('_token'));
//        dd($ebook->toArray());
    }

    public function StoreCategories(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $category = Category::create($request->except('token'));
        return redirect(route('category'));
    }

    public function StoreComment(Request $request)
    {
        $validData = $request->validate([
            'commentable_id' => 'required',
            'commentable_type' => 'required',
            'parent_id' => 'required',
            'comment' => 'required'
        ]);
        auth()->user()->comments()->create($validData);
        return back();
    }

    public function edit($id)
    {
        $book = Book::find($id);
        // dd($book->toArray());
        $categories = Category::all();
        return view('pages.edit', compact('book', 'categories'));
    }

    public function EditCategory($id)
    {
        $category = Category::find($id);
        return view('pages.categoryEdit', compact(['category']));
    }

    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        $book->status = $request->input('status');
        $book->update($request->only('name', 'pages', 'price', 'ISBN', 'status'));
        $book->categories()->sync($request->get('category_id'));
        return redirect('/');
    }

    public function UpdateCategory($id, Request $request)
    {
        $category = Category::find($id);
        $category->update($request->all());
        // dd($category->toArray());
        return redirect(route('pages'));
    }
}
