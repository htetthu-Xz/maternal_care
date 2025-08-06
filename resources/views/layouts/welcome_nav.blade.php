<div class="container d-flex justify-content-center gap-5">
    <a href="{{ route('welcome') }}" class="nav-link text-dark mx-3 {{ request()->routeIs('welcome') ? 'active text-primary' : '' }}" style="flex-direction: row !important;">
        <i class='bx bxs-home mx-2'></i>
        ပင်မစာမျက်နှာ
    </a>
    <a href="{{ route('knowledges.index') }}" class="nav-link text-dark mx-3 {{ request()->routeIs('knowledges.*') ? 'active text-primary' : '' }}" style="flex-direction: row !important;">
        <i class='bx bx-news mx-2'></i>
        ကျန်းမာရေးအသိပညာပေးများ
    </a>
    <a href="{{ route('contact') }}" class="nav-link text-dark mx-3 {{ request()->routeIs('contact') ? 'active text-primary' : '' }}" style="flex-direction: row !important;">
        <i class='bx bx-phone mx-2'></i>
        ဆက်သွယ်ရန်
    </a>
    @if(auth()->check())
        <a href="{{ route('patient.dashboard') }}" class="nav-link text-dark mx-3" style="flex-direction: row !important;">
            <i class='bx bxs-user mx-2'></i>
            {{ auth()->user()->name }}
            အကောင့်
        </a>
    @else
        <a href="{{ route('login') }}" class="nav-link text-dark mx-3" style="flex-direction: row !important;">
            <i class='bx bx-log-in-circle mx-2' ></i>
            အကောင့်ဖွင့်ရန်နှင့်ဝင်ရန်
        </a>
    @endif
</div>