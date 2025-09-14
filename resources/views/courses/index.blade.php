<!DOCTYPE html>
<html lang="ar" dir="rtl">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الدورات</title>
    <!-- ربط Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <h2 class="mb-4">جميع الدورات</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($courses as $course)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        @if ($course->image)
                            <img src="{{ asset($course->image) }}" class="card-img-top" alt="غلاف الدورة"
                                style="height:200px; object-fit:cover;">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $course->title }}</h5>
                            <p class="card-text">{{ Str::limit($course->description, 100) }}</p>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <span class="text-success fw-bold">${{ $course->price }}</span>
                            <span>⭐ ⭐ ⭐ ⭐ {{ $course->rating }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</body>

</html>
