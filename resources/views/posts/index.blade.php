@extends('layout')

@section('content')

<a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">
    Create Post
</a>

<table class="table">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Skill</th>
        <th>Department</th>
        <th width="250px">Action</th>
    </tr>

    @foreach ($posts as $post)
    <tr>
        <td>{{ $post->id }}</td>
        <td>{{ $post->title }}</td>
        <td>{{ $post->skill }}</td>
        <td>{{ $post->department }}</td>
        <td>
            <a class="btn btn-warning" href="{{ route('posts.edit',$post->id) }}">
                Edit
            </a>

            <form action="{{ route('posts.destroy',$post->id) }}"
                  method="POST"
                  style="display:inline">

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">
                    Delete
                </button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

@endsection
