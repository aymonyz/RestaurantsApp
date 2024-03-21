


@extends('layouts.master')
@section('css')
<!---Internal  Prism css-->
<link href="{{URL::asset('assets/plugins/prism/prism.css')}}" rel="stylesheet">
<!--- Custom-scroll -->
<link href="{{URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							{{-- <h4 class="content-title mb-0 my-auto">إدارة المستخدمين</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/لوحة التحكم </span> --}}
                            <h4 class="content-title mb-0 my-auto">{{ __('permissions.user_management') }}</h4>

						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
						</div>
						<div class="mb-3 mb-xl-0">
							<div class="btn-group dropdown">
								<button type="button" class="btn btn-primary">14 Aug 2019</button>
								<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="sr-only">Toggle Dropdown</span>
								</button>
								<div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end">
									<a class="dropdown-item" href="#">2015</a>
									<a class="dropdown-item" href="#">2016</a>
									<a class="dropdown-item" href="#">2017</a>
									<a class="dropdown-item" href="#">2018</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عرض المستخدمين</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* @media (max-width: 768px) {
            .table-responsive {
                overflow-x: auto;
            }
            .btn {
                padding: 0.375rem 0.75rem;
                font-size: 0.875rem;
            }
        } */
        @media (max-width: 768px) {
    .btn {
        margin-bottom: 10px; /* إضافة مسافة بين الأزرار عند عرضها في سطر جديد */
    }
    .table {
        font-size: 14px; /* تصغير الخط لتحسين القراءة على الشاشات الصغيرة */
    }
}

    </style>
</head>
<body>

<div class="container mt-5">
    {{-- <h2 class="mb-4">قائمة المستخدمين</h2> --}}
    <h4 class="content-title mb-0 my-auto">{{ __('permissions.user_management') }}</h4>
    


    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">{{ __('permissions.customer_number') }}</th>
                    <th scope="col">{{ __('permissions.username') }}</th>
                    <th scope="col">{{ __('permissions.email') }}</th>
                    <th scope="col">{{ __('permissions.permissions') }}</th>
                    <th scope="col">{{ __('permissions.delete') }}</th>
                    <th scope="col">{{ __('permissions.update') }}</th>
                    
                    
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @foreach($user->permissions as $permission)
                            <button class="btn btn-sm btn-info m-1">{{__('permissions.'.$permission->name) }}</button>
                            @endforeach
                        </td>
                        <td>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('هل أنت متأكد من أنك تريد حذف هذا المستخدم؟');">{{ __('permissions.delete') }}</button>
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">{{ __('permissions.update') }}
                            
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
					</div>
							</div>
						</div>
					</div>
					<!--/div-->
				</div>
				<!-- /row -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!--Internal  Datepicker js -->

@endsection