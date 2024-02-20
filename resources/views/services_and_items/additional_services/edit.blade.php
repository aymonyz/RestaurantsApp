<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Add Bootstrap 5.3 CSS link here -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    
    <title></title>
    <style>
    body{
        direction: rtl;
    
    }
    .form-group{
        margin-top: 1rem;
        margin-bottom: 1rem;
    }
    </style>
</head>

<body>
    <div class="container mt-5">
        @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
       @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('  تعديل خدمة إضافية') }}</div>

                    
                    <div class="card-body">
                        
                        <form id="paymentMethodForm" method="POST" action="{{route('additional_services.update',$additionalService->id)}}">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="additional_service_name" class="col-md-4 col-form-label text-md-right">{{ __(' إسم الخدمة الإضافية') }}</label>

                                <div class="col-md-6">
                                    <input id="additional_service_name" type="text" class="form-control @error('additional_service_name') is-invalid @enderror" name="additional_service_name" value="{{ old('additional_service_name') }}" required autocomplete="paymethod_arabic" autofocus>

                                    @error('additional_service_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="additional_service_price" class="col-md-4 col-form-label text-md-right">{{ __(' سعر الخدمة الإضافية') }}</label>

                                <div class="col-md-6">
                                    <input id="additional_service_price" type="number" class="form-control @error('additional_service_price') is-invalid @enderror" name="additional_service_price" value="{{ old('additional_service_price') }}" required autocomplete="additional_service_price" autofocus>

                                    @error('additional_service_price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
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
                            </div>

                            


    
</body>
</html>