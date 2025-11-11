<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class MasterDataController extends Controller
{
    public function view($type)
    {
        return view('pages.master-data.' . $type . '.index');
    }

    public function data()
    {
        $users = User::select('id', 'name', 'email', 'created_at')
            ->orderBy('id', 'desc')
            ->get();

        $users->transform(function ($user) {
            $user->created_at = $user->created_at->format('Y-m-d H:i');
            return $user;
        });

        return response()->json($users);
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
