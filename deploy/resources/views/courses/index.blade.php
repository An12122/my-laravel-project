<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <title>جميع الدورات</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gradient-to-b from-[#195233] via-[#9ef8d0] to-white min-h-screen flex items-center justify-center">

    <div class="max-w-5xl w-full p-6">
        <h1 class="text-3xl font-extrabold text-[#195233] mb-8 text-center">جميع الدورات</h1>

        @if (session('success'))
            <div class="bg-green-200 text-green-800 p-3 rounded mb-4 text-center">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($courses as $course)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden flex flex-col">
                    @if ($course->image)
                        <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}"
                            class="w-[200px] h-[150px] object-cover rounded-lg mx-auto">
                    @endif
                    <div class="p-4 flex-1 flex flex-col justify-between">
                        <div>
                            <h2 class="text-xl font-bold text-[#195233] mb-2">{{ $course->title }}</h2>
                            <p class="text-[#195233] text-sm mb-3">{{ $course->description }}</p>
                        </div>
                        <div class="flex justify-between items-center mt-4">
                            <span class="text-[#195233] font-semibold">{{ $course->price }} ريال</span>
                            <span
                                class="text-[#195233] bg-[#9ef8d0] px-3 py-1 rounded-full text-sm">{{ $course->rating }}/5</span>
                        </div>

                        <!-- زر الحذف -->
                        <form action="{{ route('courses.destroy', $course->id) }}" method="POST"
                            class="mt-3 text-center">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-4 py-2 bg-red-600 hover:bg-red-400 text-white rounded-lg transition">
                                حذف الدورة
                            </button>
                            <a href="{{ route('courses.edit', $course->id) }}"
                                class="px-3 py-1 mt-2 bg-blue-600 hover:bg-blue-400 text-white rounded-lg transition text-sm inline-block">
                                تعديل الدورة
                            </a>

                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-8 text-center">
            <a href="{{ auth()->user()->email === 'an@test.com' ? route('admin.dashboard') : route('dashboard') }}"
                class="px-6 py-3 bg-[#195233] hover:bg-[#9ef8d0] text-white rounded-xl font-semibold transition">العودة
                للوحة التحكم</a>
        </div>
    </div>

</body>

</html>
