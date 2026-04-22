@extends('adminlte::page')

@section('title', 'لوحة التحكم')

@section('content_header')
    <h1>لوحة التحكم</h1>
@stop

@section('content')

    <div class="row">

        {{-- المحامين --}}
        <div class="col-lg-4 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $lawyers }}</h3>
                    <p>المحامين</p>
                </div>
                <div class="icon">
                    <i class="fas fa-gavel"></i>
                </div>
            </div>
        </div>

        {{-- الأعمال --}}
        <div class="col-lg-4 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $works }}</h3>
                    <p>الأعمال</p>
                </div>
                <div class="icon">
                    <i class="fas fa-briefcase"></i>
                </div>
            </div>
        </div>

        {{-- المكتبة --}}
        <div class="col-lg-4 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $libraries }}</h3>
                    <p>المكتبة</p>
                </div>
                <div class="icon">
                    <i class="fas fa-book"></i>
                </div>
            </div>
        </div>

    </div>

    {{-- ترحيب --}}
    <div class="card mt-4">
        <div class="card-body text-center">
            <h4>مرحبًا بك 👋</h4>
            <p class="text-muted">
                هذه لوحة التحكم الخاصة بإدارة الموقع (المحامين - الأعمال - المكتبة)
            </p>
        </div>
    </div>

@stop
