<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function adminLogout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
    public function adminProfile()
    {
        $adminData = User::find(Auth::user()->id);
        return view('admin.profile.admin_profile_view',compact('adminData'));
    }
    public function adminEditProfile($id)
    {
        $editData = User::find(Auth::user()->id);
        return view('admin.profile.admin_profile_edit',compact('editData'));
    }
}
