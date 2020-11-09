<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $projects = Project::paginate(10);
        return view('dashboard.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('dashboard.projects.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'ar_title'              => 'required|string',
            'en_title'              => 'required|string',
            'ar_description'        => 'required|string|min:10',
            'en_description'        => 'required|string|min:10',
            'ar_meta_tag'           => 'required|string',
            'en_meta_tag'           => 'required|string',
        ]);
        $images = '';
        foreach ($request->input('document', []) as $file) {
            $images .= $file . '|';
        }
        $data['image'] = $images;

        Project::create($data);
        session()->flash('success', __('admin.added_successfully'));
        return redirect()->route('projects.index');
    }

    public function edit(Project $project)
    {
        return view('dashboard.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'ar_title'              => 'required|string',
            'en_title'              => 'required|string',
            'ar_description'        => 'required|string|min:10',
            'en_description'        => 'required|string|min:10',
            'ar_meta_tag'           => 'required|string',
            'en_meta_tag'           => 'required|string',
        ]);

        $images = '';

        foreach ($request->input('document', []) as $file) {
            $images .= $file . '|';
        }
        $data['image'] = $images;

        $project->update($data);
        session()->flash('success', __('admin.updated_successfully'));
        return redirect()->route('projects.index');
    }

    public function destroy(Project $project)
    {
        if($project->image != null) {
            $imagesName = explode('|', $project->image);
            for ($i = 0;$i < count($imagesName); $i++) {
                if ($imagesName[$i] != '') {
                    Storage::disk('local')->delete('public/projects/' . $imagesName[$i]);
                }
            }
        }
        $project->delete();
        session()->flash('success', __('admin.deleted_successfully'));
        return redirect()->route('projects.index');
    }

    public function uploadProjectImages(Request $request)
    {
        $imageName = Image::make($request->file)
            ->resize($request->width, $request->height)
            ->encode('jpg');
        Storage::disk('local')->put('public/projects/'.$request->file->hashName(), (string) $imageName, 'public');
        return response()->json([
            'name'          => $request->file->hashName(),
            'original_name' => $request->file->getClientOriginalName()
        ]);
    }

    public function removeProjectImage(Request $request)
    {
        $data = Project::findOrFail($request->data_id);
        $imagesName = explode('|', $data->image);
        $newImagesName = '';
        for ($i = 0;$i < count($imagesName); $i++) {
            if ($imagesName[$i] != $request->id && $imagesName[$i] != '') {
                $newImagesName .= $imagesName[$i] . '|';
            }
        }
        $data->update(['image' => $newImagesName]);
        Storage::disk('local')->delete('public/projects/' . $request->id);
        return "Removed";
    }
}
