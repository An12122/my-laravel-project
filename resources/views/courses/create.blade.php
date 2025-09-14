<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إنشاء دورة جديدة</title>
    <!-- Bootstrap RTL -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <style>
        body {
            background: #f5f5f5;
        }

        .card-header {
            /* تدرج البنفسجي */
            background: linear-gradient(45deg, #8e44ad, #9b59b6);
            color: white;
        }

        .card {
            border-radius: 15px;
        }

        .form-label {
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <div class="card shadow-lg mx-auto" style="max-width:600px;">
            <div class="card-header text-center">
                <h3>إضافة دورة جديدة</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">عنوان الدورة</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">الوصف</label>
                        <textarea name="description" class="form-control" rows="4" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">السعر ($)</label>
                        <input type="number" name="price" step="0.01" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">التقييم (0-5)</label>
                        <input type="number" name="rating" step="0.1" min="0" max="5"
                            class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">غلاف الدورة (صورة)</label>
                        <input type="file" name="image" class="form-control" accept="image/*">
                    </div>

                    <button type="submit" class="btn btn-gradient w-100 text-white"
                        style="background: linear-gradient(45deg,#8e44ad,#9b59b6); border:none;">إنشاء الدورة</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
