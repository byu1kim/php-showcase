<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Category;


class ProjectController extends Controller
{

    public function projects(){
        return view('projects')->with('projects', Project::latest('published_date')->paginate(6)->withQueryString())->with('filter', 'projects')->with('categoryName', null);
    }

    public function details(Project $prac){
 
        return view('detail')->with('project', $prac);
    }

    public function listByCategory(Category $category)
    {
        // tailwind?
        return view('projects')
        ->with('projects', $category->projects)->with('filter', 'category');
    }
    public function getProjectsJSON()
    {
        $projects = Project::with(['category','tags'])->get();
        return response()->json($projects);
    }
}
