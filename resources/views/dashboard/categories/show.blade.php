@extends('dashboard.layouts.main')

@section('container')

<div class="container">
  <div class="row my-3">
    <div class="col-lg-8">
    <h1 class="mb-3">{{ $categories->id }}</h1>
    
    <a href="/dashboard/categories" class="btn btn-success"><span data-feather="arrow-left" class="align-text-bottom"></span> Back to all my posts</a>
    <a href="/dashboard/categories/{{ $categories->slug }}/edit" class="btn btn-warning"><span data-feather="edit" class="align-text-bottom"></span> Edit</a>
    <form action="/dashboard/categories/{{ $categories->slug }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><span data-feather="x-circle" class="align-text-bottom"></span> Delete</button>
                </form>

    <article class="my-3 fs-5" >
    {!! $categories->body !!}
    </article> 

  
    </div>
  </div>
</div>

@endsection