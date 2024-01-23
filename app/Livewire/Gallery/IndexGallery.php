<?php

namespace App\Livewire\Gallery;

use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Gallery')]
class IndexGallery extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $search = '';

    public function render()
    {
        return view('livewire.gallery.index-gallery');
    }

    #[Computed()]
    public function galleries()
    {
        return Gallery::where('judul', 'like', '%'.$this->search.'%')
                        ->orderBy('tanggal', 'desc')
                        ->simplePaginate($this->perPage);
    }

    public function deleteGallery(Gallery $gallery){
        if($gallery)
        {
            if($gallery->gambar){
                foreach ($gallery->gambar as $photo) {
                    Storage::disk('public')->delete($photo);
                }
            }

            //destroy
            $gallery->delete();


            session()->flash('success', 'Data Lokasi Berhasil Dihapus!');
        }
    }
}
