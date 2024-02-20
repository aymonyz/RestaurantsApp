<?php
$images = [
    ['id' => 1, 'src' => '/Images/Items images/carpet_round.png', 'description_arabic' => 'سجاد دائري','description_english' => 'Carpet round'],
    ['id' => 2, 'src' => '/Images/Items images/carpet_roll_red.png', 'description_arabic' => 'سجاد','description_english' => 'Carpet'],
    ['id' => 3, 'src' => '/Images/Items images/carpet_roll_green.png', 'description_arabic' => 'سجاد','description_english' => 'Carpet'],
    ['id' => 4, 'src' => '/Images/Items images/carpet_red.png', 'description_arabic' => 'سجاد مستطيل','description_english' => 'Red carpet'],
    ['id' => 5, 'src' => '/Images/Items images/carpet_fur.png', 'description_arabic' => 'موكيت فرو','description_english' => 'Fur carpet'],
    ['id' => 6, 'src' => '/Images/Items images/blanket_big.png', 'description_arabic' => 'بطانية كبيرة','description_english' => 'Big blanket'],
    ['id' => 7, 'src' => '/Images/Items images/couche_three.png', 'description_arabic' => 'غطاء كنبة ثلاثي','description_english' => 'Couche three'],
    ['id' => 8, 'src' => '/Images/Items images/curtain_big.png', 'description_arabic' => 'ستائر كبيرة','description_english' => 'Big curtains'],
    ['id' => 9, 'src' => '/Images/Items images/curtain_small.png', 'description_arabic' => 'ستائر صغيرة','description_english' => 'Small curtains'],
    ['id' => 10, 'src' => '/Images/Items images/jacket_men.png', 'description_arabic' => 'جاكت رجالي','description_english' => "Men's jacket"],
    ['id' => 11, 'src' => '/Images/Items images/kees_makhada2.png', 'description_arabic' => 'hello','description_english' => 'hello'],
    ['id' => 12, 'src' => '/Images/Items images/leather_sofa_single.png', 'description_arabic' => 'كنب جلد فردي','description_english' => 'leather sofa single'],
    ['id' => 13, 'src' => '/Images/Items images/Mattress.png', 'description_arabic' => 'مرتبة سرير','description_english' => 'Mattress'],
    ['id' => 14, 'src' => '/Images/Items images/pillow_case_big.png', 'description_arabic' => 'غطاء مخدة كبير','description_english' => 'Big pillow case'],
    ['id' => 15, 'src' => '/Images/Items images/Pillows.png', 'description_arabic' => 'وسادة','description_english' => 'Pillows'],
    ['id' => 16, 'src' => '/Images/Items images/Pillows_kids.png', 'description_arabic' => 'وسادة أطفال','description_english' => "kid's Pillows"],
    ['id' => 17, 'src' => '/Images/Items images/prayer_blue.png', 'description_arabic' => 'سجادة صلاة','description_english' => "prayer's carpet"],
    ['id' => 18, 'src' => '/Images/Items images/scalp_car.png', 'description_arabic' =>'فروة مقاعد السيارة','description_english' => "car's scalp"],
    ['id' => 19, 'src' => '/Images/Items images/table_cover6.png', 'description_arabic' => 'مفرش طاولة','description_english' => 'table cover'],
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>معرض الصور</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .container {
            direction: rtl;
            width: 80%;
            margin: 0 auto;
        }

        .image-container {
            margin-bottom: 20px;
        }

        .card {
            width: 100%;
            border: none;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            cursor: pointer;
        }

        .card:hover {
            transform: translateY(-5px);
        }

       
        img {
                width:50%;
                height: 50%;
            }

        .card-body {
            padding: 10px;
        }

        .card-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .card-text {
            font-size: 14px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h3 class="text-center mt-4">اختر صورة لهذا الصنف</h3>
        <div class="row">
            @foreach($images as $image)
                <div class="col-md-4 image-container">
                    <!-- Use a form for each image card -->
                    <form method="POST" action="{{ route('updateImage', ['item' => $item]) }}">
                        @csrf
                        <input type="hidden" name="src" value="{{ $image['src'] }}">
                        <input type="hidden" name="description_arabic" value="{{ $image['description_arabic'] }}">
                        <input type="hidden" name="description_english" value="{{ $image['description_english'] }}">
                        <input type="hidden" name="item_id" value="{{ $item }}"> <!-- Add this line -->

                        <div class="card" onclick="submitForm(this)" style="margin-top: 20px; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <img src="{{ asset($image['src']) }}" style="width:50%; height: 50%;" alt="{{ $image['description_english'] }}">
                            <div class="card-body" style="text-align: center;">
                                <h5 class="card-title">{{ $image['description_english'] }}</h5>
                                <p class="card-text">{{ $image['description_arabic'] }}</p>
                            </div>
                        </div>
                    </form>
                </div>
            @endforeach
        </div>
        </div>
       

        
    

    <!-- Include Bootstrap JS and Popper.js if needed -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function submitForm(element) {
            // Submit the parent form when the card is clicked
            element.closest('form').submit();
        }
    </script>
</body>
</html>

