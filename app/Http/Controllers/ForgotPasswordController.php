<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ForgotPasswordController extends Controller
{
    public function showForm()
    {
        return view('forgot-password');
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email:dns',
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with([
                'notifikasi' =>__($status),
                'type' => 'success'
            ])
            : back()->with([
                'notifikasi' =>__($status),
                'type' => 'error'
            ]);
    }

    public function showResetForm(Request $request, $token)
    {
        // $tokenData = DB::table('password_reset_tokens')->where('token', $token)->first();

        // if (!$tokenData) {
        //     // Jika token tidak ditemukan, arahkan pengguna ke halaman login dengan notifikasi
        //     return redirect()->route('login')->with([
        //         'notifikasi' =>'Token reset password tidak valid.',
        //         'type' => 'warning'
        //     ]);
        // }

        // $tokenCreated = Carbon::parse($tokenData->created_at);
        // $tokenExpiration = $tokenCreated->addMinutes(config('auth.passwords.users.expire'));

        // if (Carbon::now()->gt($tokenExpiration)) {
        //     // Jika token sudah kadaluarsa, arahkan pengguna ke halaman login dengan notifikasi
        //     return redirect()->route('login')->with([
        //         'notifikasi' =>'Token reset password sudah kadaluarsa.',
        //         'type' => 'warning'
        //     ]);
        // }

        return view('reset-password', [
            'token' => $token,
            'email' => $request->email,
        ]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email:dns',
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required|same:password'
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with([
                'notifikasi' =>__($status),
                'type' => 'success'
            ])
            : back()->with([
                'notifikasi' => [__($status)],
                'type' => 'error'
            ]);
    }
}
