<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prompt;


class LogController extends Controller
{
    public function store(Request $request) 
    {
        $prompt = Prompt::create($request->all());
        return response()->json($prompt, 201);
    }

    public function index()
    {
        $prompts = Prompt::all();
        return response()->json($prompts, 200);
    }

    public function destroy($id)
    {
        $prompt = Prompt::findOrFail($id);
        $prompt->delete();
        return response()->json(null, 204);
    }
}
