<?php

namespace App\Livewire\Service;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;

class ServicesCrud extends Component
{
    public $name, $category, $description, $price, $service_id;

    public $search = '';

    public $confirmDeleteId;

    public $selectCategory;

    use WithPagination; 
    
    public function filterCategory($selectedCategory)
    {
        $this->selectCategory = $selectedCategory;
        $this->render();
    }
    
    public function render()
    {
        $services = Service::query()
                            ->when($this->search, function($query) {
                                $query->where('name', 'like' , '%' . $this->search . '%')
                                ->orWhere('category' , 'like' , '%' . $this->search . '%');
                            })
                            ->when($this->selectCategory, function($query) {
                                $query->where('category', $this->selectCategory);
                            })
                            ->latest()
                            ->paginate(5);

        $categories = Service::distinct('category')->pluck('category');
            
        return view('livewire.service.services-crud', [
            'services' => $services,
            'categories' => $categories
        ]);
    }

    public function store()
    {
        $validated = $this->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        Service::create($validated);

        session()->flash('message', 'Paket Layanan Berhasil di tambah');

        $this->resetInputField();
    }

    public function update()
    {

    }



    private function resetInputField()
    {
        $this->name = '';
        $this->category = '';
        $this->description = '';
        $this->price = '';
        $this->service_id = null;
    }
}
