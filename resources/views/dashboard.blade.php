@extends('layouts.app')
@section('content')
    <section>
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <!--begin::Toolbar-->
            <div class="toolbar" id="kt_toolbar">
                <!--begin::Container-->
                <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                    <!--begin::Page title-->
                    <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                        data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                        class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                        <!--begin::Title-->
                        <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Dashboard</h1>
                        <!--end::Title-->
                        <!--begin::Separator-->
                        <span class="h-20px border-gray-300 border-start mx-4"></span>
                        <!--end::Separator-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('dashboard.index') }}" class="text-muted text-hover-primary">Rumah</a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-300 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-dark">Dashboard</li>
                            <!--end::Item-->
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page title-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Toolbar-->
            <!--begin::Post-->
            <div class="post d-flex flex-column-fluid" id="kt_post">
                <!--begin::Container-->
                <div id="kt_content_container" class="container-xxl">
                    <div class="row gy-5 g-xl-8">
                        <div class="col bg-danger px-6 py-8 rounded-2 me-3 mb-7">
                            <div class="row">
                                <div class="col-7">
                                    <span class="svg-icon svg-icon-3x svg-icon-white d-block mt-5 mb-2">
                                        <i class="fas fa-users fs-1 text-white"></i>
                                    </span>
                                    <a href="#" class="text-white fw-bold ">Divisi</a>
                                </div>
                                <div class="col-5 d-flex align-items-center">
                                    <h1 class="text-white">{{ $division }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col bg-primary px-6 py-8 rounded-2 me-3 mb-7">
                            <div class="row">
                                <div class="col-7">
                                    <span class="svg-icon svg-icon-3x svg-icon-white d-block mt-5 mb-2">
                                        <i class="fas fa-users fs-1 text-white"></i>
                                    </span>
                                    <a href="#" class="text-white fw-bold ">Helper</a>
                                </div>
                                <div class="col-5 d-flex align-items-center">
                                    <h1 class="text-white">{{ $helperCount }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col bg-warning px-6 py-8 rounded-2 me-3 mb-7">
                            <div class="row">
                                <div class="col-7">
                                    <span class="svg-icon svg-icon-3x svg-icon-white d-block mt-5 mb-2">
                                        <i class="fas fa-users fs-1 text-white"></i>
                                    </span>
                                    <a href="#" class="text-white fw-bold ">Operator</a>
                                </div>
                                <div class="col-5 d-flex align-items-center">
                                    <h1 class="text-white">{{ $operatorCount }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col bg-success px-6 py-8 rounded-2 me-3 mb-7">
                            <div class="row">
                                <div class="col-7">
                                    <span class="svg-icon svg-icon-3x svg-icon-white d-block mt-5 mb-2">
                                        <i class="fas fa-clock fs-1 text-white"></i>
                                    </span>
                                    <a href="#" class="text-white fw-bold ">Time</a>
                                </div>
                                <div class="col-5 d-flex align-items-center">
                                    <h1 class="text-white" id="current-time">?</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('custom-js')
<script>
    function updateCurrentTime() {
        const currentTimeElement = document.getElementById("current-time");
        const now = new Date();
        const currentTimeString = now.toLocaleTimeString(); // Adjust options for desired format
        currentTimeElement.textContent = currentTimeString;
    }

    // Update the time immediately and then update every second
    updateCurrentTime();
    setInterval(updateCurrentTime, 1000);
</script>
@endsection
