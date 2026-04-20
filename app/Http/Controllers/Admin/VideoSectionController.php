<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VideoSection;
use Illuminate\Http\Request;

class VideoSectionController extends Controller
{
    /**
     * LIST
     */
    public function index(Request $request)
    {
        $query = VideoSection::query();

        if ($request->search) {
            $query->where('section', 'like', '%' . $request->search . '%');
        }

        $videoSections = $query->latest()->get();

        return view('Admin.pages.VideoSection.index', compact('videoSections'));
    }

    /**
     * CREATE FORM
     */
    public function create()
    {
        return view('Admin.pages.VideoSection.form', [
            'videoSection' => null
        ]);
    }

    /**
     * EDIT FORM
     */
    public function edit(VideoSection $videoSection)
    {
        return view('Admin.pages.VideoSection.form', compact('videoSection'));
    }

    /**
     * STORE
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'section' => 'required|in:home_1,home_2,home_3',
            'video_urls' => 'nullable|array',
        ]);

        $videos = $this->formatVideos($request->video_urls);

        VideoSection::create([
            'section' => $validated['section'],
            'video_urls' => $videos,
        ]);

        return redirect()->route('admin.video-sections.index')
            ->with('success', 'Video section created successfully!');
    }

    /**
     * UPDATE
     */
    public function update(Request $request, VideoSection $videoSection)
    {
        $validated = $request->validate([
            'section' => 'required|in:home_1,home_2,home_3',
            'video_urls' => 'nullable|array',
        ]);

        $videos = $this->formatVideos($request->video_urls);

        $videoSection->update([
            'section' => $validated['section'],
            'video_urls' => $videos,
        ]);

        return redirect()
            ->route('admin.video-sections.index')
            ->with('success', 'Video section updated successfully!');
    }

    /**
     * DELETE
     */
    public function destroy(VideoSection $videoSection)
    {
        $videoSection->delete();

        return redirect()
            ->route('admin.video-sections.index')
            ->with('success', 'Video section deleted successfully!');
    }

    /**
     * CLEAN VIDEO FORMATTER
     * Converts:
     * [
     *   ['url' => '...', 'thumbnail' => '...']
     * ]
     */
    private function formatVideos($videos)
    {
        if (!$videos) return null;

        $clean = [];

        foreach ($videos as $video) {

            if (empty($video['url'])) continue;

            $thumbnailPath = null;

            // 📸 handle uploaded file
            if (isset($video['thumbnail']) && $video['thumbnail'] instanceof \Illuminate\Http\UploadedFile) {
                $thumbnailPath = $video['thumbnail']->store('video_thumbnails', 'public');
            }

            $clean[] = [
                'url' => $video['url'],
                'thumbnail' => $thumbnailPath,
            ];
        }

        return !empty($clean) ? $clean : null;
    }
}
