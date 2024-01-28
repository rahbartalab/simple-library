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

<div class="absolute top-4 right-4">
    <!-- Logout Form -->
    <div class="flex">
        <div>
            <form id="orders-form" action="{{ route('orders.index') }}" method="GET">
                @csrf
                <button type="submit" class="text-blue-500 ml-5 hover:underline">Orders</button>
            </form>
        </div>

        <div>
            <form id="orders-form" action="{{ route('books.index') }}" method="GET">
                @csrf
                <button type="submit" class="text-blue-500 ml-5 hover:underline">Books</button>
            </form>
        </div>

        <div class="mr-4">
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="text-blue-500 ml-5 hover:underline">Logout</button>
            </form>
        </div>


    </div>
</div>




</body>
</html>
