<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\CarouselItems;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all();
    } 

    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $validated = $request->validated();
        $user->update($validated);
    
        return $user;
    }
    


    public function store(UserRequest $request)
    {
        
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);

        return $user;
      
    } 
    
    public function show(string $id)
    {
        return User::findOrFail($id);
    }

    public function destroy(string $id)
    {
                
        $User = User::findOrFail($id);
        $User->delete();
        return $User;
    }
}