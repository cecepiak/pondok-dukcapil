@extends('layouts.app')

@section('content')

<div class="py-12">
<div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
<div class="p-6 bg-white border-b border-gray-200">
<h1 class="text-2xl font-bold mb-4">Riwayat Transaksi</h1>

            @if($transactions->isEmpty())
                <div class="bg-gray-100 text-gray-500 text-center p-6 rounded-md">
                    <p>Belum ada riwayat transaksi yang ditemukan.</p>
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200 rounded-md">
                        <thead>
                            <tr class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">No. Transaksi</th>
                                <th class="py-3 px-6 text-left">Tanggal</th>
                                <th class="py-3 px-6 text-left">Total Bayar</th>
                                <th class="py-3 px-6 text-left">Status</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            @foreach($transactions as $transaction)
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-3 px-6 text-left whitespace-nowrap">{{ $transaction->id_trx }}</td>
                                    <td class="py-3 px-6 text-left">{{ \Carbon\Carbon::parse($transaction->tgl)->format('d/m/Y') }}</td>
                                    <td class="py-3 px-6 text-left">
                                        Rp{{ number_format($transaction->sub_dokumen, 0, ',', '.') }}
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        @if($transaction->status == 1)
                                            <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">Selesai</span>
                                        @else
                                            <span class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs">Proses</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

        </div>
    </div>
</div>

</div>
@endsection