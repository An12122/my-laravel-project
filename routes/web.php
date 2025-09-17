<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourseController;
// الصفحة الرئيسية
Route::get('/', function () {
    return view('welcome'); // لازم يكون نفس الملف اللي عدّلتيه
});


// ==================== Auth ====================

// تسجيل الدخول
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

// إنشاء حساب
Route::get('/register', [AuthenticatedSessionController::class, 'register'])->name('register');
Route::post('/register', [AuthenticatedSessionController::class, 'storeRegister']);

// تسجيل الخروج
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


// ==================== Protected Routes ====================
Route::middleware('auth')->group(function () {

    // Dashboard المستخدم العادي
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // لوحة الأدمن
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    Route::middleware(['auth'])->group(function () {
        Route::delete('/admin/courses/{course}', function (App\Models\Course $course) {
            $course->delete();
            return redirect()->back()->with('success', 'تم حذف الدورة بنجاح!');
        })->name('courses.destroy');
    });


    Route::middleware(['auth'])->group(function () {

        // عرض نموذج تعديل الدورة
        Route::get('/admin/courses/{course}/edit', [CourseController::class, 'edit'])->name('courses.edit');

        // تحديث الدورة
        Route::put('/admin/courses/{course}', [CourseController::class, 'update'])->name('courses.update');
    });



    // Admin Courses
    Route::get('/admin/courses/create', function () {
        $user = auth()->user();
        if (!$user || $user->email !== 'an@test.com') abort(403);
        return view('admin.create-course');
    })->name('courses.create');

    Route::post('/admin/courses', function (Request $request) {
        $user = auth()->user();
        if (!$user || $user->email !== 'an@test.com') abort(403);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('courses', 'public');
        }

        Course::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'rating' => $request->rating,
            'image' => $imagePath,
        ]);

        return redirect()->route('courses.index');
    })->name('courses.store');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ==================== Public Courses ====================
Route::get('/courses', function () {
    $courses = Course::all();
    return view('courses.index', compact('courses'));
})->name('courses.index');
