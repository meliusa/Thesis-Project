@extends('layouts.app')

@section('custom-css')
<!-- Load FullCalendar styles -->
<link href="{{ asset('css/fullcalendar.min.css') }}" rel="stylesheet">
<style>
    /* Gaya kustom untuk kalender */
    #calendar {
        max-width: 100%;
        margin: 0 auto;
    }

    .fc-daygrid-event .fc-content {
        white-space: normal !important;
        /* Memastikan teks berwrapping */
        word-wrap: break-word;
        /* Memecah kata jika perlu */
    }

    .fc-event-title {
        font-size: 14px;
        /* Ukuran teks judul acara */
        font-weight: bold;
        /* Ketebalan teks judul acara */
    }

    .fc-event-time {
        font-size: 12px;
        /* Ukuran teks waktu acara */
    }

</style>
@endsection

@section('content')
<section>
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
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Agenda Rapat</h1>
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
                        <li class="breadcrumb-item text-dark">Agenda Rapat</li>
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
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card body-->
                    <div class="card-body py-4">
                        <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_pane_1">Kalender
                                    Terintegrasi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_2">Agenda Rapat</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel">
                                <div id="calendar"></div>
                            </div>
                            <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel">
                                <div class="card">
                                    <!--begin::Card header-->
                                    <div class="card-header border-0 pt-6">
                                        <!--begin::Card title-->
                                        <div class="card-title">
                                            <!--begin::Search-->
                                            <div class="d-flex align-items-center position-relative my-1">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546"
                                                            height="2" rx="1" transform="rotate(45 17.0365 15.1223)"
                                                            fill="black" />
                                                        <path
                                                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                                <input type="text" data-kt-filter="search"
                                                    class="form-control form-control w-250px ps-14"
                                                    placeholder="Cari Data" />
                                            </div>
                                            <!--end::Search-->
                                        </div>
                                        <!--begin::Card title-->
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body py-4">
                                        <!--begin::Table-->
                                        <table class="table align-middle table-row-dashed fs-6 gy-5"
                                            id="kt_datatable_agenda">
                                            <!--begin::Table head-->
                                            <thead>
                                                <!--begin::Table row-->
                                                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                                    <th class="min-w-62.5px">No</th>
                                                    <th class="min-w-125px">Judul Rapat</th>
                                                    <th class="min-w-62.5px">Tipe Rapat</th>
                                                    <th class="min-w-62.5px">Tanggal dan Jam Rapat</th>
                                                    <th class="min-w-62.5px">Presensi Awal</th>
                                                    <th class="text-end min-w-62.5px">Aksi</th>
                                                </tr>
                                                <!--end::Table row-->
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody class="text-gray-600 fw-bold">
                                                @foreach ($submissionModules as $submissionModule)
                                                <!--begin::Table row-->
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td> <a href="{{ route('submission-modules.details', $submissionModule->id) }}"
                                                            style="text-decoration: none; color: inherit;"
                                                            class="text-hover-primary">
                                                            {{ $submissionModule->title }} ( ID :
                                                            {{ $submissionModule->id }} )
                                                        </a></td>
                                                    <td>{{ $submissionModule->type }}</td>
                                                    <td>
                                                        {{ \Carbon\Carbon::parse($submissionModule->date)->format('d-m-Y') }}
                                                        {{ \Carbon\Carbon::parse($submissionModule->time)->format('H:i:s') }}
                                                    </td>
                                                    <td>
                                                        @if (\Carbon\Carbon::parse($submissionModule->date)->isFuture())
                                                        Belum Saatnya
                                                        @else
                                                        <form
                                                            action="{{ route('meeting-participants.update-initial-absen-at', $submissionModule->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="agenda_id"
                                                                value="{{ $submissionModule->id }}">
                                                            <button type="submit"
                                                                class="btn btn-light-success btn-sm validasipresence">Presensi
                                                                Awal</button>
                                                        </form>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if (\Carbon\Carbon::parse($submissionModule->date)->isFuture())
                                                        Belum Saatnya
                                                        @else
                                                        <form
                                                            action="{{ route('meeting-participants.update-final-absen-at', $submissionModule->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="agenda_id"
                                                                value="{{ $submissionModule->id }}">
                                                            <button type="submit"
                                                                class="btn btn-light-success btn-sm validasipresence">Presensi
                                                                Akhir</button>
                                                        </form>
                                                        @endif
                                                    </td>
                                                    <td class="text-end">
                                                        <a href="{{ route('submission-modules.details', $submissionModule->id) }}"
                                                            class="btn btn-icon btn-secondary btn-sm">
                                                            <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                                                            <span class="svg-icon svg-icon-3">
                                                                <i class="bi bi-eye"></i>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </a>
                                                    </td>
                                                </tr>
                                                <!--end::Table row-->
                                                @endforeach
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->

</section>
@endsection

@section('custom-js')
<!-- Load FullCalendar scripts -->
<script src="{{ asset('js/fullcalendar.core.min.js') }}"></script>
<script src="{{ asset('js/fullcalendar.daygrid.min.js') }}"></script>
<script src="{{ asset('js/fullcalendar.timegrid.min.js') }}"></script>
<script src="{{ asset('js/fullcalendar.list.min.js') }}"></script>
<script src="{{ asset('js/fullcalendar.interaction.min.js') }}"></script>

<script>
    // Class definition
    var KTDatatablesButtons = function () {
        // Shared variables
        var table;
        var datatable;

        // Private functions
        var initDatatable = function () {
            datatable = $(table).DataTable({
                "info": false,
                'order': [],
                'pageLength': 10,
            });
        }

        var handleSearchDatatable = () => {
            const filterSearch = document.querySelector('[data-kt-filter="search"]');
            filterSearch.addEventListener('keyup', function (e) {
                datatable.search(e.target.value).draw();
            });
        }

        // Public methods
        return {
            init: function () {
                table = document.querySelector('#kt_datatable_agenda');

                if (!table) {
                    return;
                }

                initDatatable();
                handleSearchDatatable();
            }
        };
    }();

    // Reset form fields when the "Cancel" button is clicked
    document.querySelectorAll('.modal').forEach(modal => {
        modal.addEventListener('hidden.bs.modal', function (event) {
            const form = this.querySelector('form');
            if (form) {
                form.reset();
            }
        });
    });

    // On document ready
    KTUtil.onDOMContentLoaded(function () {
        KTDatatablesButtons.init();
    });

    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            initialView: 'dayGridMonth', // Tampilan awal
            selectable: true,
            events: [
                @foreach($events as $event) {
                    title: '{{ $event->title }} - {{ $event->type }}',
                    start: '{{ $event->date }}T{{ $event->time }}',
                    // other event properties as needed
                },
                @endforeach
            ],
            eventContent: function (arg) {
                return {
                    html: '<div class="fc-content"><div class="fc-title">' + arg.event.title +
                        '</div><div class="fc-time">' + arg.timeText + '</div></div>'
                };
            },
            select: function (info) {
                // handle select event if needed
            },
            // Konfigurasi tambahan untuk menampilkan format waktu AM/PM lengkap dan event display block
            eventDisplay: 'block',
            eventTimeFormat: {
                hour: 'numeric',
                minute: '2-digit',
                meridiem: 'short'
            }
        });

        calendar.render();
    });

</script>
@endsection
