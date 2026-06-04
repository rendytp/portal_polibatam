<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Layanan;
use App\Models\UserCustomLink;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function dashboard(Request $request) {
        $query = Layanan::with('kategori')->where('is_active', true);

        if ($request->has('search') && $request->search != '') {
            $query->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('deskripsi', 'like', '%' . $request->search . '%');
        }

        if ($request->has('category') && $request->category != '') {
            $query->whereHas('kategori', function($q) use ($request) {
                $q->where('nama_kategori', $request->category);
            });
        }

        $services = $query->get();
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

    public function bookmarks() {
        $services = Auth::user()->favorits()->with('kategori')->get();
        $bookmarkedIds = $services->pluck('id')->toArray();
        return view('user.bookmarks', compact('services', 'bookmarkedIds'));
    }

    public function toggleBookmark($id) {
        $user = Auth::user();
        if ($user->favorits()->where('id_layanan', $id)->exists()) {
            $user->favorits()->detach($id);
        } else {
            $user->favorits()->attach($id);
        }
        return back();
    }

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
        return back()->with('success', 'Custom link ditambahkan!');
    }

    public function updateCustomLink(Request $request, $id) {
        $link = UserCustomLink::where('id', $id)->where('id_user', Auth::id())->firstOrFail();
        $link->update(['judul_link' => $request->name, 'url_link' => $request->url]);
        return back()->with('success', 'Custom link diperbarui!');
    }

    public function deleteCustomLink($id) {
        UserCustomLink::where('id', $id)->where('id_user', Auth::id())->delete();
        return back()->with('success', 'Custom link dihapus!');
    }

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
}