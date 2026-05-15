@extends('layout')

@section('content')

<form action="{{ route('posts.store') }}" method="POST">

    @csrf

    <div class="mb-3">
        <label>Title</label>

        <input type="text"
               name="title"
               class="form-control">
        <label>Skill</label>
        <input type="text" name="skill" class="form-control"    >

        <label>Department</label>
        <input type="text" name="department" class="form-control"    >
    </div>

    <div class="mb-3">
        <label>Content</label>

        <textarea name="content"
                  class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-success">
        Save
    </button>

</form>

@endsection
