<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Models\Book;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function store(StoreOrderRequest $request)
    {
        /** @var Book $book */
        $book = Book::query()->where('id', request('book_id'))->first();
        $book->orders()->create([
            'start_time' => now(),
            'end_time' => now()->addDay(2),
            'user_id' => request('user_id')
        ]);

        return redirect()->back()->with('success', 'order successfully registered');
    }

    public function index(): View
    {
        /** @var User $user */
        $user = Auth::user();
        $orders = $user->orders()->get();
        return view('orders.index', compact('orders'));
    }

    public function deActivate(Order $order)
    {
        $order->update([
            'is_active' => false
        ]);
        return redirect()->route('orders.index')->with('success', 'deactivated');
    }
}
