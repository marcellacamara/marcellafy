<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('user.edit', [
            'user' => auth()->user(),
        ]);
    }

    public function update(Request $request)
    {
        // dd($user);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);
        /** @var User */
        $user = auth()->user();
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('user')->with('success', 'Perfil atualizado com sucesso!');
    }

    public function destroy()
    {
        //
    }
}
