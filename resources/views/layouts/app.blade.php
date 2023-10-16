<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset"UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>In Class example</title>
    <link rel="stylesheet" href"{{ asset('css/styles.css')}}">

</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="{{ route('toys.index') }}">Home</a></li>
                <li> <a href="{{ route('toys.create') }}">Create a New Toy</a> </li>
            </ul>
        </nav>
    </header>

    <main> 
        @yield('content')
</main>
<footer>