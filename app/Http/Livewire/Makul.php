<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Makul as MakulModel;

class Makul extends Component
{
    public $kode_makul, $nama_makul, $sks, $updateMakul = false, $addMakul = false;

    public function render()
    {
        $makuls = MakulModel::latest()->get();
        return view('livewire.makul', compact('makuls'));
    }

    protected $rules = [
        'kode_makul' => 'required',
        'nama_makul' => 'required',
        'sks' => 'required|integer',
    ];

    public function resetFields()
    {
        $this->kode_makul = '';
        $this->nama_makul = '';
        $this->sks = '';
    }

    public function create()
    {
        $this->resetFields();
        $this->addMakul = true;
        $this->updateMakul = false;
    }

    public function store()
    {
        $this->validate();
        try {
            MakulModel::create([
                'kode_makul' => $this->kode_makul,
                'nama_makul' => $this->nama_makul,
                'sks' => $this->sks,
            ]);
            session()->flash('success', 'Data Mata Kuliah berhasil disimpan!!');
            $this->resetFields();
            $this->addMakul = false;
        } catch (\Exception $ex) {
            session()->flash('error', 'Ada kesalahan dalam proses penyimpanan!! ' . $ex->getMessage());
        }
    }

    public function edit($kode_makul)
    {
        try {
            $makul = MakulModel::findOrFail($kode_makul);
            if (!$makul) {
                session()->flash('error', 'Mata Kuliah not found');
            } else {
                $this->kode_makul = $makul->kode_makul;
                $this->nama_makul = $makul->nama_makul;
                $this->sks = $makul->sks;
                $this->updateMakul = true;
                $this->addMakul = false;
            }
        } catch (\Exception $ex) {
            session()->flash('error', 'Gagal menyimpan!!');
        }
    }

    public function update()
    {
        $this->validate();
        try {
            MakulModel::where('kode_makul', $this->kode_makul)->update([
                'nama_makul' => $this->nama_makul,
                'sks' => $this->sks,
            ]);
            session()->flash('success', 'Data Mata Kuliah berhasil diupdate!!');
            $this->resetFields();
            $this->updateMakul = false;
        } catch (\Exception $ex) {
            session()->flash('error', 'Ada kesalahan/gagal update!! ' . $ex->getMessage());
        }
    }

    public function cancel()
    {
        $this->addMakul = false;
        $this->updateMakul = false;
        $this->resetFields();
    }

    public function destroy($kode_makul)
    {
        try {
            MakulModel::where('kode_makul', $kode_makul)->delete();
            session()->flash('success', "Data Mata Kuliah berhasil dihapus!!");
        } catch (\Exception $ex) {
            session()->flash('error', "Terdapat kesalahan/gagal menghapus!! " . $ex->getMessage());
        }
    }
}
