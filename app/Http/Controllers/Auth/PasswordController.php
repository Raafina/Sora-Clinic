<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {

        try {
            $validated = $request->validateWithBag('updatePassword', [
                'current_password' => ['required', 'current_password'],
                'password' => ['required', Password::defaults(), 'confirmed'],
            ]);
        } catch (ValidationException $e) {
            return redirect()->route('profile.edit')
                ->with('error', 'Gagal memperbarui kata sandi. Kata sandi lama salah atau kata sandi baru tidak cocok.')
                ->withErrors($e->validator, 'updatePassword')
                ->withInput();
        }

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return Redirect::route('profile.edit')->with('success', 'Kata sandi berhasil diperbarui!');
    }
}
