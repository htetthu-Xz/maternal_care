<!DOCTYPE html>
<html lang="my">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maternal Care System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />
    <style>
        body {
            font-family: "Myanmar Text", sans-serif;
            background: linear-gradient(135deg, #e0eafc 0%, #cfdef3 100%);
            min-height: 100vh;
        }
        .logo {
            max-height: 100px;
            filter: drop-shadow(0 2px 8px rgba(0,0,0,0.08));
        }
        .header-section {
            background: linear-gradient(90deg, #0d6efd 60%, #5fa8d3 100%);
            box-shadow: 0 4px 24px rgba(13,110,253,0.08);
            border-radius: 0 0 32px 32px;
        }
        .header-section h4, .header-section h5 {
            text-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        .carousel-img {
            height: 400px;
            object-fit: cover;
        }
        .nav-link {
            display: flex;
            flex-direction: column;
            font-weight: 500;
        }
        .nav-link span.en {
            font-size: 0.75rem;
            color: #6c757d;
        }
        .active {
            color: #0d6efd !important;
            font-weight: bold !important;
        }
        .chapter-list {
            max-width: 600px;
            margin: 2rem auto;
            background: #fff;
            border-radius: 24px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
            padding: 2rem 1.5rem;
        }
        .list-group-item {
            border: none;
            border-radius: 16px !important;
            margin-bottom: 1rem;
            transition: box-shadow 0.2s, transform 0.2s;
            box-shadow: 0 2px 8px rgba(13,110,253,0.05);
        }
        .list-group-item:hover {
            background: linear-gradient(90deg, #e0eafc 60%, #cfdef3 100%);
            box-shadow: 0 4px 16px rgba(13,110,253,0.12);
            transform: translateY(-2px) scale(1.02);
        }
        .chapter-title {
            font-size: 1.1rem;
            color: #0d6efd;
            font-weight: bold;
        }
        .chapter-desc {
            font-size: 1rem;
            color: #333;
        }
        @media (max-width: 600px) {
            .chapter-list {
                padding: 1rem 0.5rem;
            }
            .logo {
                max-height: 70px;
            }
        }
    </style>
</head>

<body>
    <section class="text-center header-section text-white py-4 mb-4">
        <div class="d-flex flex-column justify-content-center align-items-center p-2">
            <img src="{{ asset('images/logo.svg') }}" alt="Logo" class="logo mb-3" width="100" height="100">
            <div class="mx-4">
                <h4 class="mb-3">ကျန်းမာရေးဝန်ကြီးဌာန</h4>
                <h5 class="mb-2">မြိုနယ်ပြည်သူကျန်းမာရေး ဦးစီးဌာန (ဟင်္သာတ)</h5>
            </div>
        </div>
    </section>

    <nav class="py-2 w-100 mb-3" style="background: rgba(255,255,255,0.7); box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
        @include('layouts.welcome_nav')
    </nav>

    <div class="my-5"></div>
        <div class="row g-2 align-items-center mx-4">
            <div class="col-lg-7">
                <div class="card shadow-sm">
                    <div class="card-body p-0">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d631.7293252302326!2d95.46123171578725!3d17.646472384782413!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c0c1dfe1630d8b%3A0x1090bf9de1ba4bab!2z4YCV4YC84YCK4YC64YCe4YCw4YC34YCA4YC74YCU4YC64YC44YCZ4YCs4oCL4YCb4YCx4YC44YCM4YCs4YCU!5e1!3m2!1sen!2smm!4v1755007190237!5m2!1sen!2smm" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title mb-3">ဆက်သွယ်ရန်အချက်အလက်</h5>
                        <ul class="list-unstyled mb-3">
                            <li class="mb-2">
                                <i class="bx bx-map"></i>
                                <strong>လိပ်စာ:</strong> ဘုရားလမ်း၊ ဥယျာဥ်မြောက်ရပ်ကွက်၊ ဟင်္သာတမြို့
                            </li>
                            <li class="mb-2">
                                <i class="bx bx-phone"></i>
                                <strong>ဖုန်း:</strong> 09-424803500
                            </li>
                            <li class="mb-2">
                                <i class="bx bx-envelope"></i>
                                <strong>အီးမေးလ်:</strong> info@hospital.gov.mm
                            </li>
                            <li>
                                <i class="bx bx-time"></i>
                                <strong>ဆေးခန်းထိုင်ရက် :</strong> အင်္ဂါ၊ ကြာသပတေး (9:00AM - 4:00PM)
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="text-center py-3 mt-5" style="color:#6c757d;font-size:0.95rem;">
        &copy; {{ date('Y') }} Maternal Care System. All rights reserved.
    </footer>
</body>
</html>
