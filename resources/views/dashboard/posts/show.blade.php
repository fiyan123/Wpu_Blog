@extends('dashboard.layouts.main')
@section('content')

<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">

            <h1 class="mb-3">{{ $post->title }}</h1>
            <a href="/dashboard/posts" class="btn btn-info">
                <span data-feather="arrow-left"></span> Back My All Post
            </a>
            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning">
                <span data-feather="edit"></span> Edit
            </a>
            <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('Are You Sure?')"><span data-feather="trash-2"></span> Delete</button>
            </form>

            @if($post->image)
                <div style="max-height: 350px; overflow:hidden">
                    <img src="{{ asset('storage/'.$post->image ) }}" alt="{{ $post->category->name }}" class="img-fluid mt-3">
                </div>
            @else
                <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid mt-3">
            @endif
            
            {{-- Escape Blade Laravel --}}
            <article class="my-3 fs-6">
                {!! $post->body !!}
            </article>
        </div>
    </div>
</div>
@endsection