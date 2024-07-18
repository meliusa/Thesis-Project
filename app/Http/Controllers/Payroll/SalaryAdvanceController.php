<?php

namespace App\Http\Controllers\Payroll;

use PDF;
use Carbon\Carbon;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\SalaryAdvance;
use App\Models\EmployeeSalary;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class SalaryAdvanceController extends Controller
{
    public function index()
    {
        $advanceSalaries = SalaryAdvance::orderBy('created_at', 'ASC')->get();
        return view('payroll.advance-salary-table', compact('advanceSalaries'));
    }

    public function create()
    {
        $employees = Employee::orderBy('nama_lengkap', 'ASC')->get();
        $employeeSalaries = SalaryAdvance::all();
        return view('payroll.create-advance-salary', compact('employees', 'employeeSalaries'));
    }

    public function store(Request $request)
    {
        $date = explode(' ', Carbon::parse($request['periode'])->isoFormat('MMMM Y'));
        $bulan = $date[0];
        $tahun = $date[1];

        // mengambil gaji bersih dari karyawan sesuai dengan id gaji
        $gajiBersih = EmployeeSalary::where([
            ['id', '=', $request['id_gaji']]
        ])->value('gaji_bersih');
        // return response()->json($gajiBersih);

        // mengambil id employee salary sesuai id gaji
        $idEmployeeSalary = EmployeeSalary::where('id', $request['id_gaji'])->value('id');

        // mengambil max id dari salary advance 
        $maxIdSalaryAdvance = SalaryAdvance::join('employee_salaries', 'salary_advances.id_gaji', '=', 'employee_salaries.id')
            ->where('employee_salaries.id', $idEmployeeSalary)
            ->max('salary_advances.id');

        // mengambil total gaji dari salary advance
        $gajiAdvance = SalaryAdvance::where('id', $maxIdSalaryAdvance)->value('total_gaji');

        // return response()->json([
        //     'id' => $idEmployeeSalary,
        //     'maxId' => $maxIdSalaryAdvance,
        //     'totalGaji' => $gajiAdvance
        // ]);

        if($gajiAdvance === null){
            $totalGaji = $gajiBersih;
        } else {
            $totalGaji = $gajiAdvance;
        }
        // return response()->json([
        //     'gaji bersih' => $gajiBersih,
        //     'id' => $idEmployeeSalary,
        //     'gajiAdvance' => $gajiAdvance,
        //     'total gaji' => $totalGaji
        // ]);

        $results = [];
        foreach ($request['kt_docs_repeater_advanced'] as $value) {
            $value['id_gaji'] = $request['id_gaji'];
            $value['bulan'] = $bulan;
            $value['tahun'] = $tahun;
            $jumlah = $value['jumlah'];
            
            if ($value['kategori'] == 'bonus') {
                $totalGaji = $totalGaji + $jumlah;
            } elseif ($value['kategori'] == 'potongan') {
                $totalGaji = $totalGaji - $jumlah;
            }
            
            $value['total_gaji'] = $totalGaji;

            $results[] = $value;
            // return response()->json($results);

            $validatedData = Validator::make($value, [
                'id_gaji' => 'required|integer',
                'bulan' => 'required',
                'tahun' => 'required',
                'kategori' => 'required|string|min:3',
                'keterangan' => 'required|string|min:3',
                'jumlah' => 'required',
                'total_gaji' => 'required'
            ]);
            // return response()->json($date);
            if ($validatedData->fails()) {
                Alert::error('Error Title', 'Data Salary Advance Tidak Valid');
                return redirect()->back();
            }

            SalaryAdvance::create($value);
        }

        toast('Detail Gaji Karyawan created successfully', 'success');
        return redirect()->route('salary-advance.index');
    }

    public function destroy(string $id)
    {
        $advance = SalaryAdvance::find($id);
        $advance->delete();

        toast('Berhasil Menghapus Data', 'success');
        return redirect()->route('salary-advance.index');
    }
}
