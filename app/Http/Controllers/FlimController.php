<?php

namespace App\Http\Controllers;

use App\Models\Flim;
use Illuminate\Http\Request;

class FlimController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('flims.index');
    }

    public function create()
    {
        return view('flims.create');
    }

    public function store(Request $request)
    {
        if ($request->hasFile('photo')) {
            $request->photo->store("flims");
        }

        $flim = Flim::create([
                'name' => $request->name,
                'description' => $request->description,
                'release' => $request->release,
                'date' => $request->date,
                'rating' => $request->rating,
                'ticket' => $request->ticket,
                'country' => $request->country,
                'photo' => $request->file('photo')->getClientOriginalName()
            ]
        );

        if($request->wantsJson()) {
            return response()->json(new \App\Http\Resources\Flim($flim), 201);
        }

        return redirect()->back()->with('success', __('Flim stored successfully!'));
    }
}
