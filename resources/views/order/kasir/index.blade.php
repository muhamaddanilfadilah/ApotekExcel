@extends('layout.template')

@section('content')

<div class="container mt-3">
    <div class="d-flex justify-content-between mb-3">
        <!-- Input Filter Tanggal -->
        <form action="{{ route('pembelian') }}" method="GET" class="d-flex justify-content-end mb-2">
            <input type="date" name="search_date" class="form-control" value="{{ request('search_date') }}">
            <button type="submit" class="btn btn-primary ms-2">Cari</button>
        </form>

        <!-- Tombol Pembelian Baru -->
        <a href="{{ route('tambah.pembelian')}}" class="btn btn-outline-success">Pembelian Baru</a>
        
        
    </div>
</div>

<h1 class="display-4 text-center" style="font-family: 'Poppins', sans-serif; font-weight: 700; font-size: 3.8rem; letter-spacing: 2px; color: rgb(72, 176, 74); text-shadow: 4px 4px 10px rgba(0, 0, 0, 0.3); animation: fadeIn 1.5s ease-in-out;">
    Selamat Datang, di menu pembelian!
</h1>

<h3></h3>

<!-- Konten lainnya, misalnya tabel untuk menampilkan data pembelian -->
<div class="container mt-5 text-center">
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th>Pembeli</th>
                <th>Obat</th>
                <th>Total Bayar</th>
                <th>Kasir</th>
                <th>Tanggal Beli</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($orders as $item)
            <tr>
                <td class="text-center">{{ $no++ }}</td>
                <td>{{ $item['name_customer'] }}</td>
                <td>
                    @foreach ($item['medicines'] as $medicine)
                    <ol>
                        <li>{{ $medicine['name_medicine'] }} (Rp. {{ number_format($medicine['price'], 0, ',', '.') }}) : Rp. {{ number_format($medicine['sub_price'], 0, ',', '.') }}
                            <small>Qty {{ $medicine['qty'] }}</small>
                        </li>
                    @endforeach
                    </ol>
                </td>
                <td>Rp. {{ number_format($item['total_price'], 0, ',', '.') }}</td>
                <td>{{ $item['user']['name'] }}</td>
                <td>{{ \Carbon\Carbon::parse($item['created_at'])->translatedFormat('l, d-m-Y H:i') }}</td>
                <td>
                    <a href="{{ route('download-pdf', $item->id) }}" class="btn btn-secondary">Download Struk</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <div class="d-flex justify-content-end">
        @if ($orders->count() > 0)
            {{ $orders->links() }}
        @endif
    </div>
</div>

@endsection



{{-- 
@extends('layout.template')
@section('content')

<div class="container mt-3">
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('tambah.pembelian') }}" class="btn btn-primary">Pembelian Baru</a>
    </div>

    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th>Pembeli</th>
                <th>Obat</th>
                <th>Total Bayar</th>
                <th>Kasir</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($orders as $item)
            <tr>
                <td class="text-center">{{ $no++ }}</td>
                <td>{{ $item['name_customer'] }}</td>
                <td>
                    @foreach ($item['medicines'] as $medicine)
                <ol>
                    <li>
            {{ $medicine['name_medicine'] }} ( Rp. {{ number_format($medicine['price'], 0, ',', '.') }} ) : Rp. {{ number_format($medicine['sub_price'], 0, ',', '.') }}
            <small>Qty {{ $medicine['qty'] }}</small>
        </li>
        @endforeach
    </ol>
</td>

<td>Rp. {{ number_format($item['total_price'], 0, ',', '.') }}</td>
<td>{{ $item['user']['name'] }}</td>
<td>
    <a href="" class="btn btn-secondary">Download Struk</a>
</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        @if ($orders->count() > 0)
            {{ $orders->links() }}
        @endif
    </div>
@endse --}}
