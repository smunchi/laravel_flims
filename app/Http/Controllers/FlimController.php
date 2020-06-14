<?php

namespace App\Http\Controllers;

use App\Http\Requests\FlimRequest;
use App\Models\Flim;
use App\Models\FlimGenre;
use App\Models\Genre;
use Illuminate\Support\Facades\DB;
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
        $genres = Genre::all()->pluck('name', 'id');
        return view('flims.create', compact('genres'));
    }

    public function store(FlimRequest $request)
    {
        if ($request->hasFile('photo')) {
            $request->photo->store("flims");
        }

        DB::transaction(function () use ($request) {
            $flim = Flim::create([
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

            $genres = [];
            $i = 0;
            foreach ($request->genres as $genre) {
                $genres[$i]['genre_id'] = $genre;
                $genres[$i]['flim_id'] = $flim->id;
                $i++;
            }

            FlimGenre::insert($genres);
        });

        return redirect('/flims')->with('success', __('Flim stored successfully!'));
    }

    public function show($slug)
    {
        $flim = Flim::with('genres')->findOrFail(1);

        return view('flims.show', compact('flim'));
    }
}
