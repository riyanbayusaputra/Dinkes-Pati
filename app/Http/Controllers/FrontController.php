<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Document;
use App\Models\VideoBanner;
use Illuminate\Http\Request;
use App\Models\ActivityGallery;
use App\Models\BeritaModel;
use App\Models\KritikdansaranModel;
use App\Models\RatingUsModel;
use App\Models\Video; // Pastikan untuk mengimpor model Video
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class FrontController extends Controller
{
    function __construct(Request $request)
    {
        $visitor = DB::table('shetabit_visits')
            ->where('ip', $request->visitor()->ip())
            ->count();
        if ($visitor < 4) {
            $request->visitor()->visit();
        }
    }

    public function index2()
    {
        $faqs = Faq::with('answers')->get();
        // Mengambil semua data galeri
        $activityGalleries = ActivityGallery::limit(3)->get(); // Mengambil semua galeri kegiatan
        $berita = BeritaModel::limit(4)->get(); // Mengambil semua galeri kegiatan

        // Mengambil semua video untuk slider
        $videos = Video::all();
        $videoBanner = VideoBanner::all(); // Ambil semua video banner

        // Jika ada video, ambil ID video dari URL
        foreach ($videos as $video) {
            $urlParts = explode('/', $video->youtube_url);
            $video->youtube_url = !empty($urlParts) ? end($urlParts) : null; // Mengubah URL menjadi ID video
        }

        $visit = DB::table('shetabit_visits')->count();
        // Mengirimkan data galeri dan video ke view 'fE.home'
        return view('FE.home', compact('activityGalleries', 'videos', 'faqs', 'videoBanner', 'berita', 'visit'));
    }
    public function index(Request $request)
    {
        $faqs = Faq::with('answers')->get();
        // Mengambil semua data galeri
        $activityGalleries = ActivityGallery::limit(3)->get(); // Mengambil semua galeri kegiatan
        $berita = BeritaModel::limit(4)->get(); // Mengambil semua galeri kegiatan

        // Mengambil semua video untuk slider
        $videos = Video::all();
        $videoBanner = VideoBanner::all(); // Ambil semua video banner

        // Jika ada video, ambil ID video dari URL
        foreach ($videos as $video) {
            $urlParts = explode('/', $video->youtube_url);
            $video->youtube_url = !empty($urlParts) ? end($urlParts) : null; // Mengubah URL menjadi ID video
        }

        $visit = DB::table('shetabit_visits')->count();
        // Mengirimkan data galeri dan video ke view 'fE.home'
        return view('FE.home2', compact('activityGalleries', 'videos', 'faqs', 'videoBanner', 'berita', 'visit'));
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
            $query->where(function ($q) use ($search) {
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

        // return $data;
        return view('FE.petasebaran');
    }

    public function getkoordinatpdam()
    {
        $data['koorpdam'] = [];
        $jsonpdam = Storage::disk('public_uploads')->get('Jaringan_pipa_FeaturesToJSON1.json');
        // return $jsonpdam;
        $json = json_decode($jsonpdam, true);

        return response()->json([
            'data' => $json['features'],
            'success' => true
        ], 200);
    }
    public function getkoordinatkawankumuh()
    {
        $jsonpdam = Storage::disk('public_uploads')->get('Revisi_SHP_Kawasan_Permukima2.json');
        // return $jsonpdam;
        $json = json_decode($jsonpdam, true);

        return response()->json([
            'data' => $json['features'],
            'success' => true
        ], 200);
    }
    public function getkoordinattransport()
    {
        $jsonpdam = Storage::disk('public_uploads')->get('_3318_50KB_LN_SR_SDA_PATI_202.json');
        // return $jsonpdam;
        $json = json_decode($jsonpdam, true);

        return response()->json([
            'data' => $json['features'],
            'success' => true
        ], 200);
    }
    public function getkoordinatirigasi()
    {
        $jsonpdam = Storage::disk('public_uploads')->get('_3318_50KB_PT_SR_SDA_PATI_203.json');
        // return $jsonpdam;
        $json = json_decode($jsonpdam, true);

        return response()->json([
            'data' => $json['features'],
            'success' => true
        ], 200);
    }
    public function getkoordinattaklayakhuni()
    {
        $jsonpdam = Storage::disk('public_uploads')->get('_3318_50KB_PT_SR_SDA_PATI_204.json');
        // return $jsonpdam;
        $json = json_decode($jsonpdam, true);

        return response()->json([
            'data' => $json['features'],
            'success' => true
        ], 200);
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

    public function kritikdansaran(Request $request)
    {
        // return $request->all();
        // Validasi input
        $validated = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'email' => 'required',
            'pesan' => 'required',
        ]);
        if ($validated->fails()) {
            return Redirect::back()->withErrors($validated)->withInput($request->all())->with('info', 'Data tidak sesuai');
        }

        $k = KritikdansaranModel::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'pesan' => $request->pesan,
        ]);
        if ($k) {
            return Redirect::back()->with('info', 'Terima kasih atas kritik dan sarannya');
        }
        return Redirect::back()->with('info', 'kritik dan saran gagal tersimpan');
    }
    public function setratingus(Request $request)
    {
        // Validasi input
        $validated = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'email' => 'required',
            'rate' => 'required',
        ]);
        if ($validated->fails()) {
            return Redirect::back()->withErrors($validated)->withInput($request->all())->with('info', 'Pastikan data sudah terisi semua');
        }

        $k = RatingUsModel::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'rate' => $request->rate,
        ]);
        if ($k) {
            return Redirect::back()->with('info', 'Terima kasih atas kritik dan sarannya');
        }
        return Redirect::back()->with('info', 'kritik dan saran gagal tersimpan');
    }
}
