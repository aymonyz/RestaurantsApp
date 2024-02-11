
@extends('layouts.master')

@section('content')
    <div class="container">
        <h2>تعديل الفرع</h2>
        <form action="{{ route('controlpanel.update', $branch->id) }}" method="POST">
            @csrf
            @method('PUT')
            <!-- حقول النموذج لتحديث الفرع -->
            <div class="form-group row">
                <label for="name_ar" class="col-sm-3 col-form-label">الاسم بالعربية</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="name_ar" name="name_ar" value="{{ old('name_ar', $branch->name_ar) }}">
                </div>
            </div>
            <!-- استمر في إضافة حقول النموذج الأخرى هنا -->
            <div class="form-group row">
                <label for="name_en" class="col-sm-3 col-form-label">الاسم بالإنجليزية</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="name_en" name="name_en" value="{{ old('name_en', $branch->name_en) }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="address_ar" class="col-sm-3 col-form-label">العنوان بالعربية</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="address_ar" name="address_ar" value="{{ old('address_ar', $branch->address_ar) }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="address_en" class="col-sm-3 col-form-label">العنوان بالإنجليزية</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="address_en" name="address_en" value="{{ old('address_en', $branch->address_en) }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="phone1" class="col-sm-3 col-form-label">رقم تليفون/ص.ب عربى</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="phone1" name="phone1" value="{{ old('phone1', $branch->phone1) }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="phone2" class="col-sm-3 col-form-label">رقم تليفون/ص.ب انجليزى</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="phone2" name="phone2" value="{{ old('phone2', $branch->phone2) }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="short_name" class="col-sm-3 col-form-label">اسم مختصر</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="short_name" name="short_name" value="{{ old('short_name', $branch->short_name) }}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">تحديث</button>
        </form>
    </div>
@endsection


