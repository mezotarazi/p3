<!DOCTYPE html>
<html>
<head>
    <title>
        @yield('title','BMI Calcualtor')
    </title>
    <meta charset='utf-8'>
</head>
<body>

<header>

    <img
            src='/img/images.jpg'
            style="width: 300px;"
            alt='BMI Logo'>
    @yield('header')
</header>

<section>
    @yield('content')
</section>

<footer>
    @yield('footer')
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

</body>
</html>