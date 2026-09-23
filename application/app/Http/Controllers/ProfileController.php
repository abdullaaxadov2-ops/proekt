<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profile\ChangePasswordRequest;
use App\Http\Requests\Profile\UpdateProfileRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function me(Request $request)
    {
        return $request->user();
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $request->user()->changePassword($request->new_password);
        return ["success" => true];

    }

    public function changeProfileName(UpdateProfileRequest $request)
    {
        $user = $request->user();
        $user->update(['name' => $request->name]);
        return ["success" => true];
    }
}
