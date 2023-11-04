<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Feedback;
use Illuminate\Support\Facades\Session;

class AdminAuthController extends Controller
{
    public function getLogin(){
        return view('admin.auth.login');
    }

    public function postLogin(Request $request)
{
    $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (auth()->guard('admin')->attempt([
        'email' => $request->input('email'),
        'password' => $request->input('password'),
    ])) {
        $user = auth()->guard('admin')->user();

        // Check if the user is an admin
        if ($user->is_admin == 1) {
            return redirect()->route('adminDashboard')->with('success', 'You are logged in successfully.');
        } else {
            // If the user is not an admin, log them out and return an error message
            auth()->guard('admin')->logout();
            return back()->with('error', 'Whoops! You are not authorized.');
        }
    } else {
        return back()->with('error', 'Whoops! Invalid email and password.');
    }
}


public function adminLogout(Request $request)
{
    auth()->guard('admin')->logout();
    $request->session()->flush();
    $request->session()->put('success', 'You are logged out successfully');
    return redirect(route('adminLogin'));
}

public function feedback(){
    $users = Feedback::all();
    return view('admin.feedback', compact('users'));
}
public function user(){
    $users = User::all();
    return view('admin.user', compact('users'));
}
public function deleteUser($id)
{
    $user = User::find($id);

    if (!$user) {
        return redirect()->route('admin.user')->with('error', 'User not found');
    }

    $user->delete();

    return redirect()->route('admin.user')->with('success', 'User deleted successfully');
}

public function deleteFeedback($id)
{
    $user = Feedback::find($id);

    if (!$user) {
        return redirect()->route('admin.user')->with('error', 'User not found');
    }

    $user->delete();

    return redirect()->route('admin.user')->with('success', 'User deleted successfully');
}
public function toggleStatus(Request $request, $id)
{
    $feedback = Feedback::find($id);

    if (!$feedback) {
        return response()->json(['message' => 'Feedback not found'], 404);
    }

    $feedback->status = $feedback->status == 1 ? 0 : 1;
    $feedback->save();


    return response()->json(['message' => 'Status updated successfully']);
}



}
