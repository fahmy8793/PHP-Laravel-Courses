@extends('dashboard.master')
@section('content')
    <title>Courses List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <body>
    <div class="container">
        <h1>Courses List</h1>
        <a href="{{ route('courses.create') }}" class="btn btn-primary mb-3">Add New course</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-hover ">
            <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Started_at</th>
                <th>ended_at</th>
                <th>youtubelink</th>
                <th>Categories_ID</th>
                <th>Photo
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($courses as $course)
                <tr>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->description }}</td>
                    <td>{{ $course->price }}</td>
                    <td>{{ $course->started_at }}</td>
                    <td>{{ $course->ended_at }}</td>
                    <td>{{ $course->youtubelink }}</td>
                    <td>{{ $course->category }}</td>
                    <td>
                        @if($course->photo)
                            <img src="{{ asset('storage/' . $course->photo) }}" alt="{{ $course->name }}" alt="" style="width:100px; height:100px;">
                        @else
                            No photo available
                        @endif


                    </td>
                    <td>{{ $course->status ? 'Active' : 'Inactive' }}</td>
                    <td>
                        <div>

                        </div>
                        {{--                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">View</a>--}}
                        <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this Course?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
                                    <video width="640" height="360" controls>
                                        <source src="{{ asset('videos/sample.mp4') }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>

        {{--        {{ $products->links() }} <!-- Add this line to display pagination links -->--}}
    </div>
    </div>
    </body>
@endsection


