<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all(); // جلب كل الدورات من قاعدة البيانات
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        // اجمع البيانات من الفورم
        $data = $request->all();

        // تحقق إذا تم رفع صورة
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads'), $imageName);
            $data['image'] = 'uploads/' . $imageName;
        }

        // أنشئ الدورة في قاعدة البيانات
        Course::create($data);

        return redirect()->route('courses.index');
    }
}
