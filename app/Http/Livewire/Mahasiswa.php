<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
// use App\Models\Mahasiswa;

class Mahasiswa extends Component
{
    public $nim, $nama, $alamat, $umur, $kota, $kelas, $jurusan, $updateMahasiswa = false, $addMahasiswa = false; // definisikan variabelnya dulu
    public function render() // function ini yang dipanggil di blade dengan @livewire('mahasiswa')
    {
        $mahasiswa = \App\Models\Mahasiswa::latest()->get();
        return view('livewire.mahasiswa',compact('mahasiswa'));
    }
    protected $rules = [

        'nim' => 'required',
        
        'nama' => 'required',
        
        'kelas' => 'required',
        
        'jurusan' => 'required'
        
        ];
        
        
        public function resetFields() {
        
        
        $this->nim = '';
        
        $this->nama = '';
        
        }
        
        
        
        public function create()
        
        {
        
        $this->resetFields();
        
        $this->addMahasiswa = true;
        
        $this->updateMahasiswa = false;
        
        }
        
        
        
        
        public function store()
        
        {
        
        $this->validate();
        
        try {
        
        \App\Models\Mahasiswa::create([
        
        'nim' => $this->nim,
        
        'nama' => $this->nama,
        
        'alamat' => $this->alamat,
        
        'kota' => $this->kota,
        
        'umur' => $this->umur,
        
        'kelas' => $this->kelas,
        
        'jurusan' => $this->jurusan
        
        ]);
        
        
        session()->flash('success', 'Data Mahasiswa berhasil simpan!!');
        
        $this->resetFields();
        
        $this->addMahasiswa = false;
        
        } catch (\Exception $ex) {
        
        session()->flash('error', 'Ada kesalahan dalam proses penyimpanan!! '.$ex);
        
        }
        
        }
        
        
        
        public function edit($nim)
        
        {
        
        
        try {
        
        $mahasiswa = \App\Models\Mahasiswa::findOrFail($nim);
        
        if (!$mahasiswa) {
        
        session()->flash('error', 'Mahasiswa not found');
        
        } else {
        
        $this->nim = $mahasiswa->nim;
        
        $this->nama = $mahasiswa->nama;
        
        $this->alamat = $mahasiswa->alamat;
        
        $this->kota = $mahasiswa->kota;
        
        $this->umur = $mahasiswa->umur;
        
        $this->kelas = $mahasiswa->kelas;
        
        $this->jurusan = $mahasiswa->jurusan;
        
        $this->updateMahasiswa = true;
        
        $this->addMahasiswa = false;
        
        }
        
        } catch (\Exception $ex) {
        
        session()->flash('error', 'Gagal menyimpan!!');
        
        }
        
        
        }
        
        
        public function ups($nim="")
        
        {
        
        // $mahasiswa = \App\Models\Mahasiswa::findOrFail($nim);
        
        $this->updateMahasiswa=true;
        
        }
        
        
        
        public function update()
        
        {
        
        $this->validate();
        
        try {
        
        \App\Models\Mahasiswa::whereNim($this->nim)->update([
        
        'nim' => $this->nim,
        
        'nama' => $this->nama,
        
        'alamat' => $this->alamat,
        
        'kota' => $this->kota,
        
        'umur' => $this->umur,
        
        'kelas' => $this->kelas,
        
        'jurusan' => $this->jurusan,
        
        ]);
        
        session()->flash('success', 'Data Mahasiswa berhasil di update!!');
        
        $this->resetFields();
        
        $this->updateMahasiswa = false;
        
        } catch (\Exception $ex) {
        
        session()->flash('error', 'Ada kesalahan/gagal update!! '.$ex);
        
        }
        
        }
        
        
        public function cancel()
        
        {
        
        $this->addMahasiswa = false;
        
        $this->updateMahasiswa = false;
        
        $this->resetFields();
        
        }
        
        
        public function destroy($nim)
        
        {
        
        try {
        
        \App\Models\Mahasiswa::find($nim)->delete();  
        session()->flash('success', "Data Mahasiswa berhasil dihapus!!");
        } catch (\Exception $e) {
        session()->flash('error', "Terdapat kesalahan/gagal menghapus!!");   
        }     
        }        
}
