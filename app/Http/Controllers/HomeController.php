<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Role;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->get();
        $destinations = Destination::latest()->get();
        $testimonials = Testimonial::latest()->get();
        $setting = Setting::first();

        $user = auth()->user();

        if (! app()->runningInConsole()) {
            $roles = Role::with('permissions')->get();

            foreach ($roles as $role) {
                foreach ($role->permissions as $permission) {
                    $permissionArray[$permission->title][] = $role->id;
                }
            }

            foreach ($permissionArray as $title => $roles) {
                Gate::define($title, function (User $user) use ($roles) {
                    return count(array_intersect($user->roles->pluck('id')->toArray(), $roles));
                });
            }
        }

        return view('frontend.home', compact('sliders', 'destinations', 'testimonials', 'setting'));
    }
}
