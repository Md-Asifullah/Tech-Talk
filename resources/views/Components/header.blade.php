<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tech Talk Forum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/style.css">
</head>
@if (isset($class))

    <body class="{{ $class }}">
    @else

        <body>
@endif

@php
    $categories = App\Models\Category::withCount('posts')
        ->orderBy('posts_count', 'desc')
        ->get()->take(6);
@endphp
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <span class="navbar-brand  mb-0 h1 text-primary" href="#">Tech Talk <i class="bi bi-soundwave"></i></span>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Categories
                    </a>
                    <ul class="dropdown-menu">
                        @foreach ($categories as $category)
                            <li><a class="dropdown-item" href="/category/{{ $category->id }}">{{ $category->name }}</a>
                            </li>
                        @endforeach
                        @if (Auth::check())
                            @can('create category')
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="/categories/create">Create Category</a></li>
                                <li><a class="dropdown-item" href="/categories/manage">Manage Categories</a></li>
                            @endcan
                        @endif

                    </ul>
                </li>
                @if (Auth::check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Posts
                        </a>
                        <ul class="dropdown-menu">

                            <li><a class="dropdown-item" href="/posts/create">Create Post</a></li>
                            <li><a class="dropdown-item" href="/posts/manage">Manage Posts</a></li>
                        </ul>

                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('members') }}">Members</a>
                </li>
            </ul>
            @auth

                <div class="me-4 small">Welcome <span class="text-success"
                        style="font-weight: 500">{{ auth()->user()->first_name }}
                        {{ auth()->user()->last_name }},</span>
                </div>
                <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover small me-3"
                    href="{{ route('users.profile') }}">Profile</a>
                <form action="{{ route('users.logout') }}" method="POST">
                    @csrf
                    <button
                        class="btn btn-link link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover small"
                        style="font-size:0.9em">Logout</button>
                </form>
            @else
                <div class="d-flex" role="search">
                    <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover me-3 small"
                        href="/register">Register</a>
                    <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover me-3 small"
                        href="/login">Login</a>
                </div>
            @endauth
        </div>
    </div>
</nav>
