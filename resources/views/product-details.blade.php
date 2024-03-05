<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<style>
	body{
		direction: rtl;
	}
	*{
		direction: rtl;

	}
	.form-container{
		display: block;
	}
	table {
		width: 100%;
		border-collapse: collapse;
		margin-top: 20px;
	}

	th, td {
		border: 1px solid #ddd;
		padding: 8px;
		text-align: center;
	}

	th {
		background-color: #f2f2f2;
	}

	td {
		font-size: 14px;
	}

	.edit-btn, .delete-btn {
		padding: 5px 10px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		margin: 2px;
		cursor: pointer;
		border: 1px solid #007bff;
		color: #007bff;
		border-radius: 4px;
		transition: background-color 0.3s;
	}

	.edit-btn:hover, .delete-btn:hover {
		background-color: #007bff;
		color: #fff;
	}
	.pricing-form {
			background-color: #fff;
			padding: 20px;
			border-radius: 8px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}

		.form-group {
			margin-bottom: 15px;
		}

		label {
			display: block;
			font-weight: bold;
			margin-bottom: 5px;
		}

		select, input[type="text"], input[type="checkbox"] {
			width: 100%;
			padding: 8px;
			border: 1px solid #ced4da;
			border-radius: 4px;
			box-sizing: border-box;
		}

		input[type="checkbox"] {
			width: auto;
		}

		.submit-btn {
			background-color: #007bff;
			color: #fff;
			padding: 10px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
		}

		.submit-btn:hover {
			background-color: #0056b3;
		}

</style>


@extends('layouts.master')
@section('css')
<!--Internal  Nice-select css  -->
<link href="{{URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet"/>
<!-- Internal Select2 css -->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الاصناف</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ الاصناف والخدمات</span>
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





<div class="row">
	<div class="col-md-6 text-center">
		<button class="btn btn-primary btn-lg" onclick="showInterface('interface1')">إضافة صنف</button>
	</div>
	<div class="col-md-6 text-center">
		<button class="btn btn-success btn-lg" onclick="showInterface('interface2')">إضافة تسعير</button>
	</div>
</div>
<div id="interface1" class="branch-info">

	<div class="card-body">
		<form action="{{ route('items.store')}}" method="POST">
			@csrf
			<div class="row">
				<div class="col-md-6 mb-3">
					<label class="form-label">الإسم بالعربية</label>
					<input type="text" class="form-control" maxlength="30" name="arabicName" />
					<small class="text-success">هذا الاسم سيظهر في طباعة الفاتورة</small>
				</div>
				<div class="col-md-6 mb-3">
					<label class="form-label">الإسم بالإنجليزية</label>
					<input type="text" class="form-control" maxlength="30" name="englishName" />
					<small class="text-success">هذا الاسم سيظهر في طباعة الفاتورة</small>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6 mb-3">
					<label class="form-label">الإسم المختصر</label>
					<input type="text" class="form-control" maxlength="13" name="abbreviatedArabicname" />
					<small class="text-success">هذا الاسم سيظهر على شاشة الفاتورة</small>
				</div>
				<div class="col-md-6 mb-3">
					<label class="form-label">الإسم الانجليزي المختصر</label>
					<input type="text" class="form-control" maxlength="13" name="abbreviatedEnglishname" />
					<small class="text-success">هذا الاسم سيظهر على شاشة الفاتورة</small>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6 mb-3">
					<label class="form-label">المجموعة</label>
					<select class="form-select" name="group">
						<option value="" disabled selected>اخت ف</option>

						@foreach($groups as $group)
							<option value="{{ $group->GroupNameArabic }}">{{ $group->GroupNameArabic }}</option>
						@endforeach
					</select>
					<small class="text-success">يمكنك تصنيف الصنف إلى مجموعات، على سبيل المثال: قميص، اختر رجالي من القائمة</small>
				</div>
				<div class="col-md-6 mb-3">
					<label class="form-label">رقم الصنف</label>
					<input type="text" class="form-control" maxlength="3" name="itemNumber" />
					<small class="text-success">يمكنك البحث عن الاصناف باستخدام هذا الرقم في شاشة الفواتير</small>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6 mb-3">
					<label class="form-label">وحدة القياس</label>
					<select class="form-select" name="unit">
						<option value="متر">متر</option>
						<option value="قطعة">قطعة</option>
					</select>
				</div>
				<div class="col-md-6 mb-3">
					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="is_active">
						<label class="form-check-label">نشط</label>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12 text-center">
					<hr />
					<button type="submit" class="btn btn-primary" style="width: 100px;">حفظ</button>
					<button type="button" class="btn btn-secondary go-back-one" style="width: 100px;" data-dismiss="modal">رجوع</button>
				</div>
			</div>
		</form>

<!-- MyItems -->

<table border="1">
<h1>جدول  الاصناف </h1>
<br>
<thead>
	<tr>
		<th>الإسم بالعربية</th>
		<th>الإسم بالإنجليزية</th>
		<th>الإسم المختصر</th>
		<th>المجموعة</th>
		<th>الصورة</th>
		<th>نشط</th>
		<th>تعديل</th>
		<th>حذف</th>
	</tr>
</thead>
<tbody>
	@foreach($items as $item)
<tr>
	<td>{{ $item->arabicName }}</td>
	<td>{{ $item->englishName }}</td>
	<td>{{ $item->abbreviatedArabicname }}</td>
	<td>{{ $item->group }}</td>
	<td>
		@if ($item->image)
		<img src="{{ asset($item->image) }}" alt="Item Image" height="50">
	@else
		<img src="{{ asset('/Images/photo-empty.png') }}" alt="Default Image" height="50">
	@endif
	<div>
		<button onclick="showEditImageForm({{ $item->id }})"><a href="{{route('files',['item'=>$item])}}">تعديل</a></button>
	</div>
	</td>
	<td>{{ $item->is_active }}</td>
	<td class="edit-btn">
		<a href="#" onclick="showEditForm({{ $item->id }}, '{{ $item->arabicName }}', '{{ $item->englishName }}', '{{ $item->abbreviatedArabicname }}', '{{ $item->group }}', '{{ $item->unit }}', '{{ $item->is_active }}')">تعديل</a>
	</td>
	<td class="delete-btn">
		<form method="post" action="{{route('items.destroy',['item'=>$item])}}">
			@csrf
			@method('delete')
			<input type="submit" value="حذف">
		</form>
	</td>
</tr>
	@endforeach
</tbody>

</table>
</div>
							
					</div>
<!----end paeg1---->
<div id="interface2" class="branch-info" style="display:none;">
	<div class="pricing-form">
		<h2>إضافة تسعيره للمنتج</h2>
		<form action="{{ route('itemPricing.store') }}" method="POST">
			@csrf
		
			<div class="form-group">
				<label for="item">الصنف</label>
				<select id="item" name="item_name" required>
					<option value="" disabled selected>اختر صنف</option>
					{{-- Fetch and loop through items from the database to populate options --}}
					@foreach($items as $item)
						<option value="{{ $item->arabicName }}">{{ $item->arabicName }}</option>
					@endforeach
				</select>
			</div>
		
			<div class="form-group">
				<label for="serviceType">نوع الخدمة</label>
				<select id="serviceType" name="service_type" required>
					<option value="غسيل">غسيل</option>
				</select>
			</div>
		
			<div class="form-group">
				<label for="urgent">مستعجل</label>
				<input type="checkbox" id="urgent" name="urgent">
			</div>
		
			<div class="form-group">
				<label for="price">السعر</label>
				<input type="text" id="price" name="price" placeholder="Enter price" required>
			</div>
		
			<button type="submit" class="submit-btn">حفظ</button>
			<button type="button" class="btn btn-secondary go-back-two" style="width: 100px;" data-dismiss="modal">رجوع</button>

		</form>
		
	</div>
	<h1>اسعار الأصناف</h1>

<table border="1">
	<thead>
		<tr>
			<th>إسم الصنف</th>
			<th>نوع الخدمة</th>
			<th>مستعجل</th>
			<th>السعر</th>
		</tr>
	</thead>
	<tbody>
		@foreach($itemsPrices as $itemPrice)
			<tr>
				<td>{{ $itemPrice->item_name }}</td>
				<td>{{ $itemPrice->service_type }}</td>
				<td>{{ $itemPrice->urgent ? 'Yes' : 'No' }}</td>
				<td>{{ $itemPrice->price }}</td>
			</tr>
		@endforeach
	</tbody>
</table>
</div>

	

</div>
</div>

			
							

									<script>
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

@endsection
@section('js')
<!-- Internal Select2.min js -->
<!script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></!script>
<!script src="{{URL::asset('assets/js/select2.js')}}"></!script>
<!-- Internal Nice-select js-->
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js')}}"></script>
@endsection
