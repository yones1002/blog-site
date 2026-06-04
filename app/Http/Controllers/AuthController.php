<?php

namespace App\Http\Controllers;
use App\Http\Requests\RegisterMemberRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Register a new member account.
     *
     * Checks whether the provided email address already exists.
     * If not, creates a new user with the "member" role and returns
     * a success response. Otherwise, returns an error response.
     *
     * @param RegisterMemberRequest $request The validated registration request.
     * @return JsonResponse JSON response indicating the result of the registration process.
     */
    public function registerMember(RegisterMemberRequest $request): JsonResponse
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
