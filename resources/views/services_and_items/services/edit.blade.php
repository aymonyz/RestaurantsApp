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
                    <div class="card-header">{{ __("تعديل خدمة") }}</div>

                    
                    <div class="card-body">
                        
                        <form id="paymentMethodForm" method="POST" action="{{route('services.update',$service->id)}}">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="service_arabic" class="col-md-4 col-form-label text-md-right">{{ __('إسم الخدمة بالعربية') }}</label>

                                <div class="col-md-6">
                                    <input id="service_arabic" type="text" class="form-control @error('service_arabic') is-invalid @enderror" name="service_arabic" value="{{ old('service_arabic',$service->service_arabic) }}" required autocomplete="paymethod_arabic" autofocus>

                                    @error('service_arabic')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="service_english" class="col-md-4 col-form-label text-md-right">{{ __('إسم الخدمة بالإنجليزية') }}</label>

                                <div class="col-md-6">
                                    <input id="service_english" type="text" class="form-control @error('service_english') is-invalid @enderror" name="service_english" value="{{ old('service_english',$service->service_english) }}" required autocomplete="service_english" autofocus>

                                    @error('service_english')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            
                            <div class="form-group row">
                                <label for="abbreviated_name" class="col-md-4 col-form-label text-md-right">{{ __('الإسم المختصر') }}</label>

                                <div class="col-md-6">
                                    <input id="abbreviated_name" type="text" class="form-control @error('abbreviated_name') is-invalid @enderror" name="abbreviated_name" value="{{ old('abbreviated_name',$service->abbreviated_name) }}" required autocomplete="abbreviated_name" autofocus>

                                    @error('abbreviated_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>    
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label id="is_active" class="control-label">الحالة</label>
                                        <label class="switch">
                                            <input type="checkbox" id="is_active" name="is_active" {{ old('is_active', $service->is_active) ? 'checked' : '' }} value="{{ old('is_active', $service->is_active) }}">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
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