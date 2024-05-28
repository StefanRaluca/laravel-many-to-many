<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTechnologyRequest;
use App\Http\Requests\UpdateTechnologyRequest;
use App\Models\Technology;
use Illuminate\Support\Str;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('admin.technologies.index', ['technologies' => Technology::orderByDesc('id')->paginate(6)]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.technologies.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTechnologyRequest $request)
    {

        $validated_data = $request->validated();
        $slug = Str::slug($validated_data['name'], '-');
        $validated_data['slug'] = $slug;
        Technology::create($validated_data);

        return to_route('admin.technologies.index')->with('message', "New technologies it's created!");

    }

    /**
     * Display the specified resource.
     */
    public function show(Technology $technology)
    {

        $projects = $technology->projects;

        return to_route('admin.technologies.index', compact('technology', 'projects'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology)
    {
        return view('admin.technologies.index', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTechnologyRequest $request, Technology $technology)
    {
        $validated_data = $request->validated();
        $slug = Str::slug($validated_data['name'], '-');
        $validated_data['slug'] = $slug;
        $technology->update($validated_data);

        return to_route('admin.technologies.index')->with('message', " $technology->name updated!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();

        return to_route('admin.technologies.index')->with('message', "Technology $technology->name deleted!");
    }
}
