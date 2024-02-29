const customerSelect = document.getElementById('customer');

customerSelect.addEventListener('keyup', (event) => {
    const searchTerm = event.target.value.toLowerCase();
    const options = customerSelect.options;
    for (let i = 0; i < options.length; i++) {
        const optionText = options[i].text.toLowerCase();
        if (optionText.includes(searchTerm)) {
            options[i].style.display = 'block';
        } else {
            options[i].style.display = 'none';
        }
    }
});

// يمكن إضافة الوظائف المتعلقة بإدارة البحث عن العملاء، مثل selectCustomer وclearCustomerSearch، إلى هذا الملف.

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

