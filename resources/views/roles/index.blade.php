@extends('layouts.master')

@section('css')
<!---Internal  Prism css-->
<link href="{{ URL::asset('assets/plugins/prism/prism.css') }}" rel="stylesheet">
<!--- Custom-scroll -->
<link href="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css') }}" rel="stylesheet">
@endsection

@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">{{ __('pages.title') }}</h4>
            <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('pages.sub_title') }}</span>
        </div>
    </div>
    <div class="d-flex my-xl-auto right-content">
        <button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
        <button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
        <button type="button" class="btn btn-warning btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
        <div class="btn-group dropdown">
            <button type="button" class="btn btn-primary">{{ __('pages.date') }}</button>
            <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate" x-placement="bottom-end">
                <a class="dropdown-item" href="#">2015</a>
                <a class="dropdown-item" href="#">2016</a>
                <a class="dropdown-item" href="#">2017</a>
                <a class="dropdown-item" href="#">2018</a>
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
    
</head>
<style>
body {
    background-color: #f4f7fc;
    font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
}

.card {
    border: none;
    border-radius: 15px;
}

.card-header {
    background-color: #007bff;
    color: rgb(111, 196, 230);
    border-bottom: none;
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
}

.btn-success {
    background-color: #28a745;
    border: none;
    box-shadow: 0 4px 8px rgba(0, 123, 255, 0.2);
}

.btn-lg {
    padding: 0.75rem 1.25rem;
    font-size: 1.2rem;
}

.form-control {
    border-radius: 10px;
}

.form-label {
    margin-bottom: 0.5rem;
    font-weight: 600;
}
.form-check-label {
    margin-left: 9.5rem; /* أو استخدم قيمة أكبر لمزيد من التباعد */
}

/* أو استخدام الحشو للتأثير نفسه */
.form-check-input {
    margin-right: 15.5rem; /* يضيف حشوًا إلى اليمين من صندوق الاختيار */
}
/* إخفاء الزر الثاني باستخدام CSS */
.zr-extra-button {
  display: none;
}

</style>
<body>
    <div class="widget Translate" data-version="1" id="Translate1">
        <h2 class="title">Translate</h2>
        <div id="google_translate_element"><div class="skiptranslate goog-te-gadget" dir="rtl" style="">
            <div id=":0.targetLanguage" style="display: inline;">
                <select class="goog-te-combo" aria-label="أداة ترجمة اللغة" fdprocessedid="holii">
                    <option value="">اختيار ال5لغة</option><option value="is">الآيسلندية</option>
                    <option value="az">الأذرية</option><option value="ur">الأردية</option>
                    <option value="hy">الأرمنية</option><option value="as">الأسامية</option>
                    <option value="es">الإسبانية</><option value="eo">الإسبرانتو</option>
                    <option value="et">الإستونية</option><option value="af">الأفريقانية</option>
                    <option value="sq">الألبانية</option><option value="de">الألمانية</option>
                    <option value="am">الأمهرية</option><option value="en">الإنجليزية</option>
                    <option value="id">الإندونيسية</option><option value="or">الأوديا (الأوريا)</option>
                    <option value="om">الأورومية</option><option value="uz">الأوزبكية</option>
                    <option value="uk">الأوكرانية</option><option value="ug">الأويغورية</option>
                    <option value="ga">الأيرلندية</option><option value="it">الإيطالية</option>
                    <option value="ig">الإيغبو</option><option value="ilo">الإيلوكانو</option>
                    <option value="ay">الأيمارا</option><option value="ee">الإيوي</option>
                    <option value="eu">الباسكية</option><option value="ps">الباشتوية</option>
                    <option value="bm">البامبارا</option><option value="pt">البرتغالية</option>
                    <option value="bg">البلغارية</option><option value="pa">البنجابية</option>
                    <option value="bn">البنغالية</option><option value="bho">البوجبورية</option>
                    <option value="my">البورمية</option><option value="bs">البوسنية</option>
                    <option value="pl">البولندية</option><option value="be">البيلاروسية</option>
                    <option value="ta">التاميلية</option><option value="th">التايلاندية</option>
                    <option value="tt">التتارية</option><option value="tk">التركمانية</option>
                    <option value="tr">التركية</option><option value="ts">التسونغا</option>
                    <option value="cs">التشيكية</option><option value="ti">التيغرينية</option>
                    <option value="te">التيلوغوية</option><option value="gl">الجاليكية</option>
                    <option value="jw">الجاوية</option><option value="gn">الجورانية</option>
                    <option value="ka">الجورجية</option><option value="km">الخميرية</option>
                    <option value="xh">الخوسا</option><option value="da">الدانمركية</option>
                    <option value="doi">الدوغرية</option><option value="dv">الديفهية</option>
                    <option value="ru">الروسية</option><option value="ro">الرومانية</option>
                    <option value="zu">الزولو</option><option value="sm">الساموانية</option>
                    <option value="su">الساندينيزية</option><option value="nso">السبيدية</option>
                    <option value="sk">السلوفاكية</option><option value="sl">السلوفينية</option>
                    <option value="sd">السندية</option><option value="sa">السنسكريتية</option>
                    <option value="si">السنهالية</option><option value="sw">السواحيلية</option>
                    <option value="sv">السويدية</option><option value="ceb">السيبيوانية</option>
                    <option value="st">السيسوتو</option><option value="sn">الشونا</option>
                    <option value="sr">الصربية</option><option value="so">الصومالية</option>
                    <option value="zh-TW">الصينية (التقليدية)</option>
                    <option value="zh-CN">الصينية (المبسطة)</option>
                    <option value="tg">الطاجيكية</option>
                    <option value="iw">العبرية</option>
                    <option value="gu">الغوجاراتية</option>
                    <option value="gd">الغيلية الأسكتلندية</option>
                    <option value="fa">الفارسية</option><option value="fr">الفرنسية</option>
                    <option value="fy">الفريزية</option><option value="tl">الفلبينية</option>
                    <option value="fi">الفنلندية</option><option value="vi">الفيتنامية</option>
                    <option value="ca">القطلونية</option><option value="ky">القيرغيزية</option>
                    <option value="kk">الكازاخية</option><option value="ckb">الكردية (السورانية)</option>
                    <option value="ku">الكردية (الكرمانجية)</option><option value="hr">الكرواتية</option>
                    <option value="kn">الكنادية</option><option value="co">الكورسيكية</option>
                    <option value="ko">الكورية</option><option value="gom">الكونكانية</option>
                    <option value="qu">الكيتشوا</option><option value="rw">الكينيارواندية</option>
                    <option value="lv">اللاتفية</option><option value="la">اللاتينية</option>
                    <option value="lo">اللاوو</option><option value="ht">اللغة الكريولية الهايتية</option>
                    <option value="lg">اللوغندية</option><option value="lb">اللوكسمبورغية</option>
                    <option value="lt">الليتوانية</option><option value="ln">اللينغالا</option>
                    <option value="mr">الماراثية</option><option value="ml">المالايالامية</option>
                    <option value="mt">المالطيّة</option><option value="mi">الماورية</option>
                    <option value="mai">المايثيلية</option><option value="mg">المدغشقرية</option>
                    <option value="mk">المقدونية</option><option value="ms">الملايو</option>
                    <option value="mn">المنغولية</option><option value="mni-Mtei">الميتية (المانيبورية)</option>
                    <option value="lus">الميزو</option><option value="no">النرويجية</option>
                    <option value="ne">النيبالية</option><option value="hmn">الهمونجية</option>
                    <option value="hi">الهندية</option><option value="hu">الهنغارية</option>
                    <option value="ha">الهوسا</option><option value="nl">الهولندية</option>
                    <option value="cy">الويلزية</option><option value="ja">اليابانية</option>
                    <option value="yo">اليورباية</option><option value="el">اليونانية</option>
                    <option value="yi">الييدية</option><option value="ny">تشيتشوا</option>
                    <option value="ak">توي</option><option value="kri">كريو</option>
                    <option value="haw">لغة هاواي</option></select>
                </div>&nbsp;&nbsp;تدعمه <span style="white-space:nowrap">
                <a class="VIpgJd-ZVi9od-l4eHX-hSRGPd" href="https://translate.google.com" target="_blank">
                <img src="https://www.gstatic.com/images/branding/googlelogo/1x/googlelogo_color_42x16dp.png" width="37px" height="14px" style="padding-right: 3px" alt="Google ترجمة">ت888رجمة</a></span>
                </div></div>
        <script>
            function googleTranslateElementInit() {
              new google.translate.TranslateElement({
                pageLanguage: 'ar',
                autoDisplay: 'true',
                layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL
              }, 'google_translate_element');
            }
          </script>
        <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        <div class="clear"></div>
        </div>
<div class="container mt-5">
   
    <h2>{{ __('permissions.add_new_user') }}</h2>

    

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">{{ __('permissions.username') }}</label>
            
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">{{ __('permissions.email') }}</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">{{ __('permissions.password') }}</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label>{{ __('permissions.access_permissions') }}</label>
            <div class="row"> 
                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="dashboard" id="dashboard" name="pages[]">
                        <label class="form-check-label" for="dashboard"> {{ __('permissions.home') }} </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Searchandquery" id="Searchandquery" name="pages[]">
                        <label class="form-check-label" for="Searchandquery">  {{ __('permissions.search_and_query') }} </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="business_summary" id="business_summary" name="pages[]">
                        <label class="form-check-label" for="business_summary"> {{ __('permissions.smart_business_summary') }} </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="products_services" id="products_services" name="pages[]"> 
                        <label class="form-check-label" for="products_services"> {{ __('permissions.products_and_services') }}  </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="pos" id="pos" name="pages[]">
                        <label class="form-check-label" for="pos"> {{ __('permissions.point_of_sale') }}   </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="expenses" id="expenses" name="pages[]">
                        <label class="form-check-label" for="expenses"> {{ __('permissions.expenses') }}  </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="reports" id="reports" name="pages[]">
                        <label class="form-check-label" for="reports"> {{ __('permissions.reports') }}  </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="statistics" id="statistics" name="pages[]">
                        <label class="form-check-label" for="statistics"> {{ __('permissions.statistics') }}  </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="messages" id="messages" name="pages[]">
                        <label class="form-check-label" for="messages"> {{ __('permissions.messages') }}  </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="marketing_tools" id="marketing_tools" name="pages[]">
                        <label class="form-check-label" for="marketing_tools"> {{ __('permissions.marketing_tools') }} </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="settings" id="settings" name="pages[]">
                        <label class="form-check-label" for="settings"> {{ __('permissions.settings') }}  </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="control_panel" id="control_panel" name="pages[]">
                        <label class="form-check-label" for="control_panel"> {{ __('permissions.control_panel') }} </label>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">{{ __('permissions.add') }}</button>
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

