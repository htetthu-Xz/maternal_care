@extends('layouts.master')

@section('title', 'Emergency Preparedness and Birth Planning Form')
@section('pages', 'Patient Profile')
@section('page', 'Emergency Preparedness and Birth Planning Form')

@section('content')


<div class="container py-4">
    <div class="card shadow-sm p-4">
        <h2 class="text-center fw-bold mb-3">
            ကိုယ်ဝန်ဆောင်မိခင်အတွက်အရေးပေါ်အဆင်သင့်ပြုလုပ်ခြင်း<br>
        </h2>

        <form action="{{ route('patient.profile.submit') }}" method="POST">

            @csrf

            {{-- Basic Info --}}
            <div class="row mb-4">
                <div class="col-md-4">
                    <label class="form-label">ခင်ပွန်းအမည် (Father’s Name)</label>
                    <input type="text" class="form-control" name="father_name">
                    @error('father_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">အသက် (Age)</label>
                    <input type="number" class="form-control" name="father_age">
                    @error('father_age')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">သွေးအမျိုးအစား (Blood Type)</label>
                    <select name="father_blood_group" id="" class="form-select">
                        <option value="">ရွေးချယ်ပါ / Choose</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                    </select>
                    @error('father_blood_group')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- Emergency Planning Section --}}
            <h4 class="fw-semibold border-bottom pb-2 mb-3">
                အရေးပေါ်အခြေအနေများအတွက်ပြင်ဆင်မှုများ<br>
            </h4>

            <div class="row g-3">
                <div class="col-md-6">
                <label class="form-label">ကလေးမွေးဖွားမည့်ခန့်မှန်းရက်ကိုသိပါသလား</label>
                <select class="form-select" name="is_estimated_date_of_birth_known">
                    <option value="">ရွေးချယ်ပါ / Choose</option>
                    <option value="1">ရှိ</option>
                    <option value="0">မရှိ</option>
                </select>
                @error('is_estimated_date_of_birth_known')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>

                <div class="col-md-6">
                <label class="form-label">ကလေးမွေးဖွားရန်သာဖွားကျွမ်းကျင်သူတစ်ဦးဦးကိုရွေးချယ်ထားပါသလား</label>
                <select class="form-select" name="is_expect_selected_for_birth">
                    <option value="">ရွေးချယ်ပါ / Choose</option>
                    <option value="1">ရှိ</option>
                    <option value="0">မရှိ</option>
                </select>
                @error('is_expect_selected_for_birth')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>

                <div class="col-md-6">
                <label class="form-label">မွေးဖွားခြင်းနှင့် အရေးပေါ်ကိစ္စများသွားရန် ဆေးရုံဆေးခန်းကိုရွေးချယ်ထားပါသလား</label>
                <select class="form-select" name="is_emergency_clinic">
                    <option value="">ရွေးချယ်ပါ / Choose</option>
                    <option value="1">ရှိ</option>
                    <option value="0">မရှိ</option>
                </select>
                @error('is_emergency_clinic')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>

                <div class="col-md-6">
                <label class="form-label">အရေးပေါ်ဖြစ်ပါက ဆုံးဖြတ်ပေးနိုင်မည့်သူတစ်ဦးဦီသူမတွင်ရှိပါသလား</label>
                <select class="form-select" name="has_decision_maker_in_emergency">
                    <option value="">ရွေးချယ်ပါ / Choose</option>
                    <option value="1">ရှိ</option>
                    <option value="0">မရှိ</option>
                </select>
                @error('has_decision_maker_in_emergency')
                    <div class="text-danger">{{ $message }}</div> 
                @enderror
                </div>

                <div class="col-md-6">
                <label class="form-label">အရေးပေါ်အခြေအနေတွင်လိုအပ်သောငွေကို မည်သို့ရနိုင်မည်ကိုသိပါသလား</label>
                <select class="form-select" name="knows_how_to_get_money_in_emergency">
                    <option value="">ရွေးချယ်ပါ / Choose</option>
                    <option value="1">ရှိ</option>
                    <option value="0">မရှိ</option>
                </select>
                @error('knows_how_to_get_money_in_emergency')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>

                <div class="col-md-6">
                <label class="form-label">အရေးပေါ် အခြေအနေတွင် ဆေးရုံဆေးခန်းသိုသွားရန် သယ်ယူပို့ဆောင်မှုကို ကြိုတင်စီစဉ်ထားပါသလား။</label>
                <select class="form-select" name="has_planned_transport_for_emergency">
                    <option value="">ရွေးချယ်ပါ / Choose</option>
                    <option value="1">ရှိ</option>
                    <option value="0">မရှိ</option>
                </select>
                @error('has_planned_transport_for_emergency')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>

                <div class="col-md-6">
                <label class="form-label">မွေးမွားရန်အတွက် အခြေခံအကျဆုံးလိုအပ်သောပစ္စည်းများကိုစုဆောင်းထားပါသလား။</label>
                <select class="form-select" name="has_basic_delivery_supplies">
                    <option value="">ရွေးချယ်ပါ / Choose</option>
                    <option value="1">ရှိ</option>
                    <option value="0">မရှိ</option>
                </select>
                @error('has_basic_delivery_supplies')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>

                <div class="col-md-6">
                <label class="form-label">မွေးဖွားစဉ်နှင့်မွေးဖွားပြီး အနည်းဆုံး (၂၄) နာရီကြာသည်အထိ အနီးတွင်နေပေးမည့်သူရှိရန်ကြိုတင်စီစဉ်ထားပါသလား။</label>
                <select class="form-select" name="has_planned_companion_for_birth_and_24h">
                    <option value="">ရွေးချယ်ပါ / Choose</option>
                    <option value="1">ရှိ</option>
                    <option value="0">မရှိ</option>
                </select>
                @error('has_planned_companion_for_birth_and_24h')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>

                <div class="col-md-6">
                <label class="form-label">အိမ်မှုကိစ္စနှင့် အခြားကလေးကိစ္စများ ကူညီစောင့်ရှောက်မည့်သူတစ်ဦးစီစဉ်ထားရှိပါသလား</label>
                <select class="form-select" name="has_planned_helper_for_household_and_childcare">
                    <option value="">ရွေးချယ်ပါ / Choose</option>
                    <option value="1">ရှိ</option>
                    <option value="0">မရှိ</option>
                </select>
                @error('has_planned_helper_for_household_and_childcare')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
            </div>

            <div class="text-end mt-4">
                <button type="submit" class="btn btn-primary px-4">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('js')
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
@endpush