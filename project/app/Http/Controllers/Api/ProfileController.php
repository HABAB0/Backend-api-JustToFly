<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\UpdateProfileRequests;
use App\Http\Resources\ProfileResource;
use Illuminate\Http\Request;

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
        $data = $request->validated();
        $request->user()->update($data);
        return response()->json([
            "message" => "data updated successfully"
        ]);
    }

}
