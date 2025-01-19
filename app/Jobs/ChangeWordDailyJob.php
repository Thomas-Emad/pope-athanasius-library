<?php

namespace App\Jobs;

use App\Models\WordDaily;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ChangeWordDailyJob
{

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Get the current word of the day
        $currentWord = WordDaily::where('is_today', true)->first();
        if (!$currentWord) {
            Log::warning('No current word of the day found.');
            return;
        }

        // Get the word with the highest `number_show`
        $lastWord = WordDaily::orderBy('number_show', 'desc')->first();
        if (!$lastWord) {
            Log::warning('No words found in the database.');
            return;
        }

        DB::transaction(function () use ($currentWord, $lastWord) {
            if ($lastWord->number_show > $currentWord->number_show) {
                WordDaily::where('number_show', $currentWord->number_show + 1)->update([
                    'is_today' => true,
                ]);
            } else {
                WordDaily::orderBy('number_show', 'asc')->first()->update([
                    'is_today' => true,
                ]);
            }

            // Mark the current word as no longer today's word
            $currentWord->update(['is_today' => false]);
        });
    }
}
