<?php

namespace App\Livewire\Service;

use Livewire\Component;
use App\Models\Customer;
use Livewire\WithPagination;

class CustomerCrud extends Component
{
    public $name, $no_wa, $address, $customer_id;

    public $search = '';

    public $confirmDeleteId;

    use WithPagination;
        
    public function render()
    {
        $customers = Customer::where('name', 'like', '%' . $this->search . '%')
                                ->orWhere('no_wa', 'like', '%' . $this->search . '%')
                                ->latest()
                                ->paginate(5);
        
        return view('livewire.service.customer-crud', [
            'customers' => $customers,
        ]);
    }

    public function store()
    {
        $validated = $this->validate([
            'name' => 'required|max:255',
            'no_wa' => 'required|max:20',
            'address' => 'required'
        ]);

        Customer::create($validated);

        session()->flash('message', 'Customer Berhasil di tambah');

        $this->resetInputFields();
    }

    public function edit($id)
    {
        $customer = Customer::findorfail($id);
        $this->customer_id = $customer->id;
        $this->name = $customer->name;
        $this->no_wa = $customer->no_wa;
        $this->address = $customer->address;
    }

    public function update()
    {
        $validated = $this->validate([
            'name' => 'required',
            'no_wa' => 'required',
            'address' => 'required', 
        ]);

        $customer = Customer::findorfail($this->customer_id);

        $customer->update($validated);

        session()->flash('message', 'Customer Berhasil diubah.');

        $this->resetInputFields();
    }

    public function confirmDelete($id) 
    {
        $this->confirmDeleteId = $id; 
    }
    
    public function delete()
    {
        $customer = Customer::findorfail($this->confirmDeleteId);
        $customer->delete();
        session()->flash('message', 'Customer Berhasil di hapus');

        $this->confirmDeleteId = null;
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->no_wa = '';
        $this->address = '';
        $this->customer_id = null;
    }
}

// <?php

// namespace App\Livewire\Service;

// use Livewire\Component;
// use App\Models\Customer;
// use Livewire\WithPagination;

// class CustomerCrud extends Component
// {
//     public $name, $no_wa, $address, $customer_id;
//     public $search = '';
//     public $confirmDeleteId = null;

//     use WithPagination;
        
//     protected $rules = [
//         'name' => 'required|max:255',
//         'no_wa' => 'required|max:20',
//         'address' => 'required'
//     ];
    
//     protected $message = [
//         'nama.required' => 'Nama Wajib diisi',
//     ];

//     public function render()
//     {
//         $customers = Customer::where('name', 'like', '%' . $this->search . '%')
//                                 ->latest()
//                                 ->paginate(5);
        
//         return view('livewire.service.customer-crud', [
//             'customers' => $customers,
//         ]);
//     }

//     public function store()
//     {
//         $this->validate();
//         Customer::create([
//             'name' => $this->name,
//             'no_wa' => $this->no_wa,
//             'address' => $this->address,
//         ]);

//         session()->flash('message', 'Customer Berhasil Ditambahkan');
//         $this->resetInputFields();
//     }

//     public function edit($id)
//     {
//         $customer = Customer::findOrFail($id);
//         $this->customer_id = $customer->id;
//         $this->name = $customer->name;
//         $this->no_wa = $customer->no_wa;
//         $this->address = $customer->address;
//     }

//     public function update()
//     {
//         $this->validate();
//         Customer::find($this->customer_id)->update([
//             'name' => $this->name,
//             'no_wa' => $this->no_wa,
//             'address' => $this->address,
//         ]);

//         session()->flash('message', 'Customer Berhasil Diperbarui');
//         $this->resetInputFields();
//     }

//     public function confirmDelete($id)
//     {
//         $this->confirmDeleteId = $id;
//     }

//     public function delete()
//     {
//         Customer::find($this->confirmDeleteId)->delete();
//         session()->flash('message', 'Customer Berhasil Dihapus');
//         $this->confirmDeleteId = null;
//     }

//     private function resetInputFields()
//     {
//         $this->name = '';
//         $this->no_wa = '';
//         $this->address = '';
//         $this->customer_id = null;
//     }
// }
