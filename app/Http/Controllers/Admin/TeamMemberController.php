<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class TeamMemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $teamMembers = TeamMember::paginate(10);
        return view('dashboard.team-members.index', compact('teamMembers'));
    }

    public function create()
    {
        return view('dashboard.team-members.create');
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

        TeamMember::create($data);
        session()->flash('success', __('admin.added_successfully'));
        return redirect()->route('team-members.index');
    }

    public function edit(TeamMember $teamMember)
    {
        return view('dashboard.team-members.edit', compact('teamMember'));
    }

    public function update(Request $request, TeamMember $teamMember)
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

        $teamMember->update($data);
        session()->flash('success', __('admin.updated_successfully'));
        return redirect()->route('team-members.index');
    }


    public function destroy(TeamMember $teamMember)
    {
        if($teamMember->image != null) {
            Storage::disk('local')->delete('public/team-members/' . $teamMember->image);
        }
        $teamMember->delete();
        session()->flash('success', __('admin.deleted_successfully'));
        return redirect()->route('team-members.index');
    }

}
