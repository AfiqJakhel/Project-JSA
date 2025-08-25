<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\SystemSetting;

class SystemController extends Controller
{
    /**
     * Upload logo
     */
    public function uploadLogo(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        try {
            // Delete old logo if exists
            $oldLogo = SystemSetting::getValue('k3_logo');
            if ($oldLogo && Storage::disk('public')->exists($oldLogo)) {
                Storage::disk('public')->delete($oldLogo);
            }

            // Upload new logo
            $path = $request->file('logo')->store('logos', 'public');
            
            // Save to system settings
            SystemSetting::setValue('k3_logo', $path);

            return response()->json([
                'success' => true,
                'message' => 'Logo berhasil diupload!',
                'path' => $path
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal upload logo: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get current logo
     */
    public function getLogo()
    {
        $logoPath = SystemSetting::getValue('k3_logo');
        
        if ($logoPath && Storage::disk('public')->exists($logoPath)) {
            return response()->json([
                'success' => true,
                'path' => $logoPath,
                'url' => Storage::disk('public')->url($logoPath)
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Logo tidak ditemukan'
        ]);
    }

    /**
     * Delete logo
     */
    public function deleteLogo()
    {
        try {
            $logoPath = SystemSetting::getValue('k3_logo');
            
            if ($logoPath && Storage::disk('public')->exists($logoPath)) {
                Storage::disk('public')->delete($logoPath);
            }

            SystemSetting::setValue('k3_logo', null);

            return response()->json([
                'success' => true,
                'message' => 'Logo berhasil dihapus!'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal hapus logo: ' . $e->getMessage()
            ], 500);
        }
    }
}
