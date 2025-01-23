<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

trait RemoveTempFilesTrait
{
  /**
   * Clean temporary files older than a specified duration.
   *
   * @param string $path
   * @param int $minutes
   * @return void
   */
  protected function cleanTempFiles(string $path = null, int $minutes = 5)
  {
    $path = $path ?? storage_path('app/public/livewire-tmp');

    // Ensure the directory exists
    if (!File::exists($path)) {
      return;
    }

    try {
      $files = File::files($path);

      foreach ($files as $file) {
        if (\Carbon\Carbon::createFromTimestamp($file->getMTime())->diffInMinutes(now()) > $minutes) {
          File::delete($file);
        }
      }
    } catch (\Exception $e) {
      // Log the error if needed (optional)
      Log::error("Error cleaning temp files: " . $e->getMessage());
    }
  }
}
