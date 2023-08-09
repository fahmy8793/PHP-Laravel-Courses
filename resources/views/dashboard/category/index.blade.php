@extends('dashboard.master')
@section('content')

{{--    </head>--}}
{{--<body>--}}
<div class="container">
    <h1>Categories</h1>
    <a href="{{ route('category.create') }}" class="btn btn-primary">Add Category</a>



    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif



    <table class="table table-bordered table-hover mt-4 category-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>created_at</th>

            <th>Photo</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->created_at }}</td>


                <td>
                    @if($category->photo)
                        <img src="{{ asset('storage/' . $category->photo) }}" alt="{{ $category->name }}" alt="" style="width:100px; height:100px;">
                    @else

                        No photo available
                    @endif

                </td>


                <td>{{ $category->status ? 'Active' : 'Inactive' }}</td>
                <td>
                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-info">Edit</a>
                    <form class="d-inline" action="{{ route('category.destroy', $category->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
</div>
{{--</body>--}}
{{--</html>--}}

@endsection


