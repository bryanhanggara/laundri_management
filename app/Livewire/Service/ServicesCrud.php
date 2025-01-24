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

    use WithPagination; 
    
    public function render()
    {
        $services = Service::where('name', 'like' , '%' . $this->search . '%')
                            ->orWhere('category' , 'like' , '%' . $this->search . '%')
                            ->latest()
                            ->paginate(5);
            
        return view('livewire.service.services-crud', [
            'services' => $services
        ]);
    }

    
}
