<?php

namespace Learn\Http\Controllers;

use Illuminate\Http\Request;

use Learn\Category;
use Learn\Http\Requests;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->user = auth()->user();
    }

    /**
     * Show the form for managing categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage()
    {
        $categories = $this->user->categories;

        return view(
            'categories.manage',
            ['categories' => $categories]
        );
    }

    /**
     * Store a newly created category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the videos of the specified category.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified category from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);

        return redirect('/categories/manage')
            ->with('msg', 'Category deleted successfully.');
    }
}
