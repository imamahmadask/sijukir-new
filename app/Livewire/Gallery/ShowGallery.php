<?php

namespace App\Livewire\Gallery;

use App\Models\Gallery;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class ShowGallery extends Component
{
    public $gallery_id;
    public $judul, $deskripsi, $tanggal, $kategori;
    public $gambars = [];

    public function render()
    {
        return view('livewire.gallery.show-gallery');
    }

    #[On('show-gallery')]
    public function getGallery($id)
    {
        $gallery =  Gallery::find($id);

        $this->gallery_id = $gallery->id;
        $this->judul = $gallery->judul;
        $this->deskripsi = $gallery->deskripsi;
        $this->tanggal = $gallery->tanggal;
        $this->kategori = $gallery->kategori;
        $this->gambars = $gallery->gambar;
    }
}
