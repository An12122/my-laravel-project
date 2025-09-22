<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <title>إضافة دورة جديدة</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gradient-to-b from-[#195233] via-[#9ef8d0] to-white min-h-screen flex items-center justify-center">

    <div class="bg-white rounded-3xl shadow-2xl p-8 max-w-sm w-full">
        <h1 class="text-2xl font-extrabold text-[#195233] mb-5 text-center">إضافة دورة جديدة</h1>

        <form method="POST" action="{{ route('courses.store') }}" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div>
                <label class="block text-[#195233] mb-1 font-medium">عنوان الدورة</label>
                <input type="text" name="title" required
                    class="w-full border border-[#195233] rounded-xl p-2 focus:outline-none focus:ring-2 focus:ring-[#9ef8d0] text-[#195233]">
            </div>
            <div>
                <label class="block text-[#195233] mb-1 font-medium">وصف الدورة</label>
                <textarea name="description" rows="3" required
                    class="w-full border border-[#195233] rounded-xl p-2 focus:outline-none focus:ring-2 focus:ring-[#9ef8d0] text-[#195233]"></textarea>
            </div>
            <div>
                <label class="block text-[#195233] mb-1 font-medium">السعر</label>
                <input type="number" name="price" required
                    class="w-full border border-[#195233] rounded-xl p-2 focus:outline-none focus:ring-2 focus:ring-[#9ef8d0] text-[#195233]">
            </div>
            <div>
                <label class="block text-[#195233] mb-1 font-medium">التقييم</label>
                <input type="number" name="rating" step="0.1" max="5" min="0"
                    class="w-full border border-[#195233] rounded-xl p-2 focus:outline-none focus:ring-2 focus:ring-[#9ef8d0] text-[#195233]">
            </div>
            <div>
                <label class="block text-[#195233] mb-1 font-medium">صورة الدورة</label>
                <input type="file" name="image"
                    class="w-full border border-[#195233] rounded-xl p-1 focus:outline-none focus:ring-2 focus:ring-[#9ef8d0] text-[#195233]">
            </div>
            <button type="submit"
                class="w-full bg-[#195233] hover:bg-[#9ef8d0] text-white py-2 rounded-xl font-semibold transition">إضافة
                الدورة</button>
        </form>

        <div class="mt-4 text-center">
            <a href="{{ route('admin.dashboard') }}" class="text-[#195233] hover:underline font-medium">العودة للوحة
                الأدمن</a>
        </div>
    </div>

</body>

</html>
