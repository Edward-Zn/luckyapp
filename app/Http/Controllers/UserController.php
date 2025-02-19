<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UserController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'phone' => 'required',
        ]);

        $token = Str::random(16);
        $uniqueLink = '/link/' . $token;

        $user = User::create([
            'username' => $request->username,
            'phone' => $request->phone,
            'unique_link' => $uniqueLink,
            'link_expires_at' => Carbon::now()->addDays(7),
        ]);

        return redirect($uniqueLink);
    }

    public function showPageA($token)
    {
        $user = User::where('unique_link', "/link/{$token}")->firstOrFail();

        if (Carbon::now()->greaterThan($user->link_expires_at)) {
            return abort(403, 'Link expired');
        }

        return view('pageA', compact('user'));
    }

    public function generateNewLink($token)
    {
        var_dump($token);
        $user = User::where('unique_link', "/link/{$token}")->firstOrFail();
        var_dump($user);
        $newToken = Str::random(16);

        $user->update([
            'unique_link' => '/link/' . $newToken,
            'link_expires_at' => Carbon::now()->addDays(7),
        ]);

        return redirect($user->unique_link);
    }

    public function deactivateLink($token)
    {
        $user = User::where('unique_link', "/link/{$token}")->firstOrFail();

        $user->update([
            'unique_link' => null,
            'link_expires_at' => null,
        ]);

        return redirect('/');
    }

    public function imFeelingLucky()
    {
        $randomUser = User::whereNotNull('unique_link')
            ->where('link_expires_at', '>', Carbon::now())
            ->inRandomOrder()
            ->first();

        if ($randomUser) {
            return redirect($randomUser->unique_link);
        }

        return redirect('/')->with('message', 'No available links at the moment.');
    }
}
