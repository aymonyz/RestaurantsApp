<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- أضف روابط CSS الخاصة بك هنا -->
</head>
<body>
    <div id="app">
        @include('layouts.head') <!-- افترضنا وجود شريط التنقل -->
        <main class="py-4">
            @yield('content') <!-- هنا سيتم إدراج محتوى الواجهات الفرعية -->
        </main>
    </div>
    <!-- أضف السكربتات الخاصة بك هنا -->
</body>
</html>
