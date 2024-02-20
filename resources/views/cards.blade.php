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
    modalContent.appendChild(widthInput);

    // Create label and input field for height
    const heightLabel = document.createElement('label');
    heightLabel.textContent = 'الطول:';
    modalContent.appendChild(heightLabel);

    const heightInput = document.createElement('input');
    heightInput.type = 'number';
    heightInput.value = 1;
    modalContent.appendChild(heightInput);

    // Create label and read-only input field for number of meters
    const meterLabel = document.createElement('label');
    meterLabel.textContent = 'عدد الأمتار:';
    modalContent.appendChild(meterLabel);

    const meterInput = document.createElement('input');
    meterInput.type = 'number';
    meterInput.value = 1;
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