<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <title>منصة تطوير المهارات</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gradient-to-b from-[#195233] via-[#9ef8d0] to-white min-h-screen flex items-center justify-center">

    <div class="bg-white rounded-3xl shadow-2xl p-10 max-w-md w-full text-center">
        <h1 class="text-3xl font-extrabold text-[#195233] mb-6">مرحبًا بك في منصة تطوير المهارات</h1>
        <p class="mb-6 text-[#195233] font-medium">اختر أحد الخيارات للمتابعة</p>

        <div class="flex flex-col gap-4">
            <a href="{{ route('login') }}"
                class="px-6 py-3 bg-[#195233] hover:bg-[#9ef8d0] text-white rounded-xl font-semibold transition">تسجيل
                الدخول</a>
            <a href="{{ route('register') }}"
                class="px-6 py-3 bg-[#195233] hover:bg-[#9ef8d0] text-white rounded-xl font-semibold transition">إنشاء
                حساب</a>
        </div>
    </div>

</body>

</html>
