<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index() {
        return view('admin.index')
        ->with('users', User::all())
        ->with('projects', Project::all())
        ->with('categories', Category::all())
        ->with('tags', Tag::all());
    }

    public function create() {
        return view('admin.project.create')
        ->with('categories', Category::all())
        ->with('project', null)->with('tags', Tag::all());
    }

    public function store(Request $request){
        $attributes = request()->validate([
            'title' => ['required','unique:projects,title,'],
            'excerpt' => 'required',
            'body' => 'required',
            'url' => ['nullable','sometimes','url'],
            'published_date' => ['nullable','sometimes','date'],
            'category_id' => ['nullable','sometimes','exists:categories,id'],
            'image' => ['nullable','sometimes','image','mimes:jpg,png,jpeg,gif,svg','max:2048'],
            'thumb' => ['nullable','sometimes','image','mimes:jpg,png,jpeg,gif,svg','max:1024'],
            'tags' => ['nullable', 'sometimes', 'exists:tags,id']
        ]);

        $attributes['slug'] = Str::slug($attributes['title']);
        $image_path = $request->file('image')?->storeAs('images',$request->image->getClientOriginalName(), 'public');
        $attributes['image'] = $image_path;
        $thumb_path = $request->file('thumb')?->storeAs('images', $request->thumb->getClientOriginalName(), 'public');
        $attributes['thumb'] = $thumb_path;

        Project::create($attributes)->tags()->attach($attributes['tags']);

        session()->flash('success','Project Created Successfully');

        return redirect('/admin');
    }

    public function edit(Project $project) {
        return view('admin.project.create')
        ->with('project', $project)
        ->with('categories', Category::all())
        ->with('tags', Tag::all());
    }

    public function update(Project $project, Request $request){
        $attributes = request()->validate([
            'title' => ['required','unique:projects,title,'.$project->id],
            'excerpt' => 'required',
            'body' => 'required',
            'url' => ['nullable','sometimes','url'],
            'published_date' => ['nullable','sometimes','date'],
            'category_id' => ['nullable','sometimes','exists:categories,id'],
            'image' => ['nullable','sometimes','image','mimes:jpg,png,jpeg,gif,svg','max:2048'],
            'thumb' => ['nullable','sometimes','image','mimes:jpg,png,jpeg,gif,svg','max:1024'],
            'tags' => ['nullable', 'sometimes', 'exists:tags,id']
        ]);

        $attributes['slug'] = Str::slug($attributes['title']);
        $image_path = $request->file('image')?->storeAs('images',$request->image->getClientOriginalName(), 'public');
        $attributes['image'] = $image_path;
        $thumb_path = $request->file('thumb')?->storeAs('images', $request->thumb->getClientOriginalName(), 'public');
        $attributes['thumb'] = $thumb_path;
        
        $project->tags()->sync($attributes['tags']);
        $project->update($attributes);
        session()->flash('success','Project Updated Successfully');

        return redirect('/admin');

    }

    public function destroy(Project $project){
        $project->delete();

        // Set a flash message
        session()->flash('success','Project Deleted Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin');
    }
}
