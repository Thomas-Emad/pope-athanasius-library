<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Enums\PermissionEnum;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
	// edit
    public function __invoke(Request $request): View
    {
        $id = $request->id;
        $user = isset($id) ? User::findOrFail($id) : Auth::user();
        $hasPermissionBook = $user->hasPermissionTo(PermissionEnum::BOOK);
        return view('profile', compact('hasPermissionBook'));
    }
	
	
}
