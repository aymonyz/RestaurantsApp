<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>تعديل طرق الدفع</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <!-- use font-awesome -->   
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">


<style>
    body{
        direction: rtl;
    
    }
    .form-group{
        margin-top: 1rem;
        margin-bottom: 1rem;
    }

    
.switch {
position: relative;
display: inline-block;
width: 60px;
height: 34px;
}

.switch input { 
opacity: 0;
width: 0;
height: 0;
}

.slider {
position: absolute;
cursor: pointer;
top: 0;
left: 0;
right: 0;
bottom: 0;
background-color: #ccc;
-webkit-transition: .4s;
transition: .4s;
}

.slider:before {
position: absolute;
content: "";
height: 26px;
width: 26px;
left: 4px;
bottom: 4px;
background-color: white;
-webkit-transition: .4s;
transition: .4s;
}

input:checked + .slider {
background-color: #2196F3;
}

input:focus + .slider {
box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
-webkit-transform: translateX(26px);
-ms-transform: translateX(26px);
transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
border-radius: 34px;
}

.slider.round:before {
border-radius: 50%;
}

</style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('إعدادات الدفع') }}</div>

                    
                    <div class="card-body">
                        
                        <form id="paymentMethodForm" method="POST" action="{{route('payment-methods.update',$paymentMethod->id)}}">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="paymethod_arabic" class="col-md-4 col-form-label text-md-right">{{ __('اسم طريقة الدفع بالعربية') }}</label>

                                <div class="col-md-6">
                                    <input id="paymethod_arabic" type="text" class="form-control @error('paymethod_arabic') is-invalid @enderror" name="paymethod_arabic" value="{{ old('paymethod_arabic',$paymentMethod->paymethod_arabic) }}" required autocomplete="paymethod_arabic" autofocus>

                                    @error('paymethod_arabic')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="paymethod_english" class="col-md-4 col-form-label text-md-right">{{ __('اسم طريقة الدفع بالإنجليزية') }}</label>

                                <div class="col-md-6">
                                    <input id="paymethod_english" type="text" class="form-control @error('paymethod_english') is-invalid @enderror" name="paymethod_english" value="{{ old('paymethod_english',$paymentMethod->paymethod_english) }}" required autocomplete="paymethod_english" autofocus>

                                    @error('paymethod_english')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="discount_percentage" class="col-md-4 col-form-label text-md-right">{{ __('نسبة الخصم') }}</label>

                                <div class="col-md-6">
                                    <input id="discount_percentage" type="number" class="form-control @error('discount_percentage') is-invalid @enderror" name="discount_percentage" value="{{ old('discount_percentage',$paymentMethod->discount_percentage) }}" required autocomplete="discount_percentage" autofocus>

                                    @error('discount_percentage')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="total_price" class="col-md-4 col-form-label text-md-right">{{ __('إجمالي سعر العملية') }}</label>

                                <div class="col-md-6">
                                    <input id="total_price" type="number" class="form-control @error('total_price') is-invalid @enderror" name="total_price" value="{{ old('total_price',$paymentMethod->total_price) }}" required autocomplete="total_price" autofocus>

                                    @error('total_price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label id="Content1_Content2_lblStatus" class="control-label">ظهور طريقة الدفع اثناء دفع الفاتورة</label>
                                <label class="switch">
                                    <input type="checkbox" id="payment_appearance" name="payment_appearance" {{ old('payment_appearance',$paymentMethod->payment_appearance) ? 'checked' : '' }}>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                            

                            

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('حفظ') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>                
    
</body>
</html>