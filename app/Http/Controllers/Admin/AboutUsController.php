<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AboutUsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $abouts = About::paginate(10);
        return view('dashboard.abouts.index', compact('abouts'));
    }

    public function create()
    {
        return view('dashboard.abouts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'ar_title'              => 'required|string',
            'en_title'              => 'required|string',
            'ar_description'        => 'required|string|min:10',
            'en_description'        => 'required|string|min:10',
            'video'                 => 'sometimes|nullable|url'
        ]);
        $data['image'] = $request->image;

        About::create($data);
        session()->flash('success', trans('admin.added_successfully'));
        return redirect()->route('about.index');
    }

    public function edit(About $about)
    {
        return view('dashboard.abouts.edit', compact('about'));
    }

    public function update(Request $request,About $about)
    {
        $data = $request->validate([
            'ar_title'              => 'required|string',
            'en_title'              => 'required|string',
            'ar_description'        => 'required|string|min:10',
            'en_description'        => 'required|string|min:10',
            'video'                 => 'sometimes|nullable|url'
        ]);
        $data['image'] = $request->image;

        $about->update($data);
        session()->flash('success', trans('admin.updated_successfully'));
        return redirect()->route('about.index');
    }

    public function destroy(About $about)
    {
        Storage::disk('local')->delete('public/aboutus/'. $about->image);
        $about->delete();
        session()->flash('success', trans('admin.deleted_successfully'));
        return redirect()->route('about.index');
    }

}
