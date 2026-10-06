<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateSiteSettingRequest;
use App\Models\SiteSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SiteSettingController extends Controller
{
    public function edit(): View
    {
        return view('admin.settings', [
            'user' => auth()->user(),
            'settings' => SiteSetting::current(),
        ]);
    }

    public function update(UpdateSiteSettingRequest $request): RedirectResponse
    {
        SiteSetting::current()->update($request->validated());

        return back()->with('success', 'تم حفظ إعدادات الموقع بنجاح.');
    }
}
