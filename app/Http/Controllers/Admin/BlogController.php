<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $blogs = Blog::paginate(10);
        return view('dashboard.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('dashboard.blogs.create');
    }

    public function store(Request $request, Blog $blog)
    {
        $data = $request->validate([
            'ar_author'             => 'sometimes|nullable|string',
            'en_author'             => 'sometimes|nullable|string',
            'ar_title'              => 'required|string',
            'en_title'              => 'required|string',
            'ar_content'            => 'required|string|min:10',
            'en_content'            => 'required|string|min:10',
            'ar_meta_tag'           => 'required|string',
            'en_meta_tag'           => 'required|string',
        ]);
        $data['image'] = $request->image;

        Blog::create($data);
        session()->flash('success', trans('admin.added_successfully'));
        return redirect()->route('blogs.index');

    }

    public function edit(Blog $blog)
    {
        return view('dashboard.blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $data = $request->validate([
            'ar_author'             => 'sometimes|nullable|string',
            'en_author'             => 'sometimes|nullable|string',
            'ar_title'              => 'required|string',
            'en_title'              => 'required|string',
            'ar_content'            => 'required|string|min:10',
            'en_content'            => 'required|string|min:10',
            'ar_meta_tag'           => 'required|string',
            'en_meta_tag'           => 'required|string',
        ]);
        $data['image'] = $request->image;

        $blog->update($data);
        session()->flash('success', trans('admin.updated_successfully'));
        return redirect()->route('blogs.index');
    }

    public function destroy(Blog $blog)
    {
        if ($blog->image != null) {
            Storage::disk('local')->delete('public/blogs/' . $blog->image);
        }
        $blog->delete();
        session()->flash('success', trans('admin.deleted_successfully'));
        return redirect()->route('blogs.index');
    }

}
