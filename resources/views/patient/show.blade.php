@php
    use App\Models\Transfer;
@endphp
@extends('layouts.master')

@section('title', 'Emergency Preparedness and Birth Planning Form')
@section('pages', 'လူနာ မှက်တမ်းများ')
@section('page', 'ကိုယ်ဝန်စောင့်ရှောက်မှု မှက်တမ်း')

@section('content')


<div class="container py-4 force-color" style="color: black;">
    <div class="card shadow-sm p-4" style="color: black;">
        <h2 class="text-center fw-bold mb-3">
            ကိုယ်ဝန်စောင့်ရှောက်မှု မှက်တမ်း<br>
        </h2>
        <div class="row w-auto" style="color: black;">
            <div class="table-responsive" style="color: black;">
                <h4 style="color: black;">ANC Data</h4>
                <table class="table table-bordered mt-4" style="color: black;">
                    <thead style="color: black;">
                        <tr style="color: black;">
                            <th style="color: black;">#</th>
                            <th style="color: black;">Visit Date</th>
                            <th style="color: black;">ကိုယ်အလေးချိန်</th>
                            <th style="color: black;">သွေးအားနည်းခြင်း</th>
                            <th style="color: black;">သွေးပေါင်ချိန်</th>
                            <th style="color: black;">ကိုယ်ဝန်အပတ်</th>
                            <th style="color: black;">သားအိမ်အမြင့်</th>
                            <th style="color: black;">အမြွာသံသယ</th>
                            <th style="color: black;">သနွေသား နှလုံးခုန်သံ</th>
                            <th style="color: black;">ဆီးစစ်ဆေးခြင်းရှိမရှိ</th>
                            <th style="color: black;">ဆီးသကြားရှိမရှိ</th>
                            <th style="color: black;">ဟေမိုဂလိုဘင်</th>
                            <th style="color: black;">Syphilis/HIV (ဆစ်ဖလစ်ရောဂါပိုး/အိပ်စ်အိုင်ဗွီ ရှိ/မရှိ)</th>
                            <th style="color: black;">သံဓါက်ဖောလိတ်ဆေးပြားပေးခြင်းရှိမရှိ</th>
                            <th style="color: black;">မေးခိုင်ဆုံဆို့နာ ကာကွယ်ဆေးထိုးခြင်း</th>
                            <th style="color: black;">ရောဂါလက္ခဏာနဲ့ ကုသမှု</th>
                            <th style="color: black;">ညွန်ပို့ခြင်းရှိမရှိ</th>
                            <th style="color: black;">Transfer Data</th>
                        </tr>
                    </thead>
                    <tbody style="color: black;">
                        @foreach($AN_Data as $an)
                            <tr style="color: black;">
                                <td style="color: black;">{{ $loop->index + 1 }}</td>
                                <td style="color: black;">{{ Carbon\Carbon::parse($an->visit_date)->format('d/m/Y') }}</td>
                                <td style="color: black;">{{ $an->weight }}</td>
                                <td style="color: black;">{{ $an->anemia }}</td>
                                <td style="color: black;">{{ $an->blood_pressure }}</td>
                                <td style="color: black;">{{ $an->pregnancy_week }}</td>
                                <td style="color: black;">{{ $an->uterus_height }}</td>
                                <td style="color: black;">{{ $an->suspicion == 1 ? 'Yes' : 'No' }}</td>
                                <td style="color: black;">{{ $an->fetal_heartbeat }}</td>
                                <td style="color: black;">{{ $an->urine_test == 1 ? 'Yes' : 'No' }}</td>
                                <td style="color: black;">{{ $an->urine_sugar == 1 ? 'Yes' : 'No' }}</td>
                                <td style="color: black;">{{ $an->hemoglobin }}</td>
                                <td style="color: black;">{{ $an->sifalip == 1 ? 'Yes' : 'No' }}</td>
                                <td style="color: black;">{{ $an->iron_folate_tablets == 1 ? 'Yes' : 'No' }}</td>
                                <td style="color: black;">{{ ($an->MedicalHistory && $an->MedicalHistory->tt_vaccine_2_date) ? 'Yes' : 'No' }}</td>
                                <td style="color: black;">{{ $an->symptoms_and_treatment }}</td>
                                <td style="color: black;">{{ $an->is_transfer == 1 ? 'Yes' : 'No' }}</td>
                                <td style="color: black;">
                                    @if($an->is_transfer)
                                        <a href="{{ route('transfer.show', Transfer::where('patient_id', $patient->id)->whereDate('created_at', $an->created_at)->first()) }}" class="btn btn-sm btn-info" style="color: black;">View</a>
                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <h4 class="mt-4" style="color: black;">PNC Data</h4>
                <table class="table table-bordered mt-4" style="color: black;">
                    <thead style="color: black;">
                        <tr style="color: black;">
                            <th style="color: black;">#</th>
                            <th style="color: black;">Visit Date</th>
                            <th style="color: black;">သွေးအားနည်းခြင်း</th>
                            <th style="color: black;">သွေးပေါင်ချိန်</th>
                            <th style="color: black;">ကိုယ်အပူချိန်</th>
                            <th style="color: black;">သားမြတ် နိုးသီးခေါင်း</th>
                            <th style="color: black;">သားအိမ်လုံးမာခြင်း</th>
                            <th style="color: black;">မီးနေသွေးပုံမှန်ဆင်းခြင်း</th>
                            <th style="color: black;">မိန်းမကိုယ်နောက်ပိုင် အနာကျက်ခြင်း</th>
                            <th style="color: black;">Vitamin A</th>
                            <th style="color: black;">Vitamin B1</th>
                            <th style="color: black;">သုံးစွဲသော သားဆက်ခြားနည်း</th>
                            <th style="color: black;">သံဓါက်ဖောလိတ်ဆေးပြားပေးခြင်းရှိမရှိ</th>
                            <th style="color: black;">ရောဂါလက္ခဏာနဲ့ ကုသမှု</th>
                            <th style="color: black;">ညွန်ပို့ခြင်းရှိမရှိ</th>
                            <th style="color: black;">Transfer Data</th>
                        </tr>
                    </thead>
                    <tbody style="color: black;">
                        @foreach($PN_Data as $an)
                            <tr style="color: black;">
                                <td style="color: black;">{{ $loop->index + 1 }}</td>
                                <td style="color: black;">{{ Carbon\Carbon::parse($an->visit_date)->format('d/m/Y') }}</td>
                                <td style="color: black;">{{ $an->anemia }}</td>
                                <td style="color: black;">{{ $an->blood_pressure }}</td>
                                <td style="color: black;">{{ $an->fever }}</td>
                                <td style="color: black;">{{ $an->nipples == 1 ? 'Yes' : 'No' }}</td>
                                <td style="color: black;">{{ $an->hard_uterus == 1 ? 'Yes' : 'No' }}</td>
                                <td style="color: black;">{{ $an->is_regular_menstruation == 1 ? 'Yes' : 'No' }}</td>
                                <td style="color: black;">{{ $an->is_injury_heal == 1 ? 'Yes' : 'No' }}</td>
                                <td style="color: black;">{{ $an->vitamin_a }}</td>
                                <td style="color: black;">{{ $an->vitamin_b_one }}</td>
                                <td style="color: black;">{{ $an->birth_control }}</td>
                                <td style="color: black;">{{ $an->iron_folate_tablets == 1 ? 'Yes' : 'No' }}</td>
                                <td style="color: black;">{{ $an->symptoms_and_treatment }}</td>
                                <td style="color: black;">{{ $an->is_transfer == 1 ? 'Yes' : 'No' }}</td>
                                <td style="color: black;">
                                    @if($an->is_transfer)
                                        <a href="{{ route('transfer.show', Transfer::where('patient_id', $patient->id)->whereDate('created_at', $an->created_at)->first()) }}" class="btn btn-sm btn-info" style="color: black;">View</a>
                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

                <h4 class="mt-5" style="color: black;">{{ $patient->user->name }} — Weight Chart</h4>
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