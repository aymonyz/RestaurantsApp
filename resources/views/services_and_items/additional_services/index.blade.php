<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Add Bootstrap 5.3 CSS link here -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
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
                    <div class="card-header">{{ __('  الخدمات الإضافية') }}</div>

                    
                    <div class="card-body">
                        <button id="addPaymentMethodButton" class="btn btn-primary" onclick="showForm()"> إضافة الخدمةالإضافية</button>
                        <button id="showPaymentMethodsButton" class="btn btn-primary" onclick="showTable()">عرض الخدمات الإضافية</button>
                        <form id="paymentMethodForm" method="POST" action="{{route('additional_services.store')}}">
                            @csrf

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
                        <table id="paymentMethodsTable" style="display: none;margin-top:1rem;" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>{{ __('   الرقم') }}</th>
                                    <th>{{ __('  إسم الخدمةالإضافية') }}</th>
                                    <th>{{ __("تاريخ الإدخال") }}</th>
                                    <th>{{ __('تعديل') }}</th>
                                    <th>{{ __('حذف') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($additionalServices as $service)
                                <tr>
                                    <td>{{ $service->id }}</td>
                                    <td>{{ $service->additional_service_name }}</td>
                                    <td>{{ $service->created_at }}</td>
                                    <td><a href="{{ route('additional_services.edit', $service->id) }}"><i class="fas fa-edit"></i></a></td>
                                    <td>
                                        <form action="{{ route('additional_services.destroy', $service->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                                    
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>

                            <script>
                                function showForm() {
                                    document.getElementById('paymentMethodForm').style.display = 'block';
                                    document.getElementById('paymentMethodsTable').style.display = 'none';
                                }

                                function showTable() {
                                    document.getElementById('paymentMethodForm').style.display = 'none';
                                    document.getElementById('paymentMethodsTable').style.display = 'block';
                                }

                                // Show the form when the page loads
                                window.onload = showForm;
                            </script>


    
</body>
</html>