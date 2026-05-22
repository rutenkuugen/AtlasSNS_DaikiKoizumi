<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => 'required|min:2|max:12',
            'email' => 'required|min:5|max:40|email|unique:users',
            'password' => 'required|min:8|max:20|alpha_num:ascii|confirmed',
        ],[
            'username.required' => 'ユーザー名は必須です',
            'username.min' => 'ユーザー名は2文字以上です',
            'username.max' => 'ユーザー名は12文字以内です',

            'email.required' => 'メールアドレスは必須です',
            'email.email' => 'メールアドレス形式で入力してください',
            'email.min' => 'ユーザー名は2文字以上です',
            'email.max' => 'ユーザー名は40文字以内です',
            'email.unique' => 'このメールアドレスは既に登録されています',

            'password.required' => 'パスワードは必須です',
            'password.alpha_num:ascii' => 'パスワードは英数字のみ使用できます',
            'password.min' => 'パスワードは8文字以上です',
            'password.max' => 'パスワードは20文字以内です',
            'password.confirmed' => 'パスワードが一致していません',
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('added')
            ->with('username', $request->username);
    }

    public function added(): View
    {
        return view('auth.added');
    }
}
