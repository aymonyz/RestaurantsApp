@extends('layouts.master')
@section('css')
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
    <!-- row -->
	<div>
		<!-- Button to toggle between showing form and table -->
		<button type="button" class="btn btn-success" onclick="toggleForm()">إضافة منطقة</button>
		<button type="button" class="btn btn-info" onclick="toggleTable()">عرض المناطق</button>
	</div>
    <div class="row">
        <!-- Form to add new area -->
        <form method="POST" action="{{ route('reset.store') }}" class="col-12" id="addAreaForm" style="display: none;">
            @csrf
            <div class="form-group">
                <label for="branch">الفرع:</label>
                <select id="branch" name="branch" class="form-control">
                    @foreach($branches as $branch)
                        <option value="{{ $branch->name_ar }}">{{ $branch->name_ar }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="name">المنطقة:</label>
                <input type="text" class="form-control" name="area" id="name" placeholder="ادخل المنطقة">
            </div>
            <button type="submit" class="btn btn-primary">حفظ</button>
        </form>

        <!-- Table to display areas with delete option -->
        <div class="col-12" id="areaTable" style="display: none;">
            <table class="table">
                <thead>
                <tr>
                    <th>المنطقة</th>
                    <th>الإجراءات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($areas as $area)
                    <tr>
                        <td>{{ $area->name }}</td>
                        <td>
                            <form method="POST" action="{{ route('reset.delete', ['id' => $area->id]) }}">
                                @csrf
                                <button type="submit" class="btn btn-danger">حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('js')
    <script>
        function toggleForm() {
            document.getElementById('addAreaForm').style.display = 'block';
            document.getElementById('areaTable').style.display = 'none';
        }

        function toggleTable() {
            document.getElementById('addAreaForm').style.display = 'none';
            document.getElementById('areaTable').style.display = 'block';
        }
    </script>
@endsection
