

@extends('layouts.master')
@section('')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Empty</span>
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
				<!-- row -->
				<div class="row">
				{{-- <style>
	/* تنسيق عام لمجموعة الخيارات */

					</style>

<div class="container mt-5">
    <h2>إضافة مستخدم جديد</h2>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">اسم المستخدم</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">البريد الإلكتروني</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">كلمة المرور</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label>صلاحيات الوصول للصفحات</label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="dashboard" id="dashboard" name="pages[]">
                <label class="form-check-label" for="dashboard">
                    الرئيسية
                </label>
            </div>
			 <div class="form-check">
						<input  class="form-check-input" type="checkbox" value="Searchandquery" id="Searchandquery" name="pages[]">
						<label class="form-check-label" for="Searchandquery">
							بحث  واستعلام
						</label>
					</div> 
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="business_summary" id="business_summary" name="pages[]">
                <label class="form-check-label" for="business_summary">
                    ملخص الأعمال الذكي
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="products_services" id="products_services" name="pages[]">
                <label class="form-check-label" for="products_services">
                    الأصناف والخدمات
                </label>
            </div>
			
			<div class="form-check">
				<input class="form-check-input" type="checkbox" value="pos" id="pos" name="pages[]">
				<label class="form-check-label" for="pos">
					نقطة البيع 
				</label>
			</div>

    			<div class="form-check">
					<input class="form-check-input" type="checkbox" value="expenses" id="expenses" name="pages[]">
					<label class="form-check-label" for="expenses">
						المصروفات
						<label>
					</div>
				
					
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="reports" id="reports" name="pages[]">
						<label class="form-check-label" for="reports">
							التقارير
						</label>
					</div>
                      
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="statistics" id="statistics" name="pages[]">
						<label class="form-check-label" for="statistics">
							الإحصائيات
						</label>
					</div>
					
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="messages" id="messages" name="pages[]">
						<label class="form-check-label" for="messages">
							الرسائل
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="marketing_tools" id="marketing_tools" name="pages[]">
						<label class="form-check-label" for="marketing_tools">
							إدوات التسويق
						</label>
					</div>
						
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="settings" id="settings" name="pages[]">
						<label class="form-check-label" for="settings">
                     		الإعدادات
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="control_panel" id="control_panel" name="pages[]">
						<label class="form-check-label" for="control_panel">
							لوحة التحكم
						</label>
					</div>



						

					

            <!-- أضف المزيد من الصفحات حسب الحاجة -->
        </div>
        <button type="submit" class="btn btn-primary">إضافة</button>
    </form>
</div> --}}
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة مستخدم جديد</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">إضافة مستخدم جديد</h2>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">اسم المستخدم</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">البريد الإلكتروني</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">كلمة المرور</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label>صلاحيات الوصول للصفحات</label>
            <div class="row"> 
                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="dashboard" id="dashboard" name="pages[]">
                        <label class="form-check-label" for="dashboard"> الرئيسية </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Searchandquery" id="Searchandquery" name="pages[]">
                        <label class="form-check-label" for="Searchandquery"> بحث واستعلام </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="business_summary" id="business_summary" name="pages[]">
                        <label class="form-check-label" for="business_summary"> ملخص الأعمال الذكي </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="products_services" id="products_services" name="pages[]"> 
                        <label class="form-check-label" for="products_services"> الأصناف والخدمات </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="pos" id="pos" name="pages[]">
                        <label class="form-check-label" for="pos"> نقطة البيع </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="expenses" id="expenses" name="pages[]">
                        <label class="form-check-label" for="expenses"> المصروفات </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="reports" id="reports" name="pages[]">
                        <label class="form-check-label" for="reports"> التقارير </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="statistics" id="statistics" name="pages[]">
                        <label class="form-check-label" for="statistics"> الإحصائيات </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="messages" id="messages" name="pages[]">
                        <label class="form-check-label" for="messages"> الرسائل </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="marketing_tools" id="marketing_tools" name="pages[]">
                        <label class="form-check-label" for="marketing_tools"> أدوات التسويق </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="settings" id="settings" name="pages[]">
                        <label class="form-check-label" for="settings"> الإعدادات </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="control_panel" id="control_panel" name="pages[]">
                        <label class="form-check-label" for="control_panel"> لوحة التحكم </label>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">إضافة</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->

</body>
@endsection
@section('')
@endsection

