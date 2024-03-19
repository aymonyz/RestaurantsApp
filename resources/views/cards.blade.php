

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


@Include('ad-castoar')
<button id="addClientModal">إضافة عميل جديد</button>

                    <!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
                        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
                        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css">
                        <link rel="stylesheet" href="">
                        <title>حفظ الأمتار</title>
                        
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
                    
                        <div class="card item-card" data-group="{{ $item->group }}">
                            <div class="card-body">
                                <h5 class="card-title">{{$item->item_name}}</h5>
                                
                                
                                <img src="{{ asset($item->src) }}" alt="{{$item->item_name}}">
                                <p class="card-text">{{$item->group}}</p>
                    
                                <p class="card-text">{{$item->price}}</p>
                                <button class="btn btn-primary" onclick="addToCart({{$item->id}}, '{{$item->item_name}}', {{$item->price}},'{{ $item->unit }}')">أضف للفاتورة</button>
                            </div>
                        </div>
                    </div>
                    
                    @endforeach
                        </div>
                    </div>
                    
                    <form name="cartForm" method="POST" action="{{route('cart.store')}}">
                        @csrf
                        <div class="card" id="cart">
                            <div class="card-body">
                                <h5 class="card-title">إص1دار فاتورة</h5>
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
                                <!--Choosing a customer -->
                                <p>اختر العميل: 
                                    <select id="customer" class="choices-select">
                                        <option value="">اختر...</option>
                                        @foreach($customers as $customer)
                                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                        @endforeach
                                    </select>
                                </p>
                                
                                <button onclick="saveCart(event)">حف333ظ</button>
                            </div>
                        </div>
                    </form>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                        <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
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
                            listItem.id = item-${item.id}-${index}; // Assign a unique ID to the list item
                    
                            listItem.textContent = ${item.name} - ${item.price.toFixed(2)};
                    
                            // Create new li elements for each property
                    const widthItem = document.createElement('li');
                    widthItem.textContent = Width: ${item.width};
                    widthItem.classList.add('hidden-detail');
                    
                    const heightItem = document.createElement('li');
                    heightItem.textContent = Height: ${item.height};
                    heightItem.classList.add('hidden-detail');
                    
                    const metersItem = document.createElement('li');
                    metersItem.textContent = Number of Meters: ${item.numberOfMeters};
                    metersItem.classList.add('hidden-detail');
                    
                    const quantityItem = document.createElement('li');
                    quantityItem.textContent = Quantity: ${item.quantity};
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
                            editForm.id = editForm${item.id};
                    
                            // getting additional services from the database
                            let additionalServices = @json($additionalServices);
                    
                            // Create list for additional services
                            const additionalServicesList = document.createElement('ul');
                            additionalServicesList.id = additionalServicesList${item.id};
                    
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
                                    serviceItem.textContent = ${service.additional_service_name} - ${service.additional_service_price.toFixed(2)};
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
                        additionalServicesList.id = additionalServicesList${itemId};
                    
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
                            const additionalServicesList = document.getElementById(additionalServicesList${itemId});
                            const listItem = document.createElement('li');
                            listItem.textContent = ${additionalServiceName} - ${additionalServicePrice.toFixed(2)};
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
                                const additionalServicesList = document.getElementById(additionalServicesList${itemId});
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
                            inputWidth.name = items[${index}][width];
                            inputWidth.value = item.width;
                            form.appendChild(inputWidth);
                    
                            // Height
                            const inputHeight = document.createElement('input');
                            inputHeight.type = 'hidden';
                            inputHeight.name = items[${index}][height];
                            inputHeight.value = item.height;
                            form.appendChild(inputHeight);
                    
                            // Number of Meters
                            const inputMeters = document.createElement('input');
                            inputMeters.type = 'hidden';
                            inputMeters.name = items[${index}][numberOfMeters];
                            inputMeters.value = item.numberOfMeters;
                            form.appendChild(inputMeters);
                           
                        
                    
                    
                        
                        //end of new code
                        const inputId = document.createElement('input');
                        inputId.type = 'hidden';
                        inputId.name = items[${index}][id];
                        inputId.value = item.id;
                        form.appendChild(inputId);
                    
                        const inputName = document.createElement('input');
                        inputName.type = 'hidden';
                        inputName.name = items[${index}][name];
                        inputName.value = item.name;
                        form.appendChild(inputName);
                    
                        const inputPrice = document.createElement('input');
                        inputPrice.type = 'hidden';
                        inputPrice.name = items[${index}][price];
                        inputPrice.value = item.price;
                        form.appendChild(inputPrice);
                    
                        const inputQuantity = document.createElement('input');
                        inputQuantity.type = 'hidden';
                        inputQuantity.name = items[${index}][quantity];
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
                            inputServiceName.name = items[${index}][services][${serviceIndex}][name];
                            inputServiceName.value = service.name;
                            form.appendChild(inputServiceName);
                    
                            const inputServicePrice = document.createElement('input');
                            inputServicePrice.type = 'hidden';
                            inputServicePrice.name = items[${index}][services][${serviceIndex}][price];
                            inputServicePrice.value = service.price;
                            form.appendChild(inputServicePrice);
                        });
                    }
                    
                        // Item unit
                       /* const inputUnit = document.createElement('input');
                        inputUnit.type = 'hidden';
                        inputUnit.name = items[${index}][unit];
                        inputUnit.value = item.unit; // Assuming item.unit holds the unit information
                        console.log(inputUnit);
                        form.appendChild(inputUnit);
                    
                        // Number of pieces
                        const inputPieces = document.createElement('input');
                        inputPieces.type = 'hidden';
                        inputPieces.name = items[${index}][pieces];
                        inputPieces.value = item.pieces; // Assuming item.pieces holds the number of pieces
                        console.log(inputPieces);
                        form.appendChild(inputPieces);
                    
                        // Dimensions
                        const inputWidth = document.createElement('input');
                        inputWidth.type = 'hidden';
                        inputWidth.name = items[${index}][width];
                        inputWidth.value = item.width; // Assuming item.width holds the width
                        console.log(inputWidth);
                        form.appendChild(inputWidth);
                    
                        const inputHeight = document.createElement('input');
                        inputHeight.type = 'hidden';
                        inputHeight.name = items[${index}][height];
                        inputHeight.value = item.height; // Assuming item.height holds the height
                        console.log(inputHeight);
                        form.appendChild(inputHeight);
                    */
                       
                    
                    });
                    
                    
                    
                    
                    
                            form.submit();

                        }
                    
                   
                        $(document).ready(function() {
    $('.filter-button').click(function() {
        var groupName = $(this).data('group');

        // أولاً، إخفاء جميع العناصر
        $('#products > div').hide(); // افتراض أن جميع المنتجات موجودة ضمن عناصر <div> مباشرة تحت #products

        // ثم، إظهار العناصر التي تطابق الفئة المحددة
        $('#products div[data-group="' + groupName + '"]').show();

        console.log("Filter by group: " + groupName); // Placeholder for actual filtering logic
    });
});
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


@extends('layouts.master')
@section('css')
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css">
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>

    <link rel="stylesheet" href="">
    <title>إصدار فاتورة</title>
    <style>
        
    .form-container {
        width: 100%;
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
    }
    .form-container .form-group {
        margin-bottom: 15px;
    }
    .form-container .form-group label {
        display: block;
        margin-bottom: 5px;
        font-size: 1.2em; /* Increase the font size */
    }
    .form-container .form-group input,
    .form-container .form-group select {
        width: 100%;
        padding: 15px; /* Increase the padding */
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 1.1em; /* Increase the font size */
        box-shadow: 0px 0px 10px rgba(0,0,0,0.1); /* Add a subtle shadow */
    }
    .form-container button {
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 1.1em; /* Increase the font size */
        transition: background-color 0.3s ease; /* Add a transition for hover effect */
    }
    .form-container button:hover {
        background-color: #0056b3;
    }
    
    form {
        width: 100%;
        max-width: 400px;
        margin: 10px auto;
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 5px;
    }
    form div {
        margin-bottom: 10px;
    }
    form label {
        display: block;
        margin-bottom: 5px;
        font-size: 1.2em;
    }
    form select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ced4da;
        border-radius: 4px;
        font-size: 1.1em;
    }
    form button {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 4px;
        background-color: #007bff;
        color: #fff;
        font-size: 1.2em;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    form button:hover {
        background-color: #0056b3;
    }
    #discount{
        margin-bottom: 15px;
    }
  
/* Style the list items in the cart */
#cartItems li {
    list-style-type: none; /* Remove the bullet points */
    padding: 10px; /* Add some padding */
    margin-bottom: 10px; /* Add some space between items */
    border: 1px solid #ccc; /* Add a border */
    border-radius: 5px; /* Round the corners */
    background-color: #f9f9f9; /* Add a background color */
    display: flex; /* Align the text and icons */
    justify-content: space-between; /* Space out the text and icons */
}

/* Style the text in the list items */
#cartItems li::before {
    content: ""; /* Remove the default bullet */
}

/* Style the edit and delete icons */
#cartItems i {
    margin-left: 10px; /* Add some space to the left of the icons */
}

/* Style the hidden details */
.hidden-detail {
    display: none; /* Keep them hidden */
}

/* Style the additional services list */
#additionalServicesList {
    padding-left: 0; /* Remove the default padding */
}
#cartItems li.hidden-detail {
    display: none;
}
button.mx-2{
    margin-right: 20%;
    margin-left: 10%;
}
table.table-inside-cards, table.table-inside-cards th{
    font-size: 16px !important; /* Adjust this value as needed */


}
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 15px 0;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: right;
    }
    th {
        background-color: #4CAF50;
        color: white;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    div.under-execution-ready-for-delivery-cards{
        display: none;
        width:80%;
        margin-right:18%;
        margin-top: -30%; 
    }
    @media screen and (max-width: 600px) {
        div.under-execution-ready-for-delivery-cards{
        display: none;
        width:90%;
        margin-inline: auto;
        margin-top: -80%; 
    }
        table, thead, tbody, th, td, tr {
            display: block;
        }
        thead tr {
            position: absolute;
            top: -9999px;
            left: -9999px;
        }
        tr { margin: 0 0 1rem 0; }
        tr:nth-child(odd) {
            background: #ccc;
        }
        td {
            border: none;
            border-bottom: 1px solid #eee;
            position: relative;
            padding-left: 50%;
        }
        td:before {
            position: absolute;
            top: 6px;
            left: 6px;
            width: 45%;
            padding-right: 10px;
            white-space: nowrap;
        }
        td:nth-of-type(1):before { content: "الرقم"; }
        td:nth-of-type(2):before { content: "تاريخ الفاتورة"; }
        td:nth-of-type(3):before { content: "تاريخ التسليم"; }
        td:nth-of-type(4):before { content: "اسم العميل"; }
        td:nth-of-type(5):before { content: "العناصر"; }
        td:nth-of-type(6):before { content: "القطع"; }
        td:nth-of-type(7):before { content: "عادي أو عاجل"; }
        td:nth-of-type(8):before { content: "طريقة الدفع"; }
        td:nth-of-type(9):before { content: "السعر الإجمالي"; }
        td:nth-of-type(10):before { content: "العملية"; }
    }

</style>
   
@endsection
@section('page-header')
<body>

<div class="d-flex justify-content-center mt-5 mb-5" id="buttons-container">
    <button class="btn btn-primary mx-2" id="new-invoice">إصدار فاتورة جديدة</button>
    <button class="btn btn-primary mx-2" id="under-execution">تحت التنفيذ</button>
    <button class="btn btn-primary mx-2" id="ready-for-delivery">جاهزة للتسليم</button>
</div>

@endsection
@section('content')

    <div class="container-fluid">
        <!-- Alert for session message -->
        @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
        @include('ad-castoar')
    
        <!-- Search and Filter Section -->
        <div class="row align-items-center mb-4">
            <div class="col-lg-3 col-md-4 mb-4">
                <input type="text" id="itemSearch" class="form-control" placeholder="أبحث عن صنف">
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="d-flex flex-row flex-nowrap align-items-center">
                    @foreach($groups as $group)
                    <button class="filter-button btn btn-sm btn-outline-primary mr-2" data-group="{{ $group->GroupNameArabic }}">{{ $group->GroupNameArabic }}</button>
                    @endforeach
                </div>
            </div>
        </div>
    
        <!-- Items and Cart Section -->
        <div class="row">
            <!-- Items Display Column -->
            <div class="col-md-8">
                <div class="row">
                    @foreach($items as $item)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="card item-card" data-group="{{ $item->group }}">
                            <div class="card-body">
                                <h5 class="card-title">{{$item->item_name}}</h5>
                                <img src="{{ asset($item->src) }}" class="card-img-top" alt="{{$item->item_name}}">
                                <p class="card-text">{{$item->group}}</p>
                                <p class="card-text">{{$item->price}}</p>
                                <button class="btn btn-primary" onclick="addToCart({{$item->id}}, '{{$item->item_name}}', {{$item->price}}, '{{ $item->unit }}')">أضف للفاتورة</button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
    
            <!-- Cart Form Column -->
            <div class="col-md-4">
                
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
        <a id="notesId" href="#dialogDesc" title="Note/ملاحظات" data-toggle="modal" class="btn btn-secondary" style="height:34px; width:45px"> <i class="fa fa-file-text"></i> </a>
        <a id="btnIconPickup" class="btn default"  data-bs-toggle="modal" data-bs-target="#myModal">
            <i class="fas fa-clock"  style="font-size:30px;"></i>
        </a>
        
        

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
<!-- Send messages form -->
<form action="{{ route('send-sms') }}" method="POST">
    @csrf
    <input type="hidden" name="to" value="+966567808170"> <!-- Preset recipient phone number -->
    <input type="hidden" name="message" value="   يا ود يا ايمونيز غسل كبايتك بتاعت القهوة"> <!-- Preset message -->

    <div>
        <label for="method">إرسال عبر:</label>
        <select id="method" name="method" required>
            <option value="sms">رسالة نصية</option>
            <option value="whatsapp">واتساب</option>
            <option value="both">الكل</option>
            <option value="none">لا شيء</option>
        </select>
    </div>
    <button type="submit">إرسال الرسالة</button>
</form>
<!-- end message form -->
<!-- Modal -->
<div class="modal fade" id="dialogDesc" tabindex="-1" role="dialog" aria-labelledby="dialogDescLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="dialogDescLabel">بيانات اخرى للفاتورة</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="deliveryDate">تاريخ التسليم</label>
              <input type="datetime-local" class="form-control" id="deliveryDate">
            </div>
            <div class="form-group">
              <label for="invoiceNote">ملاحظة الفاتورة</label>
              <textarea class="form-control" id="invoiceNote"></textarea>
            </div>
            <div class="form-group">
              <label for="bottomNote1">ملاحظات أسفل الفاتورة</label>
              <textarea class="form-control" id="bottomNote1"></textarea>
            </div>
            <div class="form-group">
              <label for="bottomNote2">ملاحظات أسفل الفاتورة 2</label>
              <textarea class="form-control" id="bottomNote2"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
          <button type="button" class="btn btn-primary" id="save-button">حفظ</button>
        </div>
      </div>
    </div>
  </div>
<!--Modal end -->  
<!-- second modal -->


<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">اختر التاريخ والوقت</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="pickup-date" class="form-label">تاريخ الإلتقاط</label>
                        <input type="date" class="form-control" id="pickup-date">
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="pickup-time-from" class="form-label">الوقت من</label>
                        <input type="time" class="form-control" id="pickup-time-from">
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="pickup-time-to" class="form-label">الوقت إلى</label>
                        <input type="time" class="form-control" id="pickup-time-to" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="delivery-date" class="form-label">تاريخ التسليم</label>
                        <input type="date" class="form-control" id="delivery-date">
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="delivery-time-from" class="form-label">الوقت من</label>
                        <input type="time" class="form-control" id="delivery-time-from">
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="delivery-time-to" class="form-label">الوقت إلى</label>
                        <input type="time" class="form-control" id="delivery-time-to">
                    </div>
                </div>
            </div>
            <div class="mb-3">
              <label for="delivery-address" class="form-label">عنوان توصيل الطلب</label>
              <input type="text" class="form-control" id="delivery-address">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
          <button type="button" class="btn btn-primary" id="save-clock-modal">حفظ </button>
        </div>
      </div>
    </div>
  </div>
  
<!-- second modal end-->

</div>
</div>
</div>
{{-- <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.min.js"></script> --}}
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    //search items by item-name
    // Get the input element
const itemSearch = document.getElementById('itemSearch');

// Add an event listener for the input event
itemSearch.addEventListener('input', function() {
    // Get the input value
    const searchValue = this.value.toLowerCase();

    // Get all the item cards
    const itemCards = document.querySelectorAll('.item-card');

    // Loop through the item cards
    itemCards.forEach(function(card) {
        // Get the item name
        const itemName = card.querySelector('.card-title').textContent.toLowerCase();

        // If the item name includes the search value, show the card, otherwise hide it
        if (itemName.includes(searchValue)) {
            card.parentElement.style.display = '';
        } else {
            card.parentElement.style.display = 'none';
        }
    });
});
    //seach customers
    document.addEventListener('DOMContentLoaded', function() {
var element = document.querySelector('.choices-select');
var choices = new Choices(element);
});

// Define options for the modal
var options = {
  backdrop: false // This disables the backdrop
};

// Invoke second modal with specified options
var myModal = new bootstrap.Modal(document.getElementById('myModal'), options);
document.getElementById('btnIconPickup').addEventListener('click', function () {
  myModal.show();
});

//Real fitering of items by group 
document.addEventListener('DOMContentLoaded', function() {
    // Get all filter buttons
    var filterButtons = document.querySelectorAll('.filter-button');

    // Add click event listener to each button
    filterButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            // Get the group from the clicked button
            var group = this.getAttribute('data-group');

            // Get all item cards
            var itemCards = document.querySelectorAll('.item-card');

            // Loop through all item cards
            itemCards.forEach(function(card) {
                // If the card's group matches the selected group, show it, otherwise hide it
                if (card.getAttribute('data-group') === group) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
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


//show meter modal
function showMeterModal(itemId, itemName, itemPrice, width, height) {
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

    const modalContent = document.createElement('div');
    modalContent.style.backgroundColor = '#fefefe';
    modalContent.style.margin = '15% auto';
    modalContent.style.padding = '20px';
    modalContent.style.border = '1px solid #888';
    modalContent.style.width = '80%';

    const closeButton = document.createElement('span');
    closeButton.textContent = 'x';
    closeButton.style.color = '#aaa';
    closeButton.style.float = 'right';
    closeButton.style.fontSize = '28px';
    closeButton.style.fontWeight = 'bold';
    closeButton.onclick = () => modal.style.display = 'none';
    modalContent.appendChild(closeButton);

    const row1 = document.createElement('div');
    row1.style.display = 'flex';
    row1.style.justifyContent = 'space-between';
    modalContent.appendChild(row1);

    const widthLabel = document.createElement('label');
    widthLabel.textContent = 'العرض:';
    row1.appendChild(widthLabel);

    const widthInput = document.createElement('input');
    widthInput.type = 'number';
    widthInput.value = 1;
    widthInput.style.flex = '1';
    row1.appendChild(widthInput);

    const heightLabel = document.createElement('label');
    heightLabel.textContent = 'الطول:';
    row1.appendChild(heightLabel);

    const heightInput = document.createElement('input');
    heightInput.type = 'number';
    heightInput.value = 1;
    heightInput.style.flex = '1';
    row1.appendChild(heightInput);

    const row2 = document.createElement('div');
    row2.style.display = 'flex';
    row2.style.justifyContent = 'space-between';
    modalContent.appendChild(row2);

    const meterLabel = document.createElement('label');
    meterLabel.textContent = 'عدد الأمتار:';
    row2.appendChild(meterLabel);

    const meterInput = document.createElement('input');
    meterInput.type = 'number';
    meterInput.value = 1;
    meterInput.readOnly = true;
    meterInput.style.flex = '1';
    row2.appendChild(meterInput);

    const quantityLabel = document.createElement('label');
    quantityLabel.textContent = 'القطع:';
    row2.appendChild(quantityLabel);

    const quantityInput = document.createElement('input');
    quantityInput.type = 'number';
    quantityInput.value = 1;
    quantityInput.style.flex = '1';
    row2.appendChild(quantityInput);

    widthInput.oninput = heightInput.oninput = () => {
        const width = parseFloat(widthInput.value);
        const height = parseFloat(heightInput.value);
        const numberOfMeters = width * height;
        meterInput.value = numberOfMeters;
    };

    const priceLabel = document.createElement('label');
    priceLabel.textContent = 'السعر';
    modalContent.appendChild(priceLabel);

    const priceInput = document.createElement('input');
    priceInput.type = 'number';
    priceInput.value = itemPrice;
    modalContent.appendChild(priceInput);

    const addButton = document.createElement('button');
    addButton.textContent = '  أضف للفاتورة';
    addButton.style.backgroundColor = 'green';
    addButton.style.color = 'white';
    addButton.style.border = 'none';
    addButton.style.padding = '10px 20px';
    addButton.style.height = '2.5rem';
    modalContent.style.width = '40%'; // Change this to your preferred width

// ...

// Add margin to the input fields
widthInput.style.margin = '10px 10px';
widthInput.style.height = '2.5rem';
heightInput.style.margin = '10px 10px';
heightInput.style.height = '2.5rem';
meterInput.style.margin = '10px 10px';
meterInput.style.height = '2.5rem';
quantityInput.style.margin = '10px 10px';
quantityInput.style.height = '2.5rem';
priceInput.style.margin = '10px 10px';
priceInput.style.marginleft="2rem"; 
priceInput.style.height = '2.5rem';
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
            width: width,
            height: height,
            numberOfMeters: numberOfMeters
        });
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

    listItem.textContent =` ${item.name} - ${item.price.toFixed(2)}`;

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
    inputWidth.name =` items[${index}][width]`;
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

// Inside the saveCart function, before form.submit();

// Pickup date
const pickupDateInput = document.createElement('input');
pickupDateInput.type = 'hidden';
pickupDateInput.name = 'pickupDate';
pickupDateInput.value = document.getElementById('pickup-date').value;
form.appendChild(pickupDateInput);

// Pickup time from
const pickupTimeFromInput = document.createElement('input');
pickupTimeFromInput.type = 'hidden';
pickupTimeFromInput.name = 'pickupTimeFrom';
pickupTimeFromInput.value = document.getElementById('pickup-time-from').value;
form.appendChild(pickupTimeFromInput);

// Pickup time to
const pickupTimeToInput = document.createElement('input');
pickupTimeToInput.type = 'hidden';
pickupTimeToInput.name = 'pickupTimeTo';
pickupTimeToInput.value = document.getElementById('pickup-time-to').value;
form.appendChild(pickupTimeToInput);

// Delivery date
const deliveryDateInput = document.createElement('input');
deliveryDateInput.type = 'hidden';
deliveryDateInput.name = 'deliveryDate';
deliveryDateInput.value = document.getElementById('delivery-date').value;
form.appendChild(deliveryDateInput);

// Delivery time from
const deliveryTimeFromInput = document.createElement('input');
deliveryTimeFromInput.type = 'hidden';
deliveryTimeFromInput.name = 'deliveryTimeFrom';
deliveryTimeFromInput.value = document.getElementById('delivery-time-from').value;
form.appendChild(deliveryTimeFromInput);

// Delivery time to
const deliveryTimeToInput = document.createElement('input');
deliveryTimeToInput.type = 'hidden';
deliveryTimeToInput.name = 'deliveryTimeTo';
deliveryTimeToInput.value = document.getElementById('delivery-time-to').value;
form.appendChild(deliveryTimeToInput);

// Delivery address
const deliveryAddressInput = document.createElement('input');
deliveryAddressInput.type = 'hidden';
deliveryAddressInput.name = 'deliveryAddress';
deliveryAddressInput.value = document.getElementById('delivery-address').value;
form.appendChild(deliveryAddressInput);



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
inputUnit.name = items[${index}][unit];
inputUnit.value = item.unit; // Assuming item.unit holds the unit information
console.log(inputUnit);
form.appendChild(inputUnit);

// Number of pieces
const inputPieces = document.createElement('input');
inputPieces.type = 'hidden';
inputPieces.name = items[${index}][pieces];
inputPieces.value = item.pieces; // Assuming item.pieces holds the number of pieces
console.log(inputPieces);
form.appendChild(inputPieces);

// Dimensions
const inputWidth = document.createElement('input');
inputWidth.type = 'hidden';
inputWidth.name = items[${index}][width];
inputWidth.value = item.width; // Assuming item.width holds the width
console.log(inputWidth);
form.appendChild(inputWidth);

const inputHeight = document.createElement('input');
inputHeight.type = 'hidden';
inputHeight.name = items[${index}][height];
inputHeight.value = item.height; // Assuming item.height holds the height
console.log(inputHeight);
form.appendChild(inputHeight);
*/


});





// submit the form
    form.submit();
       
}
document.addEventListener("DOMContentLoaded", function() {
    // Fetch data and populate form fields
    fetch('/get-invoice-details', { // Your endpoint here
    method: 'GET',
    headers: {
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Laravel CSRF token
    },
})
.then(response => response.json()) // Change this line
.then(text => {
    console.log(text); // This will print the full response text
   // Assign the values to the respective fields
   document.getElementById('deliveryDate').value = text.deliveryDate;
    document.getElementById('invoiceNote').value = text.invoiceNote;
    document.getElementById('bottomNote1').value = text.bottomNote1;
    document.getElementById('bottomNote2').value = text.bottomNote2;
})
.catch(error => {
    console.error('Error:', error); // Handle error
});
const saveButton = document.getElementById('save-button');
saveButton.addEventListener('click', function() {
    const deliveryDate = document.getElementById('deliveryDate').value;
    const invoiceNote = document.getElementById('invoiceNote').value;
    const bottomNote1 = document.getElementById('bottomNote1').value;
    const bottomNote2 = document.getElementById('bottomNote2').value;

    // Prepare data to be sent
    const formData = new FormData();
    formData.append('deliveryDate', deliveryDate);
    formData.append('invoiceNote', invoiceNote);
    formData.append('bottomNote1', bottomNote1);
    formData.append('bottomNote2', bottomNote2);

    // Send data using fetch
    fetch('/save-invoice-details', { // Your endpoint here
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Laravel CSRF token
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        console.log(data); // Handle success
        var myModalEl = document.getElementById('dialogDesc');
        var modal = new bootstrap.Modal(myModalEl);
        modal.hide();
    })
    .catch(error => {
        console.error('Error:', error); // Handle error
    });
});
});
//make the pickup-time-to 60 minutes more than pickup-time-from
document.getElementById('pickup-time-from').addEventListener('change', function() {
    var time_from = this.value;
    if (time_from) {
        var date = new Date("1970-01-01T" + time_from + "Z");
        date.setMinutes(date.getMinutes() + 60);
        var time_to = date.toISOString().substr(11, 5);
        document.getElementById('pickup-time-to').value = time_to;
    }
});
//make the pickup-time-to 60 minutes more than pickup-time-from
document.getElementById('delivery-time-from').addEventListener('change', function() {
    var time_from = this.value;
    if (time_from) {
        var date = new Date("1970-01-01T" + time_from + "Z");
        date.setMinutes(date.getMinutes() + 60);
        var time_to = date.toISOString().substr(11, 5);
        document.getElementById('delivery-time-to').value = time_to;
    }
});
//save clock modal data
function saveClockModaldata() {
  // Collect data from the form fields
  const pickupDate = document.getElementById('pickup-date').value;
  const pickupTimeFrom = document.getElementById('pickup-time-from').value;
  const pickupTimeTo = document.getElementById('pickup-time-to').value;
  const deliveryDate = document.getElementById('delivery-date').value;
  const deliveryTimeFrom = document.getElementById('delivery-time-from').value;
  const deliveryTimeTo = document.getElementById('delivery-time-to').value;
  const branch = document.getElementById('branch').value;
  const area = document.getElementById('area').value;
  const deliveryAddress = document.getElementById('delivery-address').value;

  // Prepare the data to be sent in the request
  const data = {
    pickupDate,
    pickupTimeFrom,
    pickupTimeTo,
    deliveryDate,
    deliveryTimeFrom,
    deliveryTimeTo,
    branch,
    area,
    deliveryAddress
  };

  // Use the Fetch API to send the data
  fetch('/save-delivery-clock-data', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      // Include CSRF token if needed, for example, in Laravel applications
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    },
    body: JSON.stringify(data) // Convert the data object to a JSON string
  })
  .then(response => response.json()) // Parse the JSON response
  .then(data => {
    console.log('Success:', data);
    // Close the modal or show a success message
  })
  .catch((error) => {
    console.error('Error:', error);
  });
}
document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('save-clock-modal').addEventListener('click', saveClockModaldata);
});

//Invoices tables
document.addEventListener('DOMContentLoaded', function() {
    let newInvoiceButton = document.querySelector('#new-invoice');
    let underExecutionButton = document.querySelector('#under-execution');
    let readyForDeliveryButton = document.querySelector('#ready-for-delivery');
    let buttonsContainer = document.querySelector('#buttons-container');

    let underExecutionInvoices = <?php echo json_encode($underExecutionInvoices); ?>;
    let readyForDeliveryInvoices = <?php echo json_encode($readyForDeliveryInvoices); ?>;
    let totalUnderExecutionPriceSum=<?php echo json_encode($totalUnderExecutionPriceSum); ?>;
    let totalReadyForDeliveryPriceSum =<?php echo json_encode($totalReadyForDeliveryPriceSum); ?>;
    let underExecutionCartsCount =<?php echo json_encode($underExecutionCartsCount); ?>;
    let readyForDeliveryCartsCount =<?php echo json_encode($readyForDeliveryCartsCount); ?>;
            

    let parent = buttonsContainer.parentElement;

    let underExecutionCard = createCard('تحت التنفيذ', underExecutionInvoices, 'under-execution');
    let readyForDeliveryCard = createCard('جاهزة للتسليم', readyForDeliveryInvoices, 'ready-for-delivery');

    document.body.appendChild(underExecutionCard);
    document.body.appendChild(readyForDeliveryCard);

    underExecutionButton.addEventListener('click', function() {
        hideAllCards();
        showCard(underExecutionCard);
    });

    readyForDeliveryButton.addEventListener('click', function() {
        hideAllCards();
        showCard(readyForDeliveryCard);
    });

    newInvoiceButton.addEventListener('click', function() {
        restoreDefaultView();
    });

    function restoreDefaultView() {
        hideAllCards();
        Array.from(parent.children).forEach(child => {
            if (child !== buttonsContainer) {
                child.style.display = '';
            }
        });
    }


    function createCard(title, invoices, cardType) {
        let card = document.createElement('div');
        card.classList.add('under-execution-ready-for-delivery-cards');
       
        let totalPiecesSum = invoices.reduce((sum, invoice) => {
            return sum + invoice.items.reduce((sum, item) => sum + item.quantity, 0);
        }, 0);

        let tableHTML = `
            <div class="card">
                <div class="card-header" style="background-color:gray;color:white;">${title}</div>
                <div class="search-container">
                    <input type="text" id="searchInput-${cardType}" placeholder="أبحث بإسم أو رقم العميل..." style="height:2rem;margin-top:2rem;margin-right:2rem;"/>
                    <button id="searchButton-${cardType}" style="height:2rem;margin-top:2rem;border:none;">بحث</button>
                </div>
                <div style="margin-top:2rem;margin-right:2rem;">
                    <p style="font-weight:bold;">القيمة الإجمالية: ${cardType === "ready-for-delivery" ?  totalReadyForDeliveryPriceSum : totalUnderExecutionPriceSum} </p>
                    <p style="font-weight:bold;">الفواتير: ${cardType === "ready-for-delivery" ?  readyForDeliveryCartsCount : underExecutionCartsCount}</p>
                    <p style="font-weight:bold;">إجمالي القطع: ${totalPiecesSum}</p>
                </div>
                <div class="card-body">
                    <table class="table table-inside-cards">
                        <thead>
                            <tr>
                                <th>الرقم</th>
                                <th>تاريخ الفاتورة</th>
                                <th>تاريخ التسليم</th>
                                <th>اسم العميل</th>
                                <th>الأصناف</th>
                                <th>القطع</th>
                                <th>عادي أو مستعجل</th>
                                <th>طريقة الدفع</th>
                                <th>السعر الإجمالي</th>
                                <th>العملية</th>
                            </tr>
                        </thead>
                        <tbody id="invoiceBody-${cardType}">
                            ${createTableBody(invoices,cardType)}
                        </tbody>
                    </table>
                </div>
            </div>
        `;

        card.innerHTML = tableHTML;
        document.body.appendChild(card);

        let searchButton = card.querySelector(`#searchButton-${cardType}`);
        let searchInput = card.querySelector(`#searchInput-${cardType}`);
        let invoiceBody = card.querySelector(`#invoiceBody-${cardType}`);

        searchInput.addEventListener('input', function() {
    let searchTerm = searchInput.value.toLowerCase();
    let filteredInvoices = invoices.filter(invoice => 
        invoice.customer.name.toLowerCase().includes(searchTerm) || 
        invoice.customer.mobileNumber.includes(searchTerm)
    );
    invoiceBody.innerHTML = createTableBody(filteredInvoices, cardType);
});

        return card;
    }
    function createTableBody(invoices, cardType) {
    return invoices.map(invoice => {
        let itemsDescriptions = invoice.items.map(item => {
            let dimensions = item.width && item.height ? `${item.width}x${item.height}م` : '';
            return `${item.name}${dimensions} - الكمية: ${item.quantity}`;
        }).join(', ');

        let totalPieces = invoice.items.reduce((sum, item) => sum + item.quantity, 0);

        let buttonsHTML = '';
        if (cardType === 'ready-for-delivery') {
            buttonsHTML = `
                <button class="invoice-execution-button" data-cart-id="${invoice.id}" style="margin:0.5rem;padding:0.5rem;border:none;">تسليم ودفع الفاتورة</button>
                <button class="invoice-execution-button" data-cart-id="${invoice.id}" style="margin:0.5rem;padding:0.5rem;border:none;">تسليم ودفع متعدد</button>
                <button class="invoice-execution-button" data-cart-id="${invoice.id}" style="margin:0.5rem;padding:0.5rem;border:none;"> تسليم بدون دفع - آجل</button>
            `;
        } else {
            buttonsHTML = `<button class="invoice-execution-button" data-cart-id="${invoice.id}">تنفيذ الفاتورة</button>`;
        }

        return `
            <tr>
                <td>${invoice.id}</td>
                <td>${invoice.created_at}</td>
                <td>${invoice.deliveryDate || ''}</td>
                <td>${invoice.customer.name} <br> ${invoice.customer.id} ${invoice.customer.mobileNumber }</td>
                <td>${itemsDescriptions}</td>
                <td>${totalPieces}</td>
                <td>${invoice.urgent ? 'مستعجل' : 'عادي'}</td>
                <td>${invoice.paymentMethod}</td>
                <td>${invoice.totalPrice}</td>
                <td>${cardType=== "ready-for-delivery" ? `
                <button class="invoice-execution-button" data-cart-id="${invoice.id}" style="margin:0.5rem;padding:0.5rem;border:none;">تسليم ودفع الفاتورة</button>
                <button class="invoice-execution-button" data-cart-id="${invoice.id}" style="margin:0.5rem;padding:0.5rem;border:none;">تسليم ودفع متعدد</button>
                <button class="invoice-execution-button" data-cart-id="${invoice.id}" style="margin:0.5rem;padding:0.5rem;border:none;"> تسليم بدون دفع - آجل</button>
            ` : `<button class="invoice-execution-button" data-cart-id="${invoice.id}" style="margin:0.5rem;padding:0.5rem;border:none;">تنفيذ الفاتورة</button>`}</td>
            </tr>
        `;
    }).join('');

}

    function showCard(card) {
        Array.from(parent.children).forEach(child => {
            if (child !== buttonsContainer) {
                child.style.display = 'none';
            }
        });
        card.style.display = 'block';
    }

    function hideAllCards() {
        underExecutionCard.style.display = 'none';
        readyForDeliveryCard.style.display = 'none';
    }

    // Add click event for update status buttons after they are created
    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('invoice-execution-button')) {
            let cartId = event.target.getAttribute('data-cart-id');
            updateStatus(cartId);
        }
    });

    // Define the updateStatus function
    function updateStatus(cartId) {
        fetch('/update-cart-status', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ cartId: cartId })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                // You may want to update the UI to reflect the status change
                alert('Invoice status updated successfully.');
            } else {
                // Handle any errors, e.g., show an error message
                alert('An error occurred while updating the invoice status.');
            }
        })
        .catch(error => {
            console.error('Error updating invoice status:', error);
        });
    }
});





</script>

</body>
@endsection


    