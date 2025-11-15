<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait BookScopes
{
    /**
     * Order books by given order.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $orderBy
     * @return \Illuminate\Database\Eloquent\Builder
     */

    public function scopeOrderBooksBy(Builder $query, ?string $orderBy)
    {
        return match ($orderBy) {
            'new' => $query->latest(),
            'old' => $query->oldest(),
            'top_views' => $query->orderBy('views', 'desc'),
        };
    }

    /**
     * Get the top viewed books.
     *
     * This scope will return all books ordered by the views count in descending order.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeGetTopViews(Builder $query)
    {
        return $query->orWhereRaw("1=1")->orderBy('views', 'desc');
    }

    /**
     * Filter books by given filters and search query.
     *
     * This scope allows you to filter books by multiple filters and a search query.
     * The filters array should contain the names of the columns to filter by, as keys, and
     * the values should be boolean indicating whether the filter should be applied or not.
     * The search query should be a string that will be used to filter the results.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  array|null  $filters
     * @param  string|null  $search
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilterSearch(Builder $query, ?array $filters, ?string $search): Builder
    {
        $filters = $filters ?: [
            'book' => true,
            'code' => true,
            'author' => true,
            'subjects' => true,
            'series' => true,
            'publisher' => true,
            'section' => true,
            'shelf' => true,
        ];

        return $query
            ->when(
                $filters['book'],
                fn($q) =>
                $q->orWhere('title', 'like', "%{$search}%")
            )
            ->when(
                $filters['code'],
                fn($q) =>
                $q->orWhere('code', $search)
            )
            ->when(
                $filters['author'],
                fn($q) =>
                $q->orWhereHas(
                    'author',
                    fn($sub) =>
                    $sub->where('name', 'like', "%{$search}%")
                )
            )
            ->when(
                $filters['subjects'],
                fn($q) =>
                $q->orWhere('subjects', 'like', "%{$search}%")
            )
            ->when(
                $filters['series'],
                fn($q) =>
                $q->orWhere('series', 'like', "%{$search}%")
            )
            ->when(
                $filters['publisher'],
                fn($q) =>
                $q->orWhereHas(
                    'publisher',
                    fn($sub) =>
                    $sub->where('name', 'like', "%{$search}%")
                )
            )
            ->when(
                $filters['section'],
                fn($q) =>
                $q->orWhereHas(
                    'section',
                    fn($sub) =>
                    $sub->where('title', 'like', "%{$search}%")
                        ->orWhere('number', $search)
                )
            )
            ->when(
                $filters['shelf'],
                fn($q) =>
                $q->orWhereHas(
                    'shelf',
                    fn($sub) =>
                    $sub->where('title', 'like', "%{$search}%")
                        ->orWhere('number', $search)
                )
            );
    }
}
