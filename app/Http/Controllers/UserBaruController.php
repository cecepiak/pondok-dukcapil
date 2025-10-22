<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserBaruController extends Controller
{
    public function index(Request $request)
    {
        $users = \App\Models\User::where('active', 0)->latest()->paginate(10); // ✅ Paginate!

        return view('user_baru', compact('users'));
    }

    public function action(Request $request, $id)
    {
        $user = \App\Models\User::findOrFail($id);
        $action = $request->input('action');

        try {
            switch ($action) {
                case 'activate':
                    // Generate OTP 6 digit
                    $otp = \App\Helpers\generateOtp(6);

                    // Simpan ke database
                    $user->update([
                        'active' => 1,
                        'activation_code' => $otp,
                        'activation_code_expires_at' => now()->addMinutes(10), // expired dalam 10 menit
                    ]);

                    // $message = "User berhasil diaktifkan! Kode OTP: {$otp}";
                    // break;
                    $message = "User berhasil diaktifkan! Kode OTP: {$otp}";
                    return response()->json(['message' => $message]);

                case 'edit':
                    $validated = $request->validate([
                        'name' => 'nullable|string|max:255',
                        'email' => 'nullable|email|max:255',
                        'nik' => 'nullable|string|max:255',
                        'kk' => 'nullable|string|max:255',
                        'phone' => 'nullable|string|max:255',
                    ]);

                    $user->update($validated);
                    $message = 'Data user berhasil diperbarui!';
                    break;

                case 'reject':
                    $reason = $request->input('reason');
                    // Opsional: simpan alasan ke log atau kolom tambahan
                    // $user->delete(); // atau update status jadi 'rejected'
                    $user->update(['active' => -1, 'rejected_reason' => $reason]); // -1 = ditolak
                    $message = 'User berhasil ditolak.';
                    break;

                default:
                    return response()->json(['message' => 'Aksi tidak valid'], 400);
            }

            return response()->json(['message' => $message]);

        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal: ' . $e->getMessage()], 500);
        }
    }

    public function resetOtp($id)
    {
        $user = \App\Models\User::findOrFail($id);
        
        $otp = rand(100000, 999999);
        $user->update([
            'activation_code' => $otp,
            'activation_code_expires_at' => now()->addMinutes(10),
        ]);

        return response()->json([
            'message' => "OTP baru: {$otp} (berlaku 10 menit)"
        ]);
    }

    // Contoh di UserController@activate
    public function activate(User $user)
    {
        $user->active = 1;
        $user->save();
        
        return redirect()->back()->with('success', 'User berhasil diaktifkan.');
    }
}