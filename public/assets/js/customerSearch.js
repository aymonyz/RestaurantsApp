document.addEventListener('DOMContentLoaded', function() {
    var customerSelect = document.getElementById('customer');
    if (customerSelect) {
        var originalOptions = [...customerSelect.options]; // Clone original options

        customerSelect.insertAdjacentHTML('afterend', '<input type="text" id="customerSearch" placeholder="Search customers...">');
        var searchInput = document.getElementById('customerSearch');

        searchInput.addEventListener('keyup', function(event) {
            const searchTerm = event.target.value.toLowerCase();
            customerSelect.innerHTML = ''; // Clear current options
            originalOptions.forEach(function(option) {
                if (option.text.toLowerCase().includes(searchTerm)) {
                    customerSelect.appendChild(option.cloneNode(true)); // Append only matching options
                }
            });
        });
    }
});


function selectCustomer(customerId, customerName) {
    var customerSearchInput = document.getElementById('CustomerSearch');
    var selectedCustomerIdInput = document.getElementById('selectedCustomerId');
    var searchResultsDiv = document.getElementById('searchResults');

    if (customerSearchInput && selectedCustomerIdInput && searchResultsDiv) {
        customerSearchInput.value = customerName; 
        selectedCustomerIdInput.value = customerId; 
        searchResultsDiv.style.display = 'none';
    }
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

    if (input.length >= 3) {
        fetch(`/search?term=${input}`)
            .then(response => response.json())
            .then(data => {
                searchResultsDiv.innerHTML = '';
                searchResultsDiv.style.display = 'block';
                data.forEach(customer => {
                    searchResultsDiv.innerHTML += `<div onclick="selectCustomer(${customer.id}, '${customer.name.replace(/'/g, "\\'")}')">${customer.name}</div>`;
                });
            }).catch(error => console.error('Error:', error));
    } else {
        searchResultsDiv.style.display = 'none';
    }
}
