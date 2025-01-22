<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;


trait UpdateAttachmentTrait
{
  /**
   * Handle file uploads for attachments (photo and pdf).
   */
  private function uploadAttachment($oldFile, $attachment, $path)
  {
    if (is_null($attachment)) {
      return $oldFile;
    } elseif (!is_null($oldFile)) {
      $this->deleteAttachment($oldFile);
    }
    return $attachment->store($path, 'public');
  }

  /**
   * Handle Delete file for attachments (photo and pdf).
   */
  private function deleteAttachment($file)
  {
    if (Storage::exists($file)) {
      Storage::delete($file);
    }
  }
}
