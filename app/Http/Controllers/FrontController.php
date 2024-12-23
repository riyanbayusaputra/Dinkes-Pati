<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Banner;
use App\Models\Document;
use App\Models\BeritaModel;
use App\Models\VideoBanner;
use Illuminate\Http\Request;
use App\Models\RatingUsModel;
use App\Models\ActivityGallery;
use Illuminate\Support\Facades\DB;
use App\Models\KritikdansaranModel;
use App\Models\PengumumanModel;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Models\Video; // Pastikan untuk mengimpor model Video
use Carbon\Carbon;

class FrontController extends Controller
{
    public $visitoronline = 0;
    function __construct(Request $request)
    {
        $visitor = DB::table('shetabit_visits')
            ->where('ip', $request->visitor()->ip())
            ->count();
        if ($visitor < 4) {
            $request->visitor()->visit();
        } else {
            DB::table('shetabit_visits')
                ->where('ip', $request->visitor()->ip())
                ->update([
                    'updated_at' => now()
                ]);
        }
        // Query sql live
        // SELECT * FROM `shetabit_visits` WHERE created_at BETWEEN DATE_SUB(NOW() , INTERVAL 10 MINUTE) AND NOW()
        $this->visitoronline = DB::table('shetabit_visits')->distinct('ip')->where('updated_at', '>', Carbon::now()->subMinutes(10))->count();
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

        $visit = DB::table('shetabit_visits')->whereYear('created_at', Carbon::now()->year)->count();
        $visitbulan = DB::table('shetabit_visits')->whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)->count();
        $visithari = DB::table('shetabit_visits')->whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)
            ->whereDay('created_at', Carbon::now()->format('d'))
            ->count();

        // return $visithari;
        // Mengirimkan data galeri dan video ke view 'fE.home'
        return view('FE.home', compact('activityGalleries', 'videos', 'faqs', 'videoBanner', 'berita', 'visit'));
    }
    public function index(Request $request)
    {
        $faqs = Faq::with('answers')->get();
        // Mengambil semua data galeri
        $activityGalleries = ActivityGallery::limit(6)->get(); // Mengambil semua galeri kegiatan
        $berita = BeritaModel::limit(3)->orderBy('created_at', 'DESC')->get(); // Mengambil semua galeri kegiatan
        $banners = Banner::all();
        // Mengambil semua video untuk slider
        $videos = Video::limit(6)->get();
        $videoBanner = VideoBanner::all(); // Ambil semua video banner

        // Jika ada video, ambil ID video dari URL
        foreach ($videos as $video) {
            $urlParts = explode('/', $video->youtube_url);
            $video->youtube_url = !empty($urlParts) ? end($urlParts) : null; // Mengubah URL menjadi ID video
        }

        $visit = DB::table('shetabit_visits')->whereYear('created_at', Carbon::now()->year)->count();
        $visitbulan = DB::table('shetabit_visits')->whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)->count();
        $visithari = DB::table('shetabit_visits')->whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)
            ->whereDay('created_at', Carbon::now()->format('d'))
            ->count();

        $pgn = PengumumanModel::whereDate('selesai', '>=',  Carbon::now()->format('Y-m-d'))
            ->get();
        // return $request->visitor()->onlineVisitors(User::class);
        // return $pgn;

        // return [$visit, $visitbulan, $visithari];
        // Mengirimkan data galeri dan video ke view 'fE.home'
        // return view('FE.home2', compact('activityGalleries', 'videos', 'faqs', 'videoBanner', 'berita', 'visit'));
        $vo = $this->visitoronline;
        // return now()->format('h:i:s');
        // return $vo;
        $rating = RatingUsModel::get();
        $star0 = 0;
        $star = [
            0,
            0,
            0,
            0,
            0,
            0,
        ];
        foreach ($rating as $key => $v) {
            if ($v->rate == 1) {
                $star[1]++;
            }
            if ($v->rate == 2) {
                $star[2]++;
            }
            if ($v->rate == 3) {
                $star[3]++;
            }
            if ($v->rate == 4) {
                $star[4]++;
            }
            if ($v->rate == 5) {
                $star[5]++;
            }
        }
        $star0 = round(count($rating) / 5, 2);
        return view('FE.mainhome', compact(
            'rating',
            'star0',
            'star',
            'vo',
            'activityGalleries',
            'videos',
            'faqs',
            'videoBanner',
            'berita',
            'visit',
            'banners',
            'visitbulan',
            'visithari',
            'pgn'
        ));
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
        $visit = DB::table('shetabit_visits')->whereYear('created_at', Carbon::now()->year)->count();
        $visitbulan = DB::table('shetabit_visits')->whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)->count();
        $visithari = DB::table('shetabit_visits')->whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)
            ->whereDay('created_at', Carbon::now()->format('d'))
            ->count();
        $vo = $this->visitoronline;

        // Ambil data setelah difilter dan/atau dicari dengan pagination
        $documents = $query->paginate(10); // Menampilkan 10 dokumen per halaman

        $rating = RatingUsModel::get();
        $star0 = 0;
        $star = [
            0,
            0,
            0,
            0,
            0,
            0,
        ];
        foreach ($rating as $key => $v) {
            if ($v->rate == 1) {
                $star[1]++;
            }
            if ($v->rate == 2) {
                $star[2]++;
            }
            if ($v->rate == 3) {
                $star[3]++;
            }
            if ($v->rate == 4) {
                $star[4]++;
            }
            if ($v->rate == 5) {
                $star[5]++;
            }
        }
        $star0 = round(count($rating) / 5, 2);
        // Kembalikan data ke view
        return view('FE.kajian', compact(
            'rating',
            'star0',
            'star',
            'vo',
            'documents',
            'visit',
            'visitbulan',
            'visithari'
        ));
    }

    public function petasebaran()
    {
        $visit = DB::table('shetabit_visits')->whereYear('created_at', Carbon::now()->year)->count();
        $visitbulan = DB::table('shetabit_visits')->whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)->count();
        $visithari = DB::table('shetabit_visits')->whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)
            ->whereDay('created_at', Carbon::now()->format('d'))
            ->count();
        $vo = $this->visitoronline;

        $rating = RatingUsModel::get();
        $star0 = 0;
        $star = [
            0,
            0,
            0,
            0,
            0,
            0,
        ];
        foreach ($rating as $key => $v) {
            if ($v->rate == 1) {
                $star[1]++;
            }
            if ($v->rate == 2) {
                $star[2]++;
            }
            if ($v->rate == 3) {
                $star[3]++;
            }
            if ($v->rate == 4) {
                $star[4]++;
            }
            if ($v->rate == 5) {
                $star[5]++;
            }
        }
        $star0 = round(count($rating) / 5, 2);

        // return $data;
        return view('FE.petasebaran', compact(
            'rating',
            'star0',
            'star',
            'vo',
            'visit',
            'visitbulan',
            'visithari'
        ));
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

    public function faq()
    {
        $visit = DB::table('shetabit_visits')->whereYear('created_at', Carbon::now()->year)->count();
        $visitbulan = DB::table('shetabit_visits')->whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)->count();
        $visithari = DB::table('shetabit_visits')->whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)
            ->whereDay('created_at', Carbon::now()->format('d'))
            ->count();
        $vo = $this->visitoronline;
        $rating = RatingUsModel::get();
        $star0 = 0;
        $star = [
            0,
            0,
            0,
            0,
            0,
            0,
        ];
        foreach ($rating as $key => $v) {
            if ($v->rate == 1) {
                $star[1]++;
            }
            if ($v->rate == 2) {
                $star[2]++;
            }
            if ($v->rate == 3) {
                $star[3]++;
            }
            if ($v->rate == 4) {
                $star[4]++;
            }
            if ($v->rate == 5) {
                $star[5]++;
            }
        }
        $star0 = round(count($rating) / 5, 2);
        $faqs = Faq::with('answers')->get();
        return view('FE.bantuan', compact(
            'rating',
            'star0',
            'star',
            'vo',
            'visit',
            'visitbulan',
            'visithari',
            'faqs'
        ));
    }

    public function kontakkami()
    {
        $visit = DB::table('shetabit_visits')->whereYear('created_at', Carbon::now()->year)->count();
        $visitbulan = DB::table('shetabit_visits')->whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)->count();
        $visithari = DB::table('shetabit_visits')->whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)
            ->whereDay('created_at', Carbon::now()->format('d'))
            ->count();
        $vo = $this->visitoronline;
        $rating = RatingUsModel::get();
        $star0 = 0;
        $star = [
            0,
            0,
            0,
            0,
            0,
            0,
        ];
        foreach ($rating as $key => $v) {
            if ($v->rate == 1) {
                $star[1]++;
            }
            if ($v->rate == 2) {
                $star[2]++;
            }
            if ($v->rate == 3) {
                $star[3]++;
            }
            if ($v->rate == 4) {
                $star[4]++;
            }
            if ($v->rate == 5) {
                $star[5]++;
            }
        }
        $star0 = round(count($rating) / 5, 2);
        return view('FE.kontakkami', compact(
            'rating',
            'star0',
            'star',
            'vo',
            'visit',
            'visitbulan',
            'visithari'
        ));
    }
    public function pengumuman()
    {
        $visit = DB::table('shetabit_visits')->whereYear('created_at', Carbon::now()->year)->count();
        $visitbulan = DB::table('shetabit_visits')->whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)->count();
        $visithari = DB::table('shetabit_visits')->whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)
            ->whereDay('created_at', Carbon::now()->format('d'))
            ->count();
        $vo = $this->visitoronline;
        $rating = RatingUsModel::get();
        $star0 = 0;
        $star = [
            0,
            0,
            0,
            0,
            0,
            0,
        ];
        foreach ($rating as $key => $v) {
            if ($v->rate == 1) {
                $star[1]++;
            }
            if ($v->rate == 2) {
                $star[2]++;
            }
            if ($v->rate == 3) {
                $star[3]++;
            }
            if ($v->rate == 4) {
                $star[4]++;
            }
            if ($v->rate == 5) {
                $star[5]++;
            }
        }
        $star0 = round(count($rating) / 5, 2);
        $pengumuman = PengumumanModel::paginate(6);
        return view('FE.pengumuman', compact(
            'rating',
            'star0',
            'star',
            'vo',
            'visit',
            'visitbulan',
            'visithari',
            'pengumuman'
        ));
    }
    public function panduan()
    {
        $visit = DB::table('shetabit_visits')->whereYear('created_at', Carbon::now()->year)->count();
        $visitbulan = DB::table('shetabit_visits')->whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)->count();
        $visithari = DB::table('shetabit_visits')->whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)
            ->whereDay('created_at', Carbon::now()->format('d'))
            ->count();
        $vo = $this->visitoronline;
        $rating = RatingUsModel::get();
        $star0 = 0;
        $star = [
            0,
            0,
            0,
            0,
            0,
            0,
        ];
        foreach ($rating as $key => $v) {
            if ($v->rate == 1) {
                $star[1]++;
            }
            if ($v->rate == 2) {
                $star[2]++;
            }
            if ($v->rate == 3) {
                $star[3]++;
            }
            if ($v->rate == 4) {
                $star[4]++;
            }
            if ($v->rate == 5) {
                $star[5]++;
            }
        }
        $star0 = round(count($rating) / 5, 2);
        $pengumuman = PengumumanModel::get();
        return view('FE.panduan', compact(
            'rating',
            'star0',
            'star',
            'vo',
            'visit',
            'visitbulan',
            'visithari',
            'pengumuman'
        ));
    }

    public function infografis()
    {
        $visit = DB::table('shetabit_visits')->whereYear('created_at', Carbon::now()->year)->count();
        $visitbulan = DB::table('shetabit_visits')->whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)->count();
        $visithari = DB::table('shetabit_visits')->whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)
            ->whereDay('created_at', Carbon::now()->format('d'))
            ->count();
        $vo = $this->visitoronline;
        $rating = RatingUsModel::get();
        $star0 = 0;
        $star = [
            0,
            0,
            0,
            0,
            0,
            0,
        ];
        foreach ($rating as $key => $v) {
            if ($v->rate == 1) {
                $star[1]++;
            }
            if ($v->rate == 2) {
                $star[2]++;
            }
            if ($v->rate == 3) {
                $star[3]++;
            }
            if ($v->rate == 4) {
                $star[4]++;
            }
            if ($v->rate == 5) {
                $star[5]++;
            }
        }
        $star0 = round(count($rating) / 5, 2);
        return view('FE.infografis', compact(
            'rating',
            'star0',
            'star',
            'vo',
            'visit',
            'visitbulan',
            'visithari'
        ));
    }

    public function profile()
    {
        $visit = DB::table('shetabit_visits')->whereYear('created_at', Carbon::now()->year)->count();
        $visitbulan = DB::table('shetabit_visits')->whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)->count();
        $visithari = DB::table('shetabit_visits')->whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)
            ->whereDay('created_at', Carbon::now()->format('d'))
            ->count();
        $vo = $this->visitoronline;
        $rating = RatingUsModel::get();
        $star0 = 0;
        $star = [
            0,
            0,
            0,
            0,
            0,
            0,
        ];
        foreach ($rating as $key => $v) {
            if ($v->rate == 1) {
                $star[1]++;
            }
            if ($v->rate == 2) {
                $star[2]++;
            }
            if ($v->rate == 3) {
                $star[3]++;
            }
            if ($v->rate == 4) {
                $star[4]++;
            }
            if ($v->rate == 5) {
                $star[5]++;
            }
        }
        $star0 = round(count($rating) / 5, 2);
        return view('FE.welcome', compact(
            'rating',
            'star0',
            'star',
            'vo',
            'visit',
            'visitbulan',
            'visithari'
        ));
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
        // return $request->all();
        // Validasi input
        $validated = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'rate' => 'required|integer|min:1|max:5', // Pastikan rating antara 1 dan 5
        ]);

        if ($validated->fails()) {
            return Redirect::back()->withErrors($validated)->withInput()->with('info', 'Pastikan data sudah terisi semua');
        }

        // Menyimpan data
        $k = RatingUsModel::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'rate' => $request->rate,
        ]);
        if ($request->ajax()) {
            if ($k) {
                return response()->json([
                    'alert' => 'success',
                    'msg' => 'Data tersimpan'
                ], 200);
            }
            return response()->json('Data tidak tersimpan', 400);
        }

        if ($k) {
            // Jika sukses, beri pesan sukses dan kosongkan form
            return Redirect::back()->with('info', 'Terima kasih atas kritik dan sarannya')->withInput();
        }

        return Redirect::back()->with('info', 'Kritik dan saran gagal tersimpan')->withInput();
    }


    public function listgallery(Request $request)
    {
        $visit = DB::table('shetabit_visits')->whereYear('created_at', Carbon::now()->year)->count();
        $visitbulan = DB::table('shetabit_visits')->whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)->count();
        $visithari = DB::table('shetabit_visits')->whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)
            ->whereDay('created_at', Carbon::now()->format('d'))
            ->count();
        $vo = $this->visitoronline;
        $rating = RatingUsModel::get();
        $star0 = 0;
        $star = [
            0,
            0,
            0,
            0,
            0,
            0,
        ];
        foreach ($rating as $key => $v) {
            if ($v->rate == 1) {
                $star[1]++;
            }
            if ($v->rate == 2) {
                $star[2]++;
            }
            if ($v->rate == 3) {
                $star[3]++;
            }
            if ($v->rate == 4) {
                $star[4]++;
            }
            if ($v->rate == 5) {
                $star[5]++;
            }
        }
        $star0 = round(count($rating) / 5, 2);
        $activityGalleries = ActivityGallery::paginate(6);

        // return $activityGalleries;
        return view('FE.daftargallery',  compact(
            'rating',
            'star0',
            'star',
            'vo',
            'visit',
            'visitbulan',
            'visithari',
            'activityGalleries'
        ));
    }
    public function daftarberita(Request $request)
    {
        $visit = DB::table('shetabit_visits')->whereYear('created_at', Carbon::now()->year)->count();
        $visitbulan = DB::table('shetabit_visits')->whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)->count();
        $visithari = DB::table('shetabit_visits')->whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)
            ->whereDay('created_at', Carbon::now()->format('d'))
            ->count();
        $vo = $this->visitoronline;
        $rating = RatingUsModel::get();
        $star0 = 0;
        $star = [
            0,
            0,
            0,
            0,
            0,
            0,
        ];
        foreach ($rating as $key => $v) {
            if ($v->rate == 1) {
                $star[1]++;
            }
            if ($v->rate == 2) {
                $star[2]++;
            }
            if ($v->rate == 3) {
                $star[3]++;
            }
            if ($v->rate == 4) {
                $star[4]++;
            }
            if ($v->rate == 5) {
                $star[5]++;
            }
        }
        $star0 = round(count($rating) / 5, 2);

        $activityGalleries = BeritaModel::orderBy('created_at', 'DESC')->paginate(6);

        // return $activityGalleries;
        return view('FE.daftarberita',  compact(
            'rating',
            'star0',
            'star',
            'vo',
            'visit',
            'visitbulan',
            'visithari',
            'activityGalleries'
        ));
    }

    public function bacaberita(Request $request)
    {
        // return $request->all();
        $visit = DB::table('shetabit_visits')->whereYear('created_at', Carbon::now()->year)->count();
        $visitbulan = DB::table('shetabit_visits')->whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)->count();
        $visithari = DB::table('shetabit_visits')->whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)
            ->whereDay('created_at', Carbon::now()->format('d'))
            ->count();
        $vo = $this->visitoronline;
        $rating = RatingUsModel::get();
        $star0 = 0;
        $star = [
            0,
            0,
            0,
            0,
            0,
            0,
        ];
        foreach ($rating as $key => $v) {
            if ($v->rate == 1) {
                $star[1]++;
            }
            if ($v->rate == 2) {
                $star[2]++;
            }
            if ($v->rate == 3) {
                $star[3]++;
            }
            if ($v->rate == 4) {
                $star[4]++;
            }
            if ($v->rate == 5) {
                $star[5]++;
            }
        }
        $star0 = round(count($rating) / 5, 2);

        $detailberita = BeritaModel::where('activity_title', str_replace('-', ' ', $request->kontenberita))->first();

        return view('FE.bacaberita',  compact(
            'rating',
            'star0',
            'star',
            'vo',
            'visit',
            'visitbulan',
            'visithari',
            'detailberita'
        ));
    }
    public function bacapengumuman(Request $request)
    {
        // return $request->all();
        $visit = DB::table('shetabit_visits')->whereYear('created_at', Carbon::now()->year)->count();
        $visitbulan = DB::table('shetabit_visits')->whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)->count();
        $visithari = DB::table('shetabit_visits')->whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)
            ->whereDay('created_at', Carbon::now()->format('d'))
            ->count();
        $vo = $this->visitoronline;
        $rating = RatingUsModel::get();
        $star0 = 0;
        $star = [
            0,
            0,
            0,
            0,
            0,
            0,
        ];
        foreach ($rating as $key => $v) {
            if ($v->rate == 1) {
                $star[1]++;
            }
            if ($v->rate == 2) {
                $star[2]++;
            }
            if ($v->rate == 3) {
                $star[3]++;
            }
            if ($v->rate == 4) {
                $star[4]++;
            }
            if ($v->rate == 5) {
                $star[5]++;
            }
        }
        $star0 = round(count($rating) / 5, 2);

        $detailberita = PengumumanModel::where('judul', str_replace('-', ' ', $request->kontenpengumuman))->first();
        // return $detailberita;

        return view('FE.bacapengumuman',  compact(
            'rating',
            'star0',
            'star',
            'vo',
            'visit',
            'visitbulan',
            'visithari',
            'detailberita'
        ));
    }
}
