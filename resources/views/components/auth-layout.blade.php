<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
    <!-- Include Tailwind CSS -->
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">

{{ $slot }}

<!-- Logout Form -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="absolute top-4 right-4">
    @csrf
    <button type="submit" class="text-blue-500 hover:underline">Logout</button>
</form>

</body>
</html>
