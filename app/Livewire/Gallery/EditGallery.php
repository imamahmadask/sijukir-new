<?php

namespace App\Livewire\Gallery;

use App\Models\Gallery;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

#[Title('Edit Gallery')]
class EditGallery extends Component
{
    use WithFileUploads;

    public $galleryId, $kode;
    public $gambars_old = [];

    #[Validate('required')]
    public $judul, $deskripsi, $kategori, $tanggal;

    #[Validate(['gambars.*' => 'image|max:1024'])]
    public $gambars = [];

    public function render()
    {
        return view('livewire.gallery.edit-gallery');
    }

    public function mount($id)
    {
        $gallery = Gallery::find($id);

        $this->galleryId = $gallery->id;
        $this->judul = $gallery->judul;
        $this->deskripsi = $gallery->deskripsi;
        $this->kategori = $gallery->kategori;
        $this->tanggal = $gallery->tanggal;
        $this->gambars_old = $gallery->gambar;
    }

    public function updateGallery()
    {
        $this->validate();

        $gallery = Gallery::find($this->galleryId);

        if($this->gambars != []){
            foreach ($this->gambars as $key => $image) {
                $no = $key + 1;
                $nama_gambar = $this->kode.'_'.$no.'.'.$image->extension();
                $this->gambars[$key] = $image->storeAs('gallery', $nama_gambar, 'public');
            }
            // $this->gambars = json_encode($this->gambars);
        }else{
            $this->gambars = $gallery->gambar;
        }

        $gallery->update([
            'judul' => $this->judul,
            'slug' => Str::slug($this->judul, '-'),
            'deskripsi' => $this->deskripsi,
            'kategori' => $this->kategori,
            'tanggal' => $this->tanggal,
            'gambar' => $this->gambars,
            'edited_by' => Auth::user()->name
        ]);

        $this->reset();

        session()->flash('success', 'Data Gallery berhasil diupdate!');

        $this->redirect('/admin/gallery');
    }
}
