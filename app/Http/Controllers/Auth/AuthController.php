<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Mail\SendPassword;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    /**
     * @OA\Info(
     * 	title="API Doc",
     * 	version="1.0"
     * ),

     * @OA\Post(
     *     path="/api/v1/login",
     *     summary="Вход пользователя",
     *     tags={"Authentication"},
     *     @OA\RequestBody(
     *         required=true,
     *         description="Данные пользователя для входа",
     *         @OA\JsonContent(
     *             required={"username", "password"},
     *             @OA\Property(property="username", type="string", description="Имя пользователя или email"),
     *             @OA\Property(property="password", type="string", format="password", description="Пароль пользователя"),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Успешный вход",
     *         @OA\JsonContent(
     *             @OA\Property(property="access_token", type="string", description="Токен для аутентификации пользователя"),
     *             @OA\Property(property="user_id", type="integer", description="ID зарегистрированного пользователя"),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Ошибка авторизации",
     *         @OA\JsonContent(
     *             @OA\Property(property="error", type="string", description="Ошибка Unauthorized"),
     *         ),
     *     ),
     * )
     */
    public function login(Request $request): JsonResponse
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $access_token = $user->createToken('authToken')->plainTextToken;
            $user_id = $user->id;
            return response()->json(compact('access_token', 'user_id'), 200);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    /**
     * @OA\Post(
     *     path="/api/v1/logout",
     *     summary="Выход пользователя",
     *     tags={"Authentication"},
     *     security={{ "sanctum": {} }},
     *     @OA\Response(
     *         response=200,
     *         description="Успешный выход",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", description="Сообщение о успешном выходе"),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Пользователь не аутентифицирован",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", description="Сообщение об ошибке"),
     *         ),
     *     ),
     * )
     */
    public function logout(Request $request): JsonResponse
    {
        if (Auth::check()) {
            $request->user()->tokens()->delete();

            return response()->json(['message' => 'Logged out successfully']);
        }

        return response()->json(['message' => 'User not authenticated'], 401);
    }

    public function resetPassword(ResetPasswordRequest $request): JsonResponse
    {
        $user = User::where('email', $request->email)->first();
        $newPass = Str::random(8);
        Mail::to($user)->send(new SendPassword($newPass, $request->email));
        return response()->json(['status' => $user->update(['password' => Hash::make($newPass)])]);
    }
}
