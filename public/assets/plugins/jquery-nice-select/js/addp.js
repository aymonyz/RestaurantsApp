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
