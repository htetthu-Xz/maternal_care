@extends('layouts.master')

@section('title', 'Medical History')
@section('pages', 'လူနာ မှက်တမ်းများ')
@section('page', 'ကိုယ်ဝင်ဆောင်မိခင်ကိုယ်ရေးရာဇဝင် ထည့်သွင်းခြင်း')
    

@section('content')
<div class="max-w-5xl mx-auto p-3 shadow-md rounded-xl">
    <div class="container py-2"></div>
        <div class="card shadow-sm p-3">
            <h2 class="text-center fw-bold mb-3 p-2">
                ကိုယ်ဝင်ဆောင်မိခင်ကိုယ်ရေးရာဇဝင်<br>
            </h2>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('medical-history.store', $patient->id) }}" method="POST">
                @csrf

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label class="form-label">မှတ်ပုံတင်သောနေ့ <span class="text-muted">(Registered Date)</span></label>
                        <input type="date" name="registered_date" class="form-control" value="{{ old('registered_date', \Carbon\Carbon::today()->format('Y-m-d')) }}" required readonly>
                    </div>
                    @error('registered_date')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="col-md-6">
                        <label class="form-label">နောက်ဆုံးရာသီလာသောရက် <span class="text-muted">(Last Menstruation Date)</span></label>
                        <input type="date" name="last_menstruation_date" id="last_menstruation" class="form-control" value="{{ old('last_menstruation_date') }}" required>
                    </div>
                    @error('last_menstruation_date')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="col-md-6">
                        <label class="form-label">ခန့်မှန်းမွေးဖွားရက် <span class="text-muted">(Estimated Delivery Date)</span></label>
                        <input type="date" name="estimated_delivery_date" class="form-control" id="estimated_delivery" value="{{ old('estimated_delivery_date') }}" readonly>
                    </div>
                    @error('estimated_delivery_date')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="col-md-6">
                        <label class="form-label">နောက်ဆုံးမွေးဖွား/ကိုယ်ဝန်ဖျက်ရက် <span class="text-muted">(Last Birth or Miscarriage Date)</span></label>
                        <input type="date" name="last_birth_or_miscarriage_date" class="form-control" value="{{ old('last_birth_or_miscarriage_date') }}">
                    </div>
                    @error('last_birth_or_miscarriage_date')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="col-md-6">
                        <label class="form-label">ကိုယ်ဝန်ဆောင်အကြိမ်အရေအတွက် <span class="text-muted">(Pregnancy Count)</span></label>
                        <input type="number" name="pregnancy_count" class="form-control" value="{{ old('pregnancy_count') }}">
                    </div>
                    @error('pregnancy_count')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="col-md-6">
                        <label class="form-label">ပညာအရည်အချင်း <span class="text-muted">(Education Level)</span></label>
                        <input type="text" name="education_level" class="form-control" value="{{ old('education_level') }}">
                    </div>
                    @error('education_level')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="has_birth_defect_history" id="has_birth_defect_history" {{ old('has_birth_defect_history') ? 'checked' : '' }}>
                        <label class="form-check-label" for="has_birth_defect_history">အမွှာမွေးဖွားမှုအချက်အလက်ရှိသည် (Birth Defect History)</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="smokes" id="smokes" {{ old('smokes') ? 'checked' : '' }}>
                        <label class="form-check-label" for="smokes">ဆေးလိပ်သောက်သည် (Smokes)</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="chews_betel" id="chews_betel" {{ old('chews_betel') ? 'checked' : '' }}>
                        <label class="form-check-label" for="chews_betel">ကွမ်းစားသည် </label>
                    </div>
                </div>
                @error('has_birth_defect_history')
                    <div class="text-danger">{{ $message }}</div>       
                @enderror
                @error('smokes')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                @error('chews_betel')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <div class="mb-4">
                    <label class="form-label">မတည့်သောဆေးဝါးများ <span class="text-muted">(Allergic Medicines)</span></label>
                    <input type="text" name="allergic_medicines" class="form-control" value="{{ old('allergic_medicines') }}">
                </div>
                @error('allergic_medicines')
                    <div class="text-danger">{{ $message }}</div>
                    
                @enderror
                <div class="mb-4">
                    <label class="form-label">လက်ရှိသုံးနေသောဆေးများ <span class="text-muted">(Current Medicines)</span></label>
                    <input type="text" name="current_medicines" class="form-control" value="{{ old('current_medicines') }}">
                </div>
                @error('current_medicines')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="mb-4">
                    <label class="form-label">ရောဂါမှတ်တမ်း <span class="text-muted">(Disease History)</span></label>
                    <textarea name="disease_history" rows="3" class="form-control" ></textarea>{{ old('disease_history') }}</textarea>
                </div>
                @error('disease_history')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="mb-4">
                    <label class="form-label">အခြားရောဂါများ <span class="text-muted">(Other Diseases)</span></label>
                    <input type="text" name="other_diseases" class="form-control" value="{{ old('other_diseases') }}">
                </div>
                @error('other_diseases')
                    <div class="text-danger">{{ $message }}</div>   
                @enderror

                <div class="mb-4">
                    <label class="form-label">ကိုယ်ဝန်မဆောင်မှီ သားဆက်ခြားချင်းရှိမရှိ (Used Birth Control)</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="used_birth_control" id="used_birth_control"   {{ old('used_birth_control') ? 'checked' : '' }}>
                        <label class="form-check-label" for="used_birth_control">Yes</label>
                    </div>
                    <input type="text" name="birth_control_method" placeholder="နည်းလမ်း (Method)" class="form-control mt-2" value="{{ old('birth_control_method') }}">
                    <input type="text" name="birth_control_duration" placeholder="ကြာချိန် (Duration)" class="form-control mt-2" value="{{ old('birth_control_duration') }}">
                </div>
                @error('used_birth_control')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <div class="mb-4">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="hiv_syphilis_counseling" id="hiv_syphilis_counseling" {{ old('hiv_syphilis_counseling') ? 'checked' : '' }}>
                        <label class="form-check-label" for="hiv_syphilis_counseling">HIV & Syphilis ဆွေးနွေးမှုနှင့်စစ်ဆေးခြင်း ရှိ/မရှိ</label>
                    </div>
                    @error('hiv_syphilis_counseling')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="deworming_given" id="deworming_given" {{ old('deworming_given') ? 'checked' : '' }}>
                        <label class="form-check-label" for="deworming_given">ပိုးသတ်ဆေးထိုးပေးခြင်း</label>
                    </div>
                    @error('deworming_given')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="iron_supplement_given" id="iron_supplement_given" {{ old('iron_supplement_given') ? 'checked' : '' }}>
                        <label class="form-check-label" for="iron_supplement_given">သံချဆေးဝါးပေးခြင်း</label>
                    </div>
                    @error('iron_supplement_given')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label class="form-label">Td Vaccine #1 Date</label>
                        <input type="date" name="tt_vaccine_1_date" class="form-control" value="{{ old('tt_vaccine_1_date') }}">
                    </div>
                    @error('tt_vaccine_1_date')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="col-md-6">
                        <label class="form-label">Td Vaccine #2 Date</label>
                        <input type="date" name="tt_vaccine_2_date" class="form-control" value="{{ old('tt_vaccine_2_date') }}">
                    </div>
                    @error('tt_vaccine_2_date')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary px-5 py-2 rounded-pill shadow">
                        သိမ်းမည် (Submit)
                    </button>
                </div>
            </form>
        </div>
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
    <script>
        $(document).ready(function() {
            $('#last_menstruation').on('change', function() {
                let last_m_date = $(this).val();
                if (last_m_date) {

                    let estimatedDate = new Date(last_m_date);
                    estimatedDate.setDate(estimatedDate.getDate() + 280);

                    let yyyy = estimatedDate.getFullYear();
                    let mm = String(estimatedDate.getMonth() + 1).padStart(2, '0');
                    let dd = String(estimatedDate.getDate()).padStart(2, '0');
                    let formatted = `${yyyy}-${mm}-${dd}`;
                    $('#estimated_delivery').val(formatted);
                } else {
                    $('#estimated_delivery').val('');
                }
            });
        });
    </script>
@endpush