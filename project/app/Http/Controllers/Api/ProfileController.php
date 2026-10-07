<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\UpdateAvatarRequests;
use App\Http\Requests\UpdateProfileRequests;
use App\Http\Resources\ProfileResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController
{
    /**
     * Display the specified resource.
     */
    public function profile(Request $request)
    {
        $user = $request->user();
        return new ProfileResource($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfileRequests $request)
    {
        $user = $request->user();
        $data = $request->validated();

        if($request->hasFile('avatar')){
            $oldAvatar = $user->getOriginal('avatar');
            if ($oldAvatar !== 'avatars/base.jfif') {
                Storage::disk('public')->delete($oldAvatar);
            }
            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        $request->user()->update($data);
        return response()->json([
            "message" => "data updated successfully"
        ]);
    }

    public function avatar(UpdateAvatarRequests $request)
    {
        $user = $request->user();

        if (!$request->hasFile('avatar')) {
            return response()->json([
                'message' => 'avatar file is required'
            ], 422);
        }

        $oldAvatar = $user->getOriginal('avatar');

        if ($oldAvatar && $oldAvatar !== 'avatars/base.jfif') {
            Storage::disk('public')->delete($oldAvatar);
        }

        $user->update(['avatar' => $request->file('avatar')->store('avatars', 'public')]);
        return response()->json([
            "message" => "data updated successfully"
        ]);
    }
}
