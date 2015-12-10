<?php

namespace Learn\Http\Controllers;

use Learn\User;
use Learn\Helpers\FileUploader;
use Learn\Http\Requests\UserProfileRequest;

class UserProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->user = auth()->user();
    }

    /**
     * Display the specified user's dashboard.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('user.dashboard', ['user' => $this->user]);
    }

    /**
     * Show the form for editing the specified user profile.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('user.edit', ['user' => $this->user]);
    }

    /**
     * Update the specified user profile in storage.
     * Receives POST from user/{id}/update.
     *
     * @param  \Learn\Http\Requests\UserProfileRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserProfileRequest $request, $id)
    {
        $user = User::find($id);
        if ($request->hasFile('avatar')) {
            // Take new avatar, upload to cloudinary.
            $avatar = $request->file('avatar');
            $uploader = new FileUploader();
            $uploadedFile = $uploader->uploadFile($avatar);
            $user->avatar = $uploadedFile['url'];
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        return redirect('/dashboard');
    }
}
