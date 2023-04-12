<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Messages;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Messages::all();
    } 

    public function show(string $id)
    {
        return Messages::findOrFail($id);
    }

    public function destroy(string $id)
    {
                
        $Messages = Messages::findOrFail($id);
        $Messages->delete();
        return $Messages;
    }
}