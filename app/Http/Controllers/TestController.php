<?php

namespace App\Http\Controllers;

use App\Models\HasilUjian;
use App\Models\opsi;
use App\Models\soal;
use App\Models\Ujian;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $soals = soal::all();
        $opsis = opsi::all();
        return view('test.index', ['title' => 'Dashboard', 'opsi' => $opsis, 'soal' => $soals]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ddd($request->all());
        //Mengsubmit tes yang telah dikerjakan.
        
        // foreach ($request as $key => $value) {
            //     $submit = new Ujian();
            //     $submit->user_id = auth()->id();
            //     $submit->soal_id = $key++;
            //     $submit->opsi_id = $value->pilihan;
            //     $submit->status = 1;
            
            
            //     $submit->save();
            // }
        $opsi = Arr::flatten($request->pilihan);
        $soal = Arr::flatten($request->soal);
        $status = Arr::flatten($request->status);
        $will_insert = [];
        $count = 0;
        foreach ($request->pilihan as $key) {
            array_push($will_insert, [
                'user_id' => auth()->id(),
                'soal_id' => $soal[$count],
                'opsi_id' => $opsi[$count],
                'status' => $status[$count],
                'cek' => 0,
            ]);
            $count++;
        }
        DB::table('ujians')->insert($will_insert);
        $this->_hitungNilai();
        return redirect('dashboard');

        // $data = new Ujian();
        // $data->user_id = auth()->id();
        // $data->soal_id = $request->soal;
        // $data->opsi_id = $request->pilihan;
        // $data->status = 1;
        // ddd($data->all());
        // $data->save();

        // foreach ($request as $key => $value) {
        //     $data = [
        //         'user_id' => auth()->id(),
        //         'soal_id' => $key++,
        //         'opsi_id' => $value->pilihan->$key++,
        //         'status' => 1,
        //     ];
        // }
        // DB::table('ujians')->insert($data);
    }

    private function _hitungNilai()
    {
        $ujianSiswa = Ujian::where('cek', 0)->get();
        $jumlahSoal = count(soal::all());

        $benar = 0;
        foreach ($ujianSiswa as $key => $value) {
            if ($value->status == 1) {
                DB::table('ujians')->where('id', $value->id)->update(['cek'=>0]);
                $benar++;
            }
        }
        $nilai = ($benar / $jumlahSoal) * 100;

        $inputData = new HasilUjian();
        // $inputData->ujian_id = $ujianSiswa->id;
        $inputData->user_id = auth()->id();
        $inputData->nilai = $nilai;
        $inputData->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function submitTest(Request $request)
    {
        // //Mengsubmit tes yang telah dikerjakan.

        // $submit = new Ujian();
        // foreach ($request as $key => $value) {
        //     $submit->user_id = auth()->user->id;
        //     $submit->soal_id = $value->pilihan.$key++;
        //     $submit->opsi_id = $key++;
        // }

        // $submit->save();
    }
}
