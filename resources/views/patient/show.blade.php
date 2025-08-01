@php
    use App\Models\Transfer;
@endphp
@extends('layouts.master')

@section('title', 'Emergency Preparedness and Birth Planning Form')
@section('pages', 'Patient Profile')
@section('page', 'Emergency Preparedness and Birth Planning Form')

@section('content')


<div class="container py-4">
    <div class="card shadow-sm p-4">
        <h2 class="text-center fw-bold mb-3">
            ကိုယ်ဝန်စောင့်ရှောက်မှု မှက်တမ်း<br>
            <small class="text-muted">(Emergency Preparedness and Birth Planning Form)</small>
        </h2>
        <div class="row w-auto">
            <div class="table-responsive">
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
                            <th>ဆစ်ဖလစ်ရောဂါပိုး</th>
                            <th>သံဓါက်ဖောလိတ်ဆေးပြားပေးခြင်းရှိမရှိ</th>
                            <th>မေးခိုင်ဆုံဆို့နာ ကာကွယ်ဆေးထိုးခြင်း</th>
                            <th>ရောဂါလက္ခဏာနဲ့ ကုသမှု</th>
                            <th>ညွန်ပို့ခြင်းရှိမရှိ</th>
                            <th>Transfer Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($AN_PN_Data as $an)
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
                                <td>{{ $an->hemoglobin == '1' ? 'Yes' : 'No' }}</td>
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
            </div>
        </div>
    </div>
</div>
@endsection