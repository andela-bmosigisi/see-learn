<?php

namespace Learn\Http\Controllers;

use Learn\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
        $this->user = auth()->user();
    }

    /**
     * Show the page for managing categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage()
    {
        $categories = $this->user->categories
            ->sortByDesc('updated_at');

        return view(
            'categories.manage',
            ['categories' => $categories]
        );
    }

    /**
     * Show the form for creating a new category.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:20',
            'description' => 'required|max:200',
        ]);

        $this->user->categories()->create($request->all());

        return redirect('/categories/manage')
            ->with(
                'msg',
                'Category created successfully.'
            ); 
    }

    /**
     * Show the form for editing categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        if (!$this->userOwnsCategory($category))
            return redirect('/dashboard')
                ->with(
                    'msg',
                    'Sorry, you did not create that category.'
                );

        return view('categories.edit', ['category' => $category]);
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
        $category = Category::find($id);
        if (!$this->userOwnsCategory($category))
            return redirect('/dashboard')
                ->with(
                    'msg',
                    'Sorry, you did not create that category.'
                );

        $this->validate($request, [
            'description' => 'required|max:200',
        ]);

        $category->description = $request->input('description');
        $category->save();

        return redirect('/categories/manage')
            ->with(
                'msg',
                'Category updated successfully.'
            );
    }

    /**
     * Show all the videos of a particular category.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);

        return view(
            'categories.show',
            ['category' => $category, 'videos' => $category->videos()->paginate(6)]
        );
    }

    /**
     * Validate whether user owns the category.
     *
     * @param \Learn\Category
     * @return boolean
     */
    private function userOwnsCategory($category)
    {
        return $this->user->id === $category->user->id;
    }
}
