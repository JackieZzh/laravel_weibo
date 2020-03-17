<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class FollowersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(User $user)
    {
        $this->authorize('follow', $user);

        Auth::User()->isFollowing($user->id) ?: Auth::User()->follow($user->id);

        return redirect()->route('users.show', $user->id);
    }

    public function destroy(User $user)
    {
        $this->authorize('follow', $user);

        !Auth::User()->isFollowing($user->id)?: Auth::User()->unfollow($user->id);

        return redirect()->route('users.show', $user->id);
    }
}
