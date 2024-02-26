
    <!-- البوابة المودال لإضافة العميل -->
    @php
    $branches = App\Models\Branches::all();
    $branchData = App\Models\Branch_data::all();
    @endphp
<div class="modal fade" id="addClientModal" tabindex="-1" role="dialog" aria-labelledby="addClientModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addClientModalLabel">إضافة عميل جديد</h5>
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('customer.store') }}"> <!-- Make sure to use the correct route -->
                    @csrf <!-- إضافة رمز CSRF لحماية النموذج -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="branch">الفرع:</label>
                            <select id="branch" name="branch" class="form-control">
                                @foreach($branchData as $branch)
                                    <option value="{{ $branch->name_ar }}">{{ $branch->name_ar }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="area">المنطقة:</label>
                            <select id="area" name="country" class="form-control">
                                @foreach($branches as $branch)
                                    <option value="{{ $branch->name }}">{{ $branch->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="phone">رقم الهاتف:</label>
                            <div class="input-group">
                            <input type="tel" class="form-control" id="mobileNumber" name="mobileNumber" required pattern="\d{9}" maxlength="9" title="رقم الهاتف يجب أن يكون عبارة عن 9 أرقام.">
                            <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fas fa-phone"></i>
                                    </span>
                                </div>
                            </div>
                            <span id="Content1_Content2_lblmobhelp" class="help-block small">عدد رقم المحمول مكون من 9 فى السعودية</span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="mobileNumber2">رقم الهاتف 2:</label>
                            <input type="text" class="form-control" id="mobileNumber2" name="mobileNumber2" maxlength="9"  title="يرجى إدخال رقم هاتف صحيح (10 أرقام)" >
                        </div>
                    </div>
                    <!-- متابعة باقي الحقول والأزرار -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="txtNameCust">إسم العميل:</label>
                            <input type="text" name="name" class="form-control" maxlength="50">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="txtCustUnitNo">رقم الشقة:</label>
                            <input type="text" name="apartmentNumber" class="form-control" maxlength="50">
                        </div>
                    </div> <!-- نهاية الصف -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="txtCustBuildingNo">رقم العمارة:</label>
                            <input type="text" name="buildingNumber" class="form-control" maxlength="50">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="txtAddressCust">العنوان:</label>
                            <textarea rows="1" cols="20" name="address" maxlength="150" class="form-control"></textarea>
                        </div>
                    </div> <!-- نهاية الصف -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="txtDiscCust">الخصم:</label>
                            <div class="input-group">
                                <input type="number" min="0" name="discount" class="form-control" value="0" max="100">
                            
                                <span class="input-group-text">
                                    
                                    <i class="fas fa-%">%</i>
                                    
                                </span>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="txtEmailCust">البريد الإلكتروني:</label>
                            <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" name="email" required value="{{ old('email') }}">
                        </div>
                    </div> <!-- نهاية الصف -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="txtCustTaxNoAdd">الرقم الضريبي:</label>
                            <input name="taxNumber" maxlength="20" class="form-control" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="txtOtherInfoCust">بيانات اخرى:</label>
                            <textarea rows="1" cols="20" name="otherData" maxlength="150" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">حفظ</button>

                    </div> <!-- نهاية الصف -->
                    
                    
                    
                    
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    
    document.getElementById('phone').addEventListener('input', function() {
    
        var phoneValue = this.value;
    
        document.getElementById('name').value = phoneValue;
    });
</script>
