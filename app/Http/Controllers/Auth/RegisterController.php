<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthRegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    /**
     * @OA\Post(
     *     path="/api/v1/register",
     *     summary="Регистрация нового пользователя",
     *     tags={"Authentication"},
     *     @OA\RequestBody(
     *         required=true,
     *         description="Данные пользователя для регистрации",
     *         @OA\JsonContent(
     *             required={"name", "email", "password", "password_confirmation"},
     *             @OA\Property(property="name", type="string", example="John Doe", description="Имя пользователя"),
     *             @OA\Property(property="email", type="string", format="email", example="john@example.com", description="Email пользователя"),
     *             @OA\Property(property="password", type="string", format="password", example="secret123", description="Пароль (мин. 8 символов)"),
     *             @OA\Property(property="password_confirmation", type="string", format="password", example="secret123", description="Подтверждение пароля"),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Успешная регистрация",
     *         @OA\JsonContent(
     *             @OA\Property(property="token", type="string", description="Токен для аутентификации пользователя"),
     *             @OA\Property(property="user", type="object", ref="#/components/schemas/User", description="Информация о зарегистрированном пользователе"),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Некорректные данные в запросе",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", description="Сообщение об ошибке"),
     *             @OA\Property(property="errors", type="object", description="Список ошибок валидации"),
     *         ),
     *     ),
     * )
     */

    public function register(AuthRegisterRequest $request): JsonResponse
    {
        // <-- admin_users
        User::unguard();
        // --->
        $user = User::create([
            'domain_id' => 1,
            'name' => $request->input('name'),
            'username' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

//        event(new Registered($user));
        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json(['token' => $token, 'user' => $user, 'message' => 'Registration successful'], 201);

    }
}
