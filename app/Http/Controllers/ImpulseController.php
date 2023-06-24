<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImpulseRequest;
use App\Http\Requests\UpdateImpulseRequest;
use App\Models\Impulse;
use App\Models\Subject;
use App\Models\Topic;
use Inertia\Inertia;

class ImpulseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $impulses = Impulse::all();
        return Inertia::render('Impulses/Index', compact('impulses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //$topics = Topic::all();
        $subjectsWithTopics = Subject::with('topics')->get();
        $ofTopic = $_GET['topic'] ?? null;
        return Inertia::render('Impulses/Create', compact(['subjectsWithTopics', 'ofTopic']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreImpulseRequest $request)
    {
        $impulse = new Impulse();
        $impulse->name = $request->input('name');
        $topics = $request->input('topic_ids');
        $impulse->save();
        $impulse->topics()->attach($topics);

        return redirect()->route('impulses.show', $impulse->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Impulse $impulse)
    {
        $subjects = $impulse->with('topics.subject')->get()->pluck('topics.0.subject');
        $subjects = $impulse->topics()
        ->with('subject')
        ->get()
        ->pluck('subject')
        ->unique();
        $topics = $impulse->topics()->get();
        return Inertia::render('Impulses/Show', compact(['impulse', 'topics', 'subjects']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Impulse $impulse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateImpulseRequest $request, Impulse $impulse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Impulse $impulse)
    {
        //
    }
}
