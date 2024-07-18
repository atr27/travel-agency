<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingRequest;
use App\Models\Setting;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{

    public function index(): View
    {
        $setting = Setting::first();
        if (!is_null($setting)) {
            return view('admin.settings.edit', compact('setting'));
        }
        return view('admin.settings.create');
    }

    public function create(): View
    {
        return view('admin.settings.create');
    }

    public function store(SettingRequest $request): RedirectResponse
    {
        if ($request->hasFile('logo')) {
            $dataValidate = $request->validated();
            $logo = $request->file('logo')->store('assets/setting', 'public');
            Setting::create(array_merge($dataValidate, ['logo' => $logo]));
        }

        return redirect()->route('admin.settings.index')->with([
            'message' => 'successfully created !',
            'alert-type' => 'success'
        ]);
    }

    public function edit(Setting $setting): View
    {
        return view('admin.settings.edit', compact('setting'));
    }

    public function update(SettingRequest $request, Setting $setting): RedirectResponse
    {
        $validatedData = $request->validated();
        if (array_key_exists('logo', $validatedData)) {
            if ($setting->logo !== null) {
                File::delete('storage/' . $setting->logo);
            }
            $logo = $request->file('logo')->store('assets/setting', 'public');
            $validatedData['logo'] = $logo;
        }

        $setting->update($validatedData);

        return redirect()->route('admin.settings.index')->with([
            'message' => 'successfully updated !',
            'alert-type' => 'info'
        ]);
    }

    public function destroy(Setting $setting): RedirectResponse
    {
        File::delete('storage/' . $setting->logo);
        $setting->delete();

        return back()->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }
}
