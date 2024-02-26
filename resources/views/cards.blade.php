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
            <div class="col-lg-3">
                <!-- جزء السلة -->
                <div class="card" id="cart">
                    <div class="card-body">
                        <h5 class="card-title">إصدار فاتورة</h5>
                        
                        <ul id="cartItems"></ul>
                        <p>إجمالي المبلغ: <span id="totalPrice">0.00</span></p>
                        <p>خصم: <input type="number" id="discount" value="0" min="0" onchange="updateTotalPrice()"></p>
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
                        <p>اختر العميل: 
                            <select id="customer">
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                @endforeach
                            </select>
                        </p>
                        <button onclick="saveCart()">حفظ</button>
                    </div>
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
<div id="DivDeliverySearch" class="col-md-12" style="background: #F8F8FB;padding:15px;margin-bottom:15px;">
    <div class="col-md-2">
        <label id="Content1_Content2_LblRSearch" class="control-label">بحث</label>
        <input type="text" id="txtReadySearch" class="form-control" fdprocessedid="ytz4tp">
    </div>
    <div class="col-md-2 col-sm-2">
        <div class="space20"></div>
        <div class="space5"></div>
        <a id="Content1_Content2_btnOrderDistributionR" class="btn btn-primary" onclick="onDistributeOrderDelivery()">توزيع طلبات التوصيل</a>
    </div>
    <div class="col-md-2">
    </div>
    <div style="float:right;">
        <div class="pageSummaryMetric">
            <h4 id="Content1_Content2_lblROrder" style="font-size:20px">الفواتير</h4>
            <p id="cl_o_r" style="font-size:18px; font-weight:bold;">2902</p>
        </div>
        <div class="pageSummaryMetric">
            <h4 id="Content1_Content2_lblRPieces" style="font-size:20px">القطع</h4>
            <p id="cl_p_r" style="font-size:18px; font-weight:bold;">7165</p>
        </div>
        <div class="pageSummaryMetric">
            <h4 id="Content1_Content2_lblRValue" style="font-size:20px">القيمة</h4>
            <p><span id="cl_s_r" style="font-size:18px;  font-weight:bold;">305636.48</span> <span id="cl_s_r_curr">ريال</span></p>
        </div>
        <div class="pageSummaryMetric">
            <h4 id="Content1_Content2_lblRUnpaid" style="font-size:20px">غير مدفوع</h4>
            <p><span id="cl_u_r" style="font-size:18px; font-weight:bold; color:red;">-301201.00</span> <span id="cl_u_r_curr">ريال</span></p>
        </div>
        <a style="float: right;" id="refreshRe" onclick="refreshCl()" class="dpB dpBBold">
            <img id="imgRe" title="Refresh" width="30" height="30" src="../../assets/img/refresh2.svg" class="">
        </a>
        <div class="clear"></div>
    </div>
</div>

<!DOCTYPE html>
<html lang="ar">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>جدول الطلبات</title>
      <!-- تضمين Bootstrap CSS -->
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body dir="rtl">
    
    <div class="container mt-5">
      <table class="table table-striped table-bordered">
        <thead class="thead-dark">
          <tr>
            <th scope="col">الرقم</th>
            <th scope="col">تاريخ الفاتورة</th>
            <th scope="col">تاريخ التسليم</th>
            <th scope="col">إسم العميل</th>
            <th scope="col">الأصناف</th>
            <th scope="col">القطع</th>
            <th scope="col">عادي/مستعجل</th>
            <th scope="col">طريقة الدفع</th>
            <th scope="col">الإجمالي</th>
            <th scope="col">العملية</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>A017406</td>
            <td>2024-02-21 10:01 AM</td>
            <td>2024-02-23 09:57 AM</td>
            <td>شركه سبل الخبره_طريق المدينه</td>
            <td>أ (مفرشة)(WA) *1<br>أ (مفرشة)(WA) *1</td>
            <td>6meter( Hight 3 * Width 2)<br>8.75meter( Hight 3.5 * Width 2.5)</td>
            <td>عادي</td>
            <td>غير مدفوعة</td>
            <td>148.00 ريال</td>
            <td>استكمال العملية</td>
          </tr>
          <tr>
            <td>A017407</td>
            <td>2024-02-21 10:07 AM</td>
            <td>2024-02-23 10:01 AM</td>
            <td>ابو احمد الراعي</td>
            <td>أ (مفرشة)(WA) *3<br>أ (مفرشة)(WA) *1<br>قطعة 15(WA) *4<br>35(WA) *3<br>أ (مفرشة)(WA) *1</td>
            <td>6meter( Hight 3 * Width 2)<br>3meter( Hight 3 * Width 1)<br>1meter( Hight 1 * Width 1)</td>
            <td>عادي</td>
            <td>غير مدفوعة</td>
            <td>361.00 ريال</td>
            <td>استكمال العملية</td>
          </tr>
        </tbody>
      </table>
    </div>
    
    <!-- تضمين Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    </body>
    </html>
    
  
   <!---2---end-->
</div>

<div id="page3" class="page" style="display:none;">
<!---3----->
<div id="DivDeliverySearch" class="col-md-12" style="background: #F8F8FB;padding:15px;margin-bottom:15px;">
    <div class="col-md-2">
        <label id="Content1_Content2_LblRSearch" class="control-label">بحث</label>
        <input type="text" id="txtReadySearch" class="form-control" fdprocessedid="ytz4tp">
    </div>
    <div class="col-md-2 col-sm-2">
        <div class="space20"></div>
        <div class="space5"></div>
        <a id="Content1_Content2_btnOrderDistributionR" class="btn btn-primary" onclick="onDistributeOrderDelivery()">توزيع طلبات التوصيل</a>
    </div>
    <div class="col-md-2">
    </div>
    <div style="float:right;">
        <div class="pageSummaryMetric">
            <h4 id="Content1_Content2_lblROrder" style="font-size:20px">الييييييييييييييييفواتير</h4>
            <p id="cl_o_r" style="font-size:18px; font-weight:bold;">2902</p>
        </div>
        <div class="pageSummaryMetric">
            <h4 id="Content1_Content2_lblRPieces" style="font-size:20px">القطع</h4>
            <p id="cl_p_r" style="font-size:18px; font-weight:bold;">7165</p>
        </div>
        <div class="pageSummaryMetric">
            <h4 id="Content1_Content2_lblRValue" style="font-size:20px">القيمة</h4>
            <p><span id="cl_s_r" style="font-size:18px;  font-weight:bold;">305636.48</span> <span id="cl_s_r_curr">ريال</span></p>
        </div>
        <div class="pageSummaryMetric">
            <h4 id="Content1_Content2_lblRUnpaid" style="font-size:20px">غير مدفوع</h4>
            <p><span id="cl_u_r" style="font-size:18px; font-weight:bold; color:red;">-301201.00</span> <span id="cl_u_r_curr">ريال</span></p>
        </div>
        <a style="float: right;" id="refreshRe" onclick="refreshCl()" class="dpB dpBBold">
            <img id="imgRe" title="Refresh" width="30" height="30" src="../../assets/img/refresh2.svg" class="">
        </a>
        <div class="clear"></div>
    </div>
</div>

<!DOCTYPE html>
<html lang="ar">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>جدول الطلبات</title>
      <!-- تضمين Bootstrap CSS -->
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body dir="rtl">
    
    <div class="container mt-5">
      <table class="table table-striped table-bordered">
        <thead class="thead-dark">
          <tr>
            <th scope="col">الرقم</th>
            <th scope="col">تاريخ الفاتورة</th>
            <th scope="col">تاريخ التسليم</th>
            <th scope="col">إسم العميل</th>
            <th scope="col">الأصناف</th>
            <th scope="col">القطع</th>
            <th scope="col">عادي/مستعجل</th>
            <th scope="col">طريقة الدفع</th>
            <th scope="col">الإجمالي</th>
            <th scope="col">العملية</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>A017406</td>
            <td>2024-02-21 10:01 AM</td>
            <td>2024-02-23 09:57 AM</td>
            <td>شركه سبل الخبره_طريق المدينه</td>
            <td>أ (مفرشة)(WA) *1<br>أ (مفرشة)(WA) *1</td>
            <td>6meter( Hight 3 * Width 2)<br>8.75meter( Hight 3.5 * Width 2.5)</td>
            <td>عادي</td>
            <td>غير مدفوعة</td>
            <td>148.00 ريال</td>
            <td>استكمال العملية</td>
          </tr>
          <tr>
            <td>A017407</td>
            <td>2024-02-21 10:07 AM</td>
            <td>2024-02-23 10:01 AM</td>
            <td>ابو احمد الراعي</td>
            <td>أ (مفرشة)(WA) *3<br>أ (مفرشة)(WA) *1<br>قطعة 15(WA) *4<br>35(WA) *3<br>أ (مفرشة)(WA) *1</td>
            <td>6meter( Hight 3 * Width 2)<br>3meter( Hight 3 * Width 1)<br>1meter( Hight 1 * Width 1)</td>
            <td>عادي</td>
            <td>غير مدفوعة</td>
            <td>361.00 ريال</td>
            <td>استكمال العملية</td>
          </tr>
        </tbody>
      </table>
    </div>
    
    <!-- تضمين Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    </body>
    </html>
    
  
    <!---3---end-->
</div>


@include('ad-castoar')
<script>
    function openPage(pageName) {
        // إخفاء جميع الصفحات
        var pages = document.getElementsByClassName("page");
        for (var i = 0; i < pages.length; i++) {
            pages[i].style.display = "none";
        }
        // إظهار الصفحة المطلوبة
        document.getElementById(pageName).style.display = "block";
    }
</script>

    <script>
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
    window.addToCart = function(itemId, itemName, itemPrice, itemUnit) {
    itemUnit = itemUnit.trim();  // Remove any leading or trailing white spaces

    if (itemUnit === "متر") {
        showMeterModal(itemId, itemName, itemPrice);
    } else {
        cartItems.push({ id: itemId, name: itemName, price: itemPrice, quantity: 1 });
        totalCartPrice += itemPrice;
        updateCart();
    }
}

}


function showMeterModal(itemId, itemName, itemPrice) {
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
modalContent.style.padding = '5px';
modalContent.style.border = '1px solid #888';
modalContent.style.width = '70%';
modalContent.style.maxWidth = '500px';

// Create close button
const closeButton = document.createElement('span');
closeButton.textContent = 'x';
closeButton.style.color = '#aaa';
closeButton.style.float = 'right';
closeButton.style.fontSize = '2px';
closeButton.style.fontWeight = 'bold';
closeButton.onclick = () => modal.style.display = 'none';
modalContent.appendChild(closeButton);

// Create first row
const firstRow = document.createElement('div');
firstRow.style.display = 'flex';
firstRow.style.justifyContent = 'space-between';
firstRow.style.marginBottom = '20px';

// Create label and input field for width
const widthLabel = document.createElement('label');
widthLabel.textContent = 'العرض:';
firstRow.appendChild(widthLabel);

const widthInput = document.createElement('input');
widthInput.type = 'number';
widthInput.value = 1;
firstRow.appendChild(widthInput);

// Create label and input field for height
const heightLabel = document.createElement('label');
heightLabel.textContent = 'الطول:';
firstRow.appendChild(heightLabel);

const heightInput = document.createElement('input');
heightInput.type = 'number';
heightInput.value = 1;
firstRow.appendChild(heightInput);

modalContent.appendChild(firstRow);

// Create second row
const secondRow = document.createElement('div');
secondRow.style.display = 'flex';
secondRow.style.justifyContent = 'space-between';
secondRow.style.marginBottom = '20px';

// Create label and read-only input field for number of meters
const meterLabel = document.createElement('label');
meterLabel.textContent = 'عدد الأمتار:';
secondRow.appendChild(meterLabel);

const meterInput = document.createElement('input');
meterInput.type = 'number';
meterInput.value = 1;
meterInput.readOnly = true;
secondRow.appendChild(meterInput);

modalContent.appendChild(secondRow);

// Create third row
const thirdRow = document.createElement('div');
thirdRow.style.display = 'flex';
thirdRow.style.justifyContent = 'space-between';

// Create label and input field for number of items
const quantityLabel = document.createElement('label');
quantityLabel.textContent = 'القطع:';
thirdRow.appendChild(quantityLabel);

const quantityInput = document.createElement('input');
quantityInput.type = 'number';
quantityInput.value = 1;
thirdRow.appendChild(quantityInput);

// Create label and input field for item price
const priceLabel = document.createElement('label');
priceLabel.textContent = 'السعر';
thirdRow.appendChild(priceLabel);

const priceInput = document.createElement('input');
priceInput.type = 'number';
priceInput.value = itemPrice;
thirdRow.appendChild(priceInput);

modalContent.appendChild(thirdRow);

// Update number of meters when width or height changes
widthInput.oninput = heightInput.oninput = () => {
    const width = parseFloat(widthInput.value);
    const height = parseFloat(heightInput.value);
    const numberOfMeters = width * height;
    meterInput.value = numberOfMeters;
};

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

    cartItems.push({ id: itemId, name: itemName, price: totalPrice, quantity: quantity });
    totalCartPrice += totalPrice;
    updateCart();

    modal.style.display = 'none';
};
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
    function deleteItem(itemId) {
    // Filter out the item with the given id
    cartItems = cartItems.filter(item => item.id !== itemId);

    // Update the total cart price
    totalCartPrice = cartItems.reduce((total, item) => total + item.price, 0);

    // Update the cart in the UI
    updateCart();
    }
      

      
        function updateCart() {
            const cartContainer = document.getElementById('cartItems');
    
            // Clear previous items
            cartContainer.innerHTML = '';
    
            // Update cart items
            cartItems.forEach(item => {
                const listItem = document.createElement('li');
                //original code in next line                 listItem.textContent = `${item.name} - $${item.price.toFixed(2)}`;    

                listItem.textContent = `${item.name} - ${item.price.toFixed(2)}`;    
                // Create edit icon
                const editIcon = document.createElement('i');
                editIcon.className = 'fas fa-edit';
                editIcon.onclick = () => showEditForm(item.id, item.name, item.price);
                listItem.appendChild(editIcon);

                // Create delete icon
                const deleteIcon = document.createElement('i');
                deleteIcon.className = 'fas fa-trash';
                deleteIcon.onclick = () => deleteItem(item.id);
                listItem.appendChild(deleteIcon);
    
    
                // Create form for additional services
                const editForm = document.createElement('form');
                editForm.style.display = 'none';
                editForm.id = `editForm${item.id}`;
    
                // getting additional services from the database
                let additionalServices = @json($additionalServices);
    
                // Create buttons for additional services
                additionalServices.forEach((service, index) => {
                    const button = document.createElement('button');
                    button.textContent = service.additional_service_name;
                    button.value = service.additional_service_price; // Use the price from the database
                    button.onclick = () => {
                        event.preventDefault();

                        updateItemPrice(item.id, parseFloat(service.additional_service_price));
                    };
                    editForm.appendChild(button);
                });
    
                listItem.appendChild(editForm);
                cartContainer.appendChild(listItem);
            });
    
            updateTotalPrice();
        }
    
        function updateTotalPrice() {
            const discount = parseFloat(document.getElementById('discount').value);
            const deliveryCost = document.getElementById('delivery').checked ? parseFloat(document.getElementById('deliveryCost').value) : 0;
            const totalPriceElement = document.getElementById('totalPrice');
    
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
        //original code in the next line         listItem.textContent = `${additionalServiceName} - $${additionalServicePrice.toFixed(2)}`;

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
        
    
        function saveCart() {
            const discount = parseFloat(document.getElementById('discount').value);
            const delivery = document.getElementById('delivery').checked;
            const deliveryCost = delivery ? parseFloat(document.getElementById('deliveryCost').value) : 0;
            const paymentMethod = document.getElementById('paymentMethod').value;
            const customerId = document.getElementById('customer').value;
    
            // Send an AJAX request to save the cart to the database
            // You can use a JavaScript framework like Axios or jQuery.ajax to make the request
            // Example using Axios:
           // import axios for me
            axios.post('/cart/save', {
                items: cartItems,
                discount: discount,
                delivery: delivery,
                deliveryCost: deliveryCost,
                paymentMethod: paymentMethod,
                customerId: customerId,
                totalPrice: totalPrice
            })
            .then(function (response) {
                // Handle the response, e.g. show a success message
            });
        }
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