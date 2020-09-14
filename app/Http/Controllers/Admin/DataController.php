<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Data;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DataController extends Controller
{
    public function index()
    {
        $data = Data::with('user')->orderBy('id', 'desc')->paginate(10);
        return view('dashboard.data.index', compact('data'));
    }

    public function create()
    {
        $users = User::where('is_admin', '!=', 1)->get();
        return view('dashboard.data.create', compact('users'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id'       => 'required|numeric',
            'ar_data'       => 'required|string|min:10',
            'en_data'       => 'required|string|min:10',
        ]);
        $data['image'] = $request->has('image') ? $request->image : '';

        Data::create($data);
        session()->flash('success', __('admin.added_successfully'));
        return redirect()->route('data.index');
    }

    public function edit(Data $data)
    {
        $users = User::where('is_admin', '!=', 1)->get();
        return view('dashboard.data.edit', compact('users', 'data'));
    }

    public function update(Request $request, Data $data)
    {
        $d = $request->validate([
            'user_id'       => 'required|numeric',
            'ar_data'       => 'required|string|min:10',
            'en_data'       => 'required|string|min:10',
        ]);
        $d['image'] = $request->has('image') ? $request->image : '';

        $data->update($d);
        session()->flash('success', __('admin.updated_successfully'));
        return redirect()->route('data.index');
    }

    public function destroy(Data $data)
    {
        if ($data->image) {
            Storage::disk('local')->delete('public/data/' . $data->image);
        }
        $data->delete();
        session()->flash('success', __('admin.deleted_successfully'));
        return redirect()->route('data.index');
    }

}
