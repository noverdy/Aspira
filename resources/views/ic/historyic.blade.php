@extends('layouts.tailwind')
@section('container')
    <div class="container max-w-screen-xl mb-16">
        <div class="row justify-center">
            <div class="col-12">
                <div class="card lg:w-full mt-4 mx-2 bg-white shadow-xl text-black">
                    <div class="card-body mx-2">
                        <span align="justify">
                            <strong>
                                <h3>INOVASI/CREATIVITY</h3>
                            </strong>
                            <div class="text-sm breadcrumbs">
                                <ul>
                                    <li><a href="/">Beranda</a></li>
                                    {{-- <li><a>Documents</a></li> --}}
                                    <li>Daily IC</li>
                                    <li>Riwayat</li>
                                </ul>
                            </div>
                        </span>
                    </div>
                </div>
                <div class="card lg:w-full mt-4 mx-2 min-h-full bg-white shadow-xl text-black"data-theme="cmyk">
                    <div class="card-body mx-2">
                        <div class="overflow-x-auto -mx-5 md:m-0 overflow-y h-96" data-theme="cmyk">
                            <table class="table w-full text-xs table-compact">
                                <thead>
                                    <tr class="justify-item-center">
                                        <td scope="col" style="min-width: 110px;">Tanggal</td>
                                        <td scope="col" style="min-width: 400px;">Plan</td>
                                        <td scope="col">Progres</td>
                                        <td scope="col">Aksi</td>
                                    </tr>
                                </thead>
                                @foreach ($dailyic as $ic)
                                    <tr>
                                        <td>{{ $ic->created_at->format('d-M-Y') }}</td>
                                        <td>{{ $ic->plan }}</td>
                                        <td>
                                            @if ($ic->progress == 100)
                                                <strong><span
                                                        class="bg-green-500 rounded-lg text-xs text-white p-1 m-1 uppercase">Terselesaikan</span></strong>
                                            @elseif ($ic->progress == 50)
                                                <strong><span
                                                        class="bg-warning rounded-lg text-xs text-white p-1 m-1 uppercase">Tidak
                                                        Terselesaikan</span></strong>
                                            @else
                                                <strong><span
                                                        class="bg-error rounded-lg text-xs text-white p-1 m-1 uppercase">Tidak
                                                        Tekerjakan</span></strong>
                                            @endif
                                        </td />
                                        <td>
                                            <label for="viewModal-{{ $ic->id }}"
                                                class="btn btn-sm btn-primary text-sm text-white">Lihat</label>
                                            <a href="/dailyic/edit/{{ $ic->id }}"
                                                class="btn btn-sm btn-warning text-sm text-white">Edit</a>
                                        </td>

                                        <input type="checkbox" id="viewModal-{{ $ic->id }}" class="modal-toggle" />
                                        <label for="viewModal-{{ $ic->id }}" class="modal cursor-pointer">
                                            <label class="modal-box relative bg-white">
                                                <label for="viewModal-{{ $ic->id }}"
                                                    class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                                                <h5 class="modal-title" id="viewModalLabel">
                                                    <strong>{{ $ic->created_at->format('d-M-Y') }}</strong>
                                                </h5>
                                                <div class="form-control">
                                                    <label class="label">
                                                        <h4><strong>Plan:</strong></h4>
                                                    </label>
                                                    <textarea class="textarea textarea-bordered h-24 bg-slate-100" readonly>{{ $ic->plan }}</textarea>
                                                </div>
                                                <div class="form-control">
                                                    <label class="label">
                                                        <h4><strong>Actual:</strong></h4>
                                                    </label>
                                                    <textarea class="textarea textarea-bordered h-24 bg-slate-100" readonly>{{ $ic->actual }}</textarea>
                                                </div>
                                                <div class="form-control">
                                                    <label class="label">
                                                        <h4><strong>Status:</strong></h4>
                                                    </label>
                                                    <input type="text"
                                                        class="input input-bordered w-full max-w-xs bg-slate-100"
                                                        value="@if ($ic->progress == 100) Terselesaikan
                                                        @elseif ($ic->progress == 50)Tidak Terselesaikan
                                                        @else()Tidak Tekerjakan @endif"
                                                        readonly />
                                                </div>
                                                <div class="form-control">
                                                    <label class="label">
                                                        <h4><strong>Deskripsi:</strong></h4>
                                                    </label>
                                                    <textarea class="textarea textarea-bordered h-24 bg-slate-100" placeholder="Deskripsi" name="desc" readonly>{{ $ic->desc }}</textarea>
                                                </div>
                                                <div class="form-control">
                                                    <label class="label">
                                                        <h4><strong>Dokumentasi:</strong></h4>
                                                    </label>
                                                    <img src="{{ asset($ic->pict) }}" alt="">
                                                </div>
                                            </label>
                                        </label>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
