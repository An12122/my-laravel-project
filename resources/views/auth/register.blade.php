<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>إنشاء حساب</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-b from-[#195233] via-[#9ef8d0] to-white min-h-screen flex items-center justify-center">

    <div class="bg-white rounded-2xl shadow-xl p-10 max-w-md w-full">
        <h1 class="text-2xl font-bold text-[#195233] mb-6 text-center">إنشاء حساب</h1>

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf
            <div>
                <label class="block text-[#195233] mb-1">الاسم</label>
                <input type="text" name="name" required class="w-full border border-[#195233] rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#9ef8d0]">
            </div>
            <div>
                <label class="block text-[#195233] mb-1">البريد الإلكتروني</label>
                <input type="email" name="email" required class="w-full border border-[#195233] rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#9ef8d0]">
            </div>
            <div>
                <label class="block text-[#195233] mb-1">كلمة المرور</label>
                <input type="password" name="password" required class="w-full border border-[#195233] rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#9ef8d0]">
            </div>
            <div>
                <label class="block text-[#195233] mb-1">تأكيد كلمة المرور</label>
                <input type="password" name="password_confirmation" required class="w-full border border-[#195233] rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#9ef8d0]">
            </div>
            <button type="submit" class="w-full bg-[#195233] hover:bg-[#9ef8d0] text-white py-2 rounded-lg font-semibold transition">إنشاء الحساب</button>
        </form>

        <div class="mt-6 text-center">
            <a href="{{ url('/') }}" class="text-[#195233] hover:underline font-medium">العودة للصفحة الرئيسية</a>
        </div>
    </div>

</body>
</html>
