<?php

namespace Learn\Http\Controllers;

use Learn\User;
use Learn\Http\Requests;
use Illuminate\Http\Request;
use Learn\Http\Controllers\Controller;

class UserProfileController extends Controller
{
    public function __contruct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the specified user profile.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified user profile.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified user profile in storage.
     * Receives POST from user/{id}/update
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
}
