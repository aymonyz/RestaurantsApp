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
        <div class="col-md-6 text-center">
            <button class="btn btn-primary btn-lg" onclick="showInterface('interface1')">عرض الفروع</button>
        </div>
        <div class="col-md-6 text-center">
            <button class="btn btn-success btn-lg" onclick="showInterface('interface2')">إضافة فرع</button>
        </div>
    </div>
    

    <!-- واجهة 1: عرض الفروع -->
<div id="interface1" class="branch-info">
    <div class="container">
        <h2 class="text-center">فروع المنشأة</h2>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">اسم الفرع بالعربية</th>
                        <th class="text-center">اسم الفرع بالإنجليزية</th>
                        <th class="text-center">العنوان بالعربية</th>
                        <th class="text-center">العنوان بالإنجليزية</th>
                        <th class="text-center">رقم تليفون 1</th>
                        <th class="text-center">رقم تليفون 2</th>
                        <th class="text-center">اسم مختصر</th>
                        <th class="text-center">تعديل</th>
                        <th class="text-center">حذف</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($branches as $branch)
                    <tr>
                        <td class="text-center">{{ $branch->name_ar }}</td>
                        <td class="text-center">{{ $branch->name_en }}</td>
                        <td class="text-center">{{ $branch->address_ar }}</td>
                        <td class="text-center">{{ $branch->address_en }}</td>
                        <td class="text-center">{{ $branch->phone1 }}</td>
                        <td class="text-center">{{ $branch->phone2 }}</td>
                        <td class="text-center">{{ $branch->short_name }}</td>
                        <td class="text-center">
                            <a href="{{ route('controlpanel.edit', $branch->id) }}" class="btn btn-primary">تعديل</a>
                        </td>
                        <td class="text-center">
                            <form action="{{ route('controlpanel.destroy', $branch->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('هل أنت متأكد من أنك تريد حذف هذا الفرع؟');">حذف</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


  <!-- واجهة 2: إضافة فرع -->
<div id="interface2" class="branch-info" style="display:none;">
    <div class="container">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <!-- النموذج لإضافة فرع جديد -->
        <form action="{{ route('branches.store') }}" method="POST" class="mt-4">
            @csrf
            <!-- حقول النموذج -->
            <div class="form-group">
                <label for="name_ar">الفرع/العنوان عربى</label>
                <input name="name_ar" type="text" maxlength="150" class="form-control" id="name_ar" />
            </div>
            <div class="form-group">
                <label for="name_en">الفرع/العنوان انجليزيى</label>
                <input name="name_en" type="text" maxlength="150" class="form-control" id="name_en" />
            </div>
            <div class="form-group">
                <label for="address_ar">العنوان بالعربية</label>
                <input name="address_ar" type="text" maxlength="150" class="form-control" id="address_ar" />
            </div>
            <div class="form-group">
                <label for="address_en">العنوان بالانجليزية</label>
                <input name="address_en" type="text" maxlength="150" class="form-control" id="address_en" />
            </div>
            <div class="form-group">
                <label for="phone1">رقم تليفون/ص.ب عربى</label>
                <input name="phone1" type="text" maxlength="50" class="form-control" id="phone1" />
            </div>
            <div class="form-group">
                <label for="phone2">رقم تليفون/ص.ب انجليزى</label>
                <input name="phone2" type="text" maxlength="50" class="form-control" id="phone2" />
            </div>
            <div class="form-group">
                <label for="short_name">اسم مختصر</label>
                <input name="short_name" type="text" maxlength="20" class="form-control" id="short_name" />
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-lg btn-success">حفظ</button>
            </div>
        </form>
    </div>
</div>


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

    function openEditModal(branchId) {
        // تعيين العملية للنموذج
        var formAction = "{{ url('controlpanel.index') }}/" + branchId;
        $('#editForm').attr('action', formAction);

        // تعبئة النموذج ببيانات الفرع هنا إذا لزم الأمر

        // فتح النافذة المودال
        $('#modaldemo1').modal('show');
    }

    function submitEditForm() {
        // إرسال النموذج
        $('#editForm').submit();
    }
</script>
@endsection

@section('js')
<!-- Internal Datepicker js -->
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- Internal Select2 js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!-- Internal Modal js -->
<script src="{{URL::asset('assets/js/modal.js')}}"></script>
///
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- Internal Select2 js-->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/rating/ratings.js')}}"></script>
<!--Internal  Sweet-Alert js-->
<script src="{{URL::asset('assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/sweet-alert/jquery.sweet-alert.js')}}"></script>
<!-- Sweet-alert js  -->
<script src="{{URL::asset('assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
<script src="{{URL::asset('assets/js/sweet-alert.js')}}"></script>
@endsection