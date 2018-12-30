<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Traits\UploadImage;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController
{
    use UploadImage;

    public function index(Request $request)
    {
        // $loginUser 為登入者的 user model
        $loginUser = auth()->user();

        $users = User::where('company_license', $loginUser->company_license);

        if ($keyword = $request->input('keyword')) {
            $users = $users->where('name', 'like', "%{$keyword}%");
        }

        if ($type = $request->input('type')) {
            $users = $users->whereHas($type);
        }

        // User::where... 是一個 query，其中限制 license 需要與登入者的 license 一樣
        return view('backend.users.index')->with([
            'users' => $users->get()
        ]);
    }

    public function create()
    {
        return view('backend.users.create');
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'password' => Hash::make($request->input('password')),
        ]);

        if ($request->hasFile('avatar')) {
            $image = $this->uploadImage($request->file('avatar'));

            $user->image()->create($image->toArray());
        }

        return redirect()->route('backend.users.index')->with(['status' => 'create success']);
    }

    public function edit(User $user)
    {
        return view('backend.users.edit')->with(['user' => $user]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update([
            'name' => $request->input('name'),
            // 'email' => $request->input('email'),
            'mobile_phone' => $request->input('mobile_phone'),
        ]);

        if ($password = $request->input('password')) {
            $user->update([
                'password' => Hash::make($password),
            ]);
        }

        return redirect()->route('backend.users.index')->with(['status' => 'update success']);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('backend.users.index')->with(['status' => 'delete success']);
    }
}
