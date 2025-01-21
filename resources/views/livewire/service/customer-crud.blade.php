<div class="row">
    <div class="col-12">
        <div class="card">
            @if(session()->has('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            @if($confirmDeleteId)
                <div class="alert alert-warning m-3">
                    <p>Apakah Anda yakin ingin menghapus customer ini?</p>
                    <button class="btn btn-danger" wire:click="delete">Ya</button>
                    <button class="btn btn-secondary" wire:click="$set('confirmDeleteId', null)">Batal</button>
                </div>
             @endif

           

            <div class="card-body">
                <form wire:submit.prevent="{{ $customer_id ? 'update' : 'store' }}">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" id="name" wire:model="name" class="form-control" />
                        @error('name') <span class="text-danger text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="no_wa" class="form-label">Nomor WhatsApp</label>
                        <input type="text" id="no_wa" wire:model="no_wa" class="form-control" />
                        @error('no_wa') <span class="text-danger text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <textarea id="address" wire:model="address" class="form-control"></textarea>
                        @error('address') <span class="text-danger text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">
                            {{ $customer_id ? 'Update Customer' : 'Tambah Customer' }}
                        </button>
                        <button type="reset" class="btn btn-secondary">Batal</button>
                    </div>
                </form>
                <hr>
                <input class="form-control"
                    name="name"
                    type="search"
                    placeholder="Search"
                    aria-label="Search"
                    data-width="250"
                    wire:model.live="search">

                <br>

                <div class="table-responsive">
                    <table class="table-striped table" id="table-1">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Nomor WhatsApp</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($customers as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->no_wa }}</td>
                                <td>
                                    <button class="btn btn-warning btn-sm" wire:click='edit("{{ $item->id }}")'><i class="fa fa-pen"></i></button>
                                    <button class="btn btn-danger btn-sm" wire:click='confirmDelete("{{ $item->id }}")'><i class="fa fa-trash"></i></button>
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
