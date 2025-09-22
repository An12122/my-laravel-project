@extends('layouts.app')

@section('content')
<div class="d-flex">
    <!-- القائمة الجانبية -->
    <div class="bg-light border-end p-3" style="width: 250px;">
        <h5>لوحة التحكم</h5>
        <ul class="list-unstyled">
            <li><a href="{{ route('courses.create') }}">➕ إضافة دورة</a></li>
            <li><a href="{{ route('courses.index') }}">📚 إدارة الدورات</a></li>
        </ul>
    </div>

    <!-- المحتوى -->
    <div class="flex-grow-1 p-4">
        <h2>مرحبًا بك يا {{ Auth::user()->name }} 👋</h2>
        <p>من هنا يمكنك إدارة الدورات.</p>
    </div>
</div>
@endsection
