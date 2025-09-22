<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <title>تعديل الدورة</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gradient-to-b from-[#195233] via-[#9ef8d0] to-white min-h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-lg">
        <h1 class="text-2xl font-bold text-[#195233] mb-6 text-center">تعديل الدورة</h1>

        <form action="{{ route('courses.update', $course->id) }}" method="POST" enctype="multipart/form-data"
            class="flex flex-col gap-4">
            @csrf
            @method('PUT')

            <input type="text" name="title" value="{{ $course->title }}" placeholder="عنوان الدورة"
                class="p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#195233]">

            <textarea name="description" placeholder="وصف الدورة" rows="4"
                class="p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#195233]">{{ $course->description }}</textarea>

            <input type="number" name="price" value="{{ $course->price }}" placeholder="السعر"
                class="p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#195233]">

            <input type="number" name="rating" value="{{ $course->rating }}" placeholder="التقييم"
                class="p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#195233]" min="0"
                max="5">

            <input type="file" name="image" class="p-2 border rounded-lg">

            <div class="flex justify-between mt-4">
                <button type="submit"
                    class="px-6 py-2 bg-[#195233] hover:bg-[#9ef8d0] text-white rounded-lg font-semibold transition">حفظ
                    التعديلات</button>
                <a href="{{ route('courses.index') }}"
                    class="px-6 py-2 bg-red-600 hover:bg-red-400 text-white rounded-lg font-semibold transition">إلغاء</a>
            </div>
        </form>
    </div>

</body>

</html>
