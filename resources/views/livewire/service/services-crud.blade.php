<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header"  >
               
                <button id="openModalBtn" class="btn btn-primary">Tambah Paket Layanan</button>

                <!-- Modal popup -->
                <div class="modal-overlay" id="modalOverlay">
                    <div class="modal-box">
                        <span class="close-btn" id="closeModalBtn">&times;</span>
                        <h2>Formulir</h2>
                        <form id="popupForm">
                            <input type="text" placeholder="Nama Anda" required>
                            <input type="email" placeholder="Email Anda" required>
                            <button type="submit">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                
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
