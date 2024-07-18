<div class="card-body py-4">
    <!--begin::Table-->
    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
        <!--begin::Table head-->
        <thead>
            <!--begin::Table row-->
            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                <th class="min-w-125px">No</th>
                <th class="min-w-125px">Nama Karyawan</th>
                {{-- nominal gaji intensif --}}
                <th class="min-w-125px">Nominal</th>
                <th class="min-w-125px">Periode</th>
                <th class="min-w-125px">Keterangan</th>
                <th class="min-w-125px">Tanggal Pembuatan</th>
            </tr>
            <!--end::Table row-->
        </thead>
        <!--end::Table head-->
        <!--begin::Table body-->
        <tbody class="text-gray-600 fw-bold">
            @foreach ($advanceSalaries as $advSalary)
                <!--begin::Table row-->
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $advSalary->employee_salary->employee->nama_lengkap }}</td>
                    <td>@currency($advSalary->jumlah)</td>
                    <td>{{ $advSalary->bulan }} {{ $advSalary->tahun }} </td>
                    <td>{{ ucwords($advSalary->kategori) }}</td>
                    <td>{{ \Carbon\Carbon::parse($advSalary->created_at)->isoFormat('D MMMM Y') }}
                    </td>
                    <!--end::Action=-->
                </tr>
                <!--end::Table row-->
            @endforeach
        </tbody>
        <!--end::Table body-->
    </table>
    <!--end::Table-->
</div>
