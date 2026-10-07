<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAddonRequest;
use App\Http\Requests\UpdateAddonRequest;
use App\Models\Addon;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AddonController extends Controller
{
    public function index(): View
    {
        return view('admin.addons.index', [
            'addons' => Addon::query()->ordered()->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.addons.create');
    }

    public function store(StoreAddonRequest $request): RedirectResponse
    {
        Addon::query()->create($request->validated());

        return redirect()
            ->route('admin.addons.index')
            ->with('success', 'تمت إضافة الخدمة بنجاح.');
    }

    public function edit(Addon $addon): View
    {
        return view('admin.addons.edit', [
            'addon' => $addon,
        ]);
    }

    public function update(UpdateAddonRequest $request, Addon $addon): RedirectResponse
    {
        $addon->update($request->validated());

        return redirect()
            ->route('admin.addons.index')
            ->with('success', 'تم تحديث الخدمة بنجاح.');
    }

    public function destroy(Addon $addon): RedirectResponse
    {
        $addon->delete();

        return redirect()
            ->route('admin.addons.index')
            ->with('success', 'تم حذف الخدمة بنجاح.');
    }
}
