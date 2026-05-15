@extends('layout')

@section('content')

<form action="{{ route('posts.update',$post->id) }}"
      method="POST">

    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Title</label>

        <input type="text"
               name="title"
               value="{{ $post->title }}"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Skill</label>

        <input type="text"
               name="title"
               value="{{ $post->skill }}"
               class="form-control">
    </div>


    <div class="mb-3">
        <label>Department</label>

        <input type="text"
               name="title"
               value="{{ $post->department }}"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Content</label>

        <textarea name="content"
                  class="form-control">{{ $post->content }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">
        Update
    </button>

</form>

@endsection
