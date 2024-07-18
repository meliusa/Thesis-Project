<?php

namespace App\Http\Controllers\Mely;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PollingDetail;
use App\Models\Voter;

class PollingDetailController extends Controller
{
    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'choice_id' => 'required|exists:polling_details,id',
        ]);
    
        try {
            // Ambil polling detail berdasarkan ID
            $pollingDetail = PollingDetail::findOrFail($request->choice_id);
    
            // Cek apakah user sudah pernah melakukan vote untuk pertanyaan ini
            $existingVoter = Voter::where('user_id', auth()->id())
                                ->where('poll_id', $pollingDetail->poll_id)
                                ->exists();
    
            if ($existingVoter) {
                toast('Anda sudah melakukan voting untuk pertanyaan ini.', 'warning');
            } else {
                // Tambahkan vote pada opsi yang dipilih
                $pollingDetail->increment('votes');
    
                // Simpan data voter
                $voter = new Voter();
                $voter->user_id = auth()->id();
                $voter->poll_id = $pollingDetail->poll_id;
                $voter->poll_detail_id = $pollingDetail->id;
                $voter->save();
    
                toast('Voting Berhasil Dilakukan', 'success');
            }
    
            return redirect()->route('pollings.index');
        } catch (\Exception $e) {
            // Tangani jika terjadi error
            return redirect()->back()->with('error', 'Gagal menambahkan vote. Silakan coba lagi.');
        }
    }
    
}
