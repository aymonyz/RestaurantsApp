
            
@extends('layouts.master')

@section('content')
    <div class="container">
        <h2>تعديل الفرع</h2>
   
        
				<!-- row closed -->
                <div class="modal fade" id="addGroupModal" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">إضافة مجموعة جديدة</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            
                            <div class="modal-body">
                                <form id="addGroupForm" action="{{ route('groups.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="groupNameArabic">اسم المجموعة بالعربي:</label>
                                        <input type="text"  class="form-control" name="GroupNameArabic" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="groupNameEnglish">اسم المجموعة بالإنجليزي:</label>
                                        <input type="text" class="form-control" name="GroupNameEnglish" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="groupOrder">الترتيب:</label>
                                        <input type="number" class="form-control" name="Ranking" required>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="IsActive"> نشطة
                                        </label>
                                    </div>
                               
                            </div>
                            <div class="modal-footer">
                                <!-- الحقول الأخرى هنا -->
                                <button type="submit" class="btn btn-success" id="saveGroupButton">حفظ</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">إلغاء</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
    </div>
@endsection


