
اضافة مستخدم مع اختيار الدور له     عرض كل المستخدمين مع صلاحياتهم 
{{-- @extends('layouts.master')
@section('css')
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إدارة صلاحيات النظام</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h2 class="page-title">إدارة صلاحيات النظام</h2>

        <!-- Tabs for different sections -->
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#addPermission" data-bs-toggle="tab">اضافة صلاحية</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#viewPermissions" data-bs-toggle="tab">عرض صلاحيات النظام</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="addPermission">
                <!-- Content for Add Permission -->
				<head>
					<meta charset="UTF-8">
					<meta name="viewport" content="width=device-width, initial-scale=1.0">
					<title>إضافة صلاحية</title>
					<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
				</head>
				<body>
				<div class="container mt-4">
					<h2>إضافة صلاحية</h2>
					<form>
						<div class="form-group">
							<label for="screenType">نوع الشاشة</label>
							<select class="form-control" id="screenType">
							<option>لوحة التحكم</option>
							<option>البيانات الاساسية</option>
							<option>المبيعات</option>
							<option>المشتريات</option>
							<option>المخازن</option>
							<option>الموارد البشرية</option>
							<option>التقارير</option>
							<option>الاعدادات</option>
							<option>صلاحيات خاصة </option>

								<!-- إضافة خيارات أخرى هنا -->
							</select>
						</div>
						<div class="form-group">
							<label for="permissionName">الاسم</label>
							<input type="text" class="form-control" id="permissionName" placeholder="  ">
						</div>
						<table class="table">
							<thead>
								<tr>
									<th scope="col">الرقم</th>
									<th scope="col">الشاشة</th>
									<th scope="col">دخول</th>
									<th scope="col">انشاء جديد</th>
									<th scope="col">عرض</th>
									<th scope="col">حفظ</th>
									<th scope="col">تعديل</th>
									<th scope="col">حذف</th>
									<th scope="col">طباعة</th>
									<th scope="col">الكل</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>2</td>
									<td>إدارة المستخدمين</td>
									<td><input type="checkbox"></td>
									<td><input type="checkbox"></td>
									<td><input type="checkbox"></td>
									<td><input type="checkbox"></td>
									<td><input type="checkbox"></td>
									<td><input type="checkbox"></td>
									<td><input type="checkbox"></td>
									<td><input type="checkbox"></td>
								</tr>
								<!-- إضافة المزيد من الصفوف هنا -->
							</tbody>
						</table>
						<button type="submit" class="btn btn-primary">حفظ</button>
					</form>
				</div>
				
				<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
				<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
				</body>
            </div>
            <div class="tab-pane" id="viewPermissions">
                <!-- Content for View Permissions -->
				<head>
					<meta charset="UTF-8">
					<meta name="viewport" content="width=device-width, initial-scale=1.0">
					<title>عرض صلاحيات النظام</title>
					<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
					<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
				</head>
				<body>
				<div class="container mt-5">
					<h2 class="mb-4">عرض صلاحيات النظام</h2>
					<table class="table">
						<thead>
							<tr>
								<th scope="col">إسم الصلاحية</th>
								<th scope="col" style="width: 100px;">تعديل</th>
								<th scope="col" style="width: 100px;">حذف</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Management</td>
								<td><button class="btn btn-primary btn-sm">Edit</button></td>
								<td><button class="btn btn-danger btn-sm" onclick="confirmDelete(this)">Delete</button></td>
							</tr>
							<tr>
								<td>استقبال</td>
								<td><button class="btn btn-primary btn-sm">Edit</button></td>
								<td><button class="btn btn-danger btn-sm" onclick="confirmDelete(this)">Delete</button></td>
							</tr>
							<tr>
								<td>اكرم</td>
								<td><button class="btn btn-primary btn-sm">Edit</button></td>
								<td><button class="btn btn-danger btn-sm" onclick="confirmDelete(this)">Delete</button></td>
							</tr>
							<tr>
								<td>محاسب محدود الصلاحية</td>
								<td><button class="btn btn-primary btn-sm">Edit</button></td>
								<td><button class="btn btn-danger btn-sm" onclick="confirmDelete(this)">Delete</button></td>
							</tr>
						</tbody>
					</table>
				</div>
				
				<script>
					function confirmDelete(element) {
						if (confirm("هل تريد حقًا حذف هذه الصلاحية؟")) {
							// لوجيك حذف الصلاحية
							// يمكنك إرسال طلب للخادم هنا أو إزالة العنصر من الجدول مباشرةً
							$(element).closest('tr').remove();
						}
					}
				</script>
				
				<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
				
                <!-- Table or any other content -->
            </div>
        </div>
    </div>

    <!-- Modal Example -->
    <div class="modal fade" id="static" tabindex="-1" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <p>Would you like to continue with some arbitrary task?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Continue Task</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

		
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
@endsection --}}