@extends('user-page.layouts.app')

@section('title', 'Pencarian Menu')

@section('content')
    <div class="container mt-4">
        <h1>Hasil Pencarian untuk: "{{ request('q') }}"</h1>
        <div class="row mt-4">
            @forelse ($menus as $menu)
                <div class="col-md-2 mb-2">
                    <div class="card position-relative" style="overflow: hidden; transition: transform 0.3s, box-shadow 0.3s;"
                        onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 4px 8px rgba(0, 0, 0, 0.2)'; this.querySelector('a').style.opacity='1';"
                        onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='none'; this.querySelector('a').style.opacity='0';">

                        <img src="{{ $menu->url_gambar_menu }}" class="card-img-top" alt="{{ $menu->nama_menu }}"
                            style="height: 200px; object-fit: cover; width: 100%;">
                        <a href="{{ route('user.menu.show', ['id' => $menu->id_menu]) }}"
                            class="btn btn-primary position-absolute top-50 start-50 translate-middle"
                            style="opacity: 0; transition: opacity 0.3s; z-index: 10;">
                            Lihat Menu
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{{ $menu->nama_menu }}</h5>
                            <p class="card-text">
                                <x-fas-rupiah-sign class="align-text-bottom"
                                    style="width: 1em; height: 1em; vertical-align: middle;" />
                                &nbsp;{{ number_format($menu->harga_menu, 0, ',', '.') }}
                            </p>
                            <p class="card-text">
                                <x-grommet-restaurant class="align-text-bottom"
                                    style="width: 1em; height: 1em; vertical-align: middle;" />
                                {{ $menu->restoran->nama_restoran }}
                            </p>
                        </div>

                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center">Tidak ada menu yang ditemukan untuk kata kunci "{{ request('q') }}"</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
