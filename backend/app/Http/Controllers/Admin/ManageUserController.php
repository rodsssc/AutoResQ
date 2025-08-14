<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Verification;
use Illuminate\Http\Request;

class ManageUserController extends Controller
{
    public function DisplayUsers()
{
    $users = User::where('role', '!=', 'admin')
        ->with(['verification' => function ($query) {
            $query->latest(); // Get the latest verification record
        }])
        ->get();

    $verifications = Verification::all()
        ->groupBy('user_id'); // Group verifications by user_id

    return view('admin.ManageUser.DisplayUser', compact('users', 'verifications'));
}

    public function VerifyUser($id)
    {
        $user = User::findOrFail($id);
        $user->update(['is_verified' => true]);
        
        return redirect()->route('admin.users')
               ->with('success', 'User has been successfully verified');
    }

    public function DisplayUserById($id)
    {
        $user = User::findOrFail($id);
        return view('admin.ManageUser.DisplayUserById', compact('user'));
    }

   public function SaveVerification(Request $request)
{
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'status' => 'required|in:approved,rejected',
        'remarks' => 'nullable|string|max:1000',
    ]);

    $user = User::findOrFail($request->user_id);
    
    if (!$user->verification) {
        return back()->with('error', 'No verification record found for this user');
    }

    $user->verification->update([
        'status' => $request->status,
        'admin_notes' => $request->remarks
    ]);

    return back()->with('success', 'Verification status updated successfully');
}
}