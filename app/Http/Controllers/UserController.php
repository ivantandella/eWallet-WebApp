<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = User::where('id', auth()->user()->id)->first();
        // SELECT * FROM users WHERE id = auth()->user()->id;

        return view('profile', compact('user'));
    }

    public function pin($id)
    {
        $user = User::where('id', $id)->first();
        // SELECT * FROM users WHERE id = $id;

        return view('pin', compact('user'));
    }

    public function updatePIN(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        // SELECT * FROM users WHERE id = $id;

        if ($user->pin) {
            $request->validate([
                'oldPin' => 'required|size:6',
                'pin' => 'required|size:6|confirmed',
                'pin_confirmation' => 'required|size:6',
            ]);

            $currentPin = $user->pin;
            $oldPin = $request->oldPin;

            if (Hash::check($oldPin, $currentPin)) {
                $user->update([
                    'pin' => Hash::make($request->pin)
                ]);
                // UPDATE users SET pin = $request->pin WHERE id = $id;

                return redirect(route('profile'))->with('success', 'PIN updated!');
            } else {
                return back()
                    ->withErrors(['oldPin' => 'Wrong pin'])
                    ->with('warning', 'Wrong PIN!');
            }
        } else {
            $request->validate([
                'pin' => 'required|size:6|confirmed',
                'pin_confirmation' => 'required|size:6',
            ]);

            $user->update([
                'pin' => Hash::make($request->pin)
            ]);
            // UPDATE users SET pin = $request->pin WHERE id = $id;

            return redirect(route('profile'))->with('success', 'PIN updated!');
        }
    }
}
