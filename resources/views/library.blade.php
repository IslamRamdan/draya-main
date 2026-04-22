<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>المكتبة القانونية | دراية</title>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" dir="rtl">
    <link rel="stylesheet" href="./library.css">
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark sticky-top p-2"
        style="background: rgba(26, 26, 26, 0.95); backdrop-filter: blur(10px); border-bottom: 2px solid #4E342E;">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center">
                <span style="color: #cab175; font-weight: 800; font-size: 1.4rem;">دِرايَة <small
                        class="text-white fw-light fs-6">| المكتبة الرقمية</small></span>
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#libraryNav" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="libraryNav">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 text-center">
                    <li class="nav-item"><a class="nav-link px-3" href="/">الذهاب للرئيسية</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="{{ route('aamal') }}">الذهاب لصفحة الأعمال</a>
                    </li>
                    <li class="nav-item d-lg-none mt-3">
                        <a href="tel:+966556638924" class="btn btn-outline-gold rounded-pill w-100">966556638924+</a>
                    </li>
                </ul>

                <div class="d-none d-lg-block">
                    <a href="tel:+966556638924" class="btn btn-gold rounded-pill px-4">
                        <i class="fas fa-phone-alt me-2"></i> 966556638924+
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <section class="py-5">
        <div class="container py-4">
            <div class="text-center mb-5">
                <h2 class="fw-black display-5 mb-2" style="color: #4E342E;">المكتبة القانونية</h2>
                <p class="text-muted lead">دليل شامل ومقالات تفصيلية في الأنظمة والتشريعات</p>
            </div>

            <div class="row g-4">
                @foreach ($libraries as $library)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 border-0 shadow-sm custom-card">

                            <div class="overflow-hidden" style="height: 200px;">
                                <img src="{{ $library->image ? asset('storage/' . $library->image) : 'https://via.placeholder.com/800x200' }}"
                                    class="card-img-top h-100 w-100 object-fit-cover transition-img"
                                    alt="{{ $library->title }}">
                            </div>

                            <div class="card-body p-4 transition-content">

                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="card-title fw-bold m-0">
                                        {{ $library->title }}
                                    </h4>

                                    <span class="badge bg-gold-soft text-dark">
                                        {{ $library->case_type }}
                                    </span>
                                </div>

                                <p class="card-text text-secondary small">
                                    {{ Str::limit($library->description, 120) }}
                                </p>

                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
