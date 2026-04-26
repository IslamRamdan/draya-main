<?php

namespace App\Http\Controllers;

use App\Models\Library;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    //
    public function index()
    {
        $libraries = Library::latest()->get();
        return view('libraries.index', compact('libraries'));
    }

    public function create()
    {
        return view('libraries.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'case_type' => 'required',
            'image' => 'nullable'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('libraries', 'public');
        }

        Library::create($data);

        return redirect()->route('libraries.index')->with('success', 'تمت الإضافة بنجاح');
    }

    public function edit($id)
    {
        $library = Library::findOrFail($id);
        return view('libraries.edit', compact('library'));
    }

    public function update(Request $request, $id)
    {
        $library = Library::findOrFail($id);

        $data = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'case_type' => 'required',
            'image' => 'nullable'
        ]);

        if ($request->hasFile('image')) {
            // حذف الصورة القديمة
            if ($library->image && file_exists(public_path('storage/' . $library->image))) {
                unlink(public_path('storage/' . $library->image));
            }

            $data['image'] = $request->file('image')->store('libraries', 'public');
        }

        $library->update($data);

        return redirect()->route('libraries.index')->with('success', 'تم التعديل بنجاح');
    }

    public function destroy($id)
    {
        $library = Library::findOrFail($id);

        if ($library->image && file_exists(public_path('storage/' . $library->image))) {
            unlink(public_path('storage/' . $library->image));
        }

        $library->delete();

        return redirect()->route('libraries.index')->with('success', 'تم الحذف بنجاح');
    }
}
