<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCertificateRequest;
use App\Http\Requests\UpdateCertificateRequest;
use App\Models\Certificate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CertificateController extends Controller
{
    public function index(): View
    {
        return view('admin.certificates.index', [
            'certificates' => Certificate::query()->ordered()->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.certificates.create');
    }

    public function store(StoreCertificateRequest $request): RedirectResponse
    {
        $data = $request->safe()->except('image');
        $data['image_path'] = $this->storeImage($request->file('image'));

        Certificate::query()->create($data);

        return redirect()
            ->route('admin.certificates.index')
            ->with('success', 'تمت إضافة الشهادة بنجاح.');
    }

    public function edit(Certificate $certificate): View
    {
        return view('admin.certificates.edit', [
            'certificate' => $certificate,
        ]);
    }

    public function update(UpdateCertificateRequest $request, Certificate $certificate): RedirectResponse
    {
        $data = $request->safe()->except('image');

        if ($request->hasFile('image')) {
            $this->deleteLocalImage($certificate->image_path);
            $data['image_path'] = $this->storeImage($request->file('image'));
        }

        $certificate->update($data);

        return redirect()
            ->route('admin.certificates.index')
            ->with('success', 'تم تحديث الشهادة بنجاح.');
    }

    public function destroy(Certificate $certificate): RedirectResponse
    {
        $this->deleteLocalImage($certificate->image_path);
        $certificate->delete();

        return redirect()
            ->route('admin.certificates.index')
            ->with('success', 'تم حذف الشهادة بنجاح.');
    }

    private function storeImage(UploadedFile $image): string
    {
        $directory = public_path('brand/certs');
        File::ensureDirectoryExists($directory);

        $filename = Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME));
        $filename = ($filename !== '' ? $filename : 'certificate').'-'.Str::random(8).'.'.$image->getClientOriginalExtension();

        $image->move($directory, $filename);

        return 'brand/certs/'.$filename;
    }

    private function deleteLocalImage(string $path): void
    {
        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return;
        }

        $fullPath = public_path($path);
        if (File::exists($fullPath) && str_contains($path, 'brand/certs/')) {
            File::delete($fullPath);
        }
    }
}
