<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @method static filter()
 */
class Book extends Model
{
    use HasFactory;

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'book_category' );
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'book_tag');
    }

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class);
    }

    public function scopeFilter(Builder $query): void
    {
        $query->when(request()->filled('q'),
            fn(Builder $query) => $query->where('title', 'like', '%' . request('q') . '%')
            ->orWhere('author', 'like', '%' . request('q') . '%')
        );

        $query->when(request()->filled('tags'),
            fn(Builder $query) => $query->whereHas('tags',
                fn(Builder $query) => $query->whereIn('tags.id', request('tags'))
            )
        );

        $query->when(request()->filled('categories'),
            fn(Builder $query) => $query->whereHas('categories',
                fn(Builder $query) => $query->whereIn('categories.id', request('categories'))
            )
        );

        $query->whereDoesntHave('orders')->orWhereHas('orders', fn(Builder $query) => $query->where('is_active', false));
    }
}
