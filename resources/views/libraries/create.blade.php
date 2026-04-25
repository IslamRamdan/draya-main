@extends('adminlte::page')

@section('title', 'إضافة عنصر للمكتبة')

@section('content_header')
    <h1 class="text-bold text-dark">إضافة محتوى جديد للمكتبة</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-9 mx-auto">
            <div class="card shadow-sm border-0" style="border-radius: 12px;">
                <div class="card-body p-4">
                    <form action="{{ route('libraries.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            {{-- العنوان --}}
                            <div class="col-md-7">
                                <div class="form-group mb-4">
                                    <label class="font-weight-bold">العنوان</label>
                                    <input type="text" name="title" class="form-control shadow-none border-faded"
                                        placeholder="مثلاً: مذكرة دفاع في قضية..." required
                                        style="height: 45px; border-radius: 8px;">
                                </div>
                            </div>

                            {{-- نوع القضية --}}
                            <div class="col-md-5">
                                <div class="form-group mb-4">
                                    <label class="font-weight-bold">نوع المحتوى</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white border-right-0"><i
                                                    class="fas fa-tag text-muted"></i></span>
                                        </div>
                                        <input type="text" name="case_type"
                                            class="form-control border-left-0 shadow-none" placeholder="جنائي، مدني..."
                                            style="height: 45px; border-radius: 0 8px 8px 0;">
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- الوصف --}}
                        <div class="form-group mb-4">
                            <label class="font-weight-bold">الوصف التفصيلي</label>
                            <textarea name="description" class="form-control shadow-none" rows="5" placeholder="اكتب تفاصيل المحتوى هنا..."
                                style="border-radius: 8px; resize: none;"></textarea>
                        </div>

                        {{-- رفع الصورة --}}
                        <div class="form-group mb-4">
                            <label class="font-weight-bold">صورة الغلاف (اختياري)</label>
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" id="libFile">
                                <label class="custom-file-label text-left" for="libFile" data-browse="استعراض">اختر ملف
                                    الصورة...</label>
                            </div>
                            <small class="text-muted mt-2 d-block"><i class="fas fa-cloud-upload-alt mr-1"></i> يمكنك رفع
                                ملفات بصيغة JPG, PNG.</small>
                        </div>

                        <div class="mt-5 d-flex justify-content-end border-top pt-4">
                            <a href="{{ route('libraries.index') }}" class="btn btn-light px-4 mx-2"
                                style="border-radius: 6px; border: 1px solid #ddd;">إلغاء</a>
                            <button type="submit" class="btn btn-dark px-5 shadow-sm" style="border-radius: 6px;">
                                <i class="fas fa-check-circle mr-1"></i> تأكيد الحفظ
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@section('js')
    <script>
        // تحديث اسم الملف عند الاختيار
        document.querySelector('.custom-file-input').addEventListener('change', function(e) {
            var fileName = e.target.files[0].name;
            var nextSibling = e.target.nextElementSibling;
            nextSibling.innerText = fileName;
        });
    </script>
@endsection

<style>
    .border-faded {
        border: 1px solid #ced4da;
    }

    .form-control:focus {
        border-color: #212529;
        box-shadow: none;
    }

    .input-group-text {
        border-color: #ced4da;
        border-radius: 8px 0 0 8px;
    }

    .custom-file-label::after {
        border-radius: 0 8px 8px 0;
        height: 100%;
        display: flex;
        align-items: center;
    }
</style>
@endsection
