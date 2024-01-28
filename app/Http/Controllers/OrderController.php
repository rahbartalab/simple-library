<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

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
}
