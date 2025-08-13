@php
    use App\Models\Transfer;
@endphp
@extends('layouts.master')

@section('title', 'Emergency Preparedness and Birth Planning Form')
@section('pages', 'လူနာ မှက်တမ်းများ')
@section('page', 'ကိုယ်ဝန်စောင့်ရှောက်မှု မှက်တမ်း')

@section('content')


<div class="container py-4">
    <div class="card shadow-sm p-4">
        <h2 class="text-center fw-bold mb-3">
            ကိုယ်ဝန်စောင့်ရှောက်မှု မှက်တမ်း<br>
        </h2>
        <div class="row w-auto">
            <div class="table-responsive">
                <h4>ANC Data</h4>
                <table class="table table-bordered mt-4">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Visit Date</th>
                            <th>ကိုယ်အလေးချိန်</th>
                            <th>သွေးအားနည်းခြင်း</th>
                            <th>သွေးပေါင်ချိန်</th>
                            <th>ကိုယ်ဝန်အပတ်</th>
                            <th>သားအိမ်အမြင့်</th>
                            <th>အမြွာသံသယ</th>
                            <th>သနွေသား နှလုံးခုန်သံ</th>
                            <th>ဆီးစစ်ဆေးခြင်းရှိမရှိ</th>
                            <th>ဆီးသကြားရှိမရှိ</th>
                            <th>ဟေမိုဂလိုဘင်</th>
                            <th>Syphilis/HIV (ဆစ်ဖလစ်ရောဂါပိုး/အိပ်စ်အိုင်ဗွီ ရှိ/မရှိ)</th>
                            <th>သံဓါက်ဖောလိတ်ဆေးပြားပေးခြင်းရှိမရှိ</th>
                            <th>မေးခိုင်ဆုံဆို့နာ ကာကွယ်ဆေးထိုးခြင်း</th>
                            <th>ရောဂါလက္ခဏာနဲ့ ကုသမှု</th>
                            <th>ညွန်ပို့ခြင်းရှိမရှိ</th>
                            <th>Transfer Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($AN_Data as $an)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ Carbon\Carbon::parse($an->visit_date)->format('d/m/Y') }}</td>
                                <td>{{ $an->weight }}</td>
                                <td>{{ $an->anemia }}</td>
                                <td>{{ $an->blood_pressure }}</td>
                                <td>{{ $an->pregnancy_week }}</td>
                                <td>{{ $an->uterus_height }}</td>
                                <td>{{ $an->suspicion == 1 ? 'Yes' : 'No' }}</td>
                                <td>{{ $an->fetal_heartbeat }}</td>
                                <td>{{ $an->urine_test == 1 ? 'Yes' : 'No' }}</td>
                                <td>{{ $an->urine_sugar == 1 ? 'Yes' : 'No' }}</td>
                                <td>{{ $an->hemoglobin }}</td>
                                <td>{{ $an->sifalip == 1 ? 'Yes' : 'No' }}</td>
                                <td>{{ $an->iron_folate_tablets == 1 ? 'Yes' : 'No' }}</td>
                                <td>{{ ($an->MedicalHistory && $an->MedicalHistory->tt_vaccine_2_date) ? 'Yes' : 'No' }}</td>
                                <td>{{ $an->symptoms_and_treatment }}</td>
                                <td>{{ $an->is_transfer == 1 ? 'Yes' : 'No' }}</td>
                                <td>
                                    @if($an->is_transfer)
                                        <a href="{{ route('transfer.show', Transfer::where('patient_id', $patient->id)->whereDate('created_at', $an->created_at)->first()) }}" class="btn btn-sm btn-info">View</a>
                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <h4 class="mt-4">PNC Data</h4>
                <table class="table table-bordered mt-4">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Visit Date</th>
                            <th>သွေးအားနည်းခြင်း</th>
                            <th>သွေးပေါင်ချိန်</th>
                            <th>ကိုယ်အပူချိန်</th>
                            <th>သားမြတ် နိုးသီးခေါင်း</th>
                            <th>သားအိမ်လုံးမာခြင်း</th>
                            <th>မီးနေသွေးပုံမှန်ဆင်းခြင်း</th>
                            <th>မိန်းမကိုယ်နောက်ပိုင် အနာကျက်ခြင်း</th>
                            <th>Vitamin A</th>
                            <th>Vitamin B1</th>
                            <th>သုံးစွဲသော သားဆက်ခြားနည်း</th>
                            <th>သံဓါက်ဖောလိတ်ဆေးပြားပေးခြင်းရှိမရှိ</th>
                            <th>ရောဂါလက္ခဏာနဲ့ ကုသမှု</th>
                            <th>ညွန်ပို့ခြင်းရှိမရှိ</th>
                            <th>Transfer Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($PN_Data as $an)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ Carbon\Carbon::parse($an->visit_date)->format('d/m/Y') }}</td>
                                <td>{{ $an->anemia }}</td>
                                <td>{{ $an->blood_pressure }}</td>
                                <td>{{ $an->fever }}</td>
                                <td>{{ $an->nipples == 1 ? 'Yes' : 'No' }}</td>
                                <td>{{ $an->hard_uterus == 1 ? 'Yes' : 'No' }}</td>
                                <td>{{ $an->is_regular_menstruation == 1 ? 'Yes' : 'No' }}</td>
                                <td>{{ $an->is_injury_heal == 1 ? 'Yes' : 'No' }}</td>
                                <td>{{ $an->vitamin_a }}</td>
                                <td>{{ $an->vitamin_b_one }}</td>
                                <td>{{ $an->birth_control }}</td>
                                <td>{{ $an->iron_folate_tablets == 1 ? 'Yes' : 'No' }}</td>
                                <td>{{ $an->symptoms_and_treatment }}</td>
                                <td>{{ $an->is_transfer == 1 ? 'Yes' : 'No' }}</td>
                                <td>
                                    @if($an->is_transfer)
                                        <a href="{{ route('transfer.show', Transfer::where('patient_id', $patient->id)->whereDate('created_at', $an->created_at)->first()) }}" class="btn btn-sm btn-info">View</a>
                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

                <h4 class="mt-5">{{ $patient->user->name }} — Weight Chart</h4>
                <canvas id="weightChart" height="500px"></canvas>

        </div>
    </div>
</div>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const weeksAxis  = @json($weeksAxis); 
        const lowerGuide = @json($lower);  
        const upperGuide = @json($upper);
        const points     = @json($points);

        const guideLowerXY = weeksAxis.map((w, i) => ({ x: w, y: lowerGuide[i] }));
        const guideUpperXY = weeksAxis.map((w, i) => ({ x: w, y: upperGuide[i] }));

        const ctx = document.getElementById('weightChart').getContext('2d');
        new Chart(ctx, {
            type: 'scatter', 
            data: {
                datasets: [
                    {
                        label: 'Low',
                        data: guideLowerXY,
                        showLine: true,
                        borderWidth: 1,
                        borderDash: [6, 6],
                        pointRadius: 0
                    },
                    {
                        label: 'High',
                        data: guideUpperXY,
                        showLine: true,
                        borderWidth: 1,
                        borderDash: [6, 6],
                        pointRadius: 0
                    },
                    {
                        label: 'မိခင်၏ ကိုယ်အလေးချိန်',
                        data: points,          
                        showLine: true,
                        borderWidth: 2,
                        pointRadius: 3
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                        legend: { position: 'top' },
                        tooltip: {
                            callbacks: {
                                label: (ctx) => `ပတ် ${ctx.parsed.x}: ${ctx.parsed.y} kg`
                            }
                    },
                    title: {
                        display: true,
                        text: 'ပတ်ဝင်နှုန်း (4–40) နှင့် ကိုယ်အလေးချိန် (36–63 kg)'
                    }
                },
                parsing: false,       
                scales: {
                    x: {
                        type: 'linear',
                        min: 0,
                        max: 40,
                        ticks: { stepSize: 4 },
                        title: { display: true, text: 'ကိုယ်ဝန်အပတ်' },
                        grid: { drawBorder: true }
                    },
                    y: {
                        min: 36,
                        max: 63,
                        ticks: { stepSize: 1 },
                        title: { display: true, text: 'ကိုယ်အလေးချိန် (kg)' },
                        grid: { drawBorder: true }
                    }
                }
            }
        });
    </script>
@endpush