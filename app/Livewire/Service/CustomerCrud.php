<?php

namespace App\Livewire\Service;

use Livewire\Component;
use App\Models\Customer;
use Livewire\WithPagination;

class CustomerCrud extends Component
{
    public $name, $no_wa, $address, $customer_id;
    public $search = '';
    public $confirmDeleteId = null;

    use WithPagination;
        
    protected $rules = [
        'name' => 'required|max:255',
        'no_wa' => 'required|max:20',
        'address' => 'required'
    ];
    
    public function render()
    {
        $customers = Customer::where('name', 'like', '%' . $this->search . '%')
                                ->latest()
                                ->paginate(5);
        
        return view('livewire.service.customer-crud', [
            'customers' => $customers,
        ]);
    }

    public function store()
    {
        $this->validate();
        Customer::create([
            'name' => $this->name,
            'no_wa' => $this->no_wa,
            'address' => $this->address,
        ]);

        session()->flash('message', 'Customer Berhasil Ditambahkan');
        $this->resetInputFields();
    }
    

    private function resetInputFields()
    {
        $this->name = '';
        $this->no_wa = '';
        $this->address = '';
    }
}
