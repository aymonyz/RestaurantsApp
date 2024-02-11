@extends('layouts.master')
@section('css')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="{{URL::asset('assets/plugins/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
<!--Internal   Notify -->
<link href="{{URL::asset('assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
<!--Internal  treeview -->
<link href="{{URL::asset('assets/plugins/treeview/treeview.css')}}" rel="stylesheet" type="text/css" />
<!-- Internal Nice-select css  -->
<link href="{{URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet"/>
<!--Internal  Font Awesome -->

<!--Internal   Notify -->

<!--Internal  treeview -->

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Ecommerce</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Products</span>
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
{{-- resources/views/groups.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <title>صفحة العرض</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>

<div class="container">

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addGroupModal">إضافة مجموعة جديدة</button>
    <div class="example border-0 p-0">
        <div class="btn-list">
    @if ($errors->any())
    <div onclick="not8()"  class="btn btn-danger mg-t-5">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        </div>
    </div>
    <!-- نافذة منبثقة لإضافة مجموعة -->
    <div class="modal fade" id="addGroupModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">إضافة مجموعة جديدة</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <div class="modal-body">
                    <form id="addGroupForm" action="{{route('groups.store')}} " method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="groupNameArabic">اسم المجموعة بالعربي:</label>
                            <input type="text"  class="form-control" name="GroupNameArabic" required>
                        </div>
                        <div class="form-group">
                            <label for="groupNameEnglish">اسم المجموعة بالإنجليزي:</label>
                            <input type="text" class="form-control" name="GroupNameEnglish" required>
                        </div>
                        <div class="form-group">
                            <label for="groupOrder">الترتيب:</label>
                            <input type="number" class="form-control" name="Ranking" required>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="IsActive"> نشطة
                            </label>
                        </div>
                   
                </div>
                <div class="modal-footer">
                 
                        <!-- الحقول الأخرى هنا -->
                        <button type="submit" class="btn btn-success" id="saveGroupButton">حفظ</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">إلغاء</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
<!-- جدول عرض المجموعات -->
<table class="table">
    <thead>
        <tr>
            <th>التعديل</th>
            <th>الحذف</th>
            <th>اسم المجموعة بالعربي</th>
            <th>اسم المجموعة بالإنجليزي</th>
            <th>الترتيب</th>
            <th>الحالة</th>
        </tr>
    </thead>
    <tbody>
        @foreach($groups as $group)
        <tr>
            <td><a href="{{ route('groups.edit', $group->id) }}" class="btn btn-warning">تعديل</a></td>
            <td>
                <form action="{{ route('groups.destroy', $group->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                  
                    <button onclick="not7()" type="submit"  class="btn btn-danger">حزف</button>
                </form>
            </td>
            <td>{{ $group->GroupNameArabic }}</td>
            <td>{{ $group->GroupNameEnglish }}</td>
            <td>{{ $group->Ranking }}</td>
            <td>{{ $group->IsActive ? 'نشطة' : 'غير نشطة' }}</td>
        </tr>
        
        @endforeach
    </tbody>
</table>


</div>

</body>
</html>

		<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Nice-select js-->
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js')}}"></script>
<script src="{{URL::asset('assets/plugins/treeview/treeview.js')}}"></script>
<!--Internal  Notify js -->
<!--Internal  Notify js -->
<script src="{{URL::asset('assets/plugins/notify/js/notifIt.js')}}"></script>
<script src="{{URL::asset('assets/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection