@extends('layouts.master')

@section('css')
<!-- إذا كان لديك ملفات CSS خاصة بالتقويم، قم بإضافتها هنا -->
@endsection

@section('page-header')
<!-- كود الـ breadcrumb وأزرار الصفحة، يمكنك تعديله حسب ما تحتاج -->
@endsection

@section('content')
<div class="row">
 

<div class="col-sm-12">
	<div class="card">
		<div class="card-body">
			<div class="invoice-header">
				<h1 class="invoice-title">تقرير عن حركة المقبوضات والمدفوعات</h1>
				<p class="invoice-info">
				
				</p>
			</div>
			<h1></h1>
			<div class="col-12">
				<!-- Search Form -->
				<form action="{{ route('mail-read.search') }}" method="GET" class="form-inline">
				
		
					<div class="form-group mb-2 ml-2">
						<label for="date_from">تاريخ من</label>
						<input type="date" id="date_from" name="date_from" class="form-control ml-2">
					</div>
		
					<div class="form-group mb-2 ml-2">
						<label for="date_to">تاريخ الى</label>
						<input type="date" id="date_to" name="date_to" class="form-control ml-2">
					</div>
		
					<button type="submit" class="btn btn-primary mb-2">بحث</button>
				</form>
		
				<!-- ... الكود الخاص بعرض الفواتير ... -->
			</div>
		</div>
			<div class="table-responsive">
				
				<table class="table">
					<thead>
						<tr>
							<th>تاريخ الحركة</th>
							<th>رقم الحركة</th>
							<th>أسم الفرع</th>
							<th>الضريبة</th>
							<th>إجمالي المصروف</th>
							<th>ضريبة</th>
							<th>إجمالي الفاتورة</th>
							<th>الخصم</th>
							<th>توصيل</th>
						</tr>
					</thead>
					<tbody>
						@foreach($invoices as $invoice)
                        <tr>
    <td>{{ $invoice->created_at->format('Y-m-d') }}</td>
    <td>{{ $invoice->id }}</td>
    <td>شوران</td>
    <td>{{ number_format($invoice->tax, 2) }}</td>
    <td>{{ number_format($invoice->totalExpense, 2) }}</td>
    <td>{{ number_format($invoice->tax, 2) }}</td>
    <td>{{ number_format($invoice->totalPrice, 2) }}</td>
    <td>{{ $invoice->discount }}</td>
    <td>{{ $invoice->delivery ? 'نعم' : 'لا' }}</td>
                        </tr>
                        @endforeach

					</tbody>
				</table>
			</div>
			
		</div>
	</div>
</div>
</div>
@endsection

@section('js')
<!-- أي سكريبتات خاصة بتحسين عملية اختيار التاريخ يمكن وضعها هنا -->
@endsection
