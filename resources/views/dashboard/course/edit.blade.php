@extends('dashboard.master')
@section('content')

    <title>Edit Course - {{ $course->name }}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <body>
    <div class="container">
        <h1>Edit Course - {{ $course->name }}</h1>
        <form action="{{ route('courses.update', $course->id) }}"  method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $course->name }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" required>{{ $course->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" class="form-control" step="0.01" min="0" value="{{ $course->price }}" required>
            </div>
            <div class="form-group">
                <label for="started_at">Started_at</label>
                <input type="date" name="started_at" class="form-control"value="{{ $course->started_at }}" required>
            </div>
            <div class="form-group">
                <label for="ended_at">ended_at</label>
                <input type="date" name="ended_at" class="form-control" value="{{ $course->ended_at }}" required>
            </div>
            <div class="form-group">
                <label for="photo">Photo:</label>
                <input type="file" name="photo" id="photo" class="form-control-file">
                <div class="form-group">
                    <label>Status:</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="statusActive" value="1" @if($course->status) checked @endif>
                        <label class="form-check-label" for="statusActive">Active</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="statusInactive" value="0" @if(!$course->status) checked @endif>
                        <label class="form-check-label" for="statusInactive">Inactive</label>
                    </div>
            </div>
            <div class="form-group">
                <label for="category">Categories</label>
                <select name="category" class="form-control"  required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" @if($category->id==$course->category) selected @endif>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Courses</button>
            <a href="{{ route('courses.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
    </body>
@endsection


