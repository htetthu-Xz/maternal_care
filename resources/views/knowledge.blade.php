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