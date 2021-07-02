<?php

namespace App\User\Controllers;

use App\User\Models\UserRight;
use App\User\Services\UserRightService;
use Illuminate\Http\Request;

class UserRightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User\Models\UserRight  $userRight
     * @return \Illuminate\Http\Response
     */
    public function show(UserRight $userRight)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User\Services\UserRightService  $userRight
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserRightService $userRightService)
    {
        $userRightService->edit();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User\Models\UserRight  $userRight
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserRight $userRight)
    {
        //
    }
}
