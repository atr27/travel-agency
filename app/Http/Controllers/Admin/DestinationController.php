<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DestinationRequest;
use App\Models\Destination;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DestinationController extends Controller
{

    public function index(): View
    {
        $destinations = Destination::get();

        return view('admin.destinations.index', compact('destinations'));
    }

    public function create(): View
    {
        return view('admin.destinations.create');
    }

    public function store(DestinationRequest $request): RedirectResponse
    {
        if ($request->validated()) {
            $validatedData = $request->validated();

            $image = $request->file('image')->store('assets/destinations', 'public');

            Destination::create(array_merge($validatedData, ['image' => $image]));
        } else {
            // If the request doesn't have an image file, display an error message
            return redirect()->back()->withErrors(['image' => 'Please upload an image file.']);
        }

        return redirect()->route('admin.destinations.index')->with([
            'message' => 'successfully created !',
            'alert-type' => 'success'
        ]);
    }

    public function edit(Destination $destination): View
    {
        return view('admin.destinations.edit', compact('destination'));
    }

    public function update(DestinationRequest $request, Destination $destination): RedirectResponse
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            if ($destination->image) {
                File::delete('storage/' . $destination->image);
            }
            $image = $request->file('image')->store('assets/destinations', 'public');
            $validatedData['image'] = $image;
        }
        $destination->update($validatedData);

        return redirect()->route('admin.destinations.index')->with([
            'message' => 'successfully updated !',
            'alert-type' => 'info'
        ]);
    }

    public function destroy(Destination $destination): RedirectResponse
    {
        $destination->delete();

        return back()->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }
}
