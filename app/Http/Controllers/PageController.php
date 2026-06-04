<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Layanan;
use App\Models\Kategori;
use App\Models\UserCustomLink;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PageController extends Controller
{
    // ==========================================
    // 1. HALAMAN PUBLIK & DASHBOARD USER
    // ==========================================
    
    public function landing() {
        return view('landing'); // Di root views
    }

    public function userDashboard(Request $request) {
        $query = Layanan::with('kategori')->where('is_active', true);

        // Filter Pencarian
        if ($request->has('search') && $request->search != '') {
            $query->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('deskripsi', 'like', '%' . $request->search . '%');
        }

        // Filter Kategori
        if ($request->has('category') && $request->category != '') {
            $query->whereHas('kategori', function($q) use ($request) {
                $q->where('nama_kategori', $request->category);
            });
        }

        $services = $query->get();
        // Cek layanan mana saja yang sudah di-bookmark user saat ini
        $bookmarkedIds = Auth::user()->favorits->pluck('id')->toArray();

        return view('user.dashboard', compact('services', 'bookmarkedIds'));
    }

    public function search(Request $request) {
        $q = $request->q;
        $services = [];
        if ($q) {
            $services = Layanan::with('kategori')->where('is_active', true)
                ->where(function($query) use ($q) {
                    $query->where('nama', 'like', "%{$q}%")
                          ->orWhere('deskripsi', 'like', "%{$q}%");
                })->get();
        }
        $bookmarkedIds = Auth::user()->favorits->pluck('id')->toArray();
        return view('user.search', compact('services', 'q', 'bookmarkedIds'));
    }

    // ==========================================
    // 2. FITUR FAVORIT / BOOKMARK
    // ==========================================

    public function bookmarks() {
        // Ambil layanan yang ditandai favorit oleh user
        $services = Auth::user()->favorits()->with('kategori')->get();
        $bookmarkedIds = $services->pluck('id')->toArray();
        return view('user.bookmarks', compact('services', 'bookmarkedIds'));
    }

    public function toggleBookmark($id) {
        $user = Auth::user();
        $isFavorited = $user->favorits()->where('id_layanan', $id)->exists();

        if ($isFavorited) {
            $user->favorits()->detach($id); // Hapus dari favorit
        } else {
            $user->favorits()->attach($id); // Tambahkan ke favorit
        }
        
        return back();
    }

    // ==========================================
    // 3. FITUR CUSTOM LINKS USER
    // ==========================================

    public function customLinks() {
        $links = Auth::user()->customLinks;
        return view('user.custom-links', compact('links'));
    }

    public function storeCustomLink(Request $request) {
        UserCustomLink::create([
            'id_user' => Auth::id(),
            'judul_link' => $request->name,
            'url_link' => $request->url,
        ]);
        return back()->with('success', 'Custom link berhasil ditambahkan!');
    }

    public function updateCustomLink(Request $request, $id) {
        $link = UserCustomLink::where('id', $id)->where('id_user', Auth::id())->firstOrFail();
        $link->update([
            'judul_link' => $request->name,
            'url_link' => $request->url,
        ]);
        return back()->with('success', 'Custom link diperbarui!');
    }

    public function deleteCustomLink($id) {
        UserCustomLink::where('id', $id)->where('id_user', Auth::id())->delete();
        return back()->with('success', 'Custom link dihapus!');
    }

    // ==========================================
    // 4. PROFIL USER
    // ==========================================

    public function profile() {
        return view('user.profile');
    }

    public function updateProfile(Request $request) {
        $user = Auth::user();
        $request->validate(['username' => 'required|unique:users,username,'.$user->id]);
        $user->update(['username' => $request->username]);
        return back()->with('success', 'Profil diperbarui!');
    }

    public function updatePassword(Request $request) {
        $request->validate(['password' => 'required|min:6']);
        Auth::user()->update(['password' => Hash::make($request->password)]);
        return back()->with('success', 'Password berhasil diubah!');
    }

    // ==========================================
    // 5. FITUR KHUSUS ADMIN
    // ==========================================

    public function adminDashboard() {
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
        // Cek atau buat kategori baru otomatis
        $kategori = Kategori::firstOrCreate(['nama_kategori' => $request->category]);

        Layanan::create([
            'id_kategori' => $kategori->id_kategori,
            'nama' => $request->name,
            'deskripsi' => $request->description,
            'url_layanan' => $request->url,
            'is_active' => $request->has('is_active'),
            'icon' => 'globe', // default
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
        return back()->with('success', 'Layanan berhasil dihapus!');
    }

    public function manageUsers(Request $request) {
        $query = User::withCount('favorits'); // Dapatkan jumlah bookmark per user
        if ($request->has('search')) {
            $query->where('username', 'like', '%'.$request->search.'%');
        }
        $users = $query->get();
        return view('admin.manage-users', compact('users'));
    }

    public function deleteUser($id) {
        if (Auth::id() == $id) {
            return back()->withErrors('Anda tidak dapat menghapus akun Anda sendiri!');
        }
        User::findOrFail($id)->delete();
        return back()->with('success', 'User berhasil dihapus!');
    }
}