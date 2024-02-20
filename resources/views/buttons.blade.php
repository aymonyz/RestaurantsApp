@extends('layouts.master')
@section('css')
<!---Internal  Prism css-->
<link href="{{URL::asset('assets/plugins/prism/prism.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Elements</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Buttons</span>
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>المصروفات الشهرية خلال السنة</title>
    <!-- روابط CSS اللازمة -->
</head>
<body>
    <h1>المصروفات الشهرية خلال السنة</h1>
    
    <!-- نموذج اختيار الفرع -->
    <label for="branch">اختر الفرع:</label>
    <select id="branch">
        <option value="all">كل الفروع</option>
        <option value="branch1">الفرع 1</option>
        <option value="branch2">الفرع 2</option>
        <!-- يمكنك إضافة المزيد من الفروع هنا -->
    </select>
    
    <!-- حقل اختيار السنة -->
    <label for="year">اختر السنة:</label>
    <input type="number" id="year" name="year" min="2000" max="2099" value="2024">
    
    <!-- زر طباعة التقرير -->
    <button onclick="printReport()">طباعة التقرير</button>
    
    <!-- زر تصدير التقرير -->
    <button onclick="exportReport()">تصدير التقرير</button>
    
    <!-- جدول عرض المصروفات الشهرية -->
    <table>
        <thead>
            <tr>
                <th>الشهر</th>
                <th>المبلغ</th>
            </tr>
        </thead>
        <tbody>
            <!-- هنا يمكن عرض البيانات من قاعدة البيانات بشكل ديناميكي -->
            <tr>
                <td>يناير</td>
                <td>1000</td>
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

				<!-- /row -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->

@section('js')
<!-- Internal Select2 js-->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!-- Internal Jquery.mCustomScrollbar js-->
<script src="{{URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<!--Internal  Clipboard js-->
<script src="{{URL::asset('assets/plugins/clipboard/clipboard.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/clipboard/clipboard.js')}}"></script>
<!-- Internal Prism js-->
<script src="{{URL::asset('assets/plugins/prism/prism.js')}}"></script>
