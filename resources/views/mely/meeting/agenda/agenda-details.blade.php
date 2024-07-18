@extends('layouts.app')
@section('custom-css')
@endsection
@section('content')
<!--begin::Content-->
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
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Detail Agenda Rapat
                </h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('dashboard.index') }}" class="text-muted text-hover-primary">Dashboard</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Manajemen Rapat</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('agendas.index') }}" class="text-muted text-hover-primary">Agenda Rapat</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">Detail Agenda Rapat</li>
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
            <!--begin::details View-->
            <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                <!--begin::Card header-->
                <div class="card-header cursor-pointer">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">ID Agenda : {{ $agenda->id }}</h3>
                    </div>
                    <!--end::Card title-->
                    <!--begin::Action-->
                    <a href="{{ URL::previous() }}" class="btn btn-light align-self-center">Kembali</a>
                    <!--end::Action-->
                </div>
                <!--begin::Card header-->
                <!--begin::Card body-->
                <div class="card-body p-9">
                    <!--begin::Row-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold text-muted">Penanggung Jawab</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <span class="fw-bold fs-6 text-gray-800">{{ $agenda->user->nama }} ( ID Penanggung Jawab :
                                {{ $agenda->user_id }} )</span>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Row-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold text-muted">Judul Topik</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            @if(auth()->user()->id_role == 1 || auth()->user()->id_role == 2)
                            <a href="{{ route('topics.details', $agenda->topic_id)}}"
                                class="fw-bold fs-6 text-gray-800 text-hover-primary">{{ $agenda->topic->title }} (
                                ID Topic :
                                {{ $agenda->topic_id }} )</a>
                            @else
                            <span class="fw-bold fs-6 text-gray-800 text-hover-primary">{{ $agenda->topic->title }} (
                                ID Topic :
                                {{ $agenda->topic_id }} )</span>
                            @endif
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Row-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold text-muted">Deskripsi Topik</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <a href="{{ route('topics.details', $agenda->topic_id )}}"
                                class="fw-bold fs-6 text-gray-800 text-hover-primary">{{ $agenda->topic->description }}</a>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold text-muted">Tanggal dan Waktu</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <span
                                class="fw-bold text-gray-800 fs-6">{{ \Carbon\Carbon::parse($agenda->date)->format('d-m-Y') }}
                                {{ \Carbon\Carbon::parse($agenda->time)->format('H:i') }}</span>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold text-muted">Tipe Rapat</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <span class="badge badge-info">{{ $agenda->meeting_type }}</span>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold text-muted">Tempat Rapat</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            @if ($agenda->meeting_type == 'Daring')
                            <a href="{{ $meeting_address }}" class="fw-bold fs-6"
                                target="_blank">{{ $agenda->meeting_address }}</a>
                            @else
                            <span class="fw-bold text-gray-800 fs-6">{{ $agenda->meeting_address }}</span>
                            @endif
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold text-muted">Presensi Awal dan Akhir</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <table>
                                <tr>
                                    <td>
                                            <form action="{{ route('agendas.store-initial-absen-at') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="agenda_id" value="{{ $agenda->id }}">
                                            <span class="fw-bold text-gray-800 fs-6"><button type="submit"
                                                    class=" btn btn-secondary validasipresence"
                                                    data-agenda-status="{{ $agenda->status }}">Presensi
                                                    Awal</button></span>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ route('agendas.update-final-absen-at', $agenda->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <span class="fw-bold text-gray-800 fs-6"><button type="submit"
                                                    class=" btn btn-secondary validasipresence"
                                                    data-agenda-status="{{ $agenda->status }}">Presensi
                                                    Awal</button></span>
                                        </form>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold text-muted">Status</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 d-flex align-items-center">
                            @php
                            $statusResult = '';
                            switch($agenda->status) {
                            case 'Diterima':
                            $statusResult = 'success';
                            break;
                            case 'Menunggu Persetujuan':
                            $statusResult = 'warning';
                            break;
                            case 'Ditolak':
                            $statusResult = 'danger';
                            break;
                            case 'Dijadwalkan':
                            $statusResult = 'warning';
                            break;
                            case 'Selesai':
                            $statusResult = 'success';
                            break;
                            case 'Notula Tersedia':
                            $statusResult = 'primary';
                            break;
                            default:
                            $statusResult = 'primary';
                            }
                            @endphp
                            <span class="badge badge-{{ $statusResult }}">{{ $agenda->status }}</span>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold text-muted">Alasan Penolakan <i
                                class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="
                                Jika sedang ditinjau atau diterima, tidak ada alasan ditolak."></i></label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <span class="fw-bold text-gray-800 fs-6">{{ $agenda->rejection_reason }}</span>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold text-muted">Didistribusikan Pada</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            @if($agenda->distributed_at)
                            <span
                                class="fw-bold text-gray-800 fs-6">{{ \Carbon\Carbon::parse($agenda->distributed_at)->format('d-m-Y H:i:s') }}</span>
                            @else
                            <span class="fw-bold text-gray-800 fs-6">-</span>
                            @endif
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold text-muted">Selesai Pada</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            @if($agenda->completed_at)
                            <span
                                class="fw-bold text-gray-800 fs-6">{{ \Carbon\Carbon::parse($agenda->completed_at)->format('d-m-Y H:i:s') }}</span>
                            @else
                            <span class="fw-bold text-gray-800 fs-6">-</span>
                            @endif
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold text-muted">Notula Tersedia Pada</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            @if($agenda->reported_at)
                            <span
                                class="fw-bold text-gray-800 fs-6">{{ \Carbon\Carbon::parse($agenda->reported_at)->format('d-m-Y H:i:s') }}</span>
                            @else
                            <span class="fw-bold text-gray-800 fs-6">-</span>
                            @endif
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold text-muted">Tanggal Pembuatan</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <span
                                class="fw-bold text-gray-800 fs-6">{{ $agenda->created_at->format('d-m-Y H:i:s') }}</span>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold text-muted">Tanggal Diperbarui</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <span
                                class="fw-bold text-gray-800 fs-6">{{ $agenda->updated_at->format('d-m-Y H:i:s') }}</span>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-10">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold text-muted">Izin yang diberikan (Perubahan atau
                            Penghapusan)</label>
                        <!--begin::Label-->
                        <!--begin::Label-->
                        <div class="col-lg-8">
                            @php
                            $permissionResult = '';
                            if($agenda->status == 'Menunggu Persetujuan' || $agenda->status == 'Ditolak') {
                            $permissionResult = 'Diizinkan.';
                            } else {
                            $permissionResult = 'Tidak Diizinkan.';
                            }
                            @endphp
                            <span class="fw-bold fs-6 text-gray-800">{{ $permissionResult }}</span>
                        </div>
                        <!--begin::Label-->
                    </div>
                    <!--end::Input group-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::details View-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
<!--end::Content-->
@endsection
@section('custom-js')
<script>
    $('.validasipresence').click(function (e) {
        e.preventDefault();
        const form = $(this).closest("form");
        const agendaStatus = $(this).data('agenda-status');
        const notPresentableStatuses1 = ['Menunggu Persetujuan', 'Diterima', 'Ditolak'];
        const notPresentableStatuses2 = ['Selesai', 'Notula Tersedia'];

        if (notPresentableStatuses1.includes(agendaStatus)) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: `Agenda dengan status "${agendaStatus}" tidak dapat presensi.`,
            });
        } else if (notPresentableStatuses2.includes(agendaStatus)) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: `Agenda telah usai dilaksanakan, tidak dapat presensi.`,
            });
        } else {
            form.submit();
        }
    });

</script>
@endsection
