@extends('dashboard.master')
@section('content')

    <title>Add New Course</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <body>
    <div class="container">
        <h1>Add New Course</h1>
        <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" class="form-control" step="0.01" min="0" required>
            </div>
            <div class="form-group">
                <label for="started_at">Started_at</label>
                <input type="date" name="started_at" class="form-control" >
            </div>
            <div class="form-group">
                <label for="ended_at">ended_at</label>
                <input type="date" name="ended_at" class="form-control" >
            </div>
            <div class="form-group">
                <label for="youtubelink">youtubelink</label>
                <input type="video/mp4" name="youtubelink" class="form-control" >
{{--                <video controls>--}}
{{--                    <source src="{{ route('courses.show', ['youtubelink' => 'your_video.mp4']) }}" type="video/mp4">--}}
{{--                    Your browser does not support the video tag.--}}
{{--                </video>--}}

            </div>
            <div class="form-group">
                <div class="form-group">
                    <label for="status">status</label>
                    <select name="status" class="form-control"  >
                        <option value="1" selected>Active</option>
                        <option value="0">Inactive</option>

                    </select>
                </div>
                <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="file" name="photo" id="photo" class="form-control-file">
                </div>
                <div class="form-group">
                    <label for="category">Categories</label>
                    <select name="category" class="form-control"  >
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('courses.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection


