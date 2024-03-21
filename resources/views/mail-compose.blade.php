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



					<style>
						body {
						  font-family: 'Arial', sans-serif;
						}
						table {
						  width: 100%;
						  border-collapse: collapse;
						  margin-top: 20px;
						}
						th, td {
						  border: 1px solid #ddd;
						  padding: 8px;
						  text-align: left;
						}
						th {
						  background-color: #f2f2f2;
						}
						tr:nth-child(even) {
						  background-color: #f9f9f9;
						}
						tr:hover {
						  background-color: #e9e9e9;
						}
						a {
						  text-decoration: none;
						  color: blue;
						}
						button {
						  padding: 5px 10px;
						  background-color: red;
						  color: white;
						  border: none;
						  border-radius: 5px;
						  cursor: pointer;
						}
						button:hover {
						  opacity: 0.8;
						}
					  </style>

<!-- الهيكل الأساسي لـ HTML مع Blade template syntax لإدراج البيانات -->
<table>
	<thead>
	  <tr>
		<th>ID</th>
		<th>Discount</th>
		<th>Delivery</th>
		<th>Delivery Cost</th>
		<th>Urgent</th>
		<th>Payment Method</th>
		<th>Customer ID</th>
		<th>Total Price</th>
		<th>Created At</th>
		<th>Updated At</th>
		<th>Pickup Date</th>
		<th>Pickup Time From</th>
		<th>Pickup Time To</th>
		<th>Delivery Date</th>
		<th>Delivery Time From</th>
		<th>Delivery Time To</th>
		<th>Delivery Address</th>
		<th>Status</th>
		<th>Actions</th> <!-- إذا أردت أن تضيف أزرار للتعديل والحذف -->
	  </tr>
	</thead>
	<tbody>
	  @foreach($invoices as $invoice)
	  <tr>
		<td>{{ $invoice->id }}</td>
		<td>{{ $invoice->discount }}</td>
		<td>{{ $invoice->delivery ? 'نعم' : 'لا' }}</td>
		<td>{{ $invoice->deliveryCost }}</td>
		<td>{{ $invoice->urgent ? 'نعم' : 'لا' }}</td>
		<td>{{ $invoice->paymentMethod }}</td>
		<td>{{ $invoice->customerId }}</td>
		<td>{{ $invoice->totalPrice }}</td>
		<td>{{ $invoice->created_at->format('d/m/Y H:i:s') }}</td>
		<td>{{ $invoice->updated_at->format('d/m/Y H:i:s') }}</td>
		<td>{{ optional($invoice->pickupDate)->format('d/m/Y') }}</td>
		<td>{{ $invoice->pickupTimeFrom }}</td>
		<td>{{ $invoice->pickupTimeTo }}</td>
		<td>{{ optional($invoice->deliveryDate)->format('d/m/Y') }}</td>
		<td>{{ $invoice->deliveryTimeFrom }}</td>
		<td>{{ $invoice->deliveryTimeTo }}</td>
		<td>{{ $invoice->deliveryAddress }}</td>
		<td>{{ $invoice->status }}</td>
		<td>
		  <!-- أضف هنا الأزرار أو الروابط للتعديل والحذف -->
		 
		  </form>
		</td>
	  </tr>
	  @endforeach
	</tbody>
  </table>
  


		
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
@endsection