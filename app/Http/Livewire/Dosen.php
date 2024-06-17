<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Dosen as DosenModel;

class Dosen extends Component
{
    public $nidn, $nama_dosen, $updateDosen = false, $addDosen = false;

    public function render()
    {
        $dosens = DosenModel::latest()->get();
        return view('livewire.dosen', compact('dosens'));
    }

    protected $rules = [
        'nidn' => 'required',
        'nama_dosen' => 'required',
    ];

    public function resetFields()
    {
        $this->nidn = '';
        $this->nama_dosen = '';
    }

    public function create()
    {
        $this->resetFields();
        $this->addDosen = true;
        $this->updateDosen = false;
    }

    public function store()
    {
        $this->validate();
        try {
            DosenModel::create([
                'nidn' => $this->nidn,
                'nama_dosen' => $this->nama_dosen,
            ]);
            session()->flash('success', 'Data Dosen berhasil disimpan!!');
            $this->resetFields();
            $this->addDosen = false;
        } catch (\Exception $ex) {
            session()->flash('error', 'Ada kesalahan dalam proses penyimpanan!! ' . $ex->getMessage());
        }
    }

    public function edit($nidn)
    {
        try {
            $dosen = DosenModel::findOrFail($nidn);
            if (!$dosen) {
                session()->flash('error', 'Dosen not found');
            } else {
                $this->nidn = $dosen->nidn;
                $this->nama_dosen = $dosen->nama_dosen;
                $this->updateDosen = true;
                $this->addDosen = false;
            }
        } catch (\Exception $ex) {
            session()->flash('error', 'Gagal menyimpan!!');
        }
    }

    public function update()
    {
        $this->validate();
        try {
            DosenModel::where('nidn', $this->nidn)->update([
                'nama_dosen' => $this->nama_dosen,
            ]);
            session()->flash('success', 'Data Dosen berhasil diupdate!!');
            $this->resetFields();
            $this->updateDosen = false;
        } catch (\Exception $ex) {
            session()->flash('error', 'Ada kesalahan/gagal update!! ' . $ex->getMessage());
        }
    }

    public function cancel()
    {
        $this->addDosen = false;
        $this->updateDosen = false;
        $this->resetFields();
    }

    public function destroy($nidn)
    {
        try {
            DosenModel::where('nidn', $nidn)->delete();
            session()->flash('success', "Data Dosen berhasil dihapus!!");
        } catch (\Exception $ex) {
            session()->flash('error', "Terdapat kesalahan/gagal menghapus!! " . $ex->getMessage());
        }
    }
}
