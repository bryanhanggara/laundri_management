<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header"  >
               
                <button id="openModalBtn" class="btn btn-primary">Tambah Paket Layanan</button>

                <!-- Modal popup -->
                <div class="modal-overlay" id="modalOverlay">
                    <div class="modal-box">
                        <span class="close-btn" id="closeModalBtn">&times;</span>
                        <h4>Tambah Paket Layanan Laundri</h4>
                        <form id="popupForm" wire:submit.prevent="store" >
                            <input type="text" placeholder="Nama Paket" required wire:model="name" class="form-control">
                            <select wire:model="category" class="form-control">
                                <option value="">Pilih Kategori</option>
                                <option value="Express">Express</option>
                                <option value="Cuci Lipat">Cuci Lipat</option>
                                <option value="Komplit">Komplit</option>
                                <option value="Satuan">Satuan</option>
                            </select>
                            <input type="text" placeholder="Harga" required wire:model="price" class="form-control">
                            <textarea wire:model="description" class="form-control mt-2" placeholder="Deskripsi"></textarea>     
                            <button type="submit">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                
                <hr>
                <div class="row">
                    <div class="col-md-6">
                            <input class="form-control"
                        name="name"
                        type="search"
                        placeholder="Search"
                        aria-label="Search"
                        data-width="250"
                        wire:model.live="search">
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <button class="btn m-1 {{ $selectCategory === '' ? 'btn-primary' : 'btn-secondary' }}" wire:click="filterCategory('')">Semua</button>
                        @foreach ($categories as $item)
                               <button class="btn m-1 {{ $selectCategory === $item ? 'btn-success' : 'btn-warning' }}" wire:click="filterCategory('{{$item}}')">{{$item}}</button>
                        @endforeach
                    </div>
                </div>
                <br>

                <div class="table-responsive">
                    <table class="table-striped table" id="table-1">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Deskripsi</th>
                                <th>Harga (Rp)</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                          @forelse ($services as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->category }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->price }}</td>
                                <td>
                                    
                                </td>
                            </tr>
                          @empty
                              <tr>
                                    <td colspan="12" class="text-center">Data Kosong</td>
                              </tr>
                          @endforelse
                        </tbody>
                    </table>
                    {{ $services->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>

        
    </div>
</div>
