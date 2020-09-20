<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Data;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Data::with('user')
                ->orderBy('id', 'desc')
                ->paginate(10);
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

        $images = '';

        foreach ($request->input('document', []) as $file) {
            $images .= $file . '|';
        }
        $data['image'] = $images;

        Data::create($data);
        session()->flash('success', __('admin.added_successfully'));
        return redirect()->route('data.index');
    }

    public function edit(Data $data)
    {
//        dd($data->image);
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
        $images = '';

        foreach ($request->input('document', []) as $file) {
            $images .= $file . '|';
        }
        $d['image'] = $images;

        $data->update($d);
        session()->flash('success', __('admin.updated_successfully'));
        return redirect()->route('data.index');
    }

    public function destroy(Data $data)
    {
        if ($data->image) {
            $imagesName = explode('|', $data->image);
            for ($i = 0; $i < count($imagesName);$i++) {
                if ($imagesName[$i] != '') {
                    Storage::disk('local')->delete('public/data/' . $imagesName[$i]);
                }
            }
        }
        $data->delete();
        session()->flash('success', __('admin.deleted_successfully'));
        return redirect()->route('data.index');
    }


}
