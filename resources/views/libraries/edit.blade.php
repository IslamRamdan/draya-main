@extends('adminlte::page')

@section('title', 'تعديل عنصر المكتبة')

@section('content_header')
    <h1 class="text-bold text-dark">تعديل: <span class="text-primary">{{ $library->title }}</span></h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-9 mx-auto">
            <div class="card shadow-sm border-0" style="border-radius: 12px;">
                <div class="card-body p-4">
                    <form action="{{ route('libraries.update', $library->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            {{-- العنوان --}}
                            <div class="col-md-7">
                                <div class="form-group mb-4">
                                    <label class="font-weight-bold">العنوان</label>
                                    <input type="text" name="title" value="{{ $library->title }}"
                                        class="form-control shadow-none border-faded" required
                                        style="height: 45px; border-radius: 8px;">
                                </div>
                            </div>

                            {{-- نوع القضية --}}
                            <div class="col-md-5">
                                <div class="form-group mb-4">
                                    <label class="font-weight-bold">نوع القضية</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white border-right-0"><i
                                                    class="fas fa-tag text-muted"></i></span>
                                        </div>
                                        <input type="text" name="case_type" value="{{ $library->case_type }}"
                                            class="form-control border-left-0 shadow-none"
                                            style="height: 45px; border-radius: 0 8px 8px 0;">
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- الوصف --}}
                        <div class="form-group mb-4">
                            <label class="font-weight-bold">الوصف</label>
                            <textarea name="description" class="form-control shadow-none" rows="5" style="border-radius: 8px; resize: none;">{{ $library->description }}</textarea>
                        </div>

                        {{-- قسم الصور --}}
                        <div class="row align-items-center mb-4 p-3 bg-light"
                            style="border-radius: 8px; border: 1px solid #eee;">
                            <div class="col-sm-3 text-center">
                                <label class="d-block font-weight-bold small text-muted mb-2">الغلاف الحالي</label>
                                @if ($library->image)
                                    <img src="{{ asset('storage/' . $library->image) }}" class="img-thumbnail shadow-sm"
                                        style="width: 110px; height: 110px; object-fit: cover; border-radius: 8px;">
                                @else
                                    <div class="bg-white d-flex align-items-center justify-content-center mx-auto shadow-sm"
                                        style="width: 110px; height: 110px; border-radius: 8px; border: 1px dashed #ccc;">
                                        <i class="fas fa-image text-muted fa-2x"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="col-sm-9">
                                <label class="font-weight-bold">تحديث صورة الغلاف</label>
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="editLibFile">
                                    <label class="custom-file-label" for="editLibFile" data-browse="استعراض">اختر ملف جديد
                                        أو اتركه فارغاً للإبقاء على الصورة الحالية</label>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5 d-flex justify-content-end border-top pt-4">
                            <a href="{{ route('libraries.index') }}" class="btn btn-light px-4 mx-2"
                                style="border-radius: 6px; border: 1px solid #ddd;">إلغاء</a>
                            <button type="submit" class="btn btn-primary px-5 shadow-sm" style="border-radius: 6px;">
                                <i class="fas fa-sync-alt mr-1"></i> تحديث البيانات
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@section('js')
    <script>
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
        border-color: #007bff;
        box-shadow: none;
    }

    .input-group-text {
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
