<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TestimonialRequest;
use App\Models\Testimonial;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{

    public function index(): View
    {
        $testimonials = Testimonial::get();

        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create(): View
    {
        return view('admin.testimonials.create');
    }

    public function store(TestimonialRequest $request): RedirectResponse
    {
        if($request->validated()) {
            $validatedData = $request->validated();
            $photo = $request->file('photo')->store('assets/testimonials', 'public');
            Testimonial::create(array_merge($validatedData, ['photo' => $photo]));
        }

        return redirect()->route('admin.testimonials.index')->with([
            'message' => 'successfully created !',
            'alert-type' => 'success'
        ]);
    }

    public function edit(Testimonial $testimonial): View
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(TestimonialRequest $request, Testimonial $testimonial): RedirectResponse
    {
        $validatedData = $request->validated();
        if (array_key_exists('photo', $validatedData)) {
            if ($testimonial->photo !== null) {
                File::delete('storage/' . $testimonial->photo);
            }
            $photo = $request->file('photo')->store('assets/testimonials', 'public');
            $validatedData['photo'] = $photo;
        }

        $testimonial->update($validatedData);

        return redirect()->route('admin.testimonials.index')->with([
            'message' => 'successfully updated !',
            'alert-type' => 'info'
        ]);
    }

    public function destroy(Testimonial $testimonial): RedirectResponse
    {
        File::delete('storage/' . $testimonial->photo);
        $testimonial->delete();

        return back()->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }
}
