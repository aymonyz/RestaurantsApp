
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



<!DOCTYPE html>
<html lang="en">

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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css">
    <link rel="stylesheet" href="">
    <title>حفظ الأمتار</title>
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
        .active {
    background-color: #007bff;
    color: white;
}
.hidden-detail {
        display: none;
    }
    
    </style>
</head>
<body>
    <div class="container">
        @if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
        @endif
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4">
                <input type="text" id="itemSearch" placeholder="أبحث عن صنف">
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
            <button  type='button' data-toggle="modal" data-target="#invoiceModal">بيانات اخرى للفاتورة</button>
            <!-- Modal -->
            <div class="modal fade" id="invoiceModal" tabindex="-1" role="dialog" aria-labelledby="invoiceModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="invoiceModalLabel">تفاصيل الفاتورة الإضافية</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                      <form>
                        <div class="form-group">
                            <label for="deliveryDateTime">تاريخ ووقت التوصيل</label>
                            <input type="datetime-local" class="form-control" id="deliveryDateTime">
                        </div>
                        <div class="form-group">
                          <label for="invoiceNote">ملاحظة الفاتورة</label>
                          <textarea class="form-control" id="invoiceNote" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                          <label for="bottomNote1">ملاحظة في أسفل الفاتورة 1</label>
                          <textarea class="form-control" id="bottomNote1" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                          <label for="bottomNote2">ملاحظة في أسفل الفاتورة 2</label>
                          <textarea class="form-control" id="bottomNote2" rows="3"></textarea>
                        </div>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary">حفظ التغييرات</button>
                    </div>
                  </div>
                </div>
              </div>

           
            <!--Choosing a customer -->
            <p>اختر العميل: 
                <select id="customer" class="choices-select">
                    <option value="">اختر...</option>
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                    @endforeach
                </select>
            </p>
            
            <button onclick="saveCart(event)">حفظ</button>
        </div>
    </div>
</form>
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.min.js"></script>
    <script>
        //seach customers
        document.addEventListener('DOMContentLoaded', function() {
    var element = document.querySelector('.choices-select');
    var choices = new Choices(element);
});


        //filter items and search items
        document.getElementById('itemSearch').addEventListener('input', filterItems);
var filterButtons = document.getElementsByClassName('filter-button');
for (var i = 0; i < filterButtons.length; i++) {
    filterButtons[i].addEventListener('click', filterItems);
}

function filterItems() {
    var input, filter, cards, title, group, i;
    input = document.getElementById('itemSearch');
    filter = input.value.toUpperCase();
    cards = document.getElementsByClassName('item-card');
    var filterButtons = document.getElementsByClassName('filter-button'); // Add this line

    var selectedGroup = '';
    for (i = 0; i < filterButtons.length; i++) {
        if (filterButtons[i].classList.contains('active')) {
            selectedGroup = filterButtons[i].getAttribute('data-group');
            break;
        }
    }

    for (i = 0; i < cards.length; i++) {
        title = cards[i].getElementsByTagName('h5')[0];
        group = cards[i].getAttribute('data-group');
        if (title.textContent.toUpperCase().indexOf(filter) > -1 && (selectedGroup === '' || group === selectedGroup)) {
            cards[i].style.display = "";
        } else {
            cards[i].style.display = "none";
        }
    }
}
window.onload = function() {
    var filterButtons = document.getElementsByClassName('filter-button');
    for (let i = 0; i < filterButtons.length; i++) {
        filterButtons[i].addEventListener('click', function() {
            for (let j = 0; j < filterButtons.length; j++) {
                filterButtons[j].classList.remove('active');
            }
            this.classList.add('active');
            filterItems();
        });
    }
}



        //shopping cart
        let cartItems = [];
let totalCartPrice = 0;
window.onload = function() {
    window.addToCart = function(itemId, itemName, itemPrice, itemUnit, width, height) {
    itemUnit = itemUnit.trim();  // Remove any leading or trailing white spaces

    if (itemUnit === "متر") {
        showMeterModal(itemId, itemName, itemPrice, width, height);
    } else {
        // Always add a new item to the cart
        cartItems.push({
            id: itemId,
            name: itemName,
            price: itemPrice,
            quantity: 1,
            unit: itemUnit,
            width: width,
            height: height
        });

        totalCartPrice += itemPrice;
        updateCart();
    }
}
}


function showMeterModal(itemId, itemName, itemPrice, width, height) {
    // Create modal
    const modal = document.createElement('div');
    modal.style.display = 'block';
    modal.style.position = 'fixed';
    modal.style.zIndex = '1';
    modal.style.left = '0';
    modal.style.top = '0';
    modal.style.width = '100%';
    modal.style.height = '100%';
    modal.style.overflow = 'auto';
    modal.style.backgroundColor = 'rgba(0,0,0,0.4)';

    // Create modal content
    const modalContent = document.createElement('div');
    modalContent.style.backgroundColor = '#fefefe';
    modalContent.style.margin = '15% auto';
    modalContent.style.padding = '20px';
    modalContent.style.border = '1px solid #888';
    modalContent.style.width = '80%';

    // Create close button
    const closeButton = document.createElement('span');
    closeButton.textContent = 'x';
    closeButton.style.color = '#aaa';
    closeButton.style.float = 'right';
    closeButton.style.fontSize = '28px';
    closeButton.style.fontWeight = 'bold';
    closeButton.onclick = () => modal.style.display = 'none';
    modalContent.appendChild(closeButton);

    // Create label and input field for width
    const widthLabel = document.createElement('label');
    widthLabel.textContent = 'العرض:';
    modalContent.appendChild(widthLabel);

    const widthInput = document.createElement('input');
    widthInput.type = 'number';
    widthInput.value = 1;
    console.log(widthInput);
    modalContent.appendChild(widthInput);

    // Create label and input field for height
    const heightLabel = document.createElement('label');
    heightLabel.textContent = 'الطول:';
    modalContent.appendChild(heightLabel);

    const heightInput = document.createElement('input');
    heightInput.type = 'number';
    heightInput.value = 1;
    console.log(heightInput);
    modalContent.appendChild(heightInput);

    // Create label and read-only input field for number of meters
    const meterLabel = document.createElement('label');
    meterLabel.textContent = 'عدد الأمتار:';
    modalContent.appendChild(meterLabel);

    const meterInput = document.createElement('input');
    meterInput.type = 'number';
    meterInput.value = 1;
    console.log(meterInput);
    meterInput.readOnly = true;
    modalContent.appendChild(meterInput);

    // Update number of meters when width or height changes
    widthInput.oninput = heightInput.oninput = () => {
        const width = parseFloat(widthInput.value);
        const height = parseFloat(heightInput.value);
        const numberOfMeters = width * height;
        meterInput.value = numberOfMeters;
    };

    // Create label and input field for number of items
    const quantityLabel = document.createElement('label');
    quantityLabel.textContent = 'القطع:';
    modalContent.appendChild(quantityLabel);

    const quantityInput = document.createElement('input');
    quantityInput.type = 'number';
    quantityInput.value = 1;
    modalContent.appendChild(quantityInput);

    // Create label and input field for item price
    const priceLabel = document.createElement('label');
    priceLabel.textContent = 'السعر';
    modalContent.appendChild(priceLabel);

    const priceInput = document.createElement('input');
    priceInput.type = 'number';
    priceInput.value = itemPrice;
    modalContent.appendChild(priceInput);

    // Create button to calculate total price and add item to cart
    const addButton = document.createElement('button');
    addButton.textContent = 'Add to cart';
    addButton.onclick = () => {
        const width = parseFloat(widthInput.value);
        const height = parseFloat(heightInput.value);
        const quantity = parseInt(quantityInput.value);
        const numberOfMeters = width * height;
        const itemPrice = parseFloat(priceInput.value);
        const totalPrice = numberOfMeters * itemPrice * quantity;


        cartItems.push({ 
        id: itemId, 
        name: itemName, 
        price: totalPrice, 
        quantity: quantity,
        width: width, // Save width
        height: height, // Save height
        numberOfMeters: numberOfMeters // Save number of meters
    });
        totalCartPrice += totalPrice;
        updateCart();

        modal.style.display = 'none';
    };//end
    modalContent.appendChild(addButton);

    modal.appendChild(modalContent);
    document.body.appendChild(modal);
}
//search the customers select for a certain customer
const customerSelect = document.getElementById('customer');

    customerSelect.addEventListener('keyup', (event) => {
        const searchTerm = event.target.value.toLowerCase(); // Get what the user types

        // Iterate and filter options
        const options = customerSelect.options; 
        for (let i = 0; i < options.length; i++) {
            const optionText = options[i].text.toLowerCase();
            if (optionText.includes(searchTerm)) {
                options[i].style.display = 'block'; // Show matching options
            } else {
                options[i].style.display = 'none';  // Hide others 
            }
        }
    });
    //delete item from the cart
    function deleteItem(index) {
    // Directly use the index to splice the array
    cartItems.splice(index, 1);

    // Recalculate totalCartPrice and update the UI
    totalCartPrice = cartItems.reduce((total, item) => total + item.price, 0);
    updateCart();
}
function updateCart() {
    const cartContainer = document.getElementById('cartItems');
    const itemsDetailsArray = []; // New array to hold item details

    // Clear previous items
    cartContainer.innerHTML = '';

    // Update cart items
    cartItems.forEach((item ,index)=> {
        const listItem = document.createElement('li');
        listItem.id = `item-${item.id}-${index}`; // Assign a unique ID to the list item

        listItem.textContent = `${item.name} - ${item.price.toFixed(2)}`;

        // Create new li elements for each property
const widthItem = document.createElement('li');
widthItem.textContent = `Width: ${item.width}`;
widthItem.classList.add('hidden-detail');

const heightItem = document.createElement('li');
heightItem.textContent = `Height: ${item.height}`;
heightItem.classList.add('hidden-detail');

const metersItem = document.createElement('li');
metersItem.textContent = `Number of Meters: ${item.numberOfMeters}`;
metersItem.classList.add('hidden-detail');

const quantityItem = document.createElement('li');
quantityItem.textContent = `Quantity: ${item.quantity}`;
quantityItem.classList.add('hidden-detail');

// Append new li elements to the cartContainer
const cartContainer = document.getElementById('cartItems');
cartContainer.appendChild(widthItem);
cartContainer.appendChild(heightItem);
cartContainer.appendChild(metersItem);
cartContainer.appendChild(quantityItem);


        // Create item details object and append it to itemsDetailsArray
        const itemDetails = {
            id: item.id,
            name: item.name,
            price: item.price,
            width: item.width,
            height: item.height,
            numberOfMeters: item.numberOfMeters,
            quantity: item.quantity,
            additionalServices: item.additionalServices || []
        };
        itemsDetailsArray.push(itemDetails);

        // Create edit icon
        const editIcon = document.createElement('i');
        editIcon.className = 'fas fa-edit';
        editIcon.onclick = () => showEditForm(item.id, item.name, item.price);
        listItem.appendChild(editIcon);

        // Create delete icon
        const deleteIcon = document.createElement('i');
        deleteIcon.className = 'fas fa-trash';
        deleteIcon.style.cursor = 'pointer';
        // Pass the current index directly to the deleteItem function
        deleteIcon.onclick = () => deleteItem(index);
        listItem.appendChild(deleteIcon);

        // Create form for additional services
        const editForm = document.createElement('form');
        editForm.style.display = 'none';
        editForm.id = `editForm${item.id}`;

        // getting additional services from the database
        let additionalServices = @json($additionalServices);

        // Create list for additional services
        const additionalServicesList = document.createElement('ul');
        additionalServicesList.id = `additionalServicesList${item.id}`;

        // Create buttons for additional services
        additionalServices.forEach((service, index) => {
            const button = document.createElement('button');
            button.textContent = service.additional_service_name;
            button.value = service.additional_service_price; // Use the price from the database

            // In the button onclick function
            button.onclick = () => {
                event.preventDefault();
                // Add a class to the button to indicate that it's been activated
                button.classList.add('activated');

                updateItemPrice(item.id, parseFloat(service.additional_service_price));

                // Add service to the list
                const serviceItem = document.createElement('li');
                serviceItem.textContent = `${service.additional_service_name} - ${service.additional_service_price.toFixed(2)}`;
                additionalServicesList.appendChild(serviceItem);

                // Add the service to the item's additionalServices array
                item.additionalServices = item.additionalServices || [];
                item.additionalServices.push({
                    name: service.additional_service_name,
                    price: service.additional_service_price
                });
            };
            editForm.appendChild(button);
        });

        listItem.appendChild(editForm);
        listItem.appendChild(additionalServicesList);
        cartContainer.appendChild(listItem);
    });

    // Log itemsDetailsArray to the console for debugging
    console.log(itemsDetailsArray);

    updateTotalPrice();
}
      
       
        function updateTotalPrice() {
    let discountValue = parseFloat(document.getElementById('discount').value);
    const discountType = document.getElementById('discountType').value;
    const deliveryCost = document.getElementById('delivery').checked ? parseFloat(document.getElementById('deliveryCost').value) : 0;
    const totalPriceElement = document.getElementById('totalPrice');

    let discount;
    if (discountType === 'flat') {
        discount = discountValue;
    } else if (discountType === 'percentage') {
        discount = totalCartPrice * (discountValue / 100);
    }

    totalPrice = (totalCartPrice - discount + deliveryCost).toFixed(2);
    totalPriceElement.textContent = totalPrice;
}
    
        function toggleDelivery() {
            const deliveryCostInput = document.getElementById('deliveryCost');
            deliveryCostInput.disabled = !document.getElementById('delivery').checked;
            updateTotalPrice();
        }
    
        function showEditForm(itemId, itemName, itemPrice) {
    // Create modal
    const modal = document.createElement('div');
    modal.style.display = 'block';
    modal.style.position = 'fixed';
    modal.style.zIndex = '1';
    modal.style.left = '0';
    modal.style.top = '0';
    modal.style.width = '100%';
    modal.style.height = '100%';
    modal.style.overflow = 'auto';
    modal.style.backgroundColor = 'rgba(0,0,0,0.4)';

    // Create modal content
    const modalContent = document.createElement('div');
    modalContent.style.backgroundColor = '#fefefe';
    modalContent.style.margin = '15% auto';
    modalContent.style.padding = '20px';
    modalContent.style.border = '1px solid #888';
    modalContent.style.width = '80%';

    // Create close button
    const closeButton = document.createElement('span');
    closeButton.textContent = 'x';
    closeButton.style.color = '#aaa';
    closeButton.style.float = 'right';
    closeButton.style.fontSize = '28px';
    closeButton.style.fontWeight = 'bold';
    closeButton.onclick = () => modal.style.display = 'none';
    modalContent.appendChild(closeButton);

    // Create additional services list
    const additionalServicesList = document.createElement('ul');
    additionalServicesList.id = `additionalServicesList${itemId}`;

    // Create buttons for additional services
    let additionalServices = @json($additionalServices);
    additionalServices.forEach((service, index) => {
        const button = document.createElement('button');
        button.textContent = service.additional_service_name;
        button.value = service.additional_service_price; // Use the price from the database
        button.onclick = () => {
            event.preventDefault();
            updateItemPrice(itemId, parseFloat(service.additional_service_price), service.additional_service_name);
        };
        modalContent.appendChild(button);
    });

    modalContent.appendChild(additionalServicesList);
    modal.appendChild(modalContent);
    document.body.appendChild(modal);
}

function updateItemPrice(itemId, additionalServicePrice, additionalServiceName) {
    const item = cartItems.find(item => item.id === itemId);
    if (item) {
        const oldPrice = item.price;
        item.price += additionalServicePrice;
        totalCartPrice += item.price - oldPrice; // Update the total cart price

        // Add additional service to item's additional services list
        if (!item.additionalServices) {
            item.additionalServices = [];
        }
        item.additionalServices.push({ name: additionalServiceName, price: additionalServicePrice });

        // Update additional services list in modal
        const additionalServicesList = document.getElementById(`additionalServicesList${itemId}`);
        const listItem = document.createElement('li');
        listItem.textContent = `${additionalServiceName} - ${additionalServicePrice.toFixed(2)}`;
        // Create delete icon
        const deleteIcon = document.createElement('i');
        deleteIcon.className = 'fas fa-trash';
        deleteIcon.onclick = () => removeAdditionalService(itemId, additionalServiceName);
        listItem.appendChild(deleteIcon);

        additionalServicesList.appendChild(listItem);
    }
    updateTotalPrice();
}

function removeAdditionalService(itemId, additionalServiceName) {
    const item = cartItems.find(item => item.id === itemId);
    if (item && item.additionalServices) {
        const index = item.additionalServices.findIndex(service => service.name === additionalServiceName);
        if (index !== -1) {
            const additionalServicePrice = item.additionalServices[index].price;
            item.price -= additionalServicePrice;
            totalCartPrice -= additionalServicePrice; // Update the total cart price
            item.additionalServices.splice(index, 1); // Remove the additional service from the list

            // Update additional services list in modal
            const additionalServicesList = document.getElementById(`additionalServicesList${itemId}`);
            additionalServicesList.removeChild(additionalServicesList.childNodes[index]);
        }
    }
    updateTotalPrice();
}
function extractData() {
    const itemsNodes = Array.from(document.querySelectorAll('#cartItems > li'));
    const data = [];
    let currentItem = {};

    itemsNodes.forEach((node) => {
        if (node.id.startsWith('item-')) {
            // The item details have been collected; now collecting item name and price
            const [name, price] = node.textContent.split(' - ').map(part => part.trim());
            currentItem.id = node.id;
            currentItem.name = name;
            currentItem.price = parseFloat(price.replace(/[^0-9.-]+/g, ""));
            // Push the complete item to the data array
            data.push(currentItem);
            // Reset currentItem for the next item
            currentItem = {};
        } else {
            // Collecting item details
            const detailType = node.textContent.split(':')[0];
            const detailValue = parseFloat(node.textContent.split(':')[1].trim());

            switch (detailType) {
                case 'Width':
                    currentItem.width = detailValue;
                    break;
                case 'Height':
                    currentItem.height = detailValue;
                    break;
                case 'Number of Meters':
                    currentItem.numberOfMeters = detailValue;
                    break;
                case 'Quantity':
                    currentItem.quantity = detailValue;
                    break;
            }
        }
    });

    return data;
}



function saveCart(event) {
            event.preventDefault();
            const cartItems = extractData();
            console.log(cartItems);
            // Create hidden inputs for all the data you want to submit
    const form = document.forms['cartForm'];

    //checking if the customer is selected
    // Check if a customer is selected
    const customerId = document.getElementById('customer').value;
    if (!customerId) {
        alert('يجب إختيار العميل');
        return;
    }

// Assuming cartItems is an array of objects {id, name, price, quantity}
cartItems.forEach((item, index) => {
 
 // Width
 const inputWidth = document.createElement('input');
        inputWidth.type = 'hidden';
        inputWidth.name = `items[${index}][width]`;
        inputWidth.value = item.width;
        form.appendChild(inputWidth);

        // Height
        const inputHeight = document.createElement('input');
        inputHeight.type = 'hidden';
        inputHeight.name = `items[${index}][height]`;
        inputHeight.value = item.height;
        form.appendChild(inputHeight);

        // Number of Meters
        const inputMeters = document.createElement('input');
        inputMeters.type = 'hidden';
        inputMeters.name = `items[${index}][numberOfMeters]`;
        inputMeters.value = item.numberOfMeters;
        form.appendChild(inputMeters);
       
    


    
    //end of new code
    const inputId = document.createElement('input');
    inputId.type = 'hidden';
    inputId.name = `items[${index}][id]`;
    inputId.value = item.id;
    form.appendChild(inputId);

    const inputName = document.createElement('input');
    inputName.type = 'hidden';
    inputName.name = `items[${index}][name]`;
    inputName.value = item.name;
    form.appendChild(inputName);

    const inputPrice = document.createElement('input');
    inputPrice.type = 'hidden';
    inputPrice.name = `items[${index}][price]`;
    inputPrice.value = item.price;
    form.appendChild(inputPrice);

    const inputQuantity = document.createElement('input');
    inputQuantity.type = 'hidden';
    inputQuantity.name = `items[${index}][quantity]`;
    inputQuantity.value = item.quantity;
    form.appendChild(inputQuantity);
     

// Delivery checkbox value
const deliveryInput = document.createElement('input');
deliveryInput.type = 'hidden';
deliveryInput.name = 'delivery';
deliveryInput.value = document.getElementById('delivery').checked ? '1' : '0'; // Assuming '1' for true, '0' for false
form.appendChild(deliveryInput);

// Delivery cost
const deliveryCostInput = document.createElement('input');
deliveryCostInput.type = 'hidden';
deliveryCostInput.name = 'deliveryCost';
deliveryCostInput.value = document.getElementById('deliveryCost').value;
form.appendChild(deliveryCostInput);

// Payment method
const paymentMethodInput = document.createElement('input');
paymentMethodInput.type = 'hidden';
paymentMethodInput.name = 'paymentMethod';
paymentMethodInput.value = document.getElementById('paymentMethod').value;
form.appendChild(paymentMethodInput);

// Customer ID
const customerIdInput = document.createElement('input');
customerIdInput.type = 'hidden';
customerIdInput.name = 'customerId';
customerIdInput.value = document.getElementById('customer').value;
form.appendChild(customerIdInput);

// Urgent checkbox value
const urgentInput = document.createElement('input');
urgentInput.type = 'hidden';
urgentInput.name = 'urgent';
urgentInput.value = document.getElementById('urgent').checked ? '1' : '0'; // Assuming '1' for true, '0' for false
form.appendChild(urgentInput);

// Total price - Note: Ensure you have a way to calculate/update this value before form submission
const totalPriceInput = document.createElement('input');
totalPriceInput.type = 'hidden';
totalPriceInput.name = 'totalPrice';
totalPriceInput.value = document.getElementById('totalPrice').textContent; // Assuming this is the total price displayed
form.appendChild(totalPriceInput);

// In the cartItems.forEach loop
// In the cartItems.forEach loop
if (item.additionalServices) {
    item.additionalServices.forEach((service, serviceIndex) => {
        const inputServiceName = document.createElement('input');
        inputServiceName.type = 'hidden';
        inputServiceName.name = `items[${index}][services][${serviceIndex}][name]`;
        inputServiceName.value = service.name;
        form.appendChild(inputServiceName);

        const inputServicePrice = document.createElement('input');
        inputServicePrice.type = 'hidden';
        inputServicePrice.name = `items[${index}][services][${serviceIndex}][price]`;
        inputServicePrice.value = service.price;
        form.appendChild(inputServicePrice);
    });
}

    // Item unit
   /* const inputUnit = document.createElement('input');
    inputUnit.type = 'hidden';
    inputUnit.name = `items[${index}][unit]`;
    inputUnit.value = item.unit; // Assuming item.unit holds the unit information
    console.log(inputUnit);
    form.appendChild(inputUnit);

    // Number of pieces
    const inputPieces = document.createElement('input');
    inputPieces.type = 'hidden';
    inputPieces.name = `items[${index}][pieces]`;
    inputPieces.value = item.pieces; // Assuming item.pieces holds the number of pieces
    console.log(inputPieces);
    form.appendChild(inputPieces);

    // Dimensions
    const inputWidth = document.createElement('input');
    inputWidth.type = 'hidden';
    inputWidth.name = `items[${index}][width]`;
    inputWidth.value = item.width; // Assuming item.width holds the width
    console.log(inputWidth);
    form.appendChild(inputWidth);

    const inputHeight = document.createElement('input');
    inputHeight.type = 'hidden';
    inputHeight.name = `items[${index}][height]`;
    inputHeight.value = item.height; // Assuming item.height holds the height
    console.log(inputHeight);
    form.appendChild(inputHeight);
*/
   

});





// submit the form
        form.submit();
           
    }
    //Other invoice data modal submit function
    document.addEventListener("DOMContentLoaded", function() {
  document.querySelector('.btn-primary').addEventListener('click', function() {
    e.preventDefault(); // Prevent default form submission

    var deliveryDate = document.getElementById('deliveryDate').value;
    var invoiceNote = document.getElementById('invoiceNote').value;
    var bottomNote1 = document.getElementById('bottomNote1').value;
    var bottomNote2 = document.getElementById('bottomNote2').value;

    var formData = {
      deliveryDate: deliveryDate,
      invoiceNote: invoiceNote,
      bottomNote1: bottomNote1,
      bottomNote2: bottomNote2,
    };

    fetch('/save-invoice-details', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(formData),
    })
    .then(response => response.json())
    .then(data => {
      console.log('Success:', data);
      // Update the page or show a success message
      alert('Changes saved successfully!');
    })
    .catch((error) => {
      console.error('Error:', error);
      // Handle errors, such as showing an error message
      alert('An error occurred: ' + error);
    });
  });

  // Optional: Load updated data when the modal is triggered to open
  // This can be done by adding an event listener to the modal open button
  // and fetching the latest data to populate the form fields.
});

    </script>


</body>
</html>

