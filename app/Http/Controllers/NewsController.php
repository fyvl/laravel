<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::all();
        return response()->json($news);
    }

    public function goToID($id)
    {
        $news = News::find($id);
        return response()->json($news);
    }

    public function formSubmit(Request $request)
    {
        // Validate the request data if necessary
        $validatedData = $request->validate([
            'title' => 'required|string',
            'description' => 'string'
        ]);

        // Create a new model instance and store the data
        $model = new News(); // Replace 'YourModel' with your actual model name
        $model->title = $validatedData['title'];
        $model->description = $validatedData['description'];
        $model->save();

        // You can return a response to your Vue.js frontend
        return response()->json(['message' => 'Data stored successfully']);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the resource by its ID
        $resource = News::find($id);

        // Check if the resource exists
        if (!$resource) {
            return response()->json(['message' => 'Resource not found'], 404);
        }

        // Delete the resource
        $resource->delete();

        return response()->json(['message' => 'Resource deleted successfully']);
    }

}
