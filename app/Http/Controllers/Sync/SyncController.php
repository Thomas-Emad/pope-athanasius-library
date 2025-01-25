<?php

namespace App\Http\Controllers\Sync;

use App\Http\Controllers\Controller;
use App\Services\SyncWebsite\SyncDatabaseService;
use Illuminate\Http\Request;
use Exception;

class SyncController extends Controller
{
  public function getFromExtrnal(Request $request, SyncDatabaseService $service)
  {
    if ($service->authorize($request->httpHost(),  $request->password)) {
      $response = $service->getFromExtrnal();

      if ($response['status'] == 'success') {
        return $response;
      }
    }

    return response()->json(['error' => 'Failed to sync books'], 500);
  }

  public function saveInExtrnal(Request $request, SyncDatabaseService $service)
  {
    try {
      $service->processDeletedBooks($request['local_books']['deleted_books']);
      $service->processFetchedBooks($request['local_books']['books']);
      return [
        'status' => 'success'
      ];
    } catch (Exception $e) {
      return response()->json(['error' => 'Failed to sync books'], 500);
    }
  }


  /**
   * Handle the outgoing request to send books data.
   */
  public function feedback(SyncDatabaseService $service)
  {
    $response = $service->markBooksAsSynced();

    if ($response['status'] === 'success') {
      return $response;
    }

    return response()->json(['error' => 'Failed to update external database'], 500);
  }
}
