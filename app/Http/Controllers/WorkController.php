<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    //
    public function index()
    {
        $works = Work::latest()->paginate(12);
        return view('works.index', compact('works'));
    }

    public function create()
    {
        return view('works.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable',
            'description' => 'nullable|string',
        ]);

        $data = $request->only(['title', 'description']);

        // رفع الصورة
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('works', 'public');
        }

        $work = Work::create($data);

        return redirect()->route('works.index')
            ->with('success', 'تم إضافة العمل بنجاح');
    }

    public function edit($id)
    {
        $work = Work::findOrFail($id);
        return view('works.edit', compact('work'));
    }

    public function update(Request $request, $id)
    {
        $work = Work::findOrFail($id);

        $request->validate([
            'title' => 'sometimes|string|max:255',
            'image' => 'nullable',
            'description' => 'nullable|string',
        ]);

        $data = $request->only(['title', 'description']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('works', 'public');
        }

        $work->update($data);

        return redirect()->route('works.index')
            ->with('success', 'تم تحديث العمل بنجاح');
    }

    public function destroy($id)
    {
        $work = Work::findOrFail($id);
        $work->delete();

        return redirect()->route('works.index')->with('success', 'تم الحذف');
    }
}
