<!doctype html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>أعمالنا | مكتب دراية للإستشارات القانونية</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="../Style/style.css" />
    <style>
        /* Navbar Customization */
        .navbar {
            background-color: var(--navy);
            border-bottom: 3px solid var(--gold);
        }

        .navbar-brand,
        .nav-link {
            color: var(--cafe) !important;
        }

        .nav-link:hover {
            color: var(--gold) !important;
        }

        /* Hero Section */
        .hero-section {
            background:
                linear-gradient(rgba(34, 21, 16, 0.473),
                    rgba(61, 43, 31, 0.363)),
                url("../Style/Photos/hero.png");
            background-size: cover;
            background-position: center;
            color: var(--cafe);
            padding: 100px 0;
            text-align: center;
        }

        .hero-section h1 {
            color: var(--gold);
            font-size: 3.5rem;
            margin-bottom: 20px;
        }

        /* Cards Style */
        .card-work {
            background: white;
            border: none;
            border-radius: 0;
            border-right: 5px solid var(--gold);
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            height: 100%;
        }

        .card-work:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .icon-box {
            color: var(--gold);
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .btn-gold {
            background-color: var(--gold);
            color: var(--navy);
            font-weight: bold;
            border: none;
            padding: 10px 25px;
            transition: 0.3s;
        }

        .btn-gold:hover {
            background-color: var(--wood-dark);
            color: var(--cafe);
        }

        footer {
            background-color: var(--navy);
            color: var(--cafe);
            padding: 40px 0;
            margin-top: 50px;
        }

        .section-title {
            position: relative;
            margin-bottom: 50px;
            padding-bottom: 15px;
        }

        .section-title::after {
            content: "";
            position: absolute;
            bottom: 0;
            right: 0;
            width: 60px;
            height: 3px;
            background-color: var(--gold);
        }

        .card-work img {
            transition: transform 0.4s ease;
        }

        .card-work:hover img {
            transform: scale(1.05);
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold fs-3">مكتب دراية</a>
            <button class="navbar-toggler" style="border: 3px solid white" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">
                            الذهاب للصفحة الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('library') }}">الذهاب للمكتبة القانونية</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="hero-section">
        <div class="container">
            <nav aria-label="breadcrumb"></nav>
            <h1>سجلّ الإنجازات والنجاحات</h1>
            <p class="lead shadow-sm fs-3 fw-bold">
                نحن في مكتب دراية، نؤمن أن القوة تكمن في المعرفة والعدالة
                تكمن في التفاصيل.
            </p>
        </div>
    </header>

    <section class="py-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8">
                    <h2 class="section-title">مجالات التميز القانوني</h2>
                    <p class="text-muted">
                        نستعرض لكم أبرز المحطات والخدمات التي قدمناها
                        لعملائنا في مختلف التخصصات القانونية.
                    </p>
                </div>
            </div>

            <div class="row g-4">

                @foreach ($works as $work)
                    <div class="col-md-4">
                        <div class="card card-work p-0 h-100 overflow-hidden">

                            {{-- الصورة --}}
                            @php
                                $file = $work->image;
                                $extension = pathinfo($file, PATHINFO_EXTENSION);
                            @endphp

                            @if ($file)
                                @if (strtolower($extension) === 'pdf')
                                    {{-- عرض صورة PDF --}}
                                    <div
                                        style="height:200px; overflow:hidden; display:flex; align-items:center; justify-content:center;">
                                        <img src="https://img.freepik.com/vecteurs-premium/icone-du-logiciel-pdf_539007-781.jpg?semt=ais_hybrid&w=740"
                                            alt="PDF File" style="max-height:100%; object-fit:contain;">
                                    </div>

                                    {{-- زر فتح --}}
                                    <div class="mt-2 text-center">
                                        <a href="{{ asset('storage/' . $file) }}" target="_blank"
                                            class="btn btn-danger">
                                            فتح الملف PDF
                                        </a>
                                    </div>
                                @else
                                    {{-- عرض الصورة --}}
                                    <div style="height:200px; overflow:hidden;">
                                        <img src="{{ asset('storage/' . $file) }}" alt="{{ $work->title }}"
                                            style="width:100%; height:100%; object-fit:cover;">
                                    </div>

                                    {{-- زر عرض --}}
                                    <div class="mt-2 text-center">
                                        <a href="{{ asset('storage/' . $file) }}" target="_blank"
                                            class="btn btn-primary">
                                            عرض الصورة
                                        </a>
                                    </div>
                                @endif
                            @endif

                            <div class="p-4">
                                <div class="icon-box mb-3">
                                    <i class="fas fa-gavel"></i>
                                </div>

                                <h4 class="fw-bold">
                                    {{ $work->title }}
                                </h4>

                                <p class="text-muted">
                                    <span id="short-desc-{{ $work->id }}">
                                        {{ \Illuminate\Support\Str::limit($work->description, 120) }}
                                    </span>

                                    <span id="full-desc-{{ $work->id }}" style="display: none;">
                                        {{ $work->description }}
                                    </span>
                                </p>

                                <button class="btn btn-link p-0" onclick="toggleDesc({{ $work->id }})"
                                    id="btn-{{ $work->id }}">
                                    عرض المزيد
                                </button>

                                <script>
                                    function toggleDesc(id) {
                                        let shortDesc = document.getElementById('short-desc-' + id);
                                        let fullDesc = document.getElementById('full-desc-' + id);
                                        let btn = document.getElementById('btn-' + id);

                                        if (fullDesc.style.display === 'none') {
                                            shortDesc.style.display = 'none';
                                            fullDesc.style.display = 'inline';
                                            btn.innerText = 'عرض أقل';
                                        } else {
                                            shortDesc.style.display = 'inline';
                                            fullDesc.style.display = 'none';
                                            btn.innerText = 'عرض المزيد';
                                        }
                                    }
                                </script>
                            </div>

                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <section class="py-5" style="background-color: var(--cafe)">
        <div class="container text-center">
            <h2 class="mb-4">هل تحتاج إلى استشارة قانونية متخصصة؟</h2>
            <p class="mb-4">
                فريق "دراية" مستعد لدعمك في كافة التحديات القانونية التي
                تواجهك.
            </p>
            <a href="tel:0556638924" class="btn btn-gold btn-lg">احجز موعدك الآن</a>
        </div>
    </section>

    <footer>
        <div class="container text-center">
            <h3 class="mb-3">مكتب دراية للإستشارات القانونية</h3>
            <p>العدالة.. هي هدفنا والريادة هي دربنا</p>
            <div class="social-links mt-4">
                <a href="https://x.com/drayh_low?s=21&t=AYKZI0ojjPsKcs-Z5b6hvg" target="_blank" title="Twitter"><i
                        class="bi bi-twitter-x"></i></a>

                <a href="https://www.instagram.com/dry92187?igsh=MXIyNGRhNGE4emtueA==" target="_blank"
                    title="Instagram"><i class="bi bi-instagram"></i></a>

                <a href="https://www.snapchat.com/add/drh.law?share_id=mjkVgEXK1TU&locale=ar-EG" target="_blank"
                    title="Snapchat"><i class="bi bi-snapchat"></i></a>

                <a href="https://www.tiktok.com/@user7598703270051?_r=1&_t=ZS-95RxLxf07jZ" target="_blank"
                    title="TikTok"><i class="bi bi-tiktok"></i></a>

                <a href="https://www.facebook.com/share/1GkToW4QYs/" target="_blank" title="Facebook"><i
                        class="bi bi-facebook"></i></a>

                <a href="https://wa.me/201044741051" target="_blank" title="WhatsApp"><i
                        class="bi bi-whatsapp"></i></a>

                <a href="mailto:derayah.low@gmail.com" title="Email"><i class="bi bi-envelope-fill"></i></a>
            </div>
            <hr class="my-4 border-secondary" />
            <p class="small mb-0">
                جميع الحقوق محفوظة &copy; 2026 مكتب دراية
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
