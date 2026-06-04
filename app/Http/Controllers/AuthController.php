<?php

namespace App\Http\Controllers;
use App\Http\Requests\RegisterMemberRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registerMember(RegisterMemberRequest $request): \Illuminate\Http\JsonResponse
    {
        $exists = User::query()->where('email', $request->email)->exists();

        if ($exists) {
            return response()->json([
                'status' => 'error',
                'message' => 'این ایمیل قبلاً ثبت شده است'
            ]);
        }

        User::query()->create([
            'name' => 'new user',
            'email' => $request->email,
            'type' => 'member',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'ثبت‌نام موفق انجام شد'
        ]);
    }
}
