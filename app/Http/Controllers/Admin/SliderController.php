<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SliderRequest;
use App\Models\Slider;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{

    public function index(): View
    {
        $sliders = Slider::get();

        return view('admin/sliders/index', compact('sliders'));
    }

    public function create(): View
    {
        return view('admin/sliders/create');
    }

    public function store(SliderRequest $request): RedirectResponse
    {
        // Check if the request has an image file
        if ($request->hasFile('image')) {
            // Validate the request data
            $validatedData = $request->validated();

            // Store the image file
            $image = $request->file('image')->store('assets/sliders', 'public');

            // Create a new slider with the validated data and the stored image
            Slider::create(array_merge($validatedData, ['image' => $image]));
        } else {
            // If the request doesn't have an image file, display an error message
            return redirect()->back()->withErrors(['image' => 'Please upload an image file.']);
        }

        return redirect()->route('admin.sliders.index')->with([
            'message' => 'successfully created !',
            'alert-type' => 'success'
        ]);
    }

    public function edit(Slider $slider): View
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(SliderRequest $request, Slider $slider): RedirectResponse
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            if ($slider->image) {
                File::delete('storage/' . $slider->image);
            }
            $image = $request->file('image')->store('assets/sliders', 'public');
            $validatedData['image'] = $image;
        }

        $slider->update($validatedData);

        return redirect()->route('admin.sliders.index')->with([
            'message' => 'successfully updated !',
            'alert-type' => 'info'
        ]);
    }

    public function destroy(Slider $slider): RedirectResponse
    {
        File::delete('storage/' . $slider->image);
        $slider->delete();

        return back()->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }
}
