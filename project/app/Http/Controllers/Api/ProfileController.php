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
    public function profile(Request $request)
    {

        return response()->json([
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfileRequests $request)
    {
        $data = $request->only(['fio', 'email', 'password']);
        $request->user()->update($data);

        return response()->json($request->user());
    }

}
