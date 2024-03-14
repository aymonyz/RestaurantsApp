{{-- resources/views/users/edit.blade.php --}}
@extends('layouts.app') {{-- افترض وجود ملف تخطيط رئيسي --}}

@section('content')
<div class="container">
    <h2>تحرير المستخدم: {{ $user->name }}</h2>

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT') {{-- لتحديث المستخدم --}}

        <div class="form-group">
            <label for="name">اسم المستخدم:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
        </div>

        <div class="form-group">
            <label for="email">البريد الإلكتروني:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
        </div>

        {{-- إضافة حقول أخرى حسب الحاجة --}}

        <button type="submit" class="btn btn-primary">تحديث</button>
    </form>
</div>
@endsection
