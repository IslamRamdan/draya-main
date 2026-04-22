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
        $data = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
        ]);

        Work::create($data);

        return redirect()->route('works.index')->with('success', 'تمت الإضافة');
    }

    public function edit($id)
    {
        $work = Work::findOrFail($id);
        return view('works.edit', compact('work'));
    }

    public function update(Request $request, $id)
    {
        $work = Work::findOrFail($id);

        $data = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
        ]);

        $work->update($data);

        return redirect()->route('works.index')->with('success', 'تم التعديل');
    }

    public function destroy($id)
    {
        $work = Work::findOrFail($id);
        $work->delete();

        return redirect()->route('works.index')->with('success', 'تم الحذف');
    }
}
