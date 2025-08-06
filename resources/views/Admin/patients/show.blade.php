@extends('layouts.master')

@section('title', 'Today Patient Detail')
@section('pages', 'Today Patients')
@section('page', 'Patient Detail')

@section('content')
<div class="card p-4">
    <h4 class="mb-3">👩‍⚕️ Mother Profile</h4>
    <div class="row mb-3">
        @php
            $fields = [
                ['label' => "Name (အမည်)", 'value' => $patient->user->name ?? 'Unknown'],
                ['label' => "Age (အသက်)", 'value' => $patient->age],
                ['label' => "Blood Group (သွေးအုပ်စု)", 'value' => $patient->blood_type],
                ['label' => "Address (လိပ်စာ)", 'value' => $patient->address],
                ['label' => "Father's Name (အဖေ့အမည်)", 'value' => $patient->father_name],
                ['label' => "Father's Blood Group (အဖေ့သွေးအုပ်စု)", 'value' => $patient->father_blood_group],
                ['label' => "Estimated Date of Birth Known (မွေးဖွားမည့်နေ့သိ/မသိ)", 'value' => $patient->is_estimated_date_of_birth_known ? 'Yes' : 'No'],
                ['label' => "Expect Selected for Birth (မွေးဖွားရန်ရွေးချယ်ထားခြင်း)", 'value' => $patient->is_expect_selected_for_birth ? 'Yes' : 'No'],
                ['label' => "Emergency Clinic (အရေးပေါ်ဆေးခန်း)", 'value' => $patient->is_emergency_clinic ? 'Yes' : 'No'],
                ['label' => "Decision Maker in Emergency (အရေးပေါ်အခါသမယတွင်ဆုံးဖြတ်သူရှိ/မရှိ)", 'value' => $patient->has_decision_maker_in_emergency ? 'Yes' : 'No'],
                ['label' => "Knows How to Get Money in Emergency (အရေးပေါ်အခါသမယတွင်ငွေရှာနည်းသိ/မသိ)", 'value' => $patient->knows_how_to_get_money_in_emergency ? 'Yes' : 'No'],
                ['label' => "Planned Transport for Emergency (အရေးပေါ်အခါသမယတွင်သယ်ယူပို့ဆောင်ရေးစီစဉ်ထား/မထား)", 'value' => $patient->has_planned_transport_for_emergency ? 'Yes' : 'No'],
                ['label' => "Basic Delivery Supplies (မွေးဖွားရန်အခြေခံပစ္စည်းများရှိ/မရှိ)", 'value' => $patient->has_basic_delivery_supplies ? 'Yes' : 'No'],
                ['label' => "Planned Companion for Birth & 24h (မွေးဖွားချိန်နှင့် ၂၄နာရီအတွင်းအတူရှိမည့်သူစီစဉ်ထား/မထား)", 'value' => $patient->has_planned_companion_for_birth_and_24h ? 'Yes' : 'No'],
                ['label' => "Planned Helper for Household & Childcare (အိမ်ထောင်ရေးနှင့်ကလေးစောင့်ရှောက်ရေးအတွက်အကူအညီပေးမည့်သူစီစဉ်ထား/မထား)", 'value' => $patient->has_planned_helper_for_household_and_childcare ? 'Yes' : 'No'],
            ];
        @endphp

        @foreach($fields as $field)
            <div class="col-md-6 mb-3 d-flex">
                <div class="col-6 fw-bold pe-2">
                    <label class="form-label mb-0">{{ $field['label'] }}:</label>
                </div>
                <div class="col-6 ps-2">
                    {{ $field['value'] }}
                </div>
            </div>
        @endforeach

    </div>

    {{-- <div class="text-end">
        <a href="{{ route('medical-history.create', ['patient' => $patient->id]) }}" class="btn btn-primary">
            ➕ Collect Mother's History
        </a>
    </div> --}}
    {{-- Check if history exists --}}
    @if($patient->medicalHistory)
        {{-- Show collected history --}}
        <div class="mt-4">
            <h5 class="text-lg font-semibold mb-2">History Collected</h5>
            {{-- Show some key history data here --}}
            <p><strong>Collected On:</strong> {{ $patient->medicalHistory->created_at->format('d M Y') }}</p>

            {{-- Show button to collect AN data --}}

            @if ($patient->careSteps->count() != 12)
                <a href="{{ route('schedule.an.create', [$patient->id]) }}" class="btn btn-primary mt-3">
                    <i class="fas fa-plus-circle"></i> {{ $patient->careSteps->count() < 8 ? ' Collect AN Data' : ' Collect PN Data' }}
                </a>
            @endif

            @if ($patient->careSteps->count() > 0)
                <a href="{{ route('patients.show', $patient->id) }}" class="btn btn-primary mt-3">
                    <i class="fas fa-plus-circle"></i> View Care History
                </a>
            @endif
            @if ($patient->careSteps->count() == 8 && $patient->delivery_date === null)
                <a href="{{ route('patient.mark-as-delivered', $patient->id) }}" class="btn btn-primary mt-3">
                    <i class="fas fa-plus-circle"></i>Mark as Delivered
                </a>
            @endif
        </div>
    @else
        {{-- If history not collected, show history collection button --}}
        <a href="{{ route('medical-history.create', $patient->id) }}" class="btn btn-warning">
            <i class="fas fa-notes-medical"></i> Collect Medical History First
        </a>
    @endif

</div>
@endsection
