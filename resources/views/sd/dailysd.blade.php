@extends('layouts.tailwind')
@section('container')
    <div class="container max-w-screen-xl pb-5">
        <div class="row justify-center">
            <div class="col-12">
                <div class="card lg:w-full mt-4 mx-2 bg-white shadow-xl text-black">
                    <div class="card-body mx-2">
                        <span align="justify">
                            <h3 class="font-bold">SELF-DEVELOPMENT</h3>
                            <div class="text-sm breadcrumbs">
                                <ul>
                                    <li><a href="/">Beranda</a></li>
                                    <li>Daily SD</li>
                                </ul>
                            </div>
                        </span>
                    </div>
                </div>
                <div class="card lg:w-full my-4 mx-2 shadow-xl text-black">
                    <div class="card-body mx-2">
                        <div class="justify-center -mx-2">
                            <div class="alert text-sm bg-cyan-800 shadow-xl text-white">
                                <div>
                                    <span class="uppercase font-bold">
                                        Laporan hari ini
                                    </span>
                                </div>
                            </div>
                            <div class="flex justify-end" data-theme="cmyk">
                                <a href="{{ route('dailysd.create') }}"
                                    class="btn bg-primary hover:bg-primary-focus border-0 text-white text-xs"><i
                                        class="fa-solid fa-plus mr-2"></i>Tambah
                                    Laporan</a>
                            </div>
                            <div class="md:grid md:grid-cols-3">
                                @foreach ($dailysd as $sd)
                                    <div class="hidden md:block">
                                        <div class="text-center border bg-white my-3">
                                            <div class="card-header bg-cyan-800 text-white text-sm rounded-t-lg">
                                                {{ $sd->created_at->format('d-M-Y') }}
                                            </div>
                                            <div class="card-body">
                                                <p class="truncate uppercase font-bold">{{ $sd->plan }}
                                                </p>
                                                <div class="mt-2">
                                                    <label for="viewModal-{{ $sd->id }}"
                                                        class="btn btn-primary text-white"><i
                                                            class="fa-solid fa-eye"></i></label>
                                                    <a href="dailysd/edit/{{ $sd->id }}" class="btn btn-warning"><i
                                                            class="fa-solid fa-pen-to-square"
                                                            style="color: #ffffff"></i></a>
                                                </div>
                                            </div>
                                            <div class="card-footer text-muted bg-slate-100 rounded-b-lg" data-theme="cmyk">
                                                @if ($sd->progress == 100)
                                                    <span
                                                        class="bg-green-500 rounded-lg text-xs text-white p-1 m-1 uppercase">Terselesaikan</span>
                                                @elseif ($sd->progress == 50)
                                                    <span
                                                        class="bg-warning rounded-lg text-xs text-white p-1 m-1 uppercase">Tidak
                                                        Terselesaikan</span>
                                                @else
                                                    <span
                                                        class="bg-error rounded-lg text-xs text-white p-1 m-1 uppercase">Tidak
                                                        Tekerjakan</span>
                                                @endif
                                            </div>
                                        </div>

                                        <input type="checkbox" id="viewModal-{{ $sd->id }}" class="modal-toggle" />
                                        <label for="viewModal-{{ $sd->id }}" class="modal cursor-pointer">
                                            <label class="modal-box relative bg-white">
                                                <label for="viewModal-{{ $sd->id }}"
                                                    class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                                                <h5 class="modal-title font-bold" id="viewModalLabel">
                                                    {{ $sd->created_at->format('d-M-Y') }}
                                                </h5>
                                                <div class="form-control">
                                                    <label class="label">
                                                        <p class="font-bold uppercase text-sm">Plan:</p>
                                                    </label>
                                                    <textarea class="textarea textarea-bordered h-24 bg-slate-100" readonly>{{ $sd->plan }}</textarea>
                                                </div>
                                                <div class="form-control">
                                                    <label class="label">
                                                        <p class="font-bold uppercase text-sm">Actual:</p>
                                                    </label>
                                                    <textarea class="textarea textarea-bordered h-24 bg-slate-100" readonly>{{ $sd->actual }}</textarea>
                                                </div>
                                                <div class="form-control" data-theme="cmyk">
                                                    <label class="label">
                                                        <p class="font-bold uppercase text-sm">Status:</p>
                                                    </label>
                                                    @if ($sd->progress == 100)
                                                        <strong><span
                                                                class="bg-green-500 rounded-lg text-xs text-white p-1 m-1 uppercase">Terselesaikan</span></strong>
                                                    @elseif ($sd->progress == 50)
                                                        <strong><span
                                                                class="bg-warning rounded-lg text-xs text-white p-1 m-1 uppercase">Tidak
                                                                Terselesaikan</span></strong>
                                                    @else
                                                        <strong><span
                                                                class="bg-error rounded-lg text-xs text-white p-1 m-1 uppercase">Tidak
                                                                Tekerjakan</span></strong>
                                                    @endif
                                                </div>
                                                <div class="form-control">
                                                    <label class="label">
                                                        <p class="font-bold uppercase text-sm">Deskripsi Kegiatan:</p>
                                                    </label>
                                                    <textarea class="textarea textarea-bordered h-36 bg-slate-100" name="desc" readonly>{{ $sd->desc }}</textarea>
                                                </div>
                                                <div class="form-control">
                                                    <label class="label">
                                                        <p class="font-bold uppercase text-sm">Dokumentasi (4:3):</p>
                                                    </label>
                                                    <img src="{{ asset($sd->pict) }}" alt="">
                                                </div>
                                            </label>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            @foreach ($dailysd as $sd)
                                <div class="grid grid-cols-1 gap-4 md:hidden my-4" data-theme="cmyk">
                                    <div class="bg-white p-4 rounded-lg shadow-xl">
                                        <div class="flex items-center space-x-2 text-sm">
                                            <div class="font-bold">{{ $sd->created_at->format('d-M-Y') }}</div>
                                            <div>
                                                @if ($sd->progress == 100)
                                                    <span
                                                        class="bg-green-500 rounded-lg text-xs text-white font-bold p-1 m-1 uppercase">Terselesaikan</span>
                                                @elseif ($sd->progress == 50)
                                                    <span
                                                        class="bg-warning rounded-lg text-xs text-white font-bold p-1 m-1 uppercase">Tidak
                                                        Terselesaikan</span>
                                                @else
                                                    <span
                                                        class="bg-error rounded-lg text-xs text-white font-bold p-1 m-1 uppercase">Tidak
                                                        Tekerjakan</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="text-sm  my-2">{{ $sd->plan }}</div>
                                        <div class="flex justify-end">
                                            <label for="viewModalMobile-{{ $sd->id }}"
                                                class="btn btn-sm btn-primary hover:bg-primary-focus text-xs text-white mr-1">Lihat</label>
                                            <a href="dailysd/edit/{{ $sd->id }}"
                                                class="btn btn-sm btn-warning text-xs text-white ml-1">Edit</a>
                                        </div>
                                    </div>

                                    <input type="checkbox" id="viewModalMobile-{{ $sd->id }}" class="modal-toggle" />
                                    <label for="viewModalMobile-{{ $sd->id }}" class="modal cursor-pointer">
                                        <label class="modal-box relative bg-white">
                                            <label for="viewModalMobile-{{ $sd->id }}"
                                                class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                                            <h5 class="modal-title font-bold" id="viewModalLabel">
                                                {{ $sd->created_at->format('d-M-Y') }}
                                            </h5>
                                            <div class="form-control">
                                                <label class="label">
                                                    <p class="font-bold uppercase text-sm">Plan:</p>
                                                </label>
                                                <textarea class="textarea textarea-bordered h-24 bg-slate-100" readonly>{{ $sd->plan }}</textarea>
                                            </div>
                                            <div class="form-control">
                                                <label class="label">
                                                    <p class="font-bold uppercase text-sm">Actual:</p>
                                                </label>
                                                <textarea class="textarea textarea-bordered h-24 bg-slate-100" readonly>{{ $sd->actual }}</textarea>
                                            </div>
                                            <div class="form-control">
                                                <label class="label">
                                                    <p class="font-bold uppercase text-sm">Status:</p>
                                                </label>
                                                @if ($sd->progress == 100)
                                                    <strong><span
                                                            class="bg-green-500 rounded-lg text-xs text-white p-1 m-1 uppercase">Terselesaikan</span></strong>
                                                @elseif ($sd->progress == 50)
                                                    <strong><span
                                                            class="bg-warning rounded-lg text-xs text-white p-1 m-1 uppercase">Tidak
                                                            Terselesaikan</span></strong>
                                                @else
                                                    <strong><span
                                                            class="bg-error rounded-lg text-xs text-white p-1 m-1 uppercase">Tidak
                                                            Tekerjakan</span></strong>
                                                @endif
                                            </div>
                                            <div class="form-control">
                                                <label class="label">
                                                    <p class="font-bold uppercase text-sm">Deskripsi Kegiatan:</p>
                                                </label>
                                                <textarea class="textarea textarea-bordered h-24 bg-slate-100" placeholder="Deskripsi" name="desc" readonly>{{ $sd->desc }}</textarea>
                                            </div>
                                            <div class="form-control">
                                                <label class="label">
                                                    <p class="font-bold uppercase text-sm">Dokumentasi (4:3):</p>
                                                </label>
                                                <img src="{{ asset($sd->pict) }}" alt="">
                                            </div>
                                        </label>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
