<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Utility\NotificationUtility;
class AdminProjectController extends Controller
{
    //Admin can see all projects in admin panel
    public function all_projects(Request $request)
    {
        // dd($request->all());
        $col_name = null;
        $query = null;
        $sort_search = null;
        $client_id = null;

        if ($request->search != null || $request->type != null) {
            if ($request->has('user_id') && $request->user_id != null) {
                $products = Project::where('client_user_id', $request->user_id);
                $client_id = $request->user_id;
            }
            if ($request->search != null){
                $projects = Project::where('name', 'like', '%'.$request->search.'%');
                $sort_search = $request->search;
            }
            if ($request->type != null){
                $var = explode(",", $request->type);
                $col_name = $var[0];
                $query = $var[1];
                $projects = Project::orderBy($col_name, $query);
            }
            $projects = $projects->latest()->paginate(12);
        }
        else {
            $projects = Project::latest()->paginate(12);
        }
        return view('admin.default.projects.index', compact('projects', 'col_name', 'query', 'sort_search', 'client_id'));
    }

    //Admin can see all running projects in admin panel
    public function running_projects(Request $request)
    {
        $sort_search = null;
        $client_id = null;

        $projects = Project::biddisable()->open()->notcancel()->latest();

        if ($request->has('user_id') && $request->user_id != null) {
            $products = $projects->where('client_user_id', $request->user_id);
            $client_id = $request->user_id;
        }
        if ($request->search != null){
            $projects = $projects->where('name', 'like', '%'.$request->search.'%');
            $sort_search = $request->search;
        }

        $projects = $projects->paginate(12);

        return view('admin.default.projects.running_projects', compact('projects', 'sort_search', 'client_id'));
    }

    //Admin can see all open projects in admin panel
    public function open_projects(Request $request)
    {
        $col_name = null;
        $query = null;
        $sort_search = null;
        $client_id = null;

        if ($request->search != null || $request->type != null) {
            if ($request->has('user_id') && $request->user_id != null) {
                $products = Project::where('client_user_id', $request->user_id);
                $client_id = $request->user_id;
            }
            if ($request->search != null){
                $projects = Project::where('name', 'like', '%'.$request->search.'%');
                $sort_search = $request->search;
            }
            if ($request->type != null){
                $var = explode(",", $request->type);
                $col_name = $var[0];
                $query = $var[1];
                $projects = Project::orderBy($col_name, $query);
            }
            $projects = $projects->biddable()->open()->notcancel()->paginate(12);
        }
        else {
            $projects = Project::biddable()->open()->notcancel()->latest()->paginate(12);
        }
        return view('admin.default.projects.open_projects', compact('projects', 'col_name', 'query', 'sort_search', 'client_id'));
    }

    //Admin can see all cancelled projects in admin panel
    public function cancelled_projects(Request $request)
    {
        $col_name = null;
        $query = null;
        $sort_search = null;
        $client_id = null;

        if ($request->search != null || $request->type != null) {
            if ($request->has('user_id') && $request->user_id != null) {
                $products = Project::where('client_user_id', $request->user_id);
                $client_id = $request->user_id;
            }
            if ($request->search != null){
                $projects = Project::where('name', 'like', '%'.$request->search.'%');
                $sort_search = $request->search;
            }
            if ($request->type != null){
                $var = explode(",", $request->type);
                $col_name = $var[0];
                $query = $var[1];
                $projects = Project::orderBy($col_name, $query);
            }
            $projects = $projects->biddable()->open()->notcancel()->paginate(12);
        }
        else {
            $projects = Project::where('cancel_status', '1')->latest()->paginate(12);
        }

        return view('admin.default.projects.cancelled_projects', compact('projects', 'col_name', 'query', 'sort_search', 'client_id'));
    }

    public function project_approval(Request $request)
    {
        $project = Project::findOrFail($request->id);
        $project->project_approval = $request->status;
        if($project->save()){
          
            NotificationUtility::set_notification(
                "freelancer_proposal_for_project",
                "???? ???????? ??????????????",
                route('project.details', $project->slug),
                $project->client_user_id,
                1,
                'client'
            );
            return 1;
        }
        else {
            return 0;
        }
    }
}
