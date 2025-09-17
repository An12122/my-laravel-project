<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>لوحة المستخدم</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-b from-[#195233] via-[#9ef8d0] to-white min-h-screen flex items-center justify-center">

    <div class="bg-white rounded-3xl shadow-2xl p-10 max-w-lg w-full text-center">
        <h1 class="text-3xl font-extrabold text-[#195233] mb-6">مرحبًا بك في لوحة التحكم</h1>
        <p class="text-[#195233] mb-6">يمكنك هنا مشاهدة الدورات وإدارة حسابك.</p>

        <a href="{{ route('courses.index') }}" 
           class="px-6 py-3 bg-[#195233] hover:bg-[#9ef8d0] text-white rounded-xl font-semibold transition">عرض جميع الدورات</a>

        <form method="POST" action="{{ route('logout') }}" class="mt-4">
            @csrf
            <button type="submit" 
                    class="px-6 py-3 bg-[#195233] hover:bg-[#9ef8d0] text-white rounded-xl font-semibold transition">تسجيل الخروج</button>
        </form>
    </div>

</body>
</html>
