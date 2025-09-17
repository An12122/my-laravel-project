<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // عرض جميع الدورات
    public function index()
    {
        $courses = Course::all(); // جلب كل الدورات من قاعدة البيانات
        return view('courses.index', compact('courses'));
    }

    // نموذج إنشاء دورة جديدة
    public function create()
    {
        return view('admin.create-course');
    }

    // تخزين دورة جديدة
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'rating' => 'required|numeric|min:0|max:5',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads'), $imageName);
            $data['image'] = 'uploads/' . $imageName;
        }

        Course::create($data);

        return redirect()->route('courses.index')->with('success', 'تم إضافة الدورة بنجاح!');
    }

    // نموذج تعديل الدورة
    public function edit(Course $course)
    {
        return view('admin.edit-course', compact('course'));
    }

    // تحديث الدورة
    public function update(Request $request, Course $course)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'rating' => 'required|numeric|min:0|max:5',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads'), $imageName);
            $data['image'] = 'uploads/' . $imageName;
        }

        $course->update($data);

        return redirect()->route('courses.index')->with('success', 'تم تعديل الدورة بنجاح!');
    }

    // حذف الدورة
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->back()->with('success', 'تم حذف الدورة بنجاح!');
    }
}
