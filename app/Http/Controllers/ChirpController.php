<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class ChirpController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        return view(
            'chirps.index',
            [
                'chirps' => Chirp::with('user')->latest()->get(),
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $validated = $request->validate([
            'message' => 'required|string|max:255|min:5',
        ], [
            'message.required' => 'El mensaje es obligatorio.',
            'message.string' => 'El mensaje debe ser una cadena de texto.',
            'message.max' => 'El mensaje no puede exceder los 255 caracteres.',
            'message.min' => 'El mensaje debe tener al menos 5 caracteres.',
        ]);

        $request->user()->chirps()->create($validated);


        return to_route('chirps.index')->with('status', 'Chirp published');
    }
    /**
     * Display the specified resource.
     */
    public function show(Chirp $chrip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chirp $chirp)
    {
        $this->authorize('update', $chirp);

        return view('chirps.edit', [
            'chirp' => $chirp,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chirp $chirp)
    {
        //
        $this->authorize('update', $chirp);

        $validated = $request->validate([
            'message' => 'required|string|max:255|min:5',
        ], [
            'message.required' => 'El mensaje es obligatorio.',
            'message.string' => 'El mensaje debe ser una cadena de texto.',
            'message.max' => 'El mensaje no puede exceder los 255 caracteres.',
            'message.min' => 'El mensaje debe tener al menos 5 caracteres.',
        ]);
        $chirp->update($validated);
        return to_route('chirps.index')->with('status', 'Chirp updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chirp $chirp)
    {
        //
        $this->authorize('delete', $chirp);
        $chirp->delete();
        return to_route('chirps.index')->with('status', 'Chirp deleted');
    }
}
