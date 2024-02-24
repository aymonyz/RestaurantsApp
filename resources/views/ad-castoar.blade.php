
    <!-- البوابة المودال لإضافة العميل -->
<div class="modal fade" id="addClientModal" tabindex="-1" role="dialog" aria-labelledby="addClientModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addClientModalLabel">إضافة عميل جديد</h5>
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
                                @foreach($branches as $branch)
                                    <option value="{{ $branch->id }}">{{ $branch->name_ar }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="area">المنطقة:</label>
                            <select id="area" name="area" class="form-control">
                                @foreach($branches as $branch)
                                    <option value="{{ $branch->id }}">{{ $branch->address }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="phone">رقم الهاتف:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="رقم الهاتف" maxlength="10" pattern="[0-9]{10}" title="يرجى إدخال رقم هاتف صحيح (10 أرقام)">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fas fa-phone"></i>
                                    </span>
                                </div>
                            </div>
                            <span id="Content1_Content2_lblmobhelp" class="help-block small">عدد رقم المحمول مكون من 9 فى السعودية</span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone2">رقم الهاتف 2:</label>
                            <input type="text" class="form-control" id="phone2" name="phone2" placeholder="رقم الهاتف 2" pattern="[0-9]{10}" title="يرجى إدخال رقم هاتف صحيح (10 أرقام)">
                        </div>
                    </div>
                    <!-- متابعة باقي الحقول والأزرار -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="txtNameCust">إسم العميل:</label>
                            <input type="text" id="txtNameCust" class="form-control" maxlength="50">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="txtCustUnitNo">رقم الشقة:</label>
                            <input type="text" id="txtCustUnitNo" class="form-control" maxlength="50">
                        </div>
                    </div> <!-- نهاية الصف -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="txtCustBuildingNo">رقم العمارة:</label>
                            <input type="text" id="txtCustBuildingNo" class="form-control" maxlength="50">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="txtAddressCust">العنوان:</label>
                            <textarea rows="1" cols="20" id="txtAddressCust" maxlength="150" class="form-control"></textarea>
                        </div>
                    </div> <!-- نهاية الصف -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="txtDiscCust">الخصم:</label>
                            <div class="input-group">
                                <input type="number" min="0" id="txtDiscCust" class="form-control" value="0" max="100">
                            
                                <span class="input-group-text">
                                    
                                    <i class="fas fa-%">%</i>
                                    
                                </span>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="txtEmailCust">البريد الإلكتروني:</label>
                            <input type="text" id="txtEmailCust" class="form-control" maxlength="50">
                        </div>
                    </div> <!-- نهاية الصف -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="txtCustTaxNoAdd">الرقم الضريبي:</label>
                            <input id="txtCustTaxNoAdd" maxlength="20" class="form-control" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="txtOtherInfoCust">بيانات اخرى:</label>
                            <textarea rows="1" cols="20" id="txtOtherInfoCust" maxlength="150" class="form-control"></textarea>
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
    
        document.getElementById('txtNameCust').value = phoneValue;
    });
</script>
