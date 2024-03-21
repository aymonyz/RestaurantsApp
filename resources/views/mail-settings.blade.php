@extends('layouts.master')
@section('css')
<!-- Internal Select2 css -->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex"><h4 class="content-title mb-0 my-auto">Mail</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Mail-setting</span></div>
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
		
<!DOCTYPE html>
<html>
<head>
    <title>تقرير طلبات مدفوعة لمستخدم خلال فترة	</title>
</head>
<h1>تقرير طلبات مدفوعة لمستخدم خلال فترة
</h1>
<body>
	<h2>تقرير الفواتير المدفوعة من {{ request('startDate') }} إلى {{ request('endDate') }}</h2>

	
    <table>
        <thead>
            <tr>
                <th>رقم الفاتورة</th>
                <th>تاريخ الفاتورة</th>
                <th>رقم / أسم العميل</th>
                <th>المبلغ</th>
                <th>الحالة</th>
                <th>الخصم</th>
                <th>الإجمالي</th>
                <!-- إضافة المزيد من الأعمدة حسب الحاجة -->
            </tr>
        </thead>
        <tbody>
            @foreach ($invoices as $invoice)
                <tr>
                    <td>{{ $invoice->id }}</td>
                    <td>{{ $invoice->created_at->format('Y-m-d') }}</td>
                    <td>{{ $invoice->customerName }}</td> <!-- يجب تعديله حسب العمود المناسب -->
                    <td>{{ $invoice->amount }}</td>
                    <td>{{ $invoice->status }}</td>
                    <td>{{ $invoice->discount }}</td>
                    <td>{{ $invoice->total }}</td>
                    <!-- إضافة المزيد من الخلايا حسب البيانات المتوفرة -->
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>



				</div>
				<!-- /row -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!-- Moment js -->
<script src="{{URL::asset('assets/plugins/raphael/raphael.min.js')}}"></script>
<!-- Internal Select2.min js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<script src="{{URL::asset('assets/js/select2.js')}}"></script>
@endsection