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
                <h5 class="mb-2">မြို့နယ်ပြည်သူ့ကျန်းမာရေး ဦးစီးဌာန (ဟင်္သာတ)</h5>
            </div>
        </div>
    </section>

    <nav class="py-2 w-100 mb-3" style="background: rgba(255,255,255,0.7); box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
        @include('layouts.welcome_nav')
    </nav>

    <section class="chapter-list py-4 mx-auto">
        <h5 class="fw-bold text-primary mb-4 text-center">
            <i class="bx bx-book-open"></i>
            အခန်း ၅ - ဆေးရုံတွင်သာမွေးသင့်သူများ
        </h5>

        <div class="mb-4">
            <div class="list-group">
                <div class="list-group-item d-flex align-items-start gap-3 flex-wrap">
                    <span class="fs-4 text-success"><i class="bx bx-check-circle"></i></span>
                    <div class="flex-grow-1">
                        <div class="chapter-desc mb-2">
                            <ul>
                                <li>ဖြစ်နိုင်လျှင် ကိုယ်ဝန်ဆောင်းတိုင်း ဆေးရုံ ဆေးခန်း၊ သားဖွားခန်းများတွင်သာ မွေးသင့်ပါသည်</li>
                                <li>ဆေးရုံဆေးခန်းများလက်လှမ်းမမှိသောဒေသများတွင် အိမ်တွင်ကျွမ်းကျင်သောကျန်းမာရေးဝန်ထမ်း သို့ သာဖွားဆရာမှဖြင့်မွေးရမည်</li>
                                <li>သိုသော် အောက်ပါအခြေနေများတွင် မဖြစ်မနေဆေးရုံတွင်သာမွေးသင့်ပါသည်</li>
                            </ul>
                        </div>
                        <div class="chapter-desc mb-2">
                            <small class="text-secondary">
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="card p-2 m-3">
                                        <div class="d-flex flex-column justify-content-center align-items-center" style="min-height: 140px">
                                            <img src="{{ asset('images/4child.jpg') }}" alt="Healthy Food" class="img-fluid rounded shadow-sm mb-2" style="max-width: 100px; max-height: 120px">
                                            <small>ကိုယ်ဝန်ငါးကြိမ်နဲ့ <br>အထက်ရှိသော မိခင်များ</small>
                                        </div>
                                    </div>
                                    <div class="card p-2 m-3">
                                        <div class="d-flex flex-column justify-content-center align-items-center" style="min-height: 140px">
                                            <img src="{{ asset('images/twin.jpg') }}" alt="Healthy Food" class="img-fluid rounded shadow-sm mb-2" style="max-width: 100px; max-height: 120px">
                                            <small>အမြွှာကိုယ်ဝန် <br></small>
                                        </div>
                                    </div>
                                    <div class="card p-2 m-3">
                                        <div class="d-flex flex-column justify-content-center align-items-center" style="min-height: 140px">
                                            <img src="{{ asset('images/position.jpg') }}" alt="Healthy Food" class="img-fluid rounded shadow-sm mb-2" style="max-width: 100px; max-height: 120px">
                                            <small>အနေထားမမှန်သော <br> ကိုယ်ဝန်များ</small>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="card p-2 m-3">
                                        <div class="d-flex flex-column justify-content-center align-items-center" style="min-height: 140px">
                                            <img src="{{ asset('images/exp.jpeg') }}" alt="Healthy Food" class="img-fluid rounded shadow-sm mb-2" style="max-width: 100px; max-height: 100px">
                                            <small>ယခင်မွေးခဲ့ဖူးသောလူနာများ <br> သားအိမ်ခွဲကြောင်းရှိသူများ</small>
                                        </div>
                                    </div>
                                    <div class="card p-2 m-3">
                                        <div class="d-flex flex-column justify-content-center align-items-center" style="min-height: 140px">
                                            <img src="{{ asset('images/over40.jpg') }}" alt="Healthy Food" class="img-fluid rounded shadow-sm mb-2" style="max-width: 100px; max-height: 100px">
                                            <small>မွေးဖွားမည့်ခန့်မှန်း <br> ၄၀ပတ် ထက်ကျော်သူများ</small>
                                        </div>
                                    </div>
                                    <div class="card p-2 m-3">
                                        <div class="d-flex flex-column justify-content-center align-items-center" style="min-height: 140px">
                                            <img src="{{ asset('images/exp.jpeg') }}" alt="Healthy Food" class="img-fluid rounded shadow-sm mb-2" style="max-width: 100px; max-height: 100px">
                                            <small>ယခင်မွေးခဲ့ဖူးသောလူနာများ <br> သားအိမ်ခွဲကြောင်းရှိသူများ</small>
                                        </div>
                                    </div>
                                </div>
                            </small>
                        </div> 
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center text-muted small mt-3">
            <a href="{{ route('knowledges.chapter4') }}" class="btn btn-outline-primary btn-sm">
                <i class="bx bx-left-arrow-alt"></i> ရှေစာမျက်နှာ
            </a>
            <span><i class="bx bx-book"></i> 5 of 12</span>
            <a href="{{ route('knowledges.chapter6') }}" class="btn btn-outline-primary btn-sm">
                နောက်စာမျက်နှာ <i class="bx bx-right-arrow-alt"></i>
            </a>
        </div>
    </section>


    <footer class="text-center py-3 mt-5" style="color:#6c757d;font-size:0.95rem;">
            &copy; {{ date('Y') }} Maternal Care System. All rights reserved.
        </footer>
    </body>
</html>