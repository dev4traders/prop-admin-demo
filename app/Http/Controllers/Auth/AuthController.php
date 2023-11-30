<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthLoginRequest;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Mail\SendPassword;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @OA\Info(
     * 	title="API Doc",
     * 	version="1.0"
     * ),

     * @OA\Post(
     *     path="/api/v1/auth/login",
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
    public function login(AuthLoginRequest $request): JsonResponse
    {
        $credentials = $request->only('username', 'password');

        $data = $this->userService->login($credentials);
        if ($data) {
            return response()->json($data);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    /**
     * @OA\Post(
     *     path="/api/v1/auth/logout",
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
    public function logout(): JsonResponse
    {
       $this->userService->logout();
       return response()->json(['message' => 'Logged out successfully']);
    }

}
