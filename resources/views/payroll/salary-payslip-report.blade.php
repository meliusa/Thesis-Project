<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Styled Slip Gaji</title>
</head>

<body style="font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f4;">

    <div style="background-color: #fff; padding: 20px;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h4
                style="font-weight: bold; color: #333; font-size: 28px; padding-right: 20px; padding-bottom: 20px; margin-top: 10px;">
                SLIP GAJI</h4>
            <div style="text-align: right;">
                <img src="{{ $img }}" alt="Logo" width="100">
                <div style="font-weight: bold; font-size: 18px; color: #999; margin-top: 5px; padding-bottom: 20px;">
                    <div>Jl. Hasanudin No.10, Karanganyar,</div>
                    <div>Kec. Panggungrejo, Kota Pasuruan,</div>
                    <div>Jawa Timur 67131</div>
                </div>
            </div>
        </div>

        <div style="padding-bottom: 20px;">
            <div style="display: flex; flex-wrap: wrap; gap: 20px;">
                <div style="flex: 2;">
                    <span style="font-size: 20px;">NIK: </span>
                    <span style="color: #999;">{{ $employeeSalary->employee->nik }}</span>
                    <br>
                    <span style="font-size: 20px;">Nama Lengkap: </span>
                    <span style="color: #999;">{{ $employeeSalary->employee->nama_lengkap }}</span>
                </div>
                <div style="flex: 1;">
                    <span style="font-size: 20px;">Posisi: </span>
                    <span style="color: #999;">{{ $employeeSalary->employee->job_position->nama_posisi }}</span>
                    <br>
                    <span style="font-size: 20px;">Periode</span>
                    <span style="color: #999;">
                        {{ $detail[0]->bulan }}
                        {{ $detail[0]->tahun }}
                    </span>
                </div>
            </div>
        </div>

        {{-- <div style="border-bottom: 1px solid #ccc; margin-bottom: 20px;"></div> --}}

        <table style="width: 100%; font-size: 16px; border-collapse: collapse; border: 1px solid #ccc;">
            <thead style="border-bottom: 2px solid #333;">
                <tr style="color: #333;">
                    <th style="min-width: 100px; padding: 10px;">Deskripsi</th>
                    <th style="min-width: 100px; padding: 10px;">Jumlah</th>
                    <th style="min-width: 100px; padding: 10px;">Catatan</th>
                </tr>
            </thead>
            <tbody style="font-weight: bold; color: #666; ">
                <!--begin::Products-->
                <tr>
                    <td style="min-width: 100px; padding: 10px;">Gaji Kotor:</td>
                    <td style="min-width: 100px; padding: 10px;"> @currency($employeeSalary->gaji_pokok)</td>
                    <td></td>
                </tr>
                <tr>
                    <td style="min-width: 100px; padding: 10px;">PPh21:</td>
                    <td style="min-width: 100px; padding: 10px;">@currency($employeeSalary->PPH21)</td>
                    <td></td>
                </tr>
                <tr>
                    <td style="min-width: 100px; padding: 10px;">Asuransi:</td>
                    <td style="min-width: 100px; padding: 10px;">@currency($employeeSalary->asuransi)</td>
                    <td></td>
                </tr>
                <tr>
                    <td style="min-width: 100px; padding: 10px;">Salary Advance [Bonus]:</td>
                    <td style="min-width: 100px; padding: 10px;">@currency($bonus)</td>
                    <td></td>
                </tr>
                @foreach ($ketBonus as $ket)
                    <tr>
                        <td></td>
                        <td></td>
                        <td style="min-width: 100px; padding: 10px;">{{ $ket }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td style="min-width: 100px; padding: 10px;">Salary Advance [Potongan]:</td>
                    <td style="min-width: 100px; padding: 10px;">@currency($potongan)</td>
                    <td></td>
                </tr>
                @foreach ($ketPot as $ket)
                    <tr>
                        <td></td>
                        <td></td>
                        <td style="min-width: 100px; padding: 10px;">{{ $ket }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td style="min-width: 100px; padding: 10px;">Gaji Bersih:</td>
                    <td style="min-width: 100px; padding: 10px;" colspan="2">
                        @currency($detail[0]->total_gaji) </td>
                </tr>
                <tr>
                    <td style="min-width: 100px; padding: 10px;">Terbilang:</td>
                    <td style="min-width: 100px; padding: 10px;" colspan="2">
                        {{ ucwords(Terbilang::make($detail[0]->total_gaji, ' rupiah')) }}
                        {{-- @currency($gajiKaryawan->detail_gaji_karyawan->total_gaji) --}}
                    </td>
                </tr>
                <!--end::Grand total-->
            </tbody>
        </table>

        <table style="width: 100%; font-size: 16px; margin-top: 20px;">
            <thead>
                <tr>
                    <th style="min-width: 350px;"></th>
                    <th style="min-width: 70px; text-align: right;"></th>
                </tr>
            </thead>
            <tbody style="font-weight: bold; color: #666; text-align: right">
                <tr>
                    <td></td>
                    <td style="min-width: 100px; padding: 10px; padding-bottom:100px">
                        {{ \Carbon\Carbon::now()->isoFormat('D MMMM YYYY') }} <br>
                        {{-- Tanggal ..... , ..........<br> --}}
                        Manajer HRD
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td style="min-width: 100px; padding: 10px;">(....................)</td>
                </tr>
            </tbody>
        </table>
    </div>

</body>

</html>
