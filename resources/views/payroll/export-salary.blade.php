<div class="card-body py-4">
    <!--begin::Table-->
    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
        <!--begin::Table head-->
        <thead>
            <!--begin::Table row-->
            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                <th class="min-w-125px">No</th>
                <th class="min-w-125px">Nama Karyawan</th>
                <th class="min-w-125px">Bulan</th>
            </tr>
            <!--end::Table row-->
        </thead>
        <!--end::Table head-->
        <!--begin::Table body-->
        <tbody class="text-gray-600 fw-bold">
            @foreach ($employeeSalaries as $salary)
                <!--begin::Table row-->
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $salary->employee->nama_lengkap }}</td>
                    <td>{{ $salary->salary_advance->bulan }}
                        {{ $salary->salary_advance->tahun }}</td>
                </tr>
                <!--end::Table row-->
            @endforeach
        </tbody>
        <!--end::Table body-->
    </table>
    <!--end::Table-->
</div>
