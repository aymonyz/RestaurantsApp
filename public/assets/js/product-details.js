document.addEventListener("DOMContentLoaded", function() {
    const itemsButton = document.getElementsByClassName("items-button")[0];
    const formContainer = document.getElementsByClassName("form-container")[0];
    const itemsPricesbutton = document.getElementsByClassName("prices-button")[0];
    const itemsPricescontainer = document.getElementsByClassName("items-prices-container")[0];
    const goBackone = document.getElementsByClassName("go-back-one");
    const goBacktwo = document.getElementsByClassName("go-back-two");




    itemsButton.addEventListener("click", function(e) {
        formContainer.style.display = "block";
    });
    goBackone.addEventListener("click", function(e) {
        formContainer.style.display = "none";
    });

    
    itemsPricesbutton.addEventListener("click", function(e) {
        itemsPricescontainer.style.display = "block";
    });
    goBacktwo.addEventListener("click", function(e) {
        itemsPricescontainer.style.display = "none";
    });
});

document.addEventListener("DOMContentLoaded", function() {
    const itemsButton = document.getElementsByClassName("items-button")[0];
    const formContainer = document.getElementsByClassName("form-container")[0];
    const pricesButton = document.getElementsByClassName("prices-button")[0];
    const pricesContainer = document.getElementsByClassName("items-prices-container")[0];
    const goBackOne = document.getElementsByClassName("go-back-one")[0]; // تأكد من تحديد العنصر الصحيح
    const goBackTwo = document.getElementsByClassName("go-back-two")[0]; // تأكد من تحديد العنصر الصحيح

    // إخفاء كلا القسمين عند تحميل الصفحة
    formContainer.style.display = "none";
    pricesContainer.style.display = "none";

    itemsButton.addEventListener("click", function() {
        formContainer.style.display = "block"; // عرض الأصناف
        pricesContainer.style.display = "none"; // إخفاء أسعار الأصناف
    });

    pricesButton.addEventListener("click", function() {
        pricesContainer.style.display = "block"; // عرض أسعار الأصناف
        formContainer.style.display = "none"; // إخفاء الأصناف
    });

    // اختياري: إذا كانت هناك أزرار للعودة، يمكن تعيين وظائف لها هنا
    goBackOne.addEventListener("click", function() {
        formContainer.style.display = "none";
    });

    goBackTwo.addEventListener("click", function() {
        pricesContainer.style.display = "none";
    });
});