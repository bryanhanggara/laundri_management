@extends('layouts.app')

@section('title','Pelanggan Laundri')
@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
    <style>
            .card-square {
                width: 200px;
                text-align: center;
            }
    
            .card-icon-circle {
                width: 100px;
                height: 100px;
                border-radius: 50%;
                margin: 10px auto;
                font-size: 20px;
                color: black;
            }

            a {
                text-decoration: none;
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
            <h1>Paket Layanan {{ucfirst($category)}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Order

                </div>
            </div>
        </div>

        <div class="section-body">
          <div class="row">
            @forelse ($services as $item)
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <a href="#">
                    <div class="card card-statistic-1 card-square">
                        <div class="bg-secondary d-flex justify-content-center align-items-center card-icon-circle mt-5">
                            {{$item->name}}
                        </div> 
                        <div class="card-wrap mb-5">
                            <div class="card-body">
                                <h4>Rp. {{$item->price}} /kg</h4>
                                <p>{{$item->description}}</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @empty
                
            @endforelse
          </div>
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
@endpush