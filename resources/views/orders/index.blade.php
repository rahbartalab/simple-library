<x-auth-layout>
    <div class="order-list flex space-x-4">
        @foreach($orders as $order)
            <div class="p-4 rounded-md flex-1
                        {{ $order->is_active ? 'bg-green-100 border border-green-500 shadow-md' : 'bg-red-100 border border-red-500 shadow-lg' }}">
                <p class="text-lg font-semibold {{ $order->is_active ? 'text-green-700' : 'text-red-700' }}">
                    Order #{{ $order->id }}
                </p>
                <p class="text-sm text-gray-600">Start Time: {{ $order->start_time }}</p>
                <p class="text-sm text-gray-600">End Time: {{ $order->end_time }}</p>
                <p class="text-sm text-gray-600">User: {{ $order->user->name }}</p>
                Status:
                @if($order->is_active)
                    <span class="text-green-500">Active</span>
                    <form action="{{ route('orders.deactivate', $order->id) }}" method="POST" class="mt-2">
                        @csrf
                        <button type="submit" class="text-red-500 hover:underline">Deactivate</button>
                    </form>
                @else
                    <span class="text-red-500">Inactive</span>
                @endif
            </div>
        @endforeach
    </div>
</x-auth-layout>
