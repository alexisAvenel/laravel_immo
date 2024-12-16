<?php

namespace App\Http\Controllers;

use App\Http\Requests\OptionsRequest;
use App\Models\Option;
use Illuminate\Support\Facades\File;

class OptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $options = Option::paginate(10);
        return view('admin.options.list', compact('options'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OptionsRequest $request)
    {
        Option::create($request->validated());
        return redirect()
            ->route('admin.options.list')
            ->with('success', 'L\'option a bien été créée !');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $option = new Option();
        $bootstrapIcons = $this->getBootstrapIcons();
        return view('admin.options.create', [
            'option' => $option,
            'bootstrapIcons' => $bootstrapIcons
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Option $option)
    {
        $bootstrapIcons = $this->getBootstrapIcons();
        return view('admin.options.edit', [
            'option' => $option,
            'bootstrapIcons' => $bootstrapIcons
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OptionsRequest $request, Option $option)
    {
        $option->update($request->validated());
        return redirect()
            ->back()
            ->with('success', 'L\'option a bien été modifiée !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Option $option)
    {
        $option->delete();
        return redirect()
            ->route('admin.options.list')
            ->with('success', 'L\'option a bien été supprimée !');
    }

    private function getBootstrapIcons(): array {
        return File::json(base_path('/node_modules/bootstrap-icons/font/bootstrap-icons.json'), JSON_THROW_ON_ERROR);
    }
}
