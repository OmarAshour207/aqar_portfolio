<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Owner;
use Illuminate\Support\Facades\Storage;

class OwnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $owners = Owner::paginate(10);
        return view('dashboard.owners.index', compact('owners'));
    }

    public function create()
    {
        return view('dashboard.owners.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'ar_name'          => 'required|string',
            'en_name'          => 'required|string',
            'ar_title'         => 'required|string',
            'en_title'         => 'required|string',
            'ar_description'   => 'required|string|min:10',
            'en_description'   => 'required|string|min:10',
            'ar_meta_tag'      => 'required|string',
            'en_meta_tag'      => 'required|string',
        ]);
        $data['image'] = $request->image;

        Owner::create($data);
        session()->flash('success', __('admin.added_successfully'));
        return redirect()->route('owners.index');
    }

    public function edit(Owner $owner)
    {
        return view('dashboard.owners.edit', compact('owner'));
    }

    public function update(Request $request, Owner $owner)
    {
        $data = $request->validate([
            'ar_name'          => 'required|string',
            'en_name'          => 'required|string',
            'ar_title'         => 'required|string',
            'en_title'         => 'required|string',
            'ar_description'   => 'required|string|min:10',
            'en_description'   => 'required|string|min:10',
            'ar_meta_tag'      => 'required|string',
            'en_meta_tag'      => 'required|string',
        ]);
        $data['image'] = $request->image;

        $owner->update($data);
        session()->flash('success', __('admin.updated_successfully'));
        return redirect()->route('owners.index');
    }

    public function destroy(Owner $owner)
    {
        if($owner->image != null) {
            Storage::disk('local')->delete('public/owners/' . $owner->image);
        }
        $owner->delete();
        session()->flash('success', __('admin.deleted_successfully'));
        return redirect()->route('owners.index');
    }

}
