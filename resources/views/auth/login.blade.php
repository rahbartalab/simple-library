<x-guest-layout>
    <div class="bg-white p-8 rounded-md shadow-md w-full max-w-md">
        <h2 class="text-2xl font-semibold mb-4">Login</h2>
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 mb-4 rounded-md">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-500 text-white p-4 mb-4 rounded-md">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                       class="mt-1 p-2 w-full border border-gray-300 rounded-md">
                @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                <input type="password" name="password" id="password"
                       class="mt-1 p-2 w-full border border-gray-300 rounded-md">
                @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <button type="submit" class="bg-blue-500 text-white p-2 rounded-md">Login</button>
            </div>
        </form>
    </div>
</x-guest-layout>
