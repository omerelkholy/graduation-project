<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Saree3 - Welcome</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#18181b] text-white flex items-center justify-center h-screen">
<div class="text-center">
    <!-- Logo -->
    <img src="{{ asset('images/logo.png') }}" alt="Saree3 Logo" class="mx-auto w-auto h-52">

    <!-- Slogan -->
    <h1 class="text-2xl font-semibold mt-4 text-[#10b981]">
        Slow Logo, Lightning Delivery!
    </h1>

    <!-- Buttons -->
    <div class="mt-6 flex flex-col sm:flex-row gap-4">
        <a href="{{ route('login') }}" class="px-6 py-2 inline-block text-center bg-[#10b981] text-white rounded-lg hover:bg-[#0e9e74] transition flex items-center justify-center w-40">
            Login
        </a>
        <a href="{{ route('register') }}" class="px-6 py-2 inline-block text-center bg-[#10b981] text-white rounded-lg hover:bg-[#0e9e74] transition flex items-center justify-center w-40">
            Register
        </a>
        <a href="{{ url('/admin') }}" class="px-6 py-2 inline-block text-center bg-red-500 text-white rounded-lg hover:bg-red-600 transition flex items-center justify-center w-40">
            Admin Panel
        </a>
    </div>
</div>
</body>
</html>
