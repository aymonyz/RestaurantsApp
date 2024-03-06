<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<meta name="csrf-token" content="{{ csrf_token() }}">

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
<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS (يُفضل وضعه قبل إغلاق </body>) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>





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
						<option value="" disabled selected>اختر المجموعة الاصناف</option>

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
				<div class="col-md-6 mb-2">
				<div class="form-group">
					<label for="urgent">نشط</label>
					<input type="checkbox" id="urgent" name="is_active">
				</div>
				</div>
				{{-- <div class="col-md-6 mb-2">
					<div class="form-check">
						<input class="form-check-input" type="checkbox" id="isActiveCheckbox" name="is_active">
						<label class="form-check-label" for="isActiveCheckbox">نشط</label>
					</div>
				</div>
				 --}}
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
		<th>الاجرات</th>

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
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editImageModal-{{ $item->id }}">
				تعديل
			</button>
		</div>
	
		<!-- Modal -->
		<div class="modal fade" id="editImageModal-{{ $item->id }}" tabindex="-1" aria-labelledby="editImageModalLabel-{{ $item->id }}" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="editImageModalLabel-{{ $item->id }}">تعديل  الصورة</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<?php
$images = [
    ['id' => 1, 'src' => '/Images/Items images/carpet_round.png', 'description_arabic' => 'سجاد دائري','description_english' => 'Carpet round'],
    ['id' => 2, 'src' => '/Images/Items images/carpet_roll_red.png', 'description_arabic' => 'سجاد','description_english' => 'Carpet'],
    ['id' => 3, 'src' => '/Images/Items images/carpet_roll_green.png', 'description_arabic' => 'سجاد','description_english' => 'Carpet'],
    ['id' => 4, 'src' => '/Images/Items images/carpet_red.png', 'description_arabic' => 'سجاد مستطيل','description_english' => 'Red carpet'],
    ['id' => 5, 'src' => '/Images/Items images/carpet_fur.png', 'description_arabic' => 'موكيت فرو','description_english' => 'Fur carpet'],
    ['id' => 6, 'src' => '/Images/Items images/blanket_big.png', 'description_arabic' => 'بطانية كبيرة','description_english' => 'Big blanket'],
    ['id' => 7, 'src' => '/Images/Items images/couche_three.png', 'description_arabic' => 'غطاء كنبة ثلاثي','description_english' => 'Couche three'],
    ['id' => 8, 'src' => '/Images/Items images/curtain_big.png', 'description_arabic' => 'ستائر كبيرة','description_english' => 'Big curtains'],
    ['id' => 9, 'src' => '/Images/Items images/curtain_small.png', 'description_arabic' => 'ستائر صغيرة','description_english' => 'Small curtains'],
    ['id' => 10, 'src' => '/Images/Items images/jacket_men.png', 'description_arabic' => 'جاكت رجالي','description_english' => "Men's jacket"],
    ['id' => 11, 'src' => '/Images/Items images/kees_makhada2.png', 'description_arabic' => 'hello','description_english' => 'hello'],
    ['id' => 12, 'src' => '/Images/Items images/leather_sofa_single.png', 'description_arabic' => 'كنب جلد فردي','description_english' => 'leather sofa single'],
    ['id' => 13, 'src' => '/Images/Items images/Mattress.png', 'description_arabic' => 'مرتبة سرير','description_english' => 'Mattress'],
    ['id' => 14, 'src' => '/Images/Items images/pillow_case_big.png', 'description_arabic' => 'غطاء مخدة كبير','description_english' => 'Big pillow case'],
    ['id' => 15, 'src' => '/Images/Items images/Pillows.png', 'description_arabic' => 'وسادة','description_english' => 'Pillows'],
    ['id' => 16, 'src' => '/Images/Items images/Pillows_kids.png', 'description_arabic' => 'وسادة أطفال','description_english' => "kid's Pillows"],
    ['id' => 17, 'src' => '/Images/Items images/prayer_blue.png', 'description_arabic' => 'سجادة صلاة','description_english' => "prayer's carpet"],
    ['id' => 18, 'src' => '/Images/Items images/scalp_car.png', 'description_arabic' =>'فروة مقاعد السيارة','description_english' => "car's scalp"],
    ['id' => 19, 'src' => '/Images/Items images/table_cover6.png', 'description_arabic' => 'مفرش طاولة','description_english' => 'table cover'],
];
?>


    <div class="container mt-5">
        <h3 class="text-center mt-4">اختر صورة لهذا الصنف</h3>
        <div class="row">
            @foreach($images as $image)
                <div class="col-md-4 image-container">
                    <!-- Use a form for each image card -->
                    <form method="POST" action="{{ route('updateImage', ['item' => $item]) }}">
                        @csrf
                        <input type="hidden" name="src" value="{{ $image['src'] }}">
                        <input type="hidden" name="description_arabic" value="{{ $image['description_arabic'] }}">
                        <input type="hidden" name="description_english" value="{{ $image['description_english'] }}">
                        <input type="hidden" name="item_id" value="{{ $item }}"> <!-- Add this line -->

                        <div class="card" onclick="submitForm(this)" style="margin-top: 20px; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <img src="{{ asset($image['src']) }}" style="width:50%; height: 50%;" alt="{{ $image['description_english'] }}">
                            <div class="card-body" style="text-align: center;">
                                <h5 class="card-title">{{ $image['description_english'] }}</h5>
                                <p class="card-text">{{ $image['description_arabic'] }}</p>
                            </div>
                        </div>
                    </form>
                </div>
            @endforeach
        </div>
        </div>
       

        
    

    <!-- Include Bootstrap JS and Popper.js if needed -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function submitForm(element) {
            // Submit the parent form when the card is clicked
            element.closest('form').submit();
        }
    </script>



					</div>
				</div>
			</div>
		</div>
	</td>
	
	<td>{{ $item->is_active }}</td>
	<td class="edit-btn">
		<a href="#" onclick="showEditForm({{ $item->id }}, '{{ $item->arabicName }}', '{{ $item->englishName }}', '{{ $item->abbreviatedArabicname }}', '{{ $item->group }}', '{{ $item->unit }}', '{{ $item->is_active }}')">تعديل</a>
	
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
			<th>الحزف</th>
		</tr>
	</thead>
	<tbody>
		@foreach($itemsPrices as $itemPrice)
			<tr>
				<td>{{ $itemPrice->item_name }}</td>
				<td>{{ $itemPrice->service_type }}</td>
				<td>{{ $itemPrice->urgent ? 'Yes' : 'No' }}</td>
				<td>{{ $itemPrice->price }}</td>
			 
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
</div>
<!-- Modal -->
<div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="editProductModalLabel">تعديل المنتج</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
			
				
					<form action="/items/3" method="post">
						<input type="hidden" name="_method" value="PUT">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<!-- حقول النموذج الأخرى هنا -->
					
					
			<!-- تضمين حقول النموذج هنا لتعديل المنتج -->
			<input type="hidden" id="productId" name="productId">
			<div class="form-group">
			  <label for="arabicName">الاسم بالعربية</label>
			  <input type="text" class="form-control" id="arabicName" name="arabicName">
			  <small id="arabicNameHelp" class="form-text text-muted">هذا الاسم سيظهر في طباعة الفاتورة</small>
			</div>
			<div class="form-group">
			  <label for="englishName">الاسم بالإنجليزية</label>
			  <input type="text" class="form-control" id="englishName" name="englishName">
			  <small id="englishNameHelp" class="form-text text-muted">هذا الاسم سيظهر في طباعة الفاتورة</small>
			</div>
  
			<div class="row">
			  <div class="col-md-6 mb-3">
				<label class="form-label">الإسم المختصر</label>
				<input type="text" class="form-control" maxlength="13" id="abbreviatedArabicName" name="abbreviatedArabicName">
				<small class="text-success">هذا الاسم سيظهر على شاشة الفاتورة</small>
			  </div>
			  <div class="col-md-6 mb-3">
				<label class="form-label">الإسم الانجليزي المختصر</label>
				<input type="text" class="form-control" maxlength="13" id="abbreviatedEnglishName" name="abbreviatedEnglishName">
				<small class="text-success">هذا الاسم سيظهر على شاشة الفاتورة</small>
			  </div>
			</div>
  
			<div class="row">
			  <div class="col-md-6 mb-3">
				<label class="form-label">المجموعة</label>
				<select class="form-select" id="group" name="group">
				  <option value="" disabled selected>اختر المجموعة الاصناف</option>
				  <!-- تكرار خيارات المجموعة -->
				  @foreach($groups as $group)
				  <option value="{{ $group->GroupNameArabic }}">{{ $group->GroupNameArabic }}</option>
			  @endforeach
				</select>
				<small class="text-success">يمكنك تصنيف الصنف إلى مجموعات، على سبيل المثال: قميص، اختر رجالي من القائمة</small>
			  </div>
			  
			  <div class="col-md-6 mb-3">
				<label class="form-label">رقم الصنف</label>
				<input type="text" class="form-control" maxlength="3" id="itemNumber" name="itemNumber">
				<small class="text-success">يمكنك البحث عن الاصناف باستخدام هذا الرقم في شاشة الفواتير</small>
			  </div>
			
  
			<div class="row">
			  <div class="col-md-6 mb-3">
				<label class="form-label">وحدة القياس</label>
				<select class="form-select" id="unit" name="unit">
				  <option value="متر">متر</option>
				  <option value="قطعة">قطعة</option>
				</select>
			  </div>
			  <div class="col-md-6 mb-2">
				<div class="form-group">
				  <label for="is_active">نشط</label>
				  <input type="checkbox" id="is_active" name="is_active">
				</div>
			  </div>
			</div>
			
			<div class="modal-footer">
			  <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
			
			  <button type="submit">تحديث</button>
		
			</div>
		  </form>
		</div>
	  </div>
	</div>
  </div>
  <script>
	$.ajax({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    type: 'POST',
    url: '/product-details', // تأكد من أن هذا يطابق مسار POST المُعرّف
    data: {
        // بيانات الفورم
    },
    success: function(response) {
        // التعامل مع الاستجابة
    },
    error: function(error) {
        // التعامل مع الخطأ
    }
});

  </script>
  <script>
	
	</script>
  <script>
	
  function showEditForm(id, arabicName, englishName, abbreviatedArabicName, abbreviatedEnglishName, group, itemNumber, unit, is_active) {
	// ملء البيانات في النموذج
	$('#productId').val(id);
	$('#arabicName').val(arabicName);
	$('#englishName').val(englishName);
	$('#abbreviatedArabicName').val(abbreviatedArabicName);
	$('#abbreviatedEnglishName').val(abbreviatedEnglishName);
	$('#group').val(group);
	$('#itemNumber').val(itemNumber);
	$('#unit').val(unit);
	$('#is_active').prop('checked', is_active === "1");
  
	// عرض النافذة المنبثقة
	$('#editProductModal').modal('show');
	// إخفاء النافذة المنبثقة
	$('#editProductModal').modal('hide');
	
	// حفظ التغييرات
	
  }
  </script>
	  
							

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
<!-- jQuery (ضروري لميزات JavaScript في Bootstrap) -->


<!-- Internal Select2.min js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<script src="{{URL::asset('assets/js/select2.js')}}"></script>
<!-- Internal Nice-select js-->
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js')}}"></script>
@endsection