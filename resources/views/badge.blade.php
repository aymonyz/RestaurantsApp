@extends('layouts.master')
@section('css')
<!---Internal  Prism css-->
<link href="{{URL::asset('assets/plugins/prism/prism.css')}}" rel="stylesheet">
<!--- Custom-scroll -->
<link href="{{URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Elements</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Badge</span>
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>كشف حساب المصروفات خلال فترة</title>
    <!-- روابط CSS اللازمة -->
</head>
<body>
    <h1>كشف حساب المصروفات خلال فترة</h1>
    
    <!-- نموذج اختيار الفرع -->
    <label for="branch">اختر الفرع:</label>
    <select id="branch">
        <option value="shouran">شوران</option>
        <!-- يمكنك إضافة المزيد من الفروع هنا -->
    </select>
    
    <!-- نموذج اختيار المجموعة -->
    <label for="group">اختر المجموعة:</label>
    <select id="group">
        <option value="all">كل المجموعات</option>
        <!-- يمكنك إضافة المزيد من المجموعات هنا -->
    </select>
    
    <!-- حقول اختيار تاريخ البداية والنهاية -->
    <label for="startDate">تاريخ من:</label>
    <input type="date" id="startDate" name="startDate" value="2023-12-01">
    <label for="endDate">تاريخ الى:</label>
    <input type="date" id="endDate" name="endDate" value="2024-02-17">
    
    <!-- نموذج اختيار طرق الدفع -->
    <label for="paymentMethod">طرق الدفع:</label>
    <select id="paymentMethod">
        <option value="all">الكل</option>
        <!-- يمكنك إضافة المزيد من طرق الدفع هنا -->
    </select>
    
    <!-- زر طباعة التقرير -->
    <button onclick="printReport()">طباعة التقرير</button>
    
    <!-- زر تصدير التقرير -->
    <button onclick="exportReport()">تصدير التقرير</button>
    
    <!-- جدول عرض كشف الحساب -->
    <table>
        <thead>
            <tr>
                <th>التاريخ</th>
                <th>المجموعة</th>
                <th>المبلغ</th>
                <th>طريقة الدفع</th>
            </tr>
        </thead>
        <tbody>
            <!-- هنا يمكن عرض البيانات من قاعدة البيانات بشكل ديناميكي -->
            <tr>
                <td>2024-01-01</td>
                <td>مصروف 1</td>
                <td>100</td>
                <td>نقدي</td>
            </tr>
            <!-- وهكذا تستمر البيانات -->
        </tbody>
    </table>
    
    <!-- روابط الـ JavaScript اللازمة -->
    <script>
        // وظيفة لطباعة التقرير
        function printReport() {
            window.print();
        }
        
        // وظيفة لتصدير التقرير
        function exportReport() {
            // يمكنك هنا إضافة الكود اللازم لتصدير التقرير بصيغة معينة، مثل CSV أو PDF
        }
    </script>
</body>
</html>


		<!-- main-content closed -->
@endsection
@section('js')
<!--Internal  Datepicker js -->
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- Internal Select2 js-->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!-- Internal Jquery.mCustomScrollbar js-->
<script src="{{URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<!--Internal  Clipboard js-->
<script src="{{URL::asset('assets/plugins/clipboard/clipboard.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/clipboard/clipboard.js')}}"></script>
<!-- Internal Prism js-->
<script src="{{URL::asset('assets/plugins/prism/prism.js')}}"></script>
@endsection