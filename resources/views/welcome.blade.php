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

    .carousel-img {
        height: 430px;
        object-fit: cover;
    }
    
    .department-btn {
        border: none;
        border-radius: 15px;
        color: white;
        padding: 25px 20px;
        margin: 10px 0;
        transition: all 0.3s ease;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        min-height: 140px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        position: relative;
        overflow: hidden;
    }
    
    .department-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transition: left 0.5s;
    }
    
    .department-btn:hover::before {
        left: 100%;
    }
    
    .department-btn:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 35px rgba(0,0,0,0.2);
        color: white;
        text-decoration: none;
    }
    
    .department-text {
        text-align: center;
        font-weight: 600;
        font-size: 1rem;
        line-height: 1.4;
        z-index: 1;
        position: relative;
    }
    
    .dept-1 { background-color: #0D6EFD; }
    .dept-2 { background-color: #c53030; }
    .dept-3 { background-color: #f7fb02; }
    .dept-4 { background-color: #10ac0b; }
    .dept-5 { background-color: #7c3aed; }
    .dept-6 { background-color: #08a880; }

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
        <nav class="py-2 position-absolute top-0 start-0 w-100" style="background: rgba(255,255,255,0.7); z-index: 2;">
            @include('layouts.welcome_nav')
        </nav>
        <div class="carousel-item active">
            <img src="{{ asset('images/hero1.jpg') }}" class="d-block w-100 carousel-img" alt="Mother 1">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/hero2.JPG') }}" class="d-block w-100 carousel-img" alt="Mother 2">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/hero3.jpg') }}" class="d-block w-100 carousel-img" alt="Hospital">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </button>
</div>

<!-- Departments Section -->
<section class="py-5" style="background-color: #f8fafc;">
    <div class="container-fluid px-4 py-4">
        <div class="text-center mb-5">
            <h2 class="mb-3" style="color: #1e293b; font-weight: 700;">ကျန်းမာရေးဝန်ကြီးဌာနလက်အောက်ရှိ ဉီးစီးဌာနများ</h2>
            <p class="lead text-muted">Directorates under Ministry of Health and Sports</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <a href="#" class="department-btn w-100 dept-1">
                    <div class="department-text">
                        ပြည်သူကျန်းမာရေး<br>
                        ဉီးစီးဌာန
                    </div>
                </a>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <a href="#" class="department-btn w-100 dept-2">
                    <div class="department-text">
                        ကုသရေး
                        ဉီးစီးဌာန
                    </div>
                </a>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <a href="#" class="department-btn w-100 dept-3">
                    <div class="department-text">
                        ဆေးသုတေသန<br>
                        ဉီးစီးဌာန
                    </div>
                </a>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <a href="#" class="department-btn w-100 dept-4">
                    <div class="department-text">
                        တိုင်းရင်းဆေးပညာ<br>
                        ဉီးစီးဌာန
                    </div>
                </a>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <a href="#" class="department-btn w-100 dept-5">
                    <div class="department-text">
                        ကျန်းမာရေးလူစွမ်းအား<br>
                        အရင်းမြစ်ဉီးစီးဌာန
                    </div>
                </a>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <a href="#" class="department-btn w-100 dept-6">
                    <div class="department-text">
                        အစားအသောက်နှင့်ဆေးဝါး<br>
                        ကွပ်ကဲရေးဉီးစီးဌာန
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

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

