@extends('adminlte::page')

@section('title', 'إضافة عمل جديد')

@section('content_header')
    <h1 class="text-bold text-dark">إضافة عمل جديد للمعرض</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card border-0 shadow-sm" style="border-radius: 15px;">
                <div class="card-body p-4">

                    <form action="{{ route('works.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- عنوان العمل --}}
                        <div class="form-group mb-4">
                            <label class="font-weight-bold text-dark">عنوان العمل</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white border-right-0"
                                        style="border-radius: 0 8px 8px 0;">
                                        <i class="fas fa-briefcase text-muted"></i>
                                    </span>
                                </div>
                                <input type="text" name="title" class="form-control border-left-0 shadow-none"
                                    placeholder="أدخل عنواناً جذاباً للعمل..." required
                                    style="height: 48px; border-radius: 8px 0 0 8px;">
                            </div>
                        </div>

                        {{-- الوصف --}}
                        <div class="form-group mb-4">
                            <label class="font-weight-bold text-dark">وصف العمل</label>
                            <textarea name="description" class="form-control shadow-none" rows="6"
                                placeholder="اشرح تفاصيل العمل وما تم إنجازه فيه..."
                                style="border-radius: 10px; resize: none; padding: 15px; border: 1px solid #dee2e6;"></textarea>
                            <small class="text-muted">
                                <i class="fas fa-info-circle mt-2"></i> سيظهر هذا الوصف في معرض الأعمال بشكل مختصر.
                            </small>
                        </div>

                        {{-- الصورة --}}
                        <div class="form-group mb-4">
                            <label class="font-weight-bold text-dark">صورة العمل</label>

                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" id="imageInput">
                                <label class="custom-file-label" for="imageInput">اختر صورة...</label>
                            </div>

                            <small class="text-muted d-block mt-2">
                                <i class="fas fa-image"></i> يفضل صورة بجودة عالية (JPG, PNG)
                            </small>

                            {{-- معاينة الصورة --}}
                            <div class="mt-3 text-center">
                                <img id="previewImage" src="#" alt="preview"
                                    style="display:none; max-height:200px; border-radius:10px;">
                            </div>
                        </div>

                        <hr class="my-4" style="opacity: 0.5;">

                        {{-- أزرار التحكم --}}
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('works.index') }}" class="btn btn-light px-4 mx-2 border"
                                style="border-radius: 8px;">
                                إلغاء
                            </a>
                            <button type="submit" class="btn btn-dark px-5 shadow-sm" style="border-radius: 8px;">
                                <i class="fas fa-save mr-1"></i> حفظ العمل
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <style>
        .form-control:focus {
            border-color: #343a40;
            background-color: #fcfcfc;
        }

        .input-group-text {
            border-color: #ced4da;
        }
    </style>

    {{-- سكربت عرض اسم الصورة + preview --}}
    <script>
        document.getElementById('imageInput').onchange = function(e) {
            let fileName = e.target.files[0].name;
            e.target.nextElementSibling.innerHTML = fileName;

            let reader = new FileReader();
            reader.onload = function(e) {
                let img = document.getElementById('previewImage');
                img.src = e.target.result;
                img.style.display = 'block';
            }
            reader.readAsDataURL(e.target.files[0]);
        };
    </script>

@stop
