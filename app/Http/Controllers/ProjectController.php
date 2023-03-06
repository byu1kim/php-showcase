<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Category;
use App\Models\Tag;


class ProjectController extends Controller
{
    public function index(){
        return view('index')->with('projects', Project::all()->slice(0,4));
    }

    public function projects(){
        return view('projects')->with('projects', Project::latest('published_date')->paginate(6)->withQueryString())->with('filter', 'projects')->with('categoryName', null);
    }

    public function details(Project $prac){
 
        return view('detail')->with('project', $prac);
    }

    public function listByCategory(Category $category)
    {
        return view('projects')
        ->with('projects', $category->projects)->with('filter', 'category');
    }

    public function listByTag(Tag $tag)
    {
        return view('projects')
        ->with('projects', $tag->projects)->with('filter', 'tag');
    }

    public function getProjectsJSON()
    {
        $projects = Project::with(['category','tags'])->get();
        return response()->json($projects);
    }
}
