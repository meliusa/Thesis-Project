<?php

namespace App\Http\Controllers\Payroll;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\SalaryAdvance;
use App\Models\EmployeeSalary;
use App\Models\SalaryGenerate;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class SalaryGenerateController extends Controller
{
    public function index()
    {
        $salaryGenerates = SalaryGenerate::orderBy('tanggal_dibuat')->get();
        return view('payroll.generate-salary-table', compact('salaryGenerates'));
    }

    public function store(Request $request)
    {
        // return response()->json($request);
        $request['tanggal_dibuat'] = Carbon::parse($request['tanggal_dibuat']);
        $validatedData = Validator::make($request->all(), [
            'tanggal_dibuat' => 'required|date'
        ]);

        if ($validatedData->fails()) {
            Alert::error('Error Title', 'Error Message');
            return redirect()->back()->withErrors($validatedData)->withInput();
        }

        SalaryGenerate::create($request->all());

        toast('Data berhasil ditambahkan', 'success');
        return redirect()->route('salary-generate.index');
    }

    public function show(SalaryGenerate $salaryGenerate)
    {
        $monthRequest = Carbon::make($salaryGenerate->tanggal_dibuat)->isoFormat('MMMM');
        // return response()->json($salaryGenerate);
        // $salary = SalaryGenerate::groupBy('tanggal_dibuat');
        // $a = DB::select('SELECT sa.id AS sa_id, es.id, e.nama_lengkap, es.gaji_pokok, es.asuransi, 
        //     es.PPH21,  sa.kategori, sa.jumlah, sa.total_gaji FROM employee_salaries AS es 
        //     JOIN employees AS e ON es.id_karyawan = e.id JOIN salary_advances AS sa ON sa.id_gaji = es.id 
        //     WHERE sa.bulan ="' . $monthRequest . '"');
        // $c = 0;
        // $d = 0;
        // foreach ($a as $b) {
        //     if ($b->kategori == "bonus") {
        //         $c += $b->jumlah;
        //     } else {
        //         $d += $b->jumlah;
        //     }
        // }
        // return response()->json([
        //     $a,
        //     $c,
        //     $d
        // ]);
        $employeeSalaries = EmployeeSalary::all();
        $advance = SalaryAdvance::groupBy('bulan')->get();

        $salaryAdvances = SalaryAdvance::where('bulan', $monthRequest)->get();
        // return response()->json($salaryAdvances);
        $bonus = 0;
        $potongan = 0;

        foreach ($salaryAdvances as $salaryAdvance) {
            if ($salaryAdvance->kategori == "bonus") {
                $bonus += $salaryAdvance->jumlah;
            } else {
                $potongan += $salaryAdvance->jumlah;
            }
        }

        $bonuses = SalaryAdvance::select('id', 'id_gaji', 'kategori', 'jumlah')
            ->where('kategori', 'bonus')
            ->sum('jumlah');

        $potongans = SalaryAdvance::select('id', 'id_gaji', 'kategori', 'jumlah')
            ->where('kategori', 'potongan')
            ->sum('jumlah');

        return view('payroll.generate-chart-table', compact('advance', 'bonuses', 'potongans', 'employeeSalaries'));
    }

    public function edit(SalaryGenerate $salaryGenerate)
    {
        $monthRequest = Carbon::make($salaryGenerate->tanggal_dibuat)->isoFormat('MMMM');

        $salary = DB::table('employee_salaries')
            ->select(
                DB::raw('sum(gaji_pokok) as gaji_pokok'),
                DB::raw('sum(asuransi) as asuransi'),
                DB::raw('sum(PPH21) as PPH21')
            )->get();

        $gajiKotor = $salary[0]->gaji_pokok;
        $asuransi = $salary[0]->asuransi;
        $pph21 = $salary[0]->PPH21;

        $values = [];

        $ids = SalaryAdvance::select('id', 'id_gaji', DB::raw('MAX(id) as id'))->where('bulan', $monthRequest)
            ->groupBy('id_gaji')
            ->get();

        foreach ($ids as $id) {
            $detail = SalaryAdvance::where('id', $id->id)->first();
            array_push($values, $detail);
        };

        $gajiBersih = 0;

        foreach ($values as $value) {
            $gajiBersih += $value->total_gaji;
        };

        $salaryAdvances = SalaryAdvance::where('bulan', $monthRequest)->get();

        $bonus = 0;
        $potongan = 0;

        foreach ($salaryAdvances as $salaryAdvance) {
            if ($salaryAdvance->kategori == "bonus") {
                $bonus += $salaryAdvance->jumlah;
            } else {
                $potongan += $salaryAdvance->jumlah;
            }
        }

        return view('payroll.generate-salary-approval', compact('salaryGenerate', 'gajiKotor', 'gajiBersih', 'bonus', 'potongan', 'pph21', 'asuransi'));
    }

    public function update(Request $request, string $id)
    {
        $validated = Validator::make($request->all(), [
            'status' => 'required|string',
            'tanggal_disetujui' => 'required|date',
            'disetujui_oleh'    =>  'required|string'
        ]);

        if ($validated->fails()) {
            Alert::error('Error Title', 'Error Message');
            return redirect()->back();
        }

        $salary = SalaryGenerate::find($id);
        // return response()->json([
        //     $request['status'],
        //     $request['tanggal_disetujui'],
        //     $request['disetujui_oleh'],
        //     $salary,
        //     $id
        // ]);
        $salary->update($request->all());

        toast('Berhasil Generate Gaji', 'success');
        return redirect()->route('salary-generate.index');
    }

    public function destroy(string $id)
    {
        // return response()->json($id);

        $salary = SalaryGenerate::find($id);
        $salary->delete();

        toast('Data berhasil dihapus', 'success');
        return redirect()->route('salary-generate.index');
    }
}
