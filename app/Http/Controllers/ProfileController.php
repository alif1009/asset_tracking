<?php

   namespace App\Http\Controllers;

   use Illuminate\Http\Request;
   use Illuminate\Support\Facades\Auth;
   use Illuminate\Support\Facades\Storage;

   class ProfileController extends Controller
   {
       // 1. Menampilkan Halaman Edit Profil
       public function edit()
       {
           $user = Auth::user();
           return view('edit-profile', compact('user'));
       }

       // 2. Memproses Update Nama dan Foto
       public function update(Request $request)
       {
           $user = Auth::user();

           // Validasi input
           $request->validate([
               'name' => 'required|string|max:255',
               'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Maksimal 2MB
           ]);

           // Update Nama
           $user->name = $request->name;

           // Logika jika user mengupload foto baru
           if ($request->hasFile('profile_photo')) {
               // Hapus foto lama dari storage jika ada (bukan foto default)
               if ($user->profile_photo && Storage::disk('public')->exists($user->profile_photo)) {
                   Storage::disk('public')->delete($user->profile_photo);
               }

               // Simpan foto baru ke folder 'public/profile_photos'
               $path = $request->file('profile_photo')->store('profile_photos', 'public');
               $user->profile_photo = $path;
           }

           $user->save();

           return redirect()->route('dashboard')->with('success', 'Profil berhasil diperbarui!');
       }
   }