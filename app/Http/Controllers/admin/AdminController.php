<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Layanan;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard() {
        $stats = [
            'total_layanan' => Layanan::count(),
            'layanan_aktif' => Layanan::where('is_active', true)->count(),
            'total_user' => User::count()
        ];
        return view('admin.dashboard', compact('stats'));
    }

    public function manageServices() {
        $services = Layanan::with('kategori')->get();
        return view('admin.manage-services', compact('services'));
    }

    public function storeService(Request $request) {
        $kategori = Kategori::firstOrCreate(['nama_kategori' => $request->category]);

        Layanan::create([
            'id_kategori' => $kategori->id_kategori,
            'nama' => $request->name,
            'deskripsi' => $request->description,
            'url_layanan' => $request->url,
            'is_active' => $request->has('is_active'),
            'icon' => 'globe',
        ]);

        return back()->with('success', 'Layanan berhasil ditambahkan!');
    }

    public function updateService(Request $request, $id) {
        $layanan = Layanan::findOrFail($id);
        $kategori = Kategori::firstOrCreate(['nama_kategori' => $request->category]);

        $layanan->update([
            'id_kategori' => $kategori->id_kategori,
            'nama' => $request->name,
            'deskripsi' => $request->description,
            'url_layanan' => $request->url,
            'is_active' => $request->has('is_active'),
        ]);

        return back()->with('success', 'Layanan berhasil diperbarui!');
    }

    public function deleteService($id) {
        Layanan::findOrFail($id)->delete();
        return back()->with('success', 'Layanan dihapus!');
    }

    public function manageUsers(Request $request) {
        $query = User::withCount('favorits');
        if ($request->has('search')) {
            $query->where('username', 'like', '%'.$request->search.'%');
        }
        $users = $query->get();
        return view('admin.manage-users', compact('users'));
    }

    public function deleteUser($id) {
        if (Auth::id() == $id) {
            return back()->withErrors('Tidak dapat menghapus akun sendiri!');
        }
        User::findOrFail($id)->delete();
        return back()->with('success', 'User dihapus!');
    }
}