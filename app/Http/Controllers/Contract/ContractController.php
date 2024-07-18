<?php

namespace App\Http\Controllers\Contract;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\JobPosition;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class ContractController extends Controller
{
    public function index()
    {
        $contracts = Contract::orderBy('durasi', 'ASC')->get();
        return view('contract.contract-table', compact('contracts'));
    }

    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'tipe_kontrak'  =>  'required|string',
            'durasi' => 'required|integer'
        ]);

        if ($validated->fails()) {
            Alert::error('Error Title', 'Data Kontrak Tidak Valid');
            return redirect()->back();
        }

        Contract::create($request->all());

        toast('Berhasil Menambahkan Kontrak', 'success');
        return redirect()->route('contract.index');
    }

    public function destroy(string $id)
    {
        $contract = Contract::find($id);
        $contract->delete();

        toast('Kontrak Berhasil Dihapus', 'success');
        return redirect()->route('contract.index');
    }

    public function getContract(Request $request)
    {
        $contract = Contract::where('id', $request->id)->get();
        return response()->json($contract);
    }
}
