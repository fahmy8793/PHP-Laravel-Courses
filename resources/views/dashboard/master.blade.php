<!DOCTYPE html>
<html lang="en">
<head>
    @include('dashboard.layouts.header')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    @include('dashboard.layouts.navbar')
    @include('dashboard.layouts.sidebar')
    <div class="content-wrapper">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    @yield('content')
    </div>


    @include('dashboard.layouts.footer')

</div>
@include('dashboard.layouts.javascript')
</body>
</html>
