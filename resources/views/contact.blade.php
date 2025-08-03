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
    }
    .logo {
      max-height: 100px;
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
    
    
  </style>
</head>

<body>
  <section class="text-center bg-primary text-white py-4">
    <div class="d-flex flex-column justify-content-center align-items-center p-2">
        <img src="{{ asset('images/logo.svg') }}" alt="Logo" class="logo mb-3" width="100" height="100">
        <div class="mx-4">
            <h4 class="mb-3">ကျန်းမာရေးဝန်ကြီးဌာန</h4>
            <h5 class="mb-2">မြိုနယ်ပြည်သူကျန်းမာရေး ဉီစီးဌာန (ဟင်္သာတ)</h5>

        </div>
    </div>
  </section>


<div id="heroCarousel" class="carousel slide position-relative" data-bs-ride="carousel">
    <div class="carousel-inner">
        <!-- Transparent nav overlay, absolute positioned over carousel images -->
        <nav class="py-2 top-0 start-0 w-100" style="background: rgba(255,255,255,0.7); z-index: 2;">
            @include('layouts.welcome_nav')

            <div class="container my-5"></div>
                <div class="row g-2 align-items-center mx-4">
                    <div class="col-lg-7">
                        <div class="card shadow-sm">
                            <div class="card-body p-0">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d24040.513728609832!2d95.45759833220212!3d17.64428124279388!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c0c1a21c04cbe7%3A0x4a362b7290626ea3!2sHinthada%20General%20Hospital!5e1!3m2!1sen!2smm!4v1754187952930!5m2!1sen!2smm" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
                                        <strong>လိပ်စာ:</strong> မြိုနယ်ပြည်သူကျန်းမာရေး ဉီစီးဌာန, ဟင်္သာတမြို့
                                    </li>
                                    <li class="mb-2">
                                        <i class="bx bx-phone"></i>
                                        <strong>ဖုန်း:</strong> 09-123456789, 042-12345
                                    </li>
                                    <li class="mb-2">
                                        <i class="bx bx-envelope"></i>
                                        <strong>အီးမေးလ်:</strong> info@hospital.gov.mm
                                    </li>
                                    <li>
                                        <i class="bx bx-time"></i>
                                        <strong>ဆေးခန်းထိုင်ရက် :</strong> အင်္ဂါ၊ ကြာသပတေး (9:00AM - 4:ူ00PM)
                                    </li>
                                </ul>
                                <div>
                                    <a href="tel:09123456789" class="btn btn-primary me-2">
                                        <i class="bx bx-phone-call"></i> ဖုန်းခေါ်ရန်
                                    </a>
                                    <a href="mailto:info@hospital.gov.mm" class="btn btn-outline-primary">
                                        <i class="bx bx-envelope"></i> အီးမေးလ်ပို့ရန်
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>

</div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'အောင်မြင်သည်!',
                text: '{{ session('success') }}',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'ကောင်းပြီ'
            });
        </script>
    @endif

</html>