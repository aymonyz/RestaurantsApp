
    function openPage(pageName) {
        // إخفاء جميع الصفحات
        var pages = document.getElementsByClassName("page");
        for (var i = 0; i < pages.length; i++) {
            pages[i].style.display = "none";
        }
        // إظهار الصفحة المطلوبة
        document.getElementById(pageName).style.display = "block";
    }



        // filter items and search items
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
     var filterButtons = document.getElementsByClassName('filter-button');  //Add this line

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
  modalContent.style.width = '70%';
  modalContent.style.maxWidth = '500px';

  // Create close button
  const closeButton = document.createElement('span');
  closeButton.textContent = 'x';
  closeButton.style.color = '#aaa';
  closeButton.style.float = 'right';
  closeButton.style.fontSize = '28px';
  closeButton.style.fontWeight = 'bold';
  closeButton.style.cursor = 'pointer';
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

  // Create width increment and decrement buttons
  const widthDecrementButton = document.createElement('button');
  widthDecrementButton.textContent = '-';
  widthDecrementButton.onclick = () => {
    widthInput.value = Math.max(0, parseInt(widthInput.value) - 1);
    widthInput.oninput();
  };
  firstRow.appendChild(widthDecrementButton);

  const widthIncrementButton = document.createElement('button');
  widthIncrementButton.textContent = '+';
  widthIncrementButton.onclick = () => {
    widthInput.value = parseInt(widthInput.value) + 1;
    widthInput.oninput();
  };
  firstRow.appendChild(widthIncrementButton);

  // Create label and input field for height
  const heightLabel = document.createElement('label');
  heightLabel.textContent = 'الطول:';
  firstRow.appendChild(heightLabel);

  const heightInput = document.createElement('input');
  heightInput.type = 'number';
  heightInput.value = 1;
  firstRow.appendChild(heightInput);

  // Create height increment and decrement buttons
  const heightDecrementButton = document.createElement('button');
  heightDecrementButton.textContent = '-';
  heightDecrementButton.onclick = () => {
    heightInput.value = Math.max(0, parseInt(heightInput.value) - 1);
    heightInput.oninput();
  };
  firstRow.appendChild(heightDecrementButton);

  const heightIncrementButton = document.createElement('button');
  heightIncrementButton.textContent = '+';
  heightIncrementButton.onclick = () => {
    heightInput.value = parseInt(heightInput.value) + 1;
    heightInput.oninput();
  };
  firstRow.appendChild(heightIncrementButton);

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
  meterInput.type = 'text';
  meterInput.value = '1';
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
  priceLabel.textContent = 'السعر:';
  thirdRow.appendChild(priceLabel);

  const priceInput = document.createElement('input');
  priceInput.type = 'number';
  priceInput.value = itemPrice;
  //priceInput.readOnly = true;
  thirdRow.appendChild(priceInput);

  modalContent.appendChild(thirdRow);

  // Update number of meters when width or height changes
  widthInput.oninput = heightInput.oninput = () => {
    const width = parseFloat(widthInput.value);
    const height = parseFloat(heightInput.value);
    const numberOfMeters = width * height;
    meterInput.value = numberOfMeters.toFixed(2); // Fixing to two decimal places


// Update total price when price changes
priceInput.oninput = () => {
  const width = parseFloat(widthInput.value);
  const height = parseFloat(heightInput.value);
  const quantity = parseInt(quantityInput.value);
  const price = parseFloat(priceInput.value); // Get the new price
  const numberOfMeters = width * height;
  const totalPrice = numberOfMeters * price * quantity; // Use the new price to calculate total

  // Update some UI element with the new total price if necessary
  // For example:
  // document.getElementById('totalPriceElement').textContent = totalPrice.toFixed(2);
};

addButton.onclick = () => {
  const width = parseFloat(widthInput.value);
  const height = parseFloat(heightInput.value);
  const quantity = parseInt(quantityInput.value);
  const price = parseFloat(priceInput.value); // Get the new price
  const numberOfMeters = width * height;
  const totalPrice = numberOfMeters * price * quantity; // Use the new price for the total

  // Add to cart with the new price
  cartItems.push({ id: itemId, name: itemName, price: price, totalPrice: totalPrice, quantity: quantity });
  totalCartPrice += totalPrice;

  updateCart(); // Make sure this function now reflects the changes in the UI

  modal.style.display = 'none';
};




  };

  // Create button to calculate total price and add item to cart
  const addButton = document.createElement('button');
  addButton.textContent = 'إضافة إلى السلة';
  addButton.onclick = () => {
    const width = parseFloat(widthInput.value);
    const height = parseFloat(heightInput.value);
    const quantity = parseInt(quantityInput.value);
    const numberOfMeters = width * height;
    const totalPrice = numberOfMeters * itemPrice * quantity;

    // Assuming cartItems and totalCartPrice are defined elsewhere in your code
    cartItems.push({ id: itemId, name: itemName, price: totalPrice, quantity: quantity });
    totalCartPrice += totalPrice;

    // Assuming updateCart is a function defined elsewhere in your code
    updateCart();

    modal.style.display = 'none';
  };
  modalContent.appendChild(addButton);

  modal.appendChild(modalContent);
  document.body.appendChild(modal);
}
const customerSelect = document.getElementById('customer');
const sendInvoiceButton = document.getElementById('send-invoice-button'); // تحديد زر إرسال الفاتورة

customerSelect.addEventListener('change', () => {
    if (customerSelect.value === "اختر عميلاً") { // تحقق مما إذا كانت القيمة المحددة تساوي القيمة الافتراضية
        sendInvoiceButton.disabled = true; // تعطيل زر إرسال الفاتورة
    } else {
        sendInvoiceButton.disabled = false; // تفعيل زر إرسال الفاتورة
    }
});

//  //search the customers select for a certain customer
//  const customerSelect = document.getElementById('customer');

//      customerSelect.addEventListener('keyup', (event) => {
//          const searchTerm = event.target.value.toLowerCase();  //Get what the user types

//           //Iterate and filter options
//          const options = customerSelect.options;
//          for (let i = 0; i < options.length; i++) {
//              const optionText = options[i].text.toLowerCase();
//              if (optionText.includes(searchTerm)) {
//                  options[i].style.display = 'block';  //Show matching options
//              } else {
//                  options[i].style.display = 'none';   //Hide others
//              }
//          }
//      });
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
                console.log(additionalServices);

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
    console.log(additionalServices);
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

function saveCart(event) {
    event.preventDefault();

    // Collect cart data from the DOM
    let cartItems = [];
    document.querySelectorAll('#cartItems li').forEach((item) => {
        cartItems.push({
            id: item.dataset.productId, // تأكد من وجود هذا الخاصية وصحتها
            name: item.dataset.productName, // تأكد من وجود هذا الخاصية وصحتها
            price: parseFloat(item.dataset.productPrice), // تحويل السلسلة النصية إلى رقم
            quantity: parseInt(item.dataset.productQuantity) // تحويل السلسلة النصية إلى عدد صحيح
        });
    });


    // Add the rest of the data
    let formData = {
        _token: document.querySelector('input[name="_token"]').value,
        items: cartItems,
        discount: document.getElementById('discount').value,
        discountType: document.getElementById('discountType').value,
        urgent: document.getElementById('urgent').checked,
        delivery: document.getElementById('delivery').checked,
        deliveryCost: document.getElementById('deliveryCost').value,
        paymentMethod: document.getElementById('paymentMethod').value,
        customer: document.getElementById('customer').value
    };


    // Define the URL for the API endpoint
    let cartStoreUrl = '/cart'; // Make sure this matches your actual API endpoint

    // Make the POST request
    axios.post('/cart', formData)
    .then(function (response) {
        console.log(response);
        alert('تم حفظ السلة بنجاح');
    })
    .catch(function (error) {
        if (error.response && error.response.status === 422) {
            // استخراج وعرض أخطاء التحقق
            let errorMessage = "الرجاء تصحيح الأخطاء التالية:\n";
            Object.keys(error.response.data.errors).forEach((key) => {
                error.response.data.errors[key].forEach((message) => {
                    errorMessage += `${message}\n`;
                });
            });
            alert(errorMessage);
        } else {
            // التعامل مع أنواع الأخطاء الأخرى
            console.error('حدث خطأ:', error);
            alert('حدث خطأ أثناء حفظ السلة.');
        }
    });
}
document.getElementById('saveCartButton').addEventListener('click', saveCart);
















    function selectCustomer(customerId, customerName) {
    var customerSearchInput = document.getElementById('CustomerSearch');
    var selectedCustomerIdInput = document.getElementById('selectedCustomerId');
    var searchResultsDiv = document.getElementById('searchResults');

    customerSearchInput.value = customerName; // تحديث صندوق البحث بالاسم
    selectedCustomerIdInput.value = customerId; // تخزين معرف العميل

    // إخفاء نتائج البحث
    searchResultsDiv.style.display = 'none';
}



    function clearCustomerSearch() {
    var customerSearchInput = document.getElementById('CustomerSearch');
    var selectedCustomerIdInput = document.getElementById('selectedCustomerId');
    var searchResultsDiv = document.getElementById('searchResults');

    customerSearchInput.value = '';
    selectedCustomerIdInput.value = '';
    searchResultsDiv.innerHTML = '';
    searchResultsDiv.style.display = 'none';
}



    function clearCustomerSearch() {
    var customerSearchInput = document.getElementById('CustomerSearch');
    var selectedCustomerIdInput = document.getElementById('selectedCustomerId');
    var searchResultsDiv = document.getElementById('searchResults');

    customerSearchInput.value = '';
    selectedCustomerIdInput.value = '';
    searchResultsDiv.innerHTML = '';
    searchResultsDiv.style.display = 'none';
}



   function searchCustomer() {
    var input = document.getElementById('CustomerSearch').value;
    var searchResultsDiv = document.getElementById('searchResults');

    if(input.length >= 3) {
        // استخدام الـ Template Literals بشكل صحيح
        fetch(`/search?term=${input}`)
        .then(response => response.json())
        .then(data => {
            searchResultsDiv.innerHTML = '';
            searchResultsDiv.style.display = 'block';
            data.forEach(customer => {
                // تصحيح استخدام Template Literals هنا أيضًا
                searchResultsDiv.innerHTML += `<div onclick="selectCustomer(${customer.id}, '${customer.name.replace(/'/g, "\\'")}')">${customer.name}</div>`;
            });
        }).catch(error => console.error('Error:', error));
    } else {
        searchResultsDiv.style.display = 'none';
    }
}

