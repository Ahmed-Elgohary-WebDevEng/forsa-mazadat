<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8"/>
    <meta
        name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
    />
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <meta
        name="description"
        content="منصه فرص تحقيقاً لرؤية 2030 م أُنشئت منصة فُرص لنوفر لك كل المنصات الإلكترونية بين يديك تحت سقف واحد "
    />
    <link rel="icon" href="{{asset('img/logo.png')}}">
    <!--  Bootstrap cdn style  -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous"
    />
    <!--  Bootstrap cdn style (Arabic)  -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-nU14brUcp6StFntEOOEBvcJm4huWjB0OcIeQ3fltAfSmuZFrkAif0T+UtNGlKKQv"
        crossorigin="anonymous"
    />
    <!--  Google Font  -->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link
        href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet"
    />
    <!--  Boxi Icon (CSS)  -->
    <link
        href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
        rel="stylesheet"
    />
    @yield('styles')


    <title>منصة فرص | @yield('title')</title>
</head>
<body style="background: var(--primary-gray)">
<div id="app">
    <!--  Navbar -- Sidebar (Start)  -->
    @include('layouts.includes.nav-sidebar')
    <!--  Navbar -- Sidebar (End)  -->

    <main id="content" style="position: relative">
        <!--    Company Banner (Start)    -->
        <x-new-design.company-banner :agents="$agents"></x-new-design.company-banner>
        <!--    Company Banner (End)    -->
        <section
            id="header"
            class="mt-5"
            style="position: relative; z-index: 20"
        >

            <!--   Content   -->
            @yield('content')
            <!--   End Content   -->

            <!--   Footer   -->
            @include('layouts.includes.footer')
        </section>
    </main>

</div>
<!-- Bootstrap Script CDN -->
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"
></script>
</body>
</html>
