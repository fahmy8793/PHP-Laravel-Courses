@extends('dashboard.master')
@section('content')

{{--    </head>--}}
{{--<body>--}}
<div class="container form-container">
    <h1>Edit Category</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" required>
        </div>
        <div class="form-group">
            <label for="created_at">created_at:</label>
            <input type="date" name="created_at" id="created_at" class="form-control">{{ $category->created_at }}
        </div>
        <div class="form-group">
            <label for="photo">Photo:</label>
            <input type="file" name="photo" id="photo" class="form-control-file">
        </div>
        <div class="form-group">
            <label>Status:</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" id="statusActive" value="1" @if($category->status) checked @endif>
                <label class="form-check-label" for="statusActive">Active</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" id="statusInactive" value="0" @if(!$category->status) checked @endif>
                <label class="form-check-label" for="statusInactive">Inactive</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

    <a href="{{ route('category.index') }}" class="btn btn-secondary mt-2">Back to Categories</a>
</div>
{{--</body>--}}
{{--</html>--}}

@endsection


