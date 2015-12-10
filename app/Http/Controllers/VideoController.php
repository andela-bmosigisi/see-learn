<?php

namespace Learn\Http\Controllers;

use DB;
use Learn\Video;
use Learn\Http\Requests\VideoFormRequest;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show', 'index']]);
        $this->user = auth()->user();
    }

    /**
     * Display the videos listing, in the landing page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = DB::table('videos')->paginate(6);

        return view('landing', ['videos' => $videos]);
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
        $youtube_id = $this->getVideoId($request->input('link'));

        $video = Video::create([
            'youtube_id' => $youtube_id,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'user_id' => $this->user->id,
        ]);

        return redirect('videos/'.$video->id);
    }

    /**
     * Display the specified video.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $video = Video::find($id);

        if (is_null($video)) {
            return 'video not found';
        }
        $videoUrl = 'http://www.youtube.com/embed/'.$video->youtube_id;

        return view(
            'videos.watch',
            [
                'video' => $video,
                'videoUrl' => $videoUrl,
                'user' => $this->user,
            ]
        );
    }

    /**
     * Show the form for editing the specified video.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = Video::find($id);
        $video->link = 'http://www.youtube.com/watch?v='
            .$video->youtube_id;

        return view('videos.edit', ['video' => $video]);
    }

    /**
     * Update the specified video in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VideoFormRequest $request, $id)
    {
        $video = Video::find($id);
        if (is_null($video)) {
            return 'video not found';
        }

        $youtube_id = $this->getVideoId($request->input('link'));
        $video->youtube_id = $youtube_id;
        $video->title = $request->input('title');
        $video->description = $request->input('description');
        $video->save();

        return redirect('videos/'.$video->id);
    }

    /**
     * Delete a video by Id.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Video::destroy($id);

        return redirect('/dashboard')
            ->with('msg', 'Video deleted successfully.');
    }

    /**
     * Extract youtube video Id from youtube link.
     *
     * @param string
     * @return string
     */
    private function getVideoId($youtubeLink)
    {
        $idRegex = '/^
            (?:https?:\/\/www.youtube.com\/)
            (?:watch\?v=| e\/ | embed\/)
            ([\w-]{10,12})
            (?:&.*)?
        $/x';
        preg_match($idRegex, $youtubeLink, $matches);

        return $matches[1];
    }
}
