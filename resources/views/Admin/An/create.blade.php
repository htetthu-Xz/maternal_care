@extends('layouts.master')

@section('title', 'Collect AN Data')
@section('pages', 'Schedule')
@section('page', 'Collect AN Data')

@section('content')
<div class="card p-4">
    <h4 class="mb-4">Collect AN and PN Data for {{ $patient->user->name }}</h4>

    @if ($errors->any())
        {{-- Display validation errors --}}
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('schedule.an.store') }}" method="POST">
        @csrf
        <input type="hidden" name="patient_id" value="{{ $patient->id }}">
        <input type="hidden" name="type" value="{{ $type }}">

        {{-- Check if the type is AN or PN --}}

        @if ($type === 'AN')
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label>Date (နေ့စွဲ)</label>
                    <input type="date" name="date" class="form-control" value="{{ \Carbon\Carbon::today()->format('Y-m-d') }}" readonly required>
                </div>
                <div class="col-md-4 mb-3">
                    <label>Weight (kg)(ကိုယ်အလေးချိန်) </label>
                    <input type="number" name="weight" class="form-control" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label>Anemia (သွေးအားနည်းခြင်း)</label>
                    <input type="text" name="anemia" class="form-control">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Blood Pressure (သွေးပေါင်ချိန်)</label>
                    <input type="text" name="blood_pressure" class="form-control">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Pregnancy Week (ကိုယ်ဝန်ဆောင်အပတ်)</label>
                    <input type="number" name="pregnancy_week" class="form-control">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Suspicion (အမွှာသံသယရှိ/မရှိ)</label>
                    <select name="suspicion" class="form-control">
                        <option value="">Select</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label>Uterus Height (သားအိမ်အမြင့်)</label>
                    <input type="text" name="uterus_height" class="form-control">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Fetal Heartbeat (ကလေး heartbeat)</label>
                    <input type="text" name="fetal_heartbeat" class="form-control">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Urine Test (ဆီးပရိုးတိန်းရှိ/မရှိ)</label>
                    <select name="urine_test" class="form-control">
                        <option value="">Select</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="">Urine Sugar (ဆီးတွင်းသကြားဓါက်ရှိ/မရှိ)</label>
                    <select name="urine_sugar" class="form-control">
                        <option value="">Select</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="">Hemoglobin (ဟေမိုဂလိုဘင်)</label>
                    <input type="text" name="hemoglobin" id="" class="form-control">
                </div>

                <div class="col-md-4 mb-3">
                    <label for="">Syphilis/HIV (ဆစ်ဖလစ်ရောဂါပိုး/အိပ်စ်အိုင်ဗွီ ရှိ/မရှိ)</label>
                    <select name="sifalip" class="form-control">
                        <option value="">Select</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="">Iron and folate tablets (သံဓါက်ဖောလိတ်ဆေးပြားပေးခြင်း ရှိ/မရှိ)</label>
                    <select name="iron_folate_tablets" class="form-control">
                        <option value="">Select</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>

                <div class="col-md-12 mb-3">
                    <label>Symptoms / Treatment (လက္ခဏာများ / ကုသမှု)</label>
                    <textarea name="symptoms_and_treatment" class="form-control"></textarea>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="">Is Transfer (ညွန်းပို့ရခြင်းရှိမရှိ)</label>
                    <select name="is_transfer" class="form-control">
                        <option value="">Select</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>

                <input type="hidden" name="patient_id" value="{{ $patient->id }}">

            </div>
        @else
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label>Date (နေ့စွဲ)</label>
                    <input type="date" name="date" class="form-control" value="{{ \Carbon\Carbon::today()->format('Y-m-d') }}" readonly required>
                </div>
                <div class="col-md-4 mb-3">
                    <label>Fever (ကိုယ်အပူချိန်)</label>
                    <input type="number" step="0.1" name="fever" class="form-control" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label>Blood Pressure (သွေးပေါင်ချိန်)</label>
                    <input type="text" name="blood_pressure" class="form-control">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Anemia (သွေးအားနည်းခြင်း)</label>
                    <input type="text" name="anemia" class="form-control">
                </div>
                <div class="col-md-4 mb-3">
                    <label>သားမြတ် နို့သီးခေါင်းကောင်း/မကောင်း</label>
                    <select name="nipples" class="form-control">
                        <option value="">Select</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label>သားအိမ်လုံးမာခြင်းရှိ/မရှိ</label>
                    <select name="hard_uterus" class="form-control">
                        <option value="">Select</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label>မီးနေသွေးပုံမှန်ဆင်းခြင်း ရှိ/မရှိ</label>
                    <select name="is_regular_menstruation" class="form-control">
                        <option value="">Select</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label>မိန်းမကိုယ်နောက်ပိုင်း အနာကျက်ခြင်းရှိ/မရှိ</label>
                    <select name="is_injury_heal" class="form-control">
                        <option value="">Select</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label>Vitamin B1 (သွေးအားနည်းခြင်း)</label>
                    <input type="text" name="vitamin_b_one" class="form-control">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Vitamin A</label>
                    <input type="text" name="vitamin_a" class="form-control">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="">Iron and folate tablets (သံဓါက်ဖောလိတ်ဆေးပြားပေးခြင်း ရှိ/မရှိ)</label>
                    <select name="iron_folate_tablets" class="form-control">
                        <option value="">Select</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label>သုံးစွဲသောသားဆက်ခြားနည်း</label>
                    <input type="text" name="birth_control" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label>Symptoms / Treatment (လက္ခဏာများ / ကုသမှု)</label>
                    <textarea name="symptoms_and_treatment" class="form-control"></textarea>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="">Is Transfer (ညွန်းပို့ရခြင်းရှိမရှိ)</label>
                    <select name="is_transfer" class="form-control">
                        <option value="">Select</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
            </div>
        @endif
        <button type="submit" class="btn btn-success mt-3">Submit Data</button>
    </form>
</div>
@endsection
