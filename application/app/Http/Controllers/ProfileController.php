<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profile\ChangePasswordRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function me(Request $request)
    {
        return $request->user();
    }

    public function updatePassword(ChangePasswordRequest $request)
    {
        $request->user()->changePassword($request->new_password);
        return ["success" => true];

    }
}
