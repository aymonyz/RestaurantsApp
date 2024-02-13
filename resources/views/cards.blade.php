@extends('layouts.master')

@section('css')
    <!-- Stylesheets -->
    <link href="{{ URL::asset('assets/plugins/morris.js/morris.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/jqvmap/jqvmap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/multislider/multislider.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Custom Styles -->
    <style>
        
        /* Custom styles for desktop */
        @media (min-width: 768px) {
            #cart {
                position: fixed;
                top: 219px;
                right: 259px;
                width: 209px;
                background-color: #695555;
                border: 1px solid #756e6e;
                padding: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
                z-index: 999;
            }

            #item-cards-container {
                margin-right: 320px;
            }
        }

        /* Custom styles for mobile */
        @media (max-width: 767px) {
            #cart {
                position: fixed;
                bottom: 0;
                left: 0;
                width: 100%;
                background-color: #746565;
                border: 1px solid #857c7c;
                padding: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
                z-index: 999;
            }
        }
    </style>
@endsection

@section('page-header')
    <!-- Page Header Section -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">نقاط البيع</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ إضافة فاتورة</span>
            </div>
        </div>
    </div>

    <!-- Search Customer Section -->
    <input type="text" id="CustomerSearch" placeholder="Search Customer..." onkeyup="searchCustomer()">
    <button onclick="clearCustomerSearch()">Clear</button>
    <div id="searchResults" style="position: absolute; z-index: 1000; background: rgb(248, 243, 243); width: 200px;">
        <!-- Search results will appear here -->
    </div>
    <div id="selectedCustomer">
        <!-- Selected customer information will be displayed here -->
    </div>
@endsection

@section('content')


<div class="col-sm-6 col-md-4 col-xl-3 mg-t-20">
    <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-rotate-bottom" data-toggle="modal" href="#modaldemo8">+</a>
</div>

<div class="modal" id="modaldemo8">
    <div class="modal-dialog modal-wide" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">إضافة عميل جديد</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <!-- هنا يأتي كود الفورم الخاص بـ "إضافة عميل جديد" -->
                <!-- BEGIN FORM... (الفورم الذي أرسلته) -->
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            

                <form method="POST" action="{{ route('customers.store') }}">
                    
                    @csrf
                
                    <!-- إضافة الحقول هنا -->
                  
                    <div class="form-group">
                        <label for="country">الدولة:</label>
                        <input type="text" class="form-control" id="country" name="country" value="السعودية" readonly>
                    </div>
                    
                    <div class="form-group">
                        <label for="branch">الفرع:</label>
                        <select class="form-control" id="branch" name="branch">
                            @foreach ($branches as $branch)
                                <option value="{{ $branch->name_ar}}">{{ $branch->name_ar }}</option>
                            @endforeach
                        </select>
                        
                    </div>
                    <div class="form-group">
                        <label for="name">إسم العميل:</label>
                        <input type="text" class="form-control" id="name" name="name" maxlength="255">
                    </div>
                    <div class="form-group">
                        <label for="mobileNumber">رقم المحمول:</label>
                        <input type="tel" class="form-control" id="mobileNumber" name="mobileNumber" maxlength="9">
                    </div>
                    <div class="form-group">
                        <label for="mobileNumber2">رقم المحمول 2:</label>
                        <input type="tel" class="form-control" id="mobileNumber2" name="mobileNumber2" maxlength="9">
                    </div>
                    <div class="form-group">
                        <label for="apartmentNumber">رقم الشقة:</label>
                        <input type="text" class="form-control" id="apartmentNumber" name="apartmentNumber" maxlength="255">
                    </div>
                    <div class="form-group">
                        <label for="buildingNumber">رقم العمارة:</label>
                        <input type="text" class="form-control" id="buildingNumber" name="buildingNumber" maxlength="255">
                    </div>
                    <div class="form-group">
                        <label for="address">العنوان:</label>
                        <textarea class="form-control" id="address" name="address"></textarea>
                    </div>
                  
                    <div class="form-group">
                        <label for="discount">الخصم (%):</label>
                        <input type="number" class="form-control" id="discount" name="discount" min="0" max="100" step="0.01">
                    </div>
                    <div class="form-group">
                        <label for="email">البريد الإلكتروني:</label>
                        <input type="email" class="form-control" id="email" name="email" maxlength="255">
                    </div>
                    <div class="form-group">
                        <label for="taxNumber">الرقم الضريبي:</label>
                        <input type="text" class="form-control" id="taxNumber" name="taxNumber" maxlength="255">
                    </div>
                    <div class="form-group">
                        <label for="otherData">بيانات أخرى:</label>
                        <textarea class="form-control" id="otherData" name="otherData"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                        <button type="submit" class="btn btn-primary">حفظ</button>
                    </div>
                </form>
                
            </div>
         
        </div>
    </div>
</div>


<!-- إضافة رسائل الخطأ هنا إذا لزم الأمر -->


    <!-- Filter Buttons -->
    <div class="row justify-content-center mt-3">
        <div class="col-12 col-md-6">
            <button class="btn btn-secondary btn-block filter-button" data-group-id="all">كل الاصناف</button>
        </div>
        @foreach($groups as $group)
            <div class="col-12 col-md-6 mt-2">
                <button class="btn btn-primary btn-block filter-button" data-group-id="{{ $group->id }}">{{ $group->GroupNameArabic }}</button>
            </div>
        @endforeach
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
    </div>

    <!-- Shopping Cart Section -->
    <div id="cart" class="mt-3">
        <h4 class="text-center mb-3">سلة المشتريات</h4>
        <ul id="cart-items"></ul>
        <div id="totalAmount">إجمالي السلة: 0 ريال</div>
        <div id="discount">الخصم: 0%</div>
        <div id="deliveryCost">تكلفة التوصيل: 0 ريال</div>
        <div id="tax">قيمة مضافة: 0 ريال</div>
        <div id="netTotal">الإجمالي الصافي: 0 ريال</div>
        <button onclick="clearCart()" class="btn btn-danger btn-block mt-3">مسح السلة</button>
        <button onclick="checkout()" class="btn btn-success btn-block">إتمام الشراء</button>
    </div>
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
   document.addEventListener('DOMContentLoaded', function () {
	// تعيين مستمعي الأحداث لأزرار التصفية
	const filterButtons = document.querySelectorAll('.filter-button');
	filterButtons.forEach(function(button) {
		button.addEventListener('click', function() {
			filterItemCards(this.getAttribute('data-group-id'));
		});
	});

	// تعيين مستمعي الأحداث لبطاقات المنتجات
	const itemCards = document.querySelectorAll('.item-card');
	itemCards.forEach(function(card) {
		card.addEventListener('click', function() {
			const itemName = this.querySelector('.card-title').textContent;
			const itemPrice = this.querySelector('.card-link').textContent;
			addItemToCart(itemName, itemPrice);
		});
	});
});

// دالة إضافة المنتج إلى سلة المشتريات
function addItemToCart(itemName, itemPrice) {
	const selectedCustomerDiv = document.getElementById('selectedCustomer');
	// التحقق من اختيار العميل
	if (!selectedCustomerDiv.textContent.trim()) {
		alert('يجب اختيار العميل أولاً');
		return;
	}
	const cartItems = document.getElementById('cart-items');
	const item = document.createElement('li');
	item.textContent = `${itemName} - ${itemPrice}`;
	cartItems.appendChild(item);
}

// دالة مسح اختيار العميل وسلة المشتريات
function clearCustomerSearch() {
	var customerSearchInput = document.getElementById('CustomerSearch');
	var selectedCustomerDiv = document.getElementById('selectedCustomer');
	var searchResultsDiv = document.getElementById('searchResults');
	var cartItems = document.getElementById('cart-items');

	customerSearchInput.value = '';
	selectedCustomerDiv.textContent = '';
	searchResultsDiv.innerHTML = '';
	searchResultsDiv.style.display = 'none';

	// مسح سلة المشتريات
	cartItems.innerHTML = '';
}


function searchCustomer() {
	// Get the customer name from an input field
	var customerName = document.getElementById('customer-name').value;

	// Make an AJAX request to a server-side route that will search for the customer
	axios.get('/search-customer', {
		params: {
			name: customerName
		}
	})
	.then(function (response) {
		// Handle the response data...
	})
	.catch(function (error) {
		// Handle the error...
	});
}

function selectCustomer(customerId, customerName) {
	// Get the element you want to update
	var element = document.getElementById('customer-info');

	// Set the data attributes on the element
	element.setAttribute('data-customer-id', customerId);
	element.setAttribute('data-customer-name', customerName);
}


// دالة لتصفية بطاقات المنتج حسب مجموعة المنتجات
function filterItemCards(groupId) {
	const itemCards = document.querySelectorAll('.item-card');
	itemCards.forEach(function(card) {
		if (card.getAttribute('data-group-id') === groupId || groupId === 'all') {
			card.style.display = '';
		} else {
			card.style.display = 'none';
		}
	});
}

// This function handles searching for customers
function searchCustomer() {
	var input = document.getElementById('CustomerSearch').value;
	var searchResultsDiv = document.getElementById('searchResults');

	if(input.length >= 3) {
		fetch(`/search?term=${input}`)
		.then(response => response.json())
		.then(data => {
			searchResultsDiv.innerHTML = '';
			searchResultsDiv.style.display = 'block';
			data.forEach(customer => {
				searchResultsDiv.innerHTML += `<div onclick="selectCustomer(${customer.id}, '${customer.name}')">${customer.name}</div>`;
			});
		}).catch(error => console.error('Error:', error));
	} else {
		searchResultsDiv.style.display = 'none';
	}
}



// This function selects a customer and hides the search results
function selectCustomer(customerId, customerName) {
	var customerSearchInput = document.getElementById('CustomerSearch');
	var selectedCustomerDiv = document.getElementById('selectedCustomer');
	var searchResultsDiv = document.getElementById('searchResults');

	customerSearchInput.value = customerName; // Update the search box with the name
	selectedCustomerDiv.textContent = `Selected Customer ID: ${customerId}`; // Display the selected customer ID

	// Hide search results
	searchResultsDiv.style.display = 'none';
}

// This function clears the customer search input and results
function clearCustomerSearch() {
	var customerSearchInput = document.getElementById('CustomerSearch');
	var selectedCustomerDiv = document.getElementById('selectedCustomer');
	var searchResultsDiv = document.getElementById('searchResults');

	customerSearchInput.value = '';
	selectedCustomerDiv.textContent = '';
	searchResultsDiv.innerHTML = '';
	searchResultsDiv.style.display = 'none';
}
function removeItemFromCart(event) {
event.target.parentElement.remove();
}


document.addEventListener('DOMContentLoaded', function () {
// ... باقي الكود ...

// تعيين مستمعي الأحداث لإزالة عناصر سلة المشتريات
document.getElementById('cart-items').addEventListener('click', function (event) {
if (event.target.matches('li')) { // يجب التأكد من المُحدد المناسب لعناصر القائمة
removeItemFromCart(event);
}
});
});

    </script>
    

@endsection
