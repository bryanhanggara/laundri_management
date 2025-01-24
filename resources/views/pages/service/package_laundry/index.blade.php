@extends('layouts.app')

@section('title','Paket Layanan Laundri')
@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
        <style>
            /* Styling untuk latar belakang modal */
            .modal-overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
                justify-content: center;
                align-items: center;
                z-index: 9999; 
            }
    
            /* Styling untuk modal box */
            .modal-box {
                background: #fff;
                padding: 20px;
                width: 400px;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
                position: relative;
            }
    
            /* Tombol close */
            .close-btn {
                position: absolute;
                top: 10px;
                right: 15px;
                font-size: 20px;
                font-weight: bold;
                cursor: pointer;
            }
    
            /* Styling untuk form */
            .modal-box h2 {
                margin-top: 0;
            }
    
            .modal-box input, .modal-box button {
                width: 100%;
                padding: 10px;
                margin: 10px 0;
                border: 1px solid #ccc;
                border-radius: 5px;
            }
    
            .modal-box button {
                background: #007bff;
                color: white;
                border: none;
                cursor: pointer;
            }
    
            .modal-box button:hover {
                background: #0056b3;
            }
        </style>
@endpush

@section('main')
@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        text: '{{ session('success') }}'
    });
</script>
@endif
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Paket Layanan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Paket Layanan

                </div>
            </div>
        </div>

        <div class="section-body">
           @livewire('service.services-crud')
         
        </div>
    </section>
</div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <script src="{{ asset('library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
    
    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/index-0.js') }}"></script>

    <script>
        // Ambil elemen modal dan tombol
        const modalOverlay = document.getElementById('modalOverlay');
        const openModalBtn = document.getElementById('openModalBtn');
        const closeModalBtn = document.getElementById('closeModalBtn');

        // Fungsi untuk membuka modal
        openModalBtn.addEventListener('click', () => {
            modalOverlay.style.display = 'flex';
        });

        // Fungsi untuk menutup modal
        closeModalBtn.addEventListener('click', () => {
            modalOverlay.style.display = 'none';
        });

        // Tutup modal jika klik di luar box
        window.addEventListener('click', (e) => {
            if (e.target === modalOverlay) {
                modalOverlay.style.display = 'none';
            }
        });

        // Handle form submit
        document.getElementById('popupForm').addEventListener('submit', (e) => {
            e.preventDefault();
            alert('Form berhasil dikirim!');
            modalOverlay.style.display = 'none';
        });
    </script>
@endpush