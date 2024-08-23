<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ChangePassController extends Controller
{
    public function index()
    {
        return view('cms.changepass.index', [
            'title' => 'Ganti Password',
        ]);
    }

    public function changePass(Request $request)
    {
        $validatedData = $request->validate([
            'newPassword' => 'required|max:255',
            'oldPassword' => 'required|max:255',
        ]);

        if (Hash::check($validatedData['oldPassword'], auth()->user()->password)) {
            User::where('id', auth()->user()->id)->update(['password' => bcrypt($validatedData['newPassword'])]);
            return redirect('/admin')->with('success', 'Password Berhasil Diubah!');
        } else {
            return redirect('/admin/changePass')->with('error', 'Password Gagal Diubah!');
        }
    }
}