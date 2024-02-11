@extends('layouts.master')

@section('css')
    <!-- Stylesheets -->
    <link href="{{ URL::asset('assets/plugins/morris.js/morris.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/jqvmap/jqvmap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/multislider/multislider.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        
        /* Custom styles for desktop */
        @media (min-width: 768px) {
            #cart {
                position: fixed;
                top: 219px;
                right: 259px;
                width: 209px;
                background-color: #695555;
                border: 1px solid #756e6e;
                padding: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
                z-index: 999;
            }

            #item-cards-container {
                margin-right: 320px;
            }
        }

        /* Custom styles for mobile */
        @media (max-width: 767px) {
            #cart {
                position: fixed;
                bottom: 0;
                left: 0;
                width: 100%;
                background-color: #746565;
                border: 1px solid #857c7c;
                padding: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
                z-index: 999;
            }
        }
    </style>
@endsection

@section('page-header')
    <!-- Page Header Section -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">نقاط البيع</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ إضافة فاتورة</span>
            </div>
        </div>
    </div>

    <!-- Search Customer Section -->
    <input type="text" id="CustomerSearch" placeholder="Search Customer..." onkeyup="searchCustomer()">
    <button onclick="clearCustomerSearch()">Clear</button>
    <div id="searchResults" style="position: absolute; z-index: 1000; background: rgb(248, 243, 243); width: 200px;">
        <!-- Search results will appear here -->
    </div>
    <div id="selectedCustomer">
        <!-- Selected customer information will be displayed here -->
    </div>
@endsection

@section('content')

<div class="col-sm-6 col-md-4 col-xl-3 mg-t-20">
    <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-just-me" data-toggle="modal" href="#modaldemo8">Just Me</a>
</div>
<div class="modal" id="modaldemo8">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Modal Header</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <h6>Modal Body</h6>
                <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
            </div>
            <div class="modal-footer">
                <button class="btn ripple btn-primary" type="button">Save changes</button>
                <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
            </div>
        </div>
    </div>
</div>  



<!-- زر لفتح النافذة المنبثقة -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#dialogAddCust">
    إضافة عميل جديد
</button>
<div class="modal fade" id="dialogEditCust" tabindex="-1" role="dialog" aria-labelledby="dialogEditCustLabel" aria-hidden="true">
    <!-- نموذج تحديث بيانات العميل يظهر هنا -->
</div>
<!-- عنصر في قائمة العملاء -->
<div class="customer-item">
    <!-- عرض بيانات العميل هنا -->
    <button type="button" class="btn btn-primary" onclick="showEditForm(customerId)">تعديل</button>
</div>

<!-- نافذة منبثقة تحتوي على النموذج -->

<div class="modal fade modal-overflow in" id="dialogAddCust" tabindex="-1" data-backdrop="static" data-keyboard="false" aria-hidden="false" style="display: none; margin-top: 0px;">
    <div class="modal-dialog modal-dialog modal-wide">
                    <div class="portlet box blue" id="ProcedureDiv" style="cursor: default;">
                    
    <div class="portlet-title">
        <div id="Content1_Content2_DivTitleCustAdd" class="caption">إضافة عميل جديد</div>
        <div class="tools">

        </div>
    </div>
    <div class="portlet-body form">
        <!-- BEGIN FORM-->
        <div class="form-horizontal">
            <div class="form-body">
                <div id="lblstatusCustomer" ></div>
                <div id="divCountry" class="row">
                    <div id="divCountryCust" class="col-md-4">
                              <label id="Content1_Content2_lblCountryCust">إختر الدولة</label>
                            <select id="ComboCountryCust" onclick="selectCountryCode()"  style="text-align:center;   width:100%!important;" class="form-control input-medium select2me required" data-placeholder="....">
                            </select>
                          </div>
                     <div class="col-md-4 col-sm-6">
                 <label id="Content1_Content2_lblCustBranch">الفرع</label>
                <select id="ComboCustBranch" onchange="onChangeCustBranch()" style="text-align:center;  width:100%!important; height:32px; font-size:13px"   data-placeholder="....">
                             
                   </select>
                  
            </div>
                     <div class="col-md-4 col-sm-6">
                               <label id="Content1_Content2_lblCustArea">المنطقة</label>
                             <select id="ComboCustArea"    style=" text-align:center; " class="form-control select2me required" data-placeholder="....">
                            <option value="0">.......</option>
                        </select>
                         </div>
                </div>
                 <div class="space10"></div>
                    <div class="row">
                        
                         <div class="col-md-4">
                        <div class="form-group" dir="ltr">
                           
                            <div class="col-md-12">

                                 <label id="Content1_Content2_lblMobCustAdd">رقم المحمول</label>
                               <div class="input-group">
                                   <span id="lblCodeCountry" class="input-group-addon"></span>
                                <input   type="text" id="txtMobCust" onkeyup="validateNumeric('txtMobCust')" onkeypress="ValidateNumericOnly()"  class="form-control" maxlength="11">
                                
                                 </div> 
                                   <span id="Content1_Content2_lblmobhelp" class="help-block small">عدد رقم المحمول مكون من 9 فى السعودية</span>
                            </div>
                        </div>
                    </div>  
                          <div class="col-md-4" style="direction: ltr;">
                        <div class="form-group">
                           
                            <div class="col-md-12">

                                 <label id="Content1_Content2_lblMobCustAdd2">رقم المحمول 2</label>
                                <input   type="text" id="txtMobCustAdd2" class="form-control" maxlength="15">
                            
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                           
                            <div class="col-md-12">

                                 <label id="Content1_Content2_lblNameCustAdd">إسم العميل</label>
                                <input   type="text" id="txtNameCust" class="form-control" maxlength="50">
                            
                            </div>
                        </div>
                    </div>
                        
                  
                    <!--/span-->
                </div>
                 
                
                    <div class="space10"></div>
                <div class="row">
                    <div class="col-md-3">
                           <label id="Content1_Content2_lblCustUnitNo">رقم الشقة</label>
                          <input   type="text" id="txtCustUnitNo" class="form-control" maxlength="50">
                     </div>
                      <div class="col-md-3">
                           <label id="Content1_Content2_lblCustBuildingNo">رقم العمارة</label>
                          <input   type="text" id="txtCustBuildingNo" class="form-control" maxlength="50">
                     </div>
                    <div class="col-md-6">
                        
                        <label id="Content1_Content2_lblAddressCustAdd">العنوان</label>
                        <textarea  rows="1" cols="20" id="txtAddressCust" maxlength="150" class="form-control"></textarea>
                          
                    </div>
                    
                </div>
                <div class="space10"></div>
                        <div class="row">
   
                </div>                            
                   <div class="space10"></div>
                 <div class="row">
                           <div class="col-md-4">
                              <label id="Content1_Content2_lblMobCustPL">قائمة الأسعار</label>
                            <select id="ComboPriceListCust"  style="text-align:center;  width:100%!important;" class="form-control input-medium select2me required" data-placeholder="....">
                            </select>
                          </div>
                      <div class="col-md-2">
                         <label id="Content1_Content2_lblMobCustDisc">الخصم</label>
                          <div class="input-group">
                           <input   type="number" min="0" id="txtDiscCust" class="form-control" value="0" max="100">
                               <span class="input-group-addon">%</span>
                              </div>
                           </div>
                      <div class="col-md-2">
                            <label id="Content1_Content2_lblCustFrozen">تجميد</label>
                         <br />
                          <label class="switchs">
                          <input id="RadioIsCustFrozen" type="checkbox" onchange="onCustFrozen()">
                          <span class="sliders green rounds"></span>
                        </label>
                     </div>
                      <div id="DivIsSubscribed" class="col-md-2 display-none">
                            <label id="Content1_Content2_lblSubscribedAdd">مشترك</label>
                         <br />
                          <label class="switchs">
                          <input id="RadioIsSubscribed" type="checkbox" onchange="onCustSubscribed()">
                          <span class="sliders green rounds"></span>
                        </label>
                     </div>
                      <div id="DivIsBusiness" class="col-md-2  display-none">
                            <label id="Content1_Content2_lblCustBusiness">أعمال</label>
                         <br />
                          <label class="switchs">
                          <input id="RadioIsBusiness" type="checkbox"  onchange="onCustBusiness()">
                          <span class="sliders green rounds"></span>
                        </label>
                     </div>
                    
                    
                 </div>
                <div class="space10"></div>
                 <div class="row">
                     <div class="col-md-4">
                                <label id="Content1_Content2_lblEmailCust">البريد الإلكتروني</label>
                        <input   type="text" id="txtEmailCust" class="form-control" maxlength="50">
                    </div>
                      <div class="col-md-4">
                        
                        <label id="Content1_Content2_lblCustTaxNoAdd">الرقم الضريبي</label>
                        <input  id="txtCustTaxNoAdd" maxlength="20" class="form-control" />
                          
                    </div>
                 </div>
                 <div class="space10"></div>
                <div class="row">
                    <div class="col-md-12">
                        
                        <label id="Content1_Content2_lblOtherInfoCustAdd">بيانات اخرى</label>
                        <textarea  rows="1" cols="20" id="txtOtherInfoCust" maxlength="150" class="form-control"></textarea>
                          
                    </div>
                </div>
                <hr>
                <div class="row text-center">
                    <div class="col-md-2"></div>
                      <div   style="text-align:center !important;">
                            <button id="Content1_Content2_btnCustSaveAddCredit" onclick="custSaveRecord(1,0)" class="btn green col-md-3" value="0" type="button" style="display:none; margin:3px">حفظ وإضافة رصيد</button>
 &nbsp;  &nbsp;<button id="Content1_Content2_btnCustSave" value="0" type="button" onclick="custSaveRecord(0,0)" class="btn green col-md-3" style="margin:3px">حفظ</button>
              
&nbsp; &nbsp;  <button id="Content1_Content2_btnCancel" value="0" type="button" class="btn grey col-md-2" style="margin:3px" data-dismiss="modal">رجوع</button>
</div>
                      <div class="col-md-2"></div>

                </div>

                
                </div>
            </div>
        </div>
                        </div>
                </div>
</div>
<div class="modal fade modal-overflow in" id="dialogEditCust" tabindex="-1" data-backdrop="static" data-keyboard="false" aria-hidden="false" style="display: none; margin-top: 0px;">
    <div class="modal-dialog modal-dialog modal-wide">
                        <div class="portlet box blue"   style="cursor: default;">
                                    
                        
    <div class="portlet-title">
        <div id="Content1_Content2_DivTitleCustEdit" class="caption">تحديث بيانات العميل</div>
        <div class="tools">

        </div>
    </div>
    <div class="portlet-body form">
        <!-- BEGIN FORM-->
        <div class="form-horizontal">
            <div class="form-body">
                <div id="lblstatusCustomerEdit" ></div>
                <div id="divCountryEdit" class="row">
                     <div class="col-md-2  col-xs-4">
                              <label id="Content1_Content2_lblCodeCustEdit">الكود</label>
                               <input   type="text" id="txtCodeCustEdit" class="form-control"  readonly>
                         </div>
                    <div id="divCountryCustEdit" class="col-md-3">
                              <label id="Content1_Content2_lblCountryCustEdit">إختر الدولة</label>
                            <select id="ComboCountryCustEdit"  onclick="selectCountryCodeEdit()"  style="text-align:center;  width:100%!important;" class="form-control input-medium select2me required" data-placeholder="....">
                            </select>
                          </div>
                    <div class="col-md-3 col-sm-6">
                 <label id="Content1_Content2_lblCustBranchEdit">الفرع</label>
                <select id="ComboCustBranchEdit" onchange="onChangeCustBranchEdit()" style="text-align:center;  width:100%!important; height:32px; font-size:13px"   data-placeholder="....">
                             
                   </select>
                  
            </div>
                     <div class="col-md-3 col-sm-6">
                               <label id="Content1_Content2_lblCustAreaEdit">المنطقة</label>
                             <select id="ComboCustAreaEdit"    style=" text-align:center; " class="form-control select2me required" data-placeholder="....">
                            <option value="0">.......</option>
                        </select>
                         </div>
                </div>
                <div class="space10"></div>    
                <div class="row">
                         <div class="col-md-4">
                        <div class="form-group" dir="ltr">
                            <div class="col-md-12">

                                 <label id="Content1_Content2_lblMobCustEdit">رقم المحمول</label>
                               <div class="input-group">
                                   <span id="lblCodeCountryEdit"  class="input-group-addon"></span>
                                <input   type="text" id="txtMobCustEdit" onkeyup="validateNumeric('txtMobCustEdit')" onkeypress="ValidateNumericOnly()" class="form-control" maxlength="11">
                                
                                 </div> 
                                   <span id="Content1_Content2_lblmobhelpEdit" class="help-block small">عدد رقم المحمول مكون من 9 فى السعودية</span>
                            </div>
                        </div>
                    </div>  
                       <div class="col-md-4" style="direction: ltr;">
                        <div class="form-group">
                           
                            <div class="col-md-12">

                                 <label id="Content1_Content2_lblMobCustEdit2">رقم المحمول 2</label>
                                <input   type="text" id="txtMobCustAdd2Edit" class="form-control" maxlength="15">
                            
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                           
                            <div class="col-md-12">

                                 <label id="Content1_Content2_lblNameCustEdit">إسم العميل</label>
                                <input   type="text" id="txtNameCustEdit" class="form-control" maxlength="50">
                            
                            </div>
                        </div>
                    </div>
                        
                  
                    <!--/span-->
                </div>                      
                 <div class="space10"></div>
                <div class="row">
                     <div class="col-md-3">
                           <label id="Content1_Content2_lblCustUnitNoEdit">رقم الشقة</label>
                          <input   type="text" id="txtCustUnitNoEdit" class="form-control" maxlength="50">
                     </div>
                      <div class="col-md-3">
                           <label id="Content1_Content2_lblCustBuildNo">رقم العمارة</label>
                          <input   type="text" id="txtCustBuildingNoEdit" class="form-control" maxlength="50">
                     </div>
                    <div class="col-md-6">
                        
                        <label id="Content1_Content2_lblAddressCustEdit">العنوان</label>
                        <textarea  rows="1" cols="20" id="txtAddressCustEdit" maxlength="150" class="form-control"></textarea>
                          
                    </div>
                </div>
                    <div class="space10"></div>
                 <div class="row">
                           <div class="col-md-4">
                                  <label id="Content1_Content2_lblMobCustPLEdit">قائمة الأسعار</label>
                                <select id="ComboPriceListCustEdit"  style="text-align:center;  width:100%!important;" class="form-control input-medium select2me required" data-placeholder="....">

                                    
                        </select>
                           </div>
                      <div class="col-md-2  col-xs-6">
                         <label id="Content1_Content2_lblMobCustDiscEdit">الخصم</label>
                          <div class="input-group">
                           <input   type="number" min="0" id="txtDiscCustEdit" class="form-control" value="0" max="100">
                               <span class="input-group-addon">%</span>
                              </div>
                           </div>
                     <div class="col-md-2   col-xs-6">
                            <label id="Content1_Content2_lblCustFrozenEdit">تجميد</label>
                         <br />
                          <label class="switchs">
                          <input id="RadioIsCustFrozenEdit" type="checkbox" onchange="onCustFrozenEdit()">
                          <span class="sliders green rounds"></span>
                        </label>
                     </div>
                     <div id="DivIsSubscribedEdit" class="col-md-2  col-xs-6 display-none">
                            <label id="Content1_Content2_lblSubscribedEdit">مشترك</label>
                         <br />
                          <label class="switchs">
                          <input id="RadioIsSubscribedEdit" type="checkbox" onchange="onCustSubscribedEdit()">
                          <span class="sliders green rounds"></span>
                        </label>
                     </div>
                    <div id="DivIsBusinessEdit" class="col-md-2  display-none">
                            <label id="Content1_Content2_lblBusinessEdit">أعمال</label>
                         <br />
                          <label class="switchs">
                          <input id="RadioIsBusinessEdit" type="checkbox" onchange="onCustBusinessEdit()">
                          <span class="sliders green rounds"></span>
                        </label>
                     </div>
                 </div>
                 <div class="space10"></div>
                 <div class="row">
                       <div class="col-md-4">
                                <label id="Content1_Content2_lblEmailCustEdit">البريد الإلكتروني</label>
                        <input   type="text" id="txtEmailCustEdit" class="form-control" maxlength="50">
                    </div>
                      <div class="col-md-4">
                        
                        <label id="Content1_Content2_lblCustTaxNo">الرقم الضريبي</label>
                        <input  id="txtCustTaxNo" maxlength="20" class="form-control" />
                          
                    </div>
                 </div>
                  <div class="space10"></div>
                <div class="row">
                    <div class="col-md-12">
                        
                        <label id="Content1_Content2_lblOtherInfoCustEdit">بيانات اخرى</label>
                        <textarea  rows="1" cols="20" id="txtOtherInfoCustEdit" maxlength="150" class="form-control"></textarea>
                          
                    </div>
                </div>
                <div class="space10"></div>
                <div id="DivMobAppInfo" class="row display-none">
                     <div class="col-md-4  col-xs-6">
                            <label id="Content1_Content2_lblCustAccessMobile">الدخول على التطبيق</label>
                         <br />
                          <label class="switchs">
                          <input id="RadioCustIsActive" type="checkbox" >
                          <span class="sliders green rounds"></span>
                        </label>
                     </div>
                      <div class="col-md-4  col-xs-6">
                        <div class="form-group">
                           
                            <div class="col-md-12">

                                 <label id="Content1_Content2_lblCustPassword">كلمة المرور</label>
                                <input   type="password" id="txtPassCust" class="form-control" maxlength="50">
                            
                            </div>
                        </div>
                    </div>
                   
                </div>
                <hr>
                <div class="row text-center">
                    <div class="col-md-2"></div>
                      <div  class="col-xs-12" style="text-align:center !important;">
                            <button id="Content1_Content2_btnCustSaveAddCreditEdit" onclick="custUpdateRecord(1,0)" class="btn green col-md-4" value="0" type="button" style="margin:3px; display:none;">حفظ وإضافة رصيد</button>
 &nbsp;  &nbsp;<button id="Content1_Content2_btnCustSaveEdit" value="0" type="button" onclick="custUpdateRecord(0,0)" class="btn green col-md-3 col-xs-4" style="margin:3px">تحديث</button>
              
&nbsp; &nbsp;  <button id="Content1_Content2_btnCancelEdit" value="0" type="button" class="btn grey col-md-2 col-xs-3" style="margin:3px" data-dismiss="modal">رجوع</button>
</div>
                      <div class="col-md-2"></div>

                </div>

                
                </div>
            </div>
        </div>
                        </div>
                </div>
                                            
                </div>

<!-- إضافة رسائل الخطأ هنا إذا لزم الأمر -->


    <!-- Filter Buttons -->
    <div class="row justify-content-center mt-3">
        <div class="col-12 col-md-6">
            <button class="btn btn-secondary btn-block filter-button" data-group-id="all">كل الاصناف</button>
        </div>
        @foreach($groups as $group)
            <div class="col-12 col-md-6 mt-2">
                <button class="btn btn-primary btn-block filter-button" data-group-id="{{ $group->id }}">{{ $group->GroupNameArabic }}</button>
            </div>
        @endforeach
    </div>

    <!-- Product Cards Container -->
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 mt-3" id="item-cards-container">
        @foreach($items as $item)
            <div class="col item-card" data-group-id="{{ $item->group_id }}" data-unit="{{ $item->unit }}" data-item-id="{{ $item->id }}" data-item-name="{{ $item->item_name }}" data-price="{{ $item->price }}">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->item_name }}</h5>
                        <p class="card-text">{{ $item->price }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Shopping Cart Section -->
    <div id="cart" class="mt-3">
        <h4 class="text-center mb-3">سلة المشتريات</h4>
        <ul id="cart-items"></ul>
        <div id="totalAmount">إجمالي السلة: 0 ريال</div>
        <div id="discount">الخصم: 0%</div>
        <div id="deliveryCost">تكلفة التوصيل: 0 ريال</div>
        <div id="tax">قيمة مضافة: 0 ريال</div>
        <div id="netTotal">الإجمالي الصافي: 0 ريال</div>
        <button onclick="clearCart()" class="btn btn-danger btn-block mt-3">مسح السلة</button>
        <button onclick="checkout()" class="btn btn-success btn-block">إتمام الشراء</button>
    </div>
@endsection

@section('js')
    <!-- JavaScript Section -->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery-nice-select/js/addp.js') }}"></script>
    <!-- Additional Scripts -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <script src="{{ URL::asset('assets/js/modal.js') }}"></script>
    <script src="{{URL::asset('assets/js/modal.js')}}"></script>
    <!-- Custom JavaScript -->
    <script>
        // Your custom JavaScript code here
        <script>
        // Function to show the update customer button
        function showUpdateCustomerButton() {
            $('#updateCustomerButton').show();
        }

        // Function to hide the update customer button
        function hideUpdateCustomerButton() {
            $('#updateCustomerButton').hide();
        }

        // Function to handle updating customer data
        $('#updateCustomerButton').click(function () {
            // Write code here to update customer data
            // You can use AJAX to send the updated data to the server
            // After updating, you may want to hide the button again
            hideUpdateCustomerButton();
        });

        // Function to search for a customer
        function searchCustomer() {
            var input, filter, ul, li, a, i, txtValue;
            input = document.getElementById('CustomerSearch');
            filter = input.value.toUpperCase();
            ul = document.getElementById('searchResults');
            li = ul.getElementsByTagName('li');
            ul.style.display = 'block';
            for (i = 0; i < li.length; i++) {
                a = li[i].getElementsByTagName('a')[0];
                txtValue = a.textContent || a.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = '';
                } else {
                    li[i].style.display = 'none';
                }
            }
        }

        // Function to clear the customer search results
        function clearCustomerSearch() {
            document.getElementById('searchResults').style.display = 'none';
            document.getElementById('CustomerSearch').value = '';
        }

        // Function to add item to cart
        function addItemToCart(itemId, itemName, price) {
            // Write code here to add item to cart
            // You may want to update the UI to display the added item in the cart
        }

        // Function to remove item from cart
        function removeItemFromCart(itemId) {
            // Write code here to remove item from cart
            // You may want to update the UI to remove the item from the cart
        }

        // Function to calculate total amount
        function calculateTotalAmount() {
            // Write code here to calculate the total amount in the cart
        }

        // Function to calculate discount
        function calculateDiscount() {
            // Write code here to calculate the discount based on the total amount
        }

        // Function to calculate delivery cost
        function calculateDeliveryCost() {
            // Write code here to calculate the delivery cost based on the total amount or other criteria
        }

        // Function to calculate tax
        function calculateTax() {
            // Write code here to calculate the tax based on the total amount
        }

        // Function to calculate net total
        function calculateNetTotal() {
            // Write code here to calculate the net total after applying discount, tax, and delivery cost
        }

        // Function to clear the cart
        function clearCart() {
            // Write code here to clear the cart
            // You may want to update the UI to reflect the cleared cart
        }

        // Function to handle checkout
        function checkout() {
            // Write code here to handle checkout process
            // You may want to send the cart data to the server for processing
        }

        // Filter items by group
        $('.filter-button').click(function () {
            var value = $(this).attr('data-group-id');
            if (value == 'all') {
                $('.item-card').show('1000');
            } else {
                $('.item-card').not('.' + value).hide('3000');
                $('.item-card').filter('.' + value).show('3000');
            }
        });

        // Add item to cart when clicking on a product card
        $('.item-card').click(function () {
            var itemId = $(this).attr('data-item-id');
            var itemName = $(this).attr('data-item-name');
            var price = $(this).attr('data-price');
            addItemToCart(itemId, itemName, price);
        });
    </script>
    </script>
@endsection
