<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Company;
use App\Http\Requests\JobPostRequest;

class JobController extends Controller
{
    public function index(){
    	$jobs = Job::all();
    	return view('welcome',compact('jobs'));
    }

    public function show($id,Job $job){
    	//$job = job::find($id);
    	//dd($job);
    	return view('jobs.show',compact('job'));
    }

    public function create()
    {
    	return view('jobs.create');
    }

    public function store(JobPostRequest $request)
    {
    	$user_id = auth()->user()->id;
    	$company = Company::where('user_id',$user_id)->first();
    	$company_id = $company->id;

    	Job::create([
    		'user_id' => $user_id,
    		'company_id' => $company_id,
    		'title' => request('title'),
    		'slug' =>str_slug(request('title')),
    		'description' =>request('description'),
    		'roles' => request('role'),
    		'category_id'=>request('category'),
    		'position'=>request('position'),
    		'address'=>request('address'),
    		'type'=>request('type'),
    		'status'=>request('status'),
    		'last_date'=>request('last_date')
    	]);

    	return redirect()->back()->with('message','Job Posted successfully');
    }
}
