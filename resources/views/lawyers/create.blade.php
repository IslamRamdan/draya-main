@extends('adminlte::page')

@section('content_header')
    <h1 class="text-bold">إضافة محامي جديد</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card shadow-sm border-0" style="border-radius: 12px;">
                <div class="card-body p-4">
                    <form action="{{ route('lawyers.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- اسم المحامي --}}
                        <div class="form-group mb-4">
                            <label class="form-label font-weight-bold">اسم المحامي</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white border-right-0"><i
                                            class="fas fa-user text-muted"></i></span>
                                </div>
                                <input type="text" name="name" class="form-control border-left-0 shadow-none"
                                    placeholder="أدخل الاسم بالكامل" required>
                            </div>
                        </div>

                        {{-- الوصف --}}
                        <div class="form-group mb-4">
                            <label class="form-label font-weight-bold">الوصف التعريفي</label>
                            <textarea name="description" class="form-control shadow-none" rows="4"
                                placeholder="اكتب نبذة مختصرة عن المحامي..." style="border-radius: 8px;"></textarea>
                        </div>

                        {{-- الصورة --}}
                        <div class="form-group mb-4">
                            <label class="form-label font-weight-bold">الصورة الشخصية</label>
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile" data-browse="استعراض">اختر ملف
                                    الصورة</label>
                            </div>
                            <small class="text-muted mt-1"><i class="fas fa-info-circle"></i> يفضل استخدام صور عالية الجودة
                                بأبعاد مربعة.</small>
                        </div>

                        <hr class="my-4">

                        {{-- أزرار التحكم --}}
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ url()->previous() }}" class="btn btn-light px-4 mx-2 border"
                                style="border-radius: 6px;">إلغاء</a>
                            <button type="submit" class="btn btn-dark px-5 shadow-sm" style="border-radius: 6px;">
                                <i class="fas fa-save mr-1"></i> حفظ البيانات
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- سكريبت بسيط لجعل اسم الملف يظهر عند اختياره --}}
@section('js')
    <script>
        document.querySelector('.custom-file-input').addEventListener('change', function(e) {
            var fileName = document.getElementById("customFile").files[0].name;
            var nextSibling = e.target.nextElementSibling
            nextSibling.innerText = fileName
        })
    </script>
@endsection

<style>
    .form-control:focus {
        border-color: #343a40;
        box-shadow: none;
    }

    .input-group-text {
        border-radius: 8px 0 0 8px;
    }

    .form-control {
        border-radius: 8px;
    }

    .custom-file-label {
        border-radius: 8px;
    }
</style>
@endsection
