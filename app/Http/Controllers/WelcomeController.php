<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use App\Models\Bantuan;
use App\Models\User;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function welcome()
    {
        $warga = Warga::count();
        $user = User::count();
        $databantuan = bantuan::count();

        $tanggal_awal = date('Y-m-01');
        $tanggal_akhir = date('Y-m-d');

        $data_tanggal = array();
        $data_pendapatan = array();

        while (strtotime($tanggal_awal) <= strtotime($tanggal_akhir)) {
            $data_tanggal[] = (int) substr($tanggal_awal, 8, 2);

            $total_bantuan = bantuan::where('created_at', 'LIKE', "%$tanggal_awal%")->sum('total_bantuan');

            $pendapatan = $total_bantuan;
            $data_pendapatan[] += $pendapatan;

            $tanggal_awal = date('Y-m-d', strtotime("+1 day", strtotime($tanggal_awal)));
        }

        return view('welcome',[
            "warga"=> $warga,
            "user"=> $user,
            "databantuan" => bantuan::paginate(5),
            "title"=>"welcome"
        ]);
        
    }

    
}
