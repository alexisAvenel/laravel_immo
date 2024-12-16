<?php

namespace App\Http\Controllers;

use App\CarouselImgDeletable;
use App\Http\Requests\PropertiesRequest;
use App\Http\Requests\PropertyContactRequest;
use App\Mail\PropertyContactMail;
use App\Models\Media;
use App\Models\Option;
use App\Models\Property;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Mail;
use Str;

class PropertiesController extends Controller
{
    public function index(): View
    {
        $properties = Property::paginate(10);
        return view('admin.properties.list', compact('properties'));
    }

    public function store(PropertiesRequest $request): RedirectResponse
    {
        $property = Property::create($request->validated());
        $this->syncMedias($property, $request);
        return redirect()
            ->route('admin.properties.list')
            ->with('success', 'Le bien a bien été créé !');
    }

    public function create(): View
    {
        $property = new Property();
        return view('admin.properties.create', [
            'property' => $property,
            'options' => Option::select(['id', 'name'])->get()
        ]);
    }

    private function syncMedias(Property $property, PropertiesRequest $request)
    {
        /** @var UploadedFile[]|null $images */
        $images = $request->validated('medias');
        if (!is_null($images) && !empty($images)) {
            foreach ($images as $image) {
                $media = new Media();
                $media->original_name = $image->getClientOriginalName();
                $media->private_name = Str::uuid() . '.' . $image->getClientOriginalExtension();
                $media->mime_type = $image->getClientMimeType();
                $media->property()->associate($property);
                $media->save();
                $image->storeAs('properties', $media->private_name, 'public');
            }
        }
    }

    public function edit(Property $property): View
    {
        $medias = $property->medias()->get();
        $canDeleteImg = new CarouselImgDeletable(
            true,
            true
        );
        return view('admin.properties.edit', [
            'property' => $property,
            'medias' => $medias,
            'canDeleteImg' => $canDeleteImg,
            'options' => Option::select(['id', 'name'])->get()
        ]);
    }

    public function update(Property $property, PropertiesRequest $request): RedirectResponse
    {
        $property->update($request->validated());
        $this->syncMedias($property, $request);
        $property->options()->sync($request->validated('options'));
        return redirect()
            ->back()
            ->with('success', 'Le bien a bien été modifié !');
    }

    public function destroy(Property $property): RedirectResponse
    {
        $property->delete();
        return redirect()
            ->route('admin.properties.list')
            ->with('success', 'Le bien a bien été supprimé');
    }

    public function show(Property $property): View {
        return view('properties.show', [
            'property' => $property,
        ]);
    }

    public function contact(Property $property, PropertyContactRequest $request) {
        Mail::send(new PropertyContactMail($property, $request->validated()));
        return back()->with('success', 'Votre demande de contact a bien été envoyé.');
    }
}
