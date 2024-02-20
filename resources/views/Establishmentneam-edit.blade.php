@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="col-md-6 mb-3">
            @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif

        </div>
        <h2 class="text-center">تعديل بيانات المصروف</h2>
        <form action="{{ route('alerts.update', $establishment->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nameMsrof">إسم الم3صروف</label>
                <input name="Establishmentneam" type="text" maxlength="150" class="form-control" id="nameMsrof" value="{{ isset($establishment) ? $establishment->Establishmentneam : '' }}" />
            </div>
            <div class="form-group">
                <label for="desMsrof">الوصف المصروف</label>
                <textarea name="Establishmentdecebshan" class="form-control" id="desMsrof" maxlength="150" rows="4">{{ $establishment->Establishmentdecebshan }}</textarea>
            </div>
            <div class="form-group">
                <select class="form-control" id="group_id" name="name">
                    @foreach ($expenses as $expense)
                        <option value="{{ $expense->nameMsrof }}" {{ $establishment->name == $expense->nameMsrof ? 'selected' : '' }}>{{ $expense->nameMsrof }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-lg btn-success btn-block">تحديث</button>
                


            </div>
        </form>
    </div>

@endsection
