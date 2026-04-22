@extends('adminlte::page')

@section('content_header')
    <h1 class="text-bold">تعديل بيانات المحامي: <span class="text-primary">{{ $lawyer->name }}</span></h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card shadow-sm border-0" style="border-radius: 12px;">
                <div class="card-body p-4">
                    <form action="{{ route('lawyers.update', $lawyer->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- اسم المحامي --}}
                        <div class="form-group mb-4">
                            <label class="font-weight-bold">اسم المحامي</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white border-right-0"><i
                                            class="fas fa-user-edit text-muted"></i></span>
                                </div>
                                <input type="text" name="name" value="{{ $lawyer->name }}"
                                    class="form-control border-left-0 shadow-none" placeholder="الاسم بالكامل" required>
                            </div>
                        </div>

                        {{-- الوصف --}}
                        <div class="form-group mb-4">
                            <label class="font-weight-bold">الوصف التعريفي</label>
                            <textarea name="description" class="form-control shadow-none" rows="4" style="border-radius: 8px;">{{ $lawyer->description }}</textarea>
                        </div>

                        {{-- قسم الصور --}}
                        <div class="row mb-4 align-items-center">
                            <div class="col-sm-3 text-center">
                                <label class="d-block font-weight-bold small text-muted mb-2">الصورة الحالية</label>
                                @if ($lawyer->image)
                                    <img src="{{ asset('storage/' . $lawyer->image) }}" class="img-thumbnail shadow-sm"
                                        style="width: 100px; height: 100px; object-fit: cover; border-radius: 10px;">
                                @else
                                    <div class="bg-light d-flex align-items-center justify-content-center mx-auto"
                                        style="width: 100px; height: 100px; border-radius: 10px; border: 2px dashed #ddd;">
                                        <i class="fas fa-image text-muted"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="col-sm-9 mt-3 mt-sm-0">
                                <label class="font-weight-bold">تغيير الصورة</label>
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile" data-browse="استعراض">اختر صورة جديدة
                                        إذا كنت ترغب في التغيير</label>
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">

                        {{-- أزرار التحكم --}}
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('lawyers.index') }}" class="btn btn-light px-4 mx-2 border"
                                style="border-radius: 6px;">
                                رجوع للقائمة
                            </a>
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
            var fileName = document.getElementById("customFile").files[0].name;
            var nextSibling = e.target.nextElementSibling
            nextSibling.innerText = fileName
        })
    </script>
@endsection

<style>
    .form-control:focus {
        border-color: #007bff;
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
