@extends('layouts.master')

@section('title', 'Patient History Details')
@section('pages', 'Care History')
@section('page', 'Details')

@section('content')
<div class="row">
    <div class="card mt-4">
        <div class="card-header">AN & PN Visit History</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="card mb-3 shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Visit Details</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Here you can find the details of your past visits.</p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>Date:</strong> {{ \Carbon\Carbon::parse($schedule->visit_date)->format('d M Y') }}</li>
                                <li class="list-group-item"><strong>Visited:</strong> {{ $schedule->visited ? 'Yes' : 'No' }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="card mb-3 shadow-sm">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0">Medical Info</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped mb-0">
                                <tbody>
                                    <tr>
                                        <th scope="row">ကိုယ်အလေးချိန် </th>
                                        <td>{{ $schedule->weight ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">သွေးအားနည်းခြင်း </th>
                                        <td>{{ $schedule->anemia ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">အမွှာသံသယ </th>
                                        <td>{{ $schedule->suspicion == 1 ? 'Yes' : 'No' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">ဆီးစစ်ဆေးခြင်း </th>
                                        <td>{{ $schedule->urine_test == 1 ? 'Yes' : 'No' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">ဆီး သကြားစစ်ဆေးခြင်း </th>
                                        <td>{{ $schedule->urine_sugar == 1 ? 'Yes' : 'No' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Hemoglobin </th>
                                        <td>{{ $schedule->hemoglobin == 1 ? 'Yes' : 'No' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">ဆစ်ဖလစ်ရောဂါပိုး </th>
                                        <td>{{ $schedule->sifalip == 1 ? 'Yes' : 'No' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">သံဓါက်ဖောလိတိဆေးပြားပေးခြင်း </th>
                                        <td>{{ $schedule->iron_folate_tablets ? 'Yes' : 'No' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">သွေးပေါင်ချိန် </th>
                                        <td>{{ $schedule->blood_pressure ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">ကလေး နှလုံးခုန်သံ</th>
                                        <td>{{ $schedule->fetal_heartbeat ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Uterus Height</th>
                                        <td>{{ $schedule->uterus_height ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Symptoms & Treatment</th>
                                        <td>{{ $schedule->symptoms_and_treatment ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Transfer</th>
                                        <td>{{ $schedule->is_transfer ? 'Yes' : 'No' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @if($schedule->is_transfer && $schedule->patient->transfers->count())
                <div class="col-md-6">
                    <div class="card mb-3 shadow-sm">
                        <div class="card-header bg-warning text-dark">
                            <h5 class="mb-0">Transfer Info</h5>
                        </div>
                        <div class="card-body">
                            @php $transfer = $schedule->patient->transfers->last(); @endphp
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>Date:</strong> {{ $transfer->transfer_date ? Carbon\Carbon::parse($transfer->transfer_date)->format('d M Y') : '-' }}</li>
                                <li class="list-group-item"><strong>Reason:</strong> {{ $transfer->reason }}</li>
                                <li class="list-group-item"><strong>To:</strong> {{ $transfer->transfer_to }}</li>
                                <li class="list-group-item"><strong>Condition:</strong> {{ $transfer->patient_condition }}</li>
                                <li class="list-group-item"><strong>Treatment:</strong> {{ $transfer->treatment_provided }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

