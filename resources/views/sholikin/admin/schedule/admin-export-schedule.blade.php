<div class="card-body py-4">
    <table class="table align-middle table-row-dashed fs-6 gy-5" style="margin: 0 auto; width: 100%; max-width: 800px; border-collapse: collapse;">
        <thead>
            <tr style="text-align: center;">
                <th colspan="6" style="font-size: 14px; font-weight: bold; color: #333; text-align: center; vertical-align: middle;">Jadwal</th>
            </tr>
            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                <th class="min-w-125px">No</th>
                <th class="min-w-125px">Divisi</th>
                <th class="min-w-125px">Posisi</th>
                <th class="min-w-125px">Periode</th>
                <th class="min-w-125px">Jam Masuk</th>
                <th class="min-w-125px">Jam Pulang</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 fw-bold">
            @foreach ($schedule as $sch)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $sch->division->nama_divisi }}</td>
                    <td>{{ $sch->job_position->nama_posisi }}</td>
                    <td>
                        {{ \Carbon\Carbon::make($sch->periode_mulai)->isoFormat('DD MMMM YYYY') }}
                        s/d
                        {{ \Carbon\Carbon::make($sch->periode_selesai)->isoFormat('DD MMMM YYYY') }}
                    </td>
                    <td>{{ $sch->jam_masuk }}</td>
                    <td>{{ $sch->jam_pulang }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
