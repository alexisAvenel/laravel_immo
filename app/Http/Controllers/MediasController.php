<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediasController extends Controller
{
    public function destroy(Media $media, Request $request): JsonResponse
    {
        if (!$media->exists) {
            return response()->json(['message' => 'Media not found'], 404);
        }
        Storage::disk('public')->delete('properties/' . $media->private_name);
        $media->delete();
        $request->session()->flash('success', 'L\'image a bien été supprimée !');
        return response()->json(null, 204);
    }
}
