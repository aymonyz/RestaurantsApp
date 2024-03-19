




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
				<div class="row">

                    
					<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">


					<div class="container">
						<div class="row justify-content-center">
						  <div class="col-auto">
							<button onclick="showContent('content1')" class="btn btn-primary mb-3">صفحة الفواتير</button>
							<button onclick="showContent('content2')" class="btn btn-secondary mb-3">خيارات الطباعة</button>
							<button onclick="showContent('content3')" class="btn btn-success mb-3">الملصقات والعلامات </button>
							<button onclick="showContent('content4')" class="btn btn-danger mb-3">الإخطارات</button>
							<button onclick="showContent('content5')" class="btn btn-warning mb-3">الدليفري</button>
						  </div>
						</div>
						<div class="row justify-content-center">
						  <div class="col-auto">
							<div id="content1" class="content" style="display: none;">
								<div class="container mt-5">
									<div class="row justify-content-center">
										<div class="col-md-8">
											<div class="card">
												<div class="card-header">إعدادات صفحة الفواتير</div>
												<div class="card-body"><form action="{{ route('print_options.store') }}" method="POST">
													@csrf
													<!-- بداية حرف الفاتورة -->
													<div class="form-group">
														<label for="invoiceStartLetter">بداية حرف الفاتورة</label>
														<input type="text" class="form-control" name="invoiceStartLetter" id="invoiceStartLetter" placeholder="A">
													</div>
													<!-- الحد الأقصى لكل حرف -->
													<div class="form-group">
														<label for="maxPerLetter">الحد الأقصى لكل حرف</label>
														<input type="number" class="form-control" name="maxPerLetter" id="maxPerLetter" placeholder="99999">
													</div>
													<!-- الضريبة -->
													<div class="form-group">
														<label for="defaultTax">الضريبة</label>
														<input type="text" class="form-control" name="defaultTax" id="defaultTax" placeholder="0.00%">
													</div>
													<!-- الضبط الإفتراضى للخدمة -->
													<div class="form-group">
														<label for="defaultService">الضبط الإفتراضى للخدمة</label>
														<select class="form-control" name="defaultService" id="defaultService">
															<option value="غسيل">غسيل</option>
														</select>
													</div>
													<!-- تغيير الحرف تلقائيا -->
													<div class="form-group form-check">
														<input type="checkbox" class="form-check-input" name="autoChangeLetter" id="autoChangeLetter">
														<label class="form-check-label" for="autoChangeLetter">تغيير الحرف تلقائيا بعد وصول رقم الفاتورة للحد الاقصى</label>
													</div>
													<!-- تنشيط دورة عمل الغسيل -->
													<div class="form-group form-check">
														<input type="checkbox" class="form-check-input" name="activateWashingCycle" id="activateWashingCycle">
														<label class="form-check-label" for="activateWashingCycle">تنشيط دورة عمل الغسيل (قيد التنفيذ- فواتير جاهزة)</label>
													</div>
													<!-- وقت تجهيز الفاتورة العادي -->
													<div class="form-group">
														<label for="normalProcessingTime">وقت تجهيز الفاتورة العادي</label>
														<input type="number" class="form-control" name="normalProcessingTime" id="normalProcessingTime" placeholder="48 ساعة من تاريخ الفاتورة">
													</div>
													<!-- وقت تجهيز الفاتورة السريع -->
													<div class="form-group">
														<label for="quickProcessingTime">وقت تجهيز الفاتورة السريع</label>
														<input type="number" class="form-control" name="quickProcessingTime" id="quickProcessingTime" placeholder="24 ساعة من تاريخ الفاتورة">
													</div>
													<button type="submit" class="btn btn-primary">حفظ الإعدادات</button>
												</form>
												
												</div>

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
	<div class="row">

		
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">


		<div class="container">
			<div class="row justify-content-center">
			  <div class="col-auto">
				<button onclick="showContent('content1')" class="btn btn-primary mb-3">صفحة الفواتير</button>
				<button onclick="showContent('content2')" class="btn btn-secondary mb-3">خيارات الطباعة</button>
				<button onclick="showContent('content3')" class="btn btn-success mb-3">الملصقات والعلامات </button>
				<button onclick="showContent('content4')" class="btn btn-danger mb-3">الإخطارات</button>
				<button onclick="showContent('content5')" class="btn btn-warning mb-3">الدليفري</button>
			  </div>
			</div>
			<div class="row justify-content-center">
				<!-- show errrors -->
				@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


			  <div class="col-auto">
				<!-- show success messages -->
@if(session('success'))
<div class="alert alert-success">
	{{ session('success') }}
</div>
@endif
				<div id="content1" class="content" style="display: none;">
					<div class="container mt-5">
						<div class="row justify-content-center">
							<div class="col-md-8">
								<div class="card">
									<div class="card-header">إعدادات صفحة الفواتير</div>
									<div class="card-body">
										<form action="{{route('invoice-page-settings.store')}}" method="POST">
											@csrf
											<!-- بداية حرف الفاتورة -->
											<div class="form-group">
												<label for="invoice_start_letter">بداية حرف الفاتورة</label>
												<input type="text" class="form-control" name="invoice_start_letter" id="invoice_start_letter" placeholder="A" value="{{ old('invoice_start_letter', $invoiceSettings->invoice_start_letter ?? '') }}">

											</div>
											<!-- الحد الأقصى لكل حرف -->
											<div class="form-group">
												<label for="max_per_letter">الحد الأقصى لكل حرف</label>
												<input type="number" class="form-control" name="max_per_letter" id="max_per_letter" placeholder="99999" value="{{ old('max_per_letter', $invoiceSettings->max_per_letter ?? '') }}">
											</div>
											<!-- الضريبة -->
											<div class="form-group">
												<label for="default_tax">الضريبة</label>
												<input type="text" class="form-control" name="default_tax" id="default_tax" placeholder="0.00%" value="{{ old('default_tax', $invoiceSettings->default_tax ?? '') }}">
											</div>
											<!-- الضبط الإفتراضى للخدمة -->
											<div class="form-group">
												<label for="default_service">الضبط الإفتراضى للخدمة</label>
												<select class="form-control" name="default_service" id="default_service">
													<option value="غسيل" {{ old('default_service', $invoiceSettings->default_service ?? '') == 'غسيل' ? 'selected' : '' }}>غسيل</option>
												</select>
											</div>
											<!-- تغيير الحرف تلقائيا -->
											<div class="form-group form-check">
												<input type="checkbox" class="form-check-input" name="auto_change_letter" id="auto_change_letter" value="1" {{ old('auto_change_letter', $invoiceSettings->auto_change_letter ?? '') ? 'checked' : '' }}>
												<label class="form-check-label" for="auto_change_letter">تغيير الحرف تلقائيا بعد وصول رقم الفاتورة للحد الاقصى</label>
											</div>
											<!-- تنشيط دورة عمل الغسيل -->
											<div class="form-group form-check">
												<input type="checkbox" class="form-check-input" name="activate_washing_cycle" id="activate_washing_cycle" value="1" {{ old('activate_washing_cycle', $invoiceSettings->activate_washing_cycle ?? '') ? 'checked' : '' }}>
												<label class="form-check-label" for="activate_washing_cycle">تنشيط دورة عمل الغسيل (قيد التنفيذ- فواتير جاهزة)</label>
											</div>
											<!-- وقت تجهيز الفاتورة العادي -->
											<div class="form-group">
												<label for="normal_processing_time">وقت تجهيز الفاتورة العادي</label>
												<input type="number" class="form-control" name="normal_processing_time" id="normal_processing_time" placeholder="48 ساعة من تاريخ الفاتورة" value="{{ old('normal_processing_time', $invoiceSettings->normal_processing_time ?? '') }}">
											</div>
											<!-- وقت تجهيز الفاتورة السريع -->
											<div class="form-group">
												<label for="quick_processing_time">وقت تجهيز الفاتورة السريع</label>
												<input type="number" class="form-control" name="quick_processing_time" id="quick_processing_time" placeholder="24 ساعة من تاريخ الفاتورة" value="{{ old('quick_processing_time', $invoiceSettings->quick_processing_time ?? '') }}">
											</div>
											<button type="submit" class="btn btn-primary">حفظ الإعدادات</button>
										</form>
							
									</div>
								</div>
								
							</div>

							
							<div id="content2" class="content" style="display: none;">
							
								<div class="container mt-5">
									<div class="row justify-content-center">
										<div class="col-lg-10">
											<div class="card shadow">
												<div class="card-header bg-primary text-white">خيارات طباعة الفاتورة</div>
												<div class="card-body">
													
														<!-- إضافة العناصر هنا كما في الأمثلة السابقة -->
														<div class="row form-group">
															<div class="col-md-6">
																<div class="custom-control custom-checkbox">
																	<input type="checkbox" class="custom-control-input" id="directPrint">
																	<label class="custom-control-label" for="directPrint">الطباعة مباشرة</label>
																</div>
															</div>
															<div class="col-md-6">
																<label for="printCopies">عدد النسخ المطبوعة</label>
																<input type="number" class="form-control" id="printCopies" value="1">
															</div>
														</div>
								
														<div class="form-group">
															<label for="printerName">إسم الطابعة</label>
															<select class="form-control" id="printerName">
																<option selected>قائمة الطابعات</option>
															</select>
														</div>
								
														<div class="custom-control custom-checkbox mb-3">
															<input type="checkbox" class="custom-control-input" id="printAfterIssue">
															<label class="custom-control-label" for="printAfterIssue">طباعة بعد إصدار الفاتورة</label>
														</div>
								
														<div class="form-group">
															<label for="noteBelowInvoice">ملحوظة أسفل الفاتورة</label>
															<input type="text" class="form-control" id="noteBelowInvoice" placeholder="المغسلة غير مسؤوله عن السجاد بعد مضي شهرين من تاريخ الاستلام">
														</div>
														<div class="form-group">
															<label for="noteBelowInvoice2">ملحوظة أسفل الفاتورة 2</label>
															<input type="text" class="form-control" id="noteBelowInvoice2" placeholder="عزيزي العميل في حال اصدرت فاتوره اقل من 60 ريال سوف يحسب مبلغ التوصيل 30 ريال">
														</div>
								
														<button type="submit" class="btn btn-primary">حفظ الإعدادات</button>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								
							</div>
							<div id="content3" class="content" style="display: none;">
							
								<div class="container mt-5">
									<div class="row justify-content-center">
										<div class="col-md-8">
											<div class="card">
												<div class="card-header">تصميم باركود العلامات (التاج)</div>
												<div class="card-body">
													<form>
														<!-- حجم الملصق -->
														<div class="form-group row">
															<label class="col-sm-4 col-form-label">حجم الملصق (إنش)</label>
															<div class="col-sm-4">
																<input type="number" class="form-control" placeholder="العرض (إنش)" value="2">
															</div>
															<div class="col-sm-4">
																<input type="number" class="form-control" placeholder="الطول (إنش)" value="2">
															</div>
														</div>
														<!-- حجم الباركود ومسافة التاج -->
														<div class="form-group row">
															<label class="col-sm-4 col-form-label">مسافة التاج</label>
															<div class="col-sm-8">
																<input type="number" class="form-control" value="12">
															</div>
														</div>
														<!-- تفاصيل الباركود -->
														<div class="form-group">
															<label>رقم الفاتورة</label>
															<input type="text" class="form-control" value="A00001">
														</div>
														<div class="form-group">
															<label>كود العميل</label>
															<input type="text" class="form-control" value="1001">
														</div>
														<div class="form-group">
															<label>رقم الموبايل</label>
															<input type="text" class="form-control" value="520300120">
														</div>
														<div class="form-group">
															<label>إسم العميل</label>
															<input type="text" class="form-control" value="Customer Name">
														</div>
														<div class="form-group">
															<label>إسم الصنف</label>
															<input type="text" class="form-control" value="Item Name">
														</div>
														<!-- أزرار الحفظ والإلغاء -->
														<button type="submit" class="btn btn-primary">تطبيق</button>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
								
							</div>
							<div id="content4" class="content" style="display: none;"><div class="container mt-5">
								<h2>إعدادات الواتساب</h2>
								<div class="form-group">
									<label for="whatsappMessageAr">رسائل الواتساب (عربي)</label>
									<textarea class="form-control" id="whatsappMessageAr" rows="3" maxlength="150" placeholder="نص ثابت أسفل بيانات الفاتورة"></textarea>
								</div>
								<div class="form-group">
									<label for="whatsappMessageEn">رسائل الواتساب (إنجليزي)</label>
									<textarea class="form-control" id="whatsappMessageEn" rows="3" maxlength="150" placeholder="Fixed text below invoice data"></textarea>
								</div>
							</div>
							<div class="container mt-5">
								<h2>إعدادات الرسائل</h2>
								<div class="form-group">
									<label>إرسال رسالة للعميل فور إصدار طلب توصيل</label>
									<textarea class="form-control" rows="2">If you want change text message call support</textarea>
								</div>
								<div class="form-group">
									<label>إرسال رسالة للعميل فور إصدار الفاتورة</label>
									<textarea class="form-control" rows="2">مغاسل خطوة نظافة تم إصدار فاتورة رقم @@@@@@ بقيمة ######</textarea>
								</div>
								<div class="form-group">
									<label>إرسال رسالة للعميل فور تجهيز الفاتورة</label>
									<textarea class="form-control" rows="2">يوجد لدينا قسم خاص لغسيل كنب في المنزل بأسعار مناسبة إتصل: 0541226692</textarea>
								</div>
							</div>
							<div class="container mt-5">
								<h2>إعدادات البريد الإلكتروني</h2>
								<div class="form-group">
									<label>إرسال رسالة على بريد إلكتروني للعميل بعد إضافة طلب جديد</label>
									<textarea class="form-control" rows="2" placeholder="إدخل نص الرسالة هنا"></textarea>
								</div>
							</div>
							
							</div>
							<div id="content5" class="content" style="display: none;">
							
								<div class="container mt-5">
									<div class="card">
										<div class="card-header">
											تفعيل إدارة طلبات التوصيل
										</div>
										<div class="card-body">
											<form>
												<div class="form-group form-check">
													<input type="checkbox" class="form-check-input" id="enableDeliveryService">
													<label class="form-check-label" for="enableDeliveryService">تفعيل خدمة التوصيل لهذا الفرع داخل تطبيق دليفري</label>
												</div>
												<div class="form-group">
													<label for="minDeliveryOrder">حد أدنى لطلب الدليفري</label>
													<input type="text" class="form-control" id="minDeliveryOrder" placeholder="60.00">
												</div>
												<div class="form-group">
													<label for="deliveryServiceFee">خدمة التوصيل</label>
													<input type="text" class="form-control" id="deliveryServiceFee" placeholder="0.00">
												</div>
												<button type="submit" class="btn btn-primary">حفظ الإعدادات</button>
											</form>
										</div>
									</div>
								</div>
								
							
							</div>
						  </div>
						</div>
					  </div>
					  
					<script>
						function showContent(contentId) {
					  // إخفاء كل المحتوى
					  var contents = document.getElementsByClassName('content');
					  for (var i = 0; i < contents.length; i++) {
						contents[i].style.display = 'none';
					  }
					
					  // عرض المحتوى المختار
					  document.getElementById(contentId).style.display = 'block';
					}
					</script>
					<style>
					.content {
						.content {
					  display: none;
					  padding: 20px;
					  border: 1px solid #ddd;
					  margin-top: 20px;
					  border-radius: 5px;
					  background-color: #f9f9f9;
					}
					
					.container {
					  padding-top: 50px; /* أو أي قيمة تفضلها للتمركز العمودي */
					}
					
					}
					
					</style>
					





		
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->

						</div>
					</div>
					
				</div>
				
				<div id="content2" class="content" style="display: none;">
				
					<div class="container mt-5">
						<div class="row justify-content-center">
							<div class="col-lg-10">
								<div class="card shadow">
									<div class="card-header bg-primary text-white">خيارات طباعة الفاتورة</div>
									<div class="card-body">
										
											<!-- إضافة العناصر هنا كما في الأمثلة السابقة -->
											<div class="row form-group">
												<div class="col-md-6">
													<div class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input" id="directPrint">
														<label class="custom-control-label" for="directPrint">الطباعة مباشرة</label>
													</div>
												</div>
												<div class="col-md-6">
													<label for="printCopies">عدد النسخ المطبوعة</label>
													<input type="number" class="form-control" id="printCopies" value="1">
												</div>
											</div>
					
											<div class="form-group">
												<label for="printerName">إسم الطابعة</label>
												<select class="form-control" id="printerName">
													<option selected>قائمة الطابعات</option>
												</select>
											</div>
					
											<div class="custom-control custom-checkbox mb-3">
												<input type="checkbox" class="custom-control-input" id="printAfterIssue">
												<label class="custom-control-label" for="printAfterIssue">طباعة بعد إصدار الفاتورة</label>
											</div>
					
											<div class="form-group">
												<label for="noteBelowInvoice">ملحوظة أسفل الفاتورة</label>
												<input type="text" class="form-control" id="noteBelowInvoice" placeholder="المغسلة غير مسؤوله عن السجاد بعد مضي شهرين من تاريخ الاستلام">
											</div>
											<div class="form-group">
												<label for="noteBelowInvoice2">ملحوظة أسفل الفاتورة 2</label>
												<input type="text" class="form-control" id="noteBelowInvoice2" placeholder="عزيزي العميل في حال اصدرت فاتوره اقل من 60 ريال سوف يحسب مبلغ التوصيل 30 ريال">
											</div>
					
											<button type="submit" class="btn btn-primary">حفظ الإعدادات</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					
				</div>
				<div id="content3" class="content" style="display: none;">
				
					<div class="container mt-5">
						<div class="row justify-content-center">
							<div class="col-md-8">
								<div class="card">
									<div class="card-header">تصميم باركود العلامات (التاج)</div>
									<div class="card-body">
										<form>
											<!-- حجم الملصق -->
											<div class="form-group row">
												<label class="col-sm-4 col-form-label">حجم الملصق (إنش)</label>
												<div class="col-sm-4">
													<input type="number" class="form-control" placeholder="العرض (إنش)" value="2">
												</div>
												<div class="col-sm-4">
													<input type="number" class="form-control" placeholder="الطول (إنش)" value="2">
												</div>
											</div>
											<!-- حجم الباركود ومسافة التاج -->
											<div class="form-group row">
												<label class="col-sm-4 col-form-label">مسافة التاج</label>
												<div class="col-sm-8">
													<input type="number" class="form-control" value="12">
												</div>
											</div>
											<!-- تفاصيل الباركود -->
											<div class="form-group">
												<label>رقم الفاتورة</label>
												<input type="text" class="form-control" value="A00001">
											</div>
											<div class="form-group">
												<label>كود العميل</label>
												<input type="text" class="form-control" value="1001">
											</div>
											<div class="form-group">
												<label>رقم الموبايل</label>
												<input type="text" class="form-control" value="520300120">
											</div>
											<div class="form-group">
												<label>إسم العميل</label>
												<input type="text" class="form-control" value="Customer Name">
											</div>
											<div class="form-group">
												<label>إسم الصنف</label>
												<input type="text" class="form-control" value="Item Name">
											</div>
											<!-- أزرار الحفظ والإلغاء -->
											<button type="submit" class="btn btn-primary">تطبيق</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					
				</div>
				<div id="content4" class="content" style="display: none;"><div class="container mt-5">
					<h2>إعدادات الواتساب</h2>
					<div class="form-group">
						<label for="whatsappMessageAr">رسائل الواتساب (عربي)</label>
						<textarea class="form-control" id="whatsappMessageAr" rows="3" maxlength="150" placeholder="نص ثابت أسفل بيانات الفاتورة"></textarea>
					</div>
					<div class="form-group">
						<label for="whatsappMessageEn">رسائل الواتساب (إنجليزي)</label>
						<textarea class="form-control" id="whatsappMessageEn" rows="3" maxlength="150" placeholder="Fixed text below invoice data"></textarea>
					</div>
				</div>
				<div class="container mt-5">
					<h2>إعدادات الرسائل</h2>
					<div class="form-group">
						<label>إرسال رسالة للعميل فور إصدار طلب توصيل</label>
						<textarea class="form-control" rows="2">If you want change text message call support</textarea>
					</div>
					<div class="form-group">
						<label>إرسال رسالة للعميل فور إصدار الفاتورة</label>
						<textarea class="form-control" rows="2">مغاسل خطوة نظافة تم إصدار فاتورة رقم @@@@@@ بقيمة ######</textarea>
					</div>
					<div class="form-group">
						<label>إرسال رسالة للعميل فور تجهيز الفاتورة</label>
						<textarea class="form-control" rows="2">يوجد لدينا قسم خاص لغسيل كنب في المنزل بأسعار مناسبة إتصل: 0541226692</textarea>
					</div>
				</div>
				<div class="container mt-5">
					<h2>إعدادات البريد الإلكتروني</h2>
					<div class="form-group">
						<label>إرسال رسالة على بريد إلكتروني للعميل بعد إضافة طلب جديد</label>
						<textarea class="form-control" rows="2" placeholder="إدخل نص الرسالة هنا"></textarea>
					</div>
				</div>
				
				</div>
				<div id="content5" class="content" style="display: none;">
				
					<div class="container mt-5">
						<div class="card">
							<div class="card-header">
								تفعيل إدارة طلبات التوصيل
							</div>
							<div class="card-body">
								<form action="{{route('delivery-settings.store')}}" method="POST">
									@csrf
									<div class="form-group form-check">
										<input type="checkbox" class="form-check-input" id="enableDeliveryService" name="enableDeliveryService">
										<label class="form-check-label" for="enableDeliveryService">تفعيل خدمة التوصيل لهذا الفرع داخل تطبيق دليفري</label>
									</div>
									<div class="form-group">
										<label for="minDeliveryOrder">حد أدنى لطلب الدليفري</label>
										<input type="text" class="form-control" id="minDeliveryOrder" placeholder="60.00" name="minDeliveryOrder">
									</div>
									<div class="form-group">
										<label for="deliveryServiceFee">خدمة التوصيل</label>
										<input type="text" class="form-control" id="deliveryServiceFee" placeholder="0.00" name="deliveryServiceFee">
									</div>
									<button type="submit" class="btn btn-primary">حفظ الإعدادات</button>
								</form>
							</div>
						</div>
					</div>
					
				
				</div>
			  </div>
			</div>
		  </div>
		  
		<script>
			function showContent(contentId) {
		  // إخفاء كل المحتوى
		  var contents = document.getElementsByClassName('content');
		  for (var i = 0; i < contents.length; i++) {
			contents[i].style.display = 'none';
		  }
		
		  // عرض المحتوى المختار
		  document.getElementById(contentId).style.display = 'block';
		}
		</script>
		<style>
		.content {
			.content {
		  display: none;
		  padding: 20px;
		  border: 1px solid #ddd;
		  margin-top: 20px;
		  border-radius: 5px;
		  background-color: #f9f9f9;
		}
		
		.container {
		  padding-top: 50px; /* أو أي قيمة تفضلها للتمركز العمودي */
		}
		
		}
		
		</style>
		






	</div>
	<!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->

@endsection
@section('js')
@endsection