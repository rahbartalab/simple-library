<x-auth-layout>
    <div class="col-8 max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <!-- Table -->
            <table class="min-w-full divide-y divide-gray-200">
                @if(session('success'))
                    <div class="bg-green-500 text-white p-4 mb-4 rounded-md">
                        {{ session('success') }}
                    </div>
                @endif
                <thead class="bg-gray-50">
                <tr>
                    <th>id</th>
                    <th>Title</th>
                    <th>Release Date</th>
                    <th>ISBN</th>
                    <th>Author</th>
                </tr>
                </thead>
                <tbody>
                @foreach($books as $book)
                    <tr>
                        <td class="text-center">{{ $book->id }}</td>
                        <td class="text-center">{{ $book->title }}</td>
                        <td class="text-center">{{ $book->release_date }}</td>
                        <td class="text-center">{{ $book->isbn }}</td>
                        <td class="text-center">{{ $book->author }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <!-- Form for ordering a book -->
            <form action="{{ route('books.index') }}" method="GET" class="mt-4">
                <input type="text" value="{{ request('q') }}" name="q" id="q"
                       class="mt-1 p-2 border border-gray-300 rounded-md">
                <button type="submit" class="mt-2 p-2 bg-blue-500 text-white rounded-md">SEARCH</button>
            </form>
            <form action="{{ route('orders.store') }}" method="POST" class="mt-4">
                @csrf
                <label for="book_id" class="block text-sm font-medium text-gray-700">Enter Book ID for Order:</label>
                <input type="text" name="book_id" id="book_id" class="mt-1 p-2 border border-gray-300 rounded-md">
                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                <button type="submit" class="mt-2 p-2 bg-blue-500 text-white rounded-md">Place Order</button>
            </form>
        </div>
    </div>
</x-auth-layout>
