<?php

namespace Learn\Http\Controllers;

use Learn\Video;
use Illuminate\Http\Request;
use Learn\Http\Requests\VideoFormRequest;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
        $this->user = auth()->user();
    }

    /**
     * Show the form for creating a new video.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('videos.create', ['user' => $this->user]);
    }

    /**
     * Store a newly created video in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoFormRequest $request)
    {
        // Extract video_id from the youtube link.
        $youtubeLink = $request->input('link');
        $idRegex = '/^
            (?:https?:\/\/www.youtube.com\/)
            (?:watch\?v=| e\/ | embed\/)
            ([\w-]{10,12})
            (?:&.*)?
        $/x';
        preg_match($idRegex, $youtubeLink, $matches);

        $video = Video::create([
            'youtube_id' => $matches[1],
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'user_id' => $this->user->id,
        ]);

        return redirect('videos/'. $video->id);
    }

    /**
     * Display the specified video.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'This is video '. $id;
    }

    /**
     * Show the form for editing the specified video.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified video in storage.
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
