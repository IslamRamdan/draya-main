@extends('adminlte::page')

@section('title', 'تعديل عمل')

@section('content_header')
    <h1 class="text-bold text-dark">تعديل العمل: <span class="text-primary">{{ $work->title }}</span></h1>
@stop

@section('content')

    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card border-0 shadow-sm" style="border-radius: 15px;">
                <div class="card-body p-4">

                    <form action="{{ route('works.update', $work->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- عنوان العمل --}}
                        <div class="form-group mb-4">
                            <label class="font-weight-bold text-dark">عنوان العمل</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white border-right-0"
                                        style="border-radius: 0 8px 8px 0;">
                                        <i class="fas fa-edit text-muted"></i>
                                    </span>
                                </div>
                                <input type="text" name="title" value="{{ $work->title }}"
                                    class="form-control border-left-0 shadow-none" placeholder="أدخل عنوان العمل..."
                                    required style="height: 48px; border-radius: 8px 0 0 8px;">
                            </div>
                        </div>

                        {{-- الوصف --}}
                        <div class="form-group mb-4">
                            <label class="font-weight-bold text-dark">وصف العمل</label>
                            <textarea name="description" class="form-control shadow-none" rows="6" placeholder="اشرح تفاصيل العمل..."
                                style="border-radius: 10px; resize: none; padding: 15px; border: 1px solid #dee2e6;">{{ $work->description }}</textarea>
                        </div>

                        <hr class="my-4" style="opacity: 0.5;">

                        {{-- أزرار التحكم --}}
                        <div class="d-flex justify-content-end align-items-center">
                            <a href="{{ route('works.index') }}" class="btn btn-light px-4 mx-2 border"
                                style="border-radius: 8px;">
                                <i class="fas fa-arrow-right mr-1 small"></i> رجوع
                            </a>
                            <button type="submit" class="btn btn-primary px-5 shadow-sm" style="border-radius: 8px;">
                                <i class="fas fa-sync-alt mr-1"></i> تحديث البيانات
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <style>
        .form-control:focus {
            border-color: #007bff;
            background-color: #fcfcfc;
        }

        .input-group-text {
            border-color: #ced4da;
        }
    </style>

@stop
