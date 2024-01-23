<?php

namespace App\Livewire\Gallery;

use App\Models\Gallery;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;

#[Title('Tambah Gallery')]
class CreateGallery extends Component
{
    use WithFileUploads;

    #[Validate('required')]
    public $judul, $deskripsi, $kategori, $tanggal;

    #[Validate(['gambars.*' => 'image|max:1024'])]
    public $gambars = [];

    public function render()
    {
        return view('livewire.gallery.create-gallery');
    }

    public function addGallery(){
        $this->validate();

        $kode = Str::random(7);

        if($this->gambars != []){
            foreach ($this->gambars as $key => $image) {
                $no = $key + 1;
                $nama_gambar = $kode.'_'.$no.'.'.$image->extension();
                $this->gambars[$key] = $image->storeAs('gallery', $nama_gambar, 'public');
            }
        }

        Gallery::create([
            'kode' => $kode,
            'judul' => $this->judul,
            'slug' => Str::slug($this->judul, '-'),
            'deskripsi' => $this->deskripsi,
            'kategori' => $this->kategori,
            'tanggal' => $this->tanggal,
            'gambar' => $this->gambars,
            'created_by' => Auth::user()->name
        ]);

        $this->reset();

        session()->flash('success', 'Data Gallery berhasil ditambah!');

        $this->redirect('/admin/gallery');
    }
}
