@extends('adminlte::page')

@section('title', 'الأعمال')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="text-bold text-dark">معرض الأعمال</h1>
        <a href="{{ route('works.create') }}" class="btn btn-dark px-4 shadow-sm" style="border-radius: 8px;">
            <i class="fas fa-plus-circle mr-1"></i> إضافة عمل جديد
        </a>
    </div>
@stop

@section('content')

    @if (session('success'))
        <div class="alert alert-success border-0 shadow-sm mb-4"
            style="border-right: 5px solid #28a745 !important; border-radius: 8px;">
            <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
        </div>
    @endif

    <div class="row pt-2">
        @foreach ($works as $work)
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm work-card"
                    style="border-radius: 15px; overflow: hidden; transition: all 0.3s ease;">

                    {{-- الصورة --}}
                    @php
                        $file = $work->image;
                        $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                    @endphp

                    @if ($file)
                        @if ($extension === 'pdf')
                            {{-- صورة ثابتة للـ PDF --}}
                            <div
                                style="height: 200px; overflow: hidden; display:flex; align-items:center; justify-content:center;">
                                <img src="https://img.freepik.com/vecteurs-premium/icone-du-logiciel-pdf_539007-781.jpg?semt=ais_hybrid&w=740"
                                    alt="PDF" style="max-height: 100%; object-fit: contain;">
                            </div>

                            {{-- زر فتح --}}
                            <div class="mt-2 text-center">
                                <a href="{{ asset('storage/' . $file) }}" target="_blank" class="btn btn-danger">
                                    فتح PDF
                                </a>
                            </div>
                        @else
                            {{-- عرض الصورة --}}
                            <div style="height: 200px; overflow: hidden;">
                                <img src="{{ asset('storage/' . $file) }}" alt="{{ $work->title }}"
                                    style="width: 100%; height: 100%; object-fit: cover;">
                            </div>

                            {{-- زر عرض --}}
                            <div class="mt-2 text-center">
                                <a href="{{ asset('storage/' . $file) }}" target="_blank" class="btn btn-primary">
                                    عرض الصورة
                                </a>
                            </div>
                        @endif
                    @endif

                    {{-- Decorative Header Line --}}
                    <div style="height: 4px; background: #343a40;"></div>

                    <div class="card-body d-flex flex-column p-4">
                        <div class="mb-3">
                            <h5 class="card-title font-weight-bold text-dark mb-2" style="font-size: 1.2rem;">
                                {{ $work->title }}
                            </h5>
                            <hr style="width: 40px; margin: 0; border-top: 2px solid #eee;">
                        </div>

                        <p class="card-text text-muted flex-grow-1" style="font-size: 0.95rem; line-height: 1.6;">
                            {{ \Illuminate\Support\Str::limit($work->description, 130) }}
                        </p>

                        {{-- Action Buttons --}}
                        <div class="d-flex justify-content-end align-items-center border-top pt-3 mt-3">
                            <a href="{{ route('works.edit', $work->id) }}"
                                class="btn btn-outline-primary btn-sm border-0 mx-1" style="border-radius: 6px;"
                                title="تعديل">
                                <i class="fas fa-edit"></i> تعديل
                            </a>

                            <form action="{{ route('works.destroy', $work->id) }}" method="POST" class="m-0">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger btn-sm border-0 mx-1" style="border-radius: 6px;"
                                    onclick="return confirm('هل أنت متأكد من الحذف؟')" title="حذف">
                                    <i class="fas fa-trash-alt"></i> حذف
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @if ($works->isEmpty())
        <div class="text-center py-5">
            <div class="mb-3">
                <i class="fas fa-briefcase text-muted shadow-sm p-4 rounded-circle bg-white" style="font-size: 3rem;"></i>
            </div>
            <h5 class="text-muted">لا توجد أعمال مضافة حالياً</h5>
            <p class="text-muted small">ابدأ بإضافة أول عمل من خلال الزر في الأعلى</p>
        </div>
    @endif

    <style>
        .work-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.1) !important;
        }

        .card-title {
            display: block;
            height: 2.8rem;
            /* لتوحيد ارتفاع العناوين */
            overflow: hidden;
        }
    </style>
@stop
