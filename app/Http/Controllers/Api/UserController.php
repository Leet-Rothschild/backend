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
    public function update(UserRequest $request)
    {
        
       $user = User::findOrFail($id);
       $validated = $request->validated();
       $user->name = $validated['name'];
       $user->save();
       
       return $user;
    } 
    
    public function email(UserRequest $request)
    {
        
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);

        return $user;
      
    } 
    
    public function password(UserRequest $request)
    {
        
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);

        return $user;
      
    } 
    
}