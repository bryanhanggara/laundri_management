<div class="row">
    <div class="col-12">
        <div class="card">
            @if(session()->has('message'))
                <div class="text-success">{{ session('message') }}</div>
            @elseif(session()->has('error'))
                <div>{{ session('error') }}</div>
            @endif
            
            <div class="card-header">
                <form wire:submit="store">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" id="name" wire:model="name" class="form-control" />
                        @error('name') <span class="text-danger text-sm">{{ $message }}</span> @enderror
                    </div>
            
                    <div class="mb-3">
                        <label for="no_wa" class="form-label">WhatsApp Number</label>
                        <input type="text" id="no_wa" wire:model="no_wa" class="form-control" />
                        @error('no_wa') <span class="text-danger text-sm">{{ $message }}</span> @enderror
                    </div>
            
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea id="address" wire:model="address" class="form-control"></textarea>
                        @error('address') <span class="text-danger text-sm">{{ $message }}</span> @enderror
                    </div>
            
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">
                           Tambah Customer
                        </button>
                    </div>
                </form>
            </div>
            
            
            <div class="card-body">
                
                    <input class="form-control"
                    name="name"
                    type="search"
                    placeholder="Search"
                    aria-label="Search"
                    data-width="250"
                    wire:model.live="search">
                    
                <br>
                <div class="table-responsive">
                    <table class="table-striped table"
                        id="table-1">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Nomor Whatsapp</th>
                                <th>More</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($customers as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->address}}</td>
                                <td>{{$item->no_wa}}</td>                                
                                <td>
                                   
                                </td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                    {{ $customers->links('vendor.pagination.bootstrap-5') }}
                </div>
               
            </div>
        </div>
    </div>
</div>

