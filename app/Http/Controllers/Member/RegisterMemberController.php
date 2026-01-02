<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Http\Requests\Member\RegisterMemberRequest;
use App\Models\Country;
use App\Models\User;

class RegisterMemberController extends Controller
{
    public function create()
    {
        return view('frontend.members.register', [
            'countries' => Country::get()
        ]);
    }

    public function register(RegisterMemberRequest $request)
    {
        $data = $request->validated();
        $data['level'] = 0;

        if ($request->hasFile('avatar')) {
            $data['avatar'] = $request
                ->file('avatar')
                ->store('members', 'public');
        }

        User::create($data);

        return redirect('/login');
    }
}
