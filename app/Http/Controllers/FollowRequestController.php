<?php

namespace App\Http\Controllers;

use App\Notifications\WasFollowed;
use App\User;
use Illuminate\Http\Request;

class FollowRequestController extends Controller
{

    public function follow(User $user)
    {
        if ($user->hasPrivateAccount() && !auth()->user()->isFollowing($user)) {
            $request = auth()->user()->outgoingFollowRequests()->create([
                "requesting_user_id" => auth()->user()->id,
                "requested_user_id" => $user->id
            ]);
        } else {
            $userCurrent = auth()->user();
            if ($userCurrent->id == $user->id) {
                throw new \Exception("cant follow yourself", 1);
            }
            if( !auth()->user()->isFollowing($user)) {
                $user->notify(new WasFollowed( $userCurrent ));
            }
            $userCurrent->toggleFollow($user);
        }
        return back();
    }

    public function acceptFollowRequest(FollowRequest $followRequest)
    {
        $followRequest->requestingUser->Follow(auth()->user());
        $followRequest->delete();
        return back();
    }
}
