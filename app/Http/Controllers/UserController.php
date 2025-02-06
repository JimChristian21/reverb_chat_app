<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {

        $users = User::where('id', '!=', Auth::user()->id)->withCount(['unreadMessages'])->get();
        dd($users);
        foreach($users as $user) {

            $user->id == 4
             && dd($user->unreadMessages()->get());
        }
        dd($users);

        return view('dashboard', compact('users'));
    }

    public function userChat(int $userId): View
    {
        return view('user-chat', compact('userId'));
    } 
}
