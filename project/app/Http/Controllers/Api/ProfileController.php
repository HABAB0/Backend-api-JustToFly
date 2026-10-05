<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\UpdateProfileRequests;
use App\Http\Resources\ProfileResource;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController
{
    /**
     * Display the specified resource.
     */
    public function profile(User $user)
    {
        return new ProfileResource($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfileRequests $request)
    {
        $data = $request->validated();
        $request->user()->update($data);
        return response()->json([
            "message" => "data updated successfully"
        ]);
    }

}
