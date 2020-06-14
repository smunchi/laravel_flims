<?php

namespace App\Http\Controllers;

use App\Http\Requests\FlimRequest;
use App\Models\Flim;

class FlimController extends Controller
{
    public function index()
    {
        return view('flims.index');
    }

    public function get()
    {
        $flims = Flim::paginate(3);

        return response()->json(['flims' => $flims], 200);
    }

    public function create()
    {
        return view('flims.create');
    }

    public function store(FlimRequest $request)
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

        return redirect()->back()->with('success', __('Flim stored successfully!'));
    }
}
