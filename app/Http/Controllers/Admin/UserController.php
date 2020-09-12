<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::where('is_admin', '!=', 1)->paginate(10);
        return view('dashboard.users.index', compact('users'));
    }

    public function create()
    {
        return view('dashboard.users.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'      => 'required|string',
            'email'     => 'required|string|email|max:255|unique:users',
            'password'  => 'required|string|min:8|confirmed',
            'image'     => 'sometimes|nullable',
            'is_admin'  => 'required'
        ]);
        $data['password'] = bcrypt($request->password);

        User::create($data);
        session()->flash('success', __('admin.added_successfully'));
        return redirect()->route('users.index');
    }

    public function edit(Request $request, User $user)
    {
        return view('dashboard.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name'      => 'required|string',
            'email'     => 'required|string|email|max:255|unique:users,email,'. $user->id,
            'password'  => 'sometimes|nullable|min:8|confirmed',
            'image'     => 'sometimes|nullable',
            'is_admin'  => 'required'
        ]);
        if ($request->has('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);
        session()->flash('success', __('admin.updated_successfully'));
        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        if ($user->image != null) {
            Storage::disk('local')->delete('public/users/' . $user->image);
        }
        $user->delete();
        session()->flash('success', trans('admin.deleted_successfully'));
        return redirect()->route('users.index');
    }

}
