@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">سند صرف</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ المصروفات</span>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
    <link rel="stylesheet" href="">
    <title>Shopping Cart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            direction: rtl;
        }
    
        .card {
            margin: 20px auto;
            padding: 20px;
            border: none;
            border-radius: 10px;
            box-shadow: 0px 0px 15px 0px rgba(0,0,0,0.1);
            max-width: 600px;
            background-color: #fff;
        }
    
        .card-title {
            text-align: center;
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }
    
        .card-text {
            font-size: 18px;
            color: #666;
            margin-bottom: 10px;
        }
    
        .btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
    
        .btn:hover {
            background-color: #0056b3;
        }
    
        ul {
            list-style-type: none;
            padding: 0;
        }
    
        li {
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
        }
    
        li:last-child {
            border-bottom: none;
        }
    
        input, select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
    
        button {
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            font-size: 18px;
        }
    
    </style>
</head>
<body>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4">
                <input type="text" id="itemSearch" placeholder="Search items...">
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="d-flex flex-row flex-nowrap align-items-center">
                    @foreach($groups as $group)
                        <button class="filter-button btn btn-sm btn-outline-primary mr-2" data-group="{{ $group->GroupNameArabic}}">{{ $group->GroupNameArabic}}</button>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
<!-- Your item cards -->
    <div class="row">
@foreach($items as $item)
<div class="col-lg-3 col-md-4 col-sm-6">

    <div class="card item-card" data-group="{{ $item->group }}">
        <div class="card-body">
            <h5 class="card-title">{{$item->item_name}}</h5>
            
            
            <img src="{{ asset($item->src) }}" alt="{{$item->item_name}}">
            
            <p class="card-text">{{$item->price}}</p>
            <button class="btn btn-primary" onclick="addToCart({{$item->id}}, '{{$item->item_name}}', {{$item->price}},'{{ $item->unit }}')">أضف للفاتورة</button>
        </div>
    </div>
</div>

@endforeach
    </div>
</div>

    <!-- Product Cards Container -->
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 mt-3" id="item-cards-container">
        @foreach($items as $item)
            <div class="col item-card" data-group-id="{{ $item->group_id }}" data-unit="{{ $item->unit }}" data-item-id="{{ $item->id }}" data-item-name="{{ $item->item_name }}" data-price="{{ $item->price }}">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->item_name }}</h5>
                        <p class="card-text">{{ $item->price }}</p>
                    </div>
                </div>
            </div>
        @endforeach

@endsection

@section('js')
    <!-- JavaScript Section -->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery-nice-select/js/addp.js') }}"></script>
  
    <!-- Additional Scripts -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <script src="{{ URL::asset('assets/js/modal.js') }}"></script>
   
    <!-- Custom JavaScript -->

    <script>
   

    </script>


</body>
</html>

















				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
@endsection