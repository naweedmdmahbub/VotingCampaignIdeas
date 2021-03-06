<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.header')

<body>
    <div class="container">
        <div>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="{{ route('users.index') }}">Users</a>
                    <a class="nav-item nav-link" href="{{ route('users.index') }}">Ideas</a>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Ideas in Groups</a>
                        <div class="dropdown-menu">
                            @foreach ($groups as $group)
                                <a class="dropdown-item" href="{{ route('ideas.group',$group->id) }}">{{$group->name}}</a>
                            @endforeach
                        </div>
                    </li>
                    <a class="nav-item nav-link" href="#">Pricing</a>
                    <a class="nav-item nav-link disabled" href="#">Disabled</a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="content-wrapper">
            @yield('content')
        </div>
    </div>
</body>
</html>
