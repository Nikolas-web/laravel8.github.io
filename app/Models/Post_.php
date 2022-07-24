<?php

namespace App\Models;


class Post 
{
  private static $blog_posts=[
    [
       "title" => "judul post pertama",
       "slug" =>"judul-post-pertama",
       "author" => "monyet manjat ombak",
       "body"  => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
 tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
 quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
 consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
 cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
 proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
    ],
 
   [
    "title" => "tulisan ayam",
     "slug" =>"judul-post-kedua",
    "author" => "niko makan pisang",
    "body"  => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
 tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,

 quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
 consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse
 cillum dolore eu fugiat nulla pariatur.Excepteur sint occaecat cupidatat non
 proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
 tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam,
 quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo

 consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
 cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
 proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
   ],
 
 
 ];

public static function all()
{
    return collect(self::$blog_posts);
}

public static function find($slug)
{
    $posts = static::all();
   return $posts->firstWhere('slug',$slug);
}

}

Post::create([
  'title' => 'Judul Ke Tiga',
  'category_id' => 3,
  'slug' => 'judul-ke-tiga',
  'excerpt' => 'Dimas anjay Mabar Propesonal Sonal Slebew',
  'body' => '<p>hsywujhhqlygqwertyuioplkjhgfdsazxcvbnm</p><p>qwertyuiopkjhlgfdsazxcvbnmnbvcxzasdfghjklpoiuytrewq</p><p>qwertyuioplkjhgfdsazxcvbnmnbvcxzasdfghjklpoiuytrewqasdfghjklmnbvcxz</p>',
])


->name('login')->middleware('guest');



@extends('layouts.main')


  @section('container')

  <h1 class="mb-3 text-center">{{ $title }}</h1>

  <div class="row justify-content-center mb-3">
    <div class="col-md-6">
      <form action="/posts" >
        @if (request('category'))
        <input type="hidden" name="category" value="{{ request('category') }}">
        @endif
        @if (request('author'))
        <input type="hidden" name="author" value="{{ request('author') }}">
        @endif
      <div class="input-group mb-3">
      <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
      <button class="btn btn-danger" type="submit">Search</button>
      </div>
      </form>
    </div>
  </div>

  @if ($posts->count())

  <div class="card mb-3">
  <img src="https://source.unsplash.com/1100x300?{{ $posts[0]->category ->name }}" class="card-img-top" alt="{{ $posts[0]->category ->name }}">
  <div class="card-body text-center">
    <h3 class="card-title"><a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</a></h3>
    <p>
      <small class="text-muted">
      By. <a href="/posts?author={{ $posts[0]->author->username }}"
      class="text-decoration-none">{{ $posts[0] ->author->name }}</a> in <a href="/posts?category={{ $posts[0]->category->slug}}" class="text-decoration-none">{{ $posts[0]->category->name }}</a> {{ $posts[0]->created_at->diffForHumans() }}
    </small>
    </small>
    </p>
    <p class="card-text">{{ $posts[0]->excerpt }}</p>
    <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read more</a>
  </div>
</div>

  <div class="container">
    <div class="row">
      @foreach($posts->skip(1) as $post)
      <div class="col-md-4 mb-3">
      <div class="card">
        <div class="position-absolute bg-dark px-3 py-2 " style="background-color: rgba(0,0,0,0.7)"><a href="/posts?category={{ $post->category->slug}}" class="text-white text-decoration-none">{{ $post->category->name }}</a></div>
  <img src="https://source.unsplash.com/500x500?{{ $post->category ->name }}" class="card-img-top" alt="{{ $post->category ->name }}">
  <div class="card-body">
    <h5 class="card-title">{{ $post->title }}</h5>
    <p>
      <small class="text-muted">
      By. <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post ->author->name }}</a>{{ $post->created_at->diffForHumans() }}
    </small>
    </p>
    <p class="card-text">{{ $post->excerpt }}</p>
    <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read more</a>
  </div>
</div>
      </div>
      @endforeach
    </div>
  </div>
	@else
  <p class="text-center fs-4">No posts[0] found.</p>
  
  @endif
  <div class="d-flex justify-content-end">
  {{ $posts->links() }}
  </div>
@endsection

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <h1>Hello, world!</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>