<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Guest;
use App\Models\GuestR;
use Biobii\NaiveBayes;
use Biobii\Stemmer;
use Ramsey\Uuid\Guid\Guid;
use Termwind\Components\Dd;
use Illuminate\Http\Request;

class bayesController extends Controller
{


    public function bayes(Request $request)
    {

        $nama = $request->input('nama');
        $k = $request->input('keadaan');
        $k2 = $request->input('keadaan2');
        $k3 = $request->input('keadaan3');
        $k4 = $request->input('keadaan4');
        if ($k3 == 'bahan bukan kulit' && $k4 == 'Berbau') {
            $k2 = "sepatu kotor luar dalam";
        }
        if ($k3 == 'bahan kulit' && $k == 'sepatu kotor') {
            $k2 = "sepatu kotor luar dalam";
        }

        $data = [
            [
                'text' => 'sepatu bersih',
                'class' => 'Bersih'
            ],
            [
                'text' => 'Tidak Bau',
                'class' => 'Bersih'
            ],
            [
                'text' => 'bahan bukan kulit',
                'class' => 'Bersih'
            ],
            [
                'text' => 'sepatu kotor',
                'class' => 'Simple Cleanning'
            ],
            [
                'text' => 'Tidak Bau ',
                'class' => 'Simple Cleanning'
            ],
            [
                'text' => 'sepatu kotor luar ',
                'class' => 'Simple Cleanning'
            ],
            [
                'text' => 'bahan bukan kulit',
                'class' => 'Simple Cleanning'
            ],
            [
                'text' => 'sepatu kotor',
                'class' => 'Premium Cleanning'
            ],
            [
                'text' => 'Berbau',
                'class' => 'Premium Cleanning'
            ],
            [
                'text' => 'sepatu kotor luar dalam',
                'class' => 'Premium Cleanning'
            ],
            [
                'text' => 'bahan bukan kulit',
                'class' => 'Premium Cleanning'
            ],
            [
                'text' => 'sepatu kotor',
                'class' => 'Expert Cleanning'
            ],
            [
                'text' => 'bahan kulit',
                'class' => 'Expert Cleanning'
            ],
            [
                'text' => 'sepatu kotor luar dalam',
                'class' => 'Expert Cleanning'
            ],




        ];
        $menu = Menu::all();
        $nb = new NaiveBayes();
        $nb->setClass(['Bersih', 'Simple Cleanning', 'Premium Cleanning', 'Expert Cleanning']);
        $nb->training($data);
        $data_input = $k3 . ' ' . $k . ' ' . $k4 . ' ' . $k2;
        $hasil = $nb->predict($data_input);

        $cetak = $nb->testClass;

        $validateData = $request->validate(
            [
                'nama' => 'required|min:3|max:255',
                'keadaan' => 'required',
                'keadaan4' => 'required',
            ],
            [
                'nama.min' => 'Nama Anda Terlalu sedikit!'
            ]
        );

        $validateData['keadaan3'] = $k3;
        $validateData['keadaan2'] = $k2;
        $validateData['hasil'] = $hasil;

        Guest::create($validateData);
        return view('bayes', [
            'hasil' => $hasil,
            "title" => 'Salvator Cleaning Shoes',
            'bla' => 'Tidak Bersih',
            'lal' => 'Bersih',
            "nama" => $nama,
            'menu' => $menu,
            'data1' => $k,
            'data2' => $k2,
            'data3' => $k3,
            'data4' => $k4,
            'cetak' => $cetak
        ]);
    }

    public function bayesR(Request $request)
    {
        $menu = Menu::all();
        $nama = $request->input('nama');
        $k = $request->input('keadaan');
        $k2 = $request->input('keadaan2');
        $k3 = $request->input('keadaan3');
        $k4 = $request->input('keadaan4');
        $k5 = NULL;
        $data = [
            [
                'text' => 'sol sepatu kuning',
                'class' => 'Unyellowing'
            ],
            [
                'text' => 'bukan',
                'class' => 'Unyellowing'
            ],
            [
                'text' => 'tidak tidak',
                'class' => 'Bersih'
            ],
            [
                'text' => 'warna sepatu pudar',
                'class' => 'Basic Colour Shoes'
            ],
            [
                'text' => 'sepatu kulit',
                'class' => 'Leather Basic Colour'
            ],
            [
                'text' => 'sepatu kulit sekali',
                'class' => 'Leather Basic Colour'
            ],
            [
                'text' => 'bahan lain',
                'class' => 'Basic Colour Shoes'
            ],
            [
                'text' => 'ganti warna',
                'class' => 'Custom Repaint'
            ],
            [
                'text' => 'warna sepatu pudar',
                'class' => 'Custom Repaint'
            ],
        ];

        if ($k3 === "ganti warna") {
            $k4 = "warna sepatu pudar";
        }
        if ($k === "sepatu kulit") {
            $k5 = "sepatu kulit sekali";
        }
        $nb = new NaiveBayes();
        $nb->setClass(['Unyellowing', 'Basic Colour Shoes', 'Custom Repaint', 'Leather Basic Colour', 'Bersih']);
        $nb->training($data);

        $data_input = $k . ' ' . $k4 . ' ' . $k2 . ' ' . $k3 . ' ' . $k5;
        $hasil = $nb->predict($data_input);

        $cetak = $nb->testClass;

        $validateData['nama'] = $nama;
        $validateData['keadaan'] = $k;
        $validateData['keadaan4'] = $k2;
        $validateData['keadaan2'] = $k3;
        $validateData['keadaan3'] = $k4;
        $validateData['hasil'] = $hasil;


        if ($k == "bahan lain") {
            $k = "sepatu bahan lain";
        }

        if ($k2 == "Tidak") {
            $k2 = "Sol sepatu tidak Kuning";
        }
        if ($k4 == "tidak") {
            $k4 = "warna sepatu tidak pudar";
        }
        if ($k3 == "bukan") {
            $k3 = "Tidak ingin menganti warna sepatu";
        }
        GuestR::create($validateData);
        return view('bayes', [
            'hasil' => $hasil,
            'bla' => 'Warna Sepatu Pudar',
            "title" => 'Salvator Cleaning Shoes',
            'lal' => 'Warna Sepatu Bagus',
            "nama" => $nama,
            'menu' => $menu,
            'data1' => $k,
            'data2' => $k2,
            'data3' => $k3,
            'data4' => $k4,
            'data5' => $k5,
            'cetak' => $cetak

        ]);
    }
}
