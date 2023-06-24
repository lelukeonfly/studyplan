<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use App\Models\Impulse;
use App\Models\Subject;
use App\Models\Topic;
use Inertia\Inertia;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::all();
        return Inertia::render('Subjects/Index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubjectRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        $topics = $subject->topics()->whereNull('topic_id')->get();
        $impulses = $subject->topics()->with('impulses')->get()->pluck('impulses')->flatten()->unique('id');
        return Inertia::render('Subjects/Show', compact(['subject', 'topics', 'impulses']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        //
    }
}
