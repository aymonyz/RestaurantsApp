@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">إصدار فاتورة</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ نقاط البيع</span>
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
<style>

    </style>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <!link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- زر "إضافة عميل جديد" -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addClientModal">
    إضافة عميل جديد
</button>



<!-- Include the modal from the ad-castoar.blade file -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="buttons text-center">
                <button class="btn btn-primary" onclick="openPage('page1')">+ طلب جديد</button>
                <button class="btn btn-success" onclick="openPage('page2')">قيد التنفيذ</button>
                <button class="btn btn-warning" onclick="openPage('page3')">جاهز للتسليم</button>
            </div>
        </div>
    </div>
</div>


<div id="page1" class="page" style="display:none;">
    <!----1--->
    <div> 
        <input type="text" id="CustomerSearch" placeholder="البحث عن عميل..." onkeyup="searchCustomer()">
        <button onclick="clearCustomerSearch()">x</button>
        <div id="searchResults" style="position: absolute; z-index: 1000; background: rgb(243, 243, 243); width: 200px; #searchResults {
    position: absolute;
    z-index: 1000;
    background: rgb(243, 243, 243);
    width: 200px;
    /* هذه القيم مثالية، قد تحتاج إلى تعديلها بناءً على التصميم الفعلي */
    top: 0; /* سيتم تحديث هذا القيمة ديناميكيًا */
    left: 0; /* يمكن تعديلها إذا لزم الأمر */
}
">
            <div id="selectedCustomer">
                <!-- Selected customer information will be displayed here -->
                
            </div>
            </div>
            
    </div>
    <!--رساله الحفظ-->
    @if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
    <title>Shopping Cart</title>
    <style>
        .product-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(100px, 1fr ));
            grid-gap: 20px;
            border: 1px solid #8d7777;
            padding: 10px;
            margin-bottom: 10px;
            margin-left: -6px;
            margin-right: -15px;
        }
    </style>
        <style>
        .product-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            grid-gap: 20px;
            padding: 10px;
        }

        .item-card {
            border: 1px solid #dee2e6;
            border-radius: 5px;
            overflow: hidden;
            transition: transform 0.3s;
        }

        .item-card:hover {
            transform: translateY(-5px);
        }

        .item-card img {
            max-width: 100%;
            height: auto;
            border-bottom: 1px solid #dee2e6;
        }

        .item-card .card-body {
            padding: 1rem;
        }

        .item-card .card-title {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .item-card .price {
            font-size: 1rem;
            font-weight: bold;
            color: #007bff;
            margin-bottom: 0.5rem;
        }

        .add-to-cart-btn {
            width: 100%;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 0.5rem 1rem;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .add-to-cart-btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <!-- مكان عرض المنتجات -->
                <div class="product-container">
                    <!-- هنا يمكن وضع عناصر المنتجات -->
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-3 col-md-4">
                                <input type="text" id="itemSearch" placeholder="البحث عن ..">
                            </div>
                            <div class="col-lg-9 col-md-8">
                                <div class="d-flex flex-row flex-nowrap align-items-center">
                                    @foreach($groups as $group)
                                        <button class="filter-button btn btn-sm btn-outline-primary mr-2" data-group="{{ $group->GroupNameArabic}}">{{ $group->GroupNameArabic}}</button>
                                        <br>
                                    @endforeach
                                    <br>
                                </div>
                            </div>
                        </div>
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
                </div>
            </div>
            <div id="messageContainer"></div>

            <div class="col-lg-3">
                <!-- جزء السلة -->
                <div class="card" id="cart">
                    <div class="card-body">
                        <form name="cartForm" method="POST" action="{{route('cart.store')}}">
                            @csrf
                            <div class="card" id="cart">
                                <div class="card-body">

                                    <h5 class="card-title">إصدار فاتورة</h5>
                                    <ul id="cartItems"></ul>
                                    <p>إجمالي المبلغ: <span id="totalPrice">0.00</span></p>
                                    <p>
                                        خصم: 
                                        <input type="number" id="discount" value="0" min="0" onchange="updateTotalPrice()">
                                        <select id="discountType" onchange="updateTotalPrice()">
                                            <option value="flat">بالمبلغ</option>
                                            <option value="percentage">بالنسبة المئوية</option>
                                        </select>
                                    </p>
                                    <p>مستعجل <input type="checkbox" id="urgent" name="urgent"></p>
                                    <p>التوصيل للمنازل: <input type="checkbox" id="delivery" onchange="toggleDelivery()"></p>
                        
                        
                                    <p>تكلفة التوصيل: <input type="number" id="deliveryCost" value="0" min="0" disabled onchange="updateTotalPrice()"></p>
                                    <p>طرق الدفع: 
                                        <select id="paymentMethod">
                                            <option>دفع متعدد</option>
                                            @foreach($paymentMethods as $paymentMethod)
                                                <option value="{{ $paymentMethod->id }}">{{ $paymentMethod->paymethod_arabic }}</option>
                                            @endforeach
                                        </select>
                                    </p>
                                    {{-- <p>اختر العميل: 
                                        <select id="customer">
                                            @foreach($customers as $customer)
                                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                            @endforeach
                                        </select>
                                    </p> --}}
                                    
                                    {{-- <button onclick="saveCart(event)">حفظ</button> --}}
                                    <!-- زر حفظ السلة -->
                                    <button id="saveCartButton" onclick="saveCart(event)">Save Cart</button>
                                    


                                </div>
                            </div>
                        </form>
                        
                </div>
            </div>
        </div>
    </div>

    <!-- تضمين Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.min.js"></script>
</body>
</html>

    <!---1---end-->
</div>

<div id="page2" class="page" style="display:none;">
<!---2----->
<!---2---end-->
</div>

<div id="page3" class="page" style="display:none;">
<!---3----->

    <!---3---end-->
</div>


@include('ad-castoar')




				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')

</script>
<script>
    var cartStoreUrl = "{{ route('cart.store') }}";
</script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js">

</script>
<script src="{{ asset('assets/js/cardincoeses.js') }}"></script>

{{-- 
<script src="{{ asset('assets/js/cust159181
omerSearch.js') }}"></script> --}}

{{-- 


<script src="{{ asset('assets/js/pageNavigation.js') }}"></script>

<script src="{{ asset('assets/js/itemFilter.js') }}"></script>

--}}



<script>
    var additionalServices = @json($additionalServices);
</script>

@endsection