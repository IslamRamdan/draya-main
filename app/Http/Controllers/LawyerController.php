<?php

namespace App\Http\Controllers;

use App\Models\Lawyer;
use Illuminate\Http\Request;

class LawyerController extends Controller
{
    //
    public function index()
    {
        $lawyers = Lawyer::latest()->get();
        return view('lawyers.index', compact('lawyers'));
    }

    public function create()
    {
        return view('lawyers.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('lawyers', 'public');
        }

        Lawyer::create($data);

        return redirect()->route('lawyers.index')->with('success', 'تمت الإضافة');
    }

    public function edit($id)
    {
        $lawyer = Lawyer::findOrFail($id);
        return view('lawyers.edit', compact('lawyer'));
    }

    public function update(Request $request, $id)
    {
        $lawyer = Lawyer::findOrFail($id);

        $data = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        if ($request->hasFile('image')) {

            if ($lawyer->image && file_exists(public_path('storage/' . $lawyer->image))) {
                unlink(public_path('storage/' . $lawyer->image));
            }

            $data['image'] = $request->file('image')->store('lawyers', 'public');
        }

        $lawyer->update($data);

        return redirect()->route('lawyers.index')->with('success', 'تم التعديل');
    }

    public function destroy($id)
    {
        $lawyer = Lawyer::findOrFail($id);

        if ($lawyer->image && file_exists(public_path('storage/' . $lawyer->image))) {
            unlink(public_path('storage/' . $lawyer->image));
        }

        $lawyer->delete();

        return redirect()->route('lawyers.index')->with('success', 'تم الحذف');
    }
}
