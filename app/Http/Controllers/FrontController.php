<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Document;
use App\Models\VideoBanner;
use Illuminate\Http\Request;
use App\Models\ActivityGallery;
use App\Models\Video; // Pastikan untuk mengimpor model Video

class FrontController extends Controller
{
    public function index()
    {
        $faqs = Faq::with('answers')->get();
        // Mengambil semua data galeri
        $activityGalleries = ActivityGallery::all(); // Mengambil semua galeri kegiatan

        // Mengambil semua video untuk slider
        $videos = Video::all();
        $videoBanner = VideoBanner::all(); // Ambil semua video banner

        // Jika ada video, ambil ID video dari URL
        foreach ($videos as $video) {
            $urlParts = explode('/', $video->youtube_url);
            $video->youtube_url = !empty($urlParts) ? end($urlParts) : null; // Mengubah URL menjadi ID video
        }

        // Mengirimkan data galeri dan video ke view 'fE.home'
        return view('fE.home', compact('activityGalleries', 'videos', 'faqs','videoBanner'));
    }

    public function kajian(Request $request)
    {
        // Ambil filter dan keyword dari input
        $filter = $request->input('filter');
        $search = $request->input('search');
        
        // Query dasar untuk mendapatkan semua dokumen
        $query = Document::query();
    
        // Jika ada filter, tambahkan ke query
        if ($filter) {
            $query->where('category', $filter); // 'category' adalah field yang sesuai dengan filter
        }
    
        // Jika ada pencarian, tambahkan ke query
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('penyusun', 'like', "%{$search}%");
            });
        }
    
        // Ambil data setelah difilter dan/atau dicari dengan pagination
        $documents = $query->paginate(10); // Menampilkan 10 dokumen per halaman
    
        // Kembalikan data ke view
        return view('FE.kajian', compact('documents'));
    }

    public function petasebaran()
    {
        return view('FE.petasebaran');
    }

    public function bantuan()
    {
        return view('FE.bantuan');
    }

    public function infografis()
    {
        return view('FE.infografis');
    }

    public function profile()
    {
        return view('FE.welcome');
    }


    

}
