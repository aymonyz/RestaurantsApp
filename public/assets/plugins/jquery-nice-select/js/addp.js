<<<<<<< HEAD
=======
// (function($) {
//     "use strict";

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
                const itemNameElement = this.querySelector('.card-title');
                const itemPriceElement = this.querySelector('.card-link');

                if (itemNameElement && itemPriceElement) {
                    const itemName = itemNameElement.textContent;
                    const itemPrice = itemPriceElement.textContent;
                    addItemToCart(itemName, itemPrice);
                } else {
                    console.error('يجب اختيار العميل أولاً');
                }
            });
        });
    });
//تم تعديل الكود ليعمل بدون جيكويري
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

// })(jQuery);

>>>>>>> f73429282fad574d772cadeb66925181110c5463
