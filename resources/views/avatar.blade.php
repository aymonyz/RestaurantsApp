@extends('layouts.master')
@section('css')
<!---Internal  Owl Carousel css-->
<link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
<!--- Internal Sweet-Alert css-->
<link href="{{URL::asset('assets/plugins/sweet-alert/sweetalert.css')}}" rel="stylesheet">
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Empty</span>
        </div>
    </div>
    <div class="d-flex my-xl-auto right-content">
        <div class="pr-1 mb-3 mb-xl-0">
            <button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
        </div>
        <div class="pr-1 mb-3 mb-xl-0">
            <button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
        </div>
        <div class="pr-1 mb-3 mb-xl-0">
            <button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
        </div>
        <div class="mb-3 mb-xl-0">
            <div class="btn-group dropdown">
                <button type="button" class="btn btn-primary">14 Aug 2019</button>
                <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end">
                    <a class="dropdown-item" href="#">2015</a>
                    <a class="dropdown-item" href="#">2016</a>
                    <a class="dropdown-item" href="#">2017</a>
                    <a class="dropdown-item" href="#">2018</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<div class="page-content-wrapper">
    <div class="row">
        <div class="col-md-6 mb-3">
            <button class="btn btn-success btn-lg btn-block" onclick="showInterface('interface2')">إضافة مجموعة المصروفات</button>
        </div>
        <div class="col-md-6 mb-3">
            <button class="btn btn-primary btn-lg btn-block" onclick="showInterface('interface1')">عرض مجموعة المصروفات</button>
        </div>
    </div>
    <div id="interface2" class="branch-info" style="display:none;">
        <!-- النموذج لإضافة فرع جديد -->
        <h2 class="text-center">إضافة مجموعة مصروفات جديدة</h2>
        <form action="{{ route('Expenses.store') }}" method="POST" class="mt-4">
            @csrf
            <!-- حقول النموذج -->
            <div class="form-group">
                <label for="nameMsrof">الاسم</label>
                <input name="nameMsrof" type="text" maxlength="150" class="form-control" id="nameMsrof" />
            </div>
            <div class="form-group">
                <label for="desMsrof">الوصف</label>
                <textarea name="desMsrof" class="form-control" id="desMsrof" maxlength="150" rows="4"></textarea>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-lg btn-success btn-block">حفظ</button>
            </div>
        </form>
    </div>
    <!-- واجهة 1: عرض الفروع -->
    <div id="interface1" class="branch-info">
        <div class="container">
            <h2 class="text-center">مجموعة المصروفات</h2>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">الرقم</th>
                            <th class="text-center">أسم المجموعة</th>
                            <th class="text-center">وصف المجموعة</th>
                            <th class="text-center">تاريخ الادخال</th>
                            <th class="text-center">تعديل</th>
                            <th class="text-center">حذف</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($expenses as $expense)
                        <tr>
                            <td class="text-center">{{ $expense->id }}</td>
                            <td class="text-center">{{ $expense->nameMsrof }}</td>
                            <td class="text-center">{{ $expense->desMsrof }}</td>
                            <td class="text-center">{{ $expense->created_at }}</td>
                            <td class="text-center">
                                <a href="{{ route('Expenses.edit', $expense->id) }}" class="btn btn-warning btn-sm">تعديل</a>
                            </td>
                            <td class="text-center">
                                <form action="{{ route('Expenses.destroy', $expense->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                                </form>
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
<script>
    // وظيفة لعرض الواجهة المحددة وإخفاء الأخرى
    function showInterface(interfaceId) {
        var interfaces = document.getElementsByClassName('branch-info');
        for (var i = 0; i < interfaces.length; i++) {
            if (interfaces[i].id === interfaceId) {
                interfaces[i].style.display = 'block';
            } else {
                interfaces[i].style.display = 'none';
            }
        }
    }
</script>
