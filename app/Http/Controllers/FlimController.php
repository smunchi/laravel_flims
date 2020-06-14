<?php

namespace App\Http\Controllers;

use App\Http\Requests\FlimRequest;
use App\Models\Flim;
use Illuminate\Support\Str;

class FlimController extends Controller
{
    public function index()
    {
        return view('flims.index');
    }

    public function get()
    {
        $flims = Flim::orderBy('id', 'desc')->paginate(3);

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

        Flim::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'description' => $request->description,
                'release' => $request->release,
                'date' => $request->date,
                'rating' => $request->rating,
                'ticket' => $request->ticket,
                'country' => $request->country,
                'photo' => $request->photo->hashName()
            ]
        );

        return redirect('/flims')->with('success', __('Flim stored successfully!'));
    }

    public function show($slug)
    {
        $flim = Flim::where('slug', $slug)->firstOrFail();

        return view('flims.show', compact('flim'));
    }
}
