<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <title>لوحة الأدمن</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gradient-to-b from-[#195233] via-[#9ef8d0] to-white min-h-screen flex items-center justify-center">

    <div class="bg-white rounded-2xl shadow-xl p-10 max-w-lg w-full text-center">
        <h1 class="text-3xl font-bold text-[#195233] mb-6">لوحة تحكم الأدمن</h1>

        <a href="{{ route('courses.create') }}"
            class="px-6 py-3 bg-[#195233] hover:bg-[#9ef8d0] text-white rounded-lg font-semibold transition mb-4 inline-block">إضافة
            دورة</a>

        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
            class="px-6 py-3 bg-[#195233] hover:bg-[#9ef8d0] text-white rounded-lg font-semibold transition">
            تسجيل الخروج
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>
    </div>

</body>

</html>
