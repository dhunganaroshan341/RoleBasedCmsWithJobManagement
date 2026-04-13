<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SectionCategoryRequest;
use App\Models\SectionCategory;
use App\Models\SectionCategoryImage;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Traits\HandlesImage;

class SectionCategoryController extends Controller
{
    use HandlesImage;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = SectionCategory::query()->orderBy('id', 'desc');

            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('image', function ($item) {
                    $dataimage =   $item->image;
                    $defaultImage = asset('user.png');
                    return ' <td class="py-1">
                    <img src="' . $dataimage . '" width="50" height="50" onerror="this.src=\'' . $defaultImage . '\'"/>
                    </td>';
                })
                ->addColumn('action', function ($item) {

                    $viewUrl = route('admin.section-content.category', $item->id);

                    return '
    <div class="dropdown d-inline-block">

        <button class="btn p-0 m-0 bg-transparent border-0" type="button"
            data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-ellipsis-v"></i>
        </button>

        <ul class="dropdown-menu">

            <li>
                <a class="dropdown-item" href="' . $viewUrl . '">
                    <i class="fas fa-eye me-2"></i> View
                </a>
            </li>

            <li>
                <button type="button"
                    class="dropdown-item editCategoryBtn"
                    data-id="' . $item->id . '">
                    <i class="fas fa-edit me-2"></i> Edit
                </button>
            </li>

            <li>
                <button type="button"
                    class="dropdown-item text-danger deleteCategoryBtn"
                    data-id="' . $item->id . '">
                    <i class="fas fa-trash-alt me-2"></i> Delete
                </button>
            </li>

        </ul>

    </div>
    ';
                })

                ->rawColumns(['action', 'image'])
                ->make(true);
        }

        $extraJs = array_merge(
            config('js-map.admin.datatable.script'),
            config('js-map.admin.summernote.script'),
            config('js-map.admin.dropzone.script'),
            [asset('js/admin/section-content/section-content.js')], // wrap in array

            config('js-map.admin.buttons.script')
        );

        $extraCs = array_merge(
            config('js-map.admin.datatable.style'),
            config('js-map.admin.summernote.style'),
            config('js-map.admin.dropzone.style'),
            config('js-map.admin.buttons.style')
        );

        return view('Admin.pages.SectionCategory.sectionCategoryIndex', [
            'extraJs' => $extraJs,
            'extraCs' => $extraCs
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SectionCategoryRequest $request)
    {
        $data = $request->validated();
        $data['image'] = $this->uploadSingleImage($request, 'image', 'uploads/section-category');

        // First create the category
        $category = SectionCategory::create($data);

        // Then handle multiple images if any
        if ($request->hasFile('images')) {
            $imagePaths = $this->uploadMultipleImages($request, 'images', 'uploads/section-category-images');
            foreach ($imagePaths as $path) {
                $category->images()->create(['image' => $path]);
            }
        }

        return response()->json(['success' => true, 'message' => 'Section Category created successfully.']);
    }

    public function update(SectionCategoryRequest $request, string $id)
    {
        $category = SectionCategory::findOrFail($id);
        $data = $request->validated();
        $data['image'] = $this->uploadSingleImage($request, 'image', 'uploads/section-category', $category);

        $category->update($data);

        // Handle multiple images
        if ($request->hasFile('images')) {
            // Optional: delete old images
            $category->images()->delete();

            $imagePaths = $this->uploadMultipleImages($request, 'images', 'uploads/section-category-images');
            foreach ($imagePaths as $path) {
                $category->images()->create(['image' => $path]);
            }
        }

        return response()->json(['success' => true, 'message' => 'Section Category updated successfully.']);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = SectionCategory::with('images')->findOrFail($id);
        return response()->json($category);
    }


    /**
     * Update the specified resource in storage.
     */


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = SectionCategory::findOrFail($id);

        // Delete single main image
        if ($category->image && file_exists(public_path($category->image))) {
            @unlink(public_path($category->image));
        }

        // Delete multiple images
        if ($category->images()->exists()) {
            foreach ($category->images as $image) {
                if ($image->image && file_exists(public_path($image->image))) {
                    @unlink(public_path($image->image));
                }
            }
            // Delete image records from the database
            $category->images()->delete();
        }

        // Delete the category
        $category->delete();

        return response()->json(['success' => true, 'message' => 'Section Category deleted successfully.']);
    }


    // Upload multiple images for a section category
    public function uploadImages(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:section_categories,id',
            'file' => 'required|image|max:5120', // max 5MB
        ]);

        $category = SectionCategory::findOrFail($request->category_id);

        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $folder = 'uploads/section-category-images';
        $file->move(public_path($folder), $fileName);

        $image = $category->images()->create([
            'image' => $folder . '/' . $fileName
        ]);

        return response()->json(['success' => true, 'id' => $image->id, 'image' => $image->image]);
    }

    // Delete a single uploaded image
    public function deleteImage($id)
    {
        $image = SectionCategoryImage::findOrFail($id);

        if ($image->image && file_exists(public_path($image->image))) {
            @unlink(public_path($image->image));
        }

        $image->delete();

        return response()->json(['success' => true, 'message' => 'Image deleted successfully.']);
    }
}
