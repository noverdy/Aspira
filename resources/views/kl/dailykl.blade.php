@extends('layouts.tailwind')
@section('container')
    <div class="container max-w-screen-xl mb-16">
        <div class="row justify-center">
            <div class="col-12">
                <div class="card lg:w-full mt-4 mx-2 bg-white shadow-xl text-black">
                    <div class="card-body mx-2">
                        <span align="justify">
                            <strong>
                                <h3>KELEMBAGAAN</h3>
                                <div class="text-sm breadcrumbs">
                                    <ul>
                                        <li><a href="/">Home</a></li>
                                        {{-- <li><a>Documents</a></li> --}}
                                        <li>Daily Kelembagaan</li>
                                    </ul>
                                </div>
                            </strong>
                        </span>
                    </div>
                </div>
                <div class="card lg:w-full my-4 mx-2 min-h-screen bg-white shadow-xl text-black">
                    <div class="card-body mx-2">
                        <div class="flex justify-end">
                            <a href="{{ route('dailykl.create') }}" class="btn bg-base-100 text-xs border-0 text-white"><i
                                    class="fa-solid fa-plus"></i>Tambah
                                Laporan</a>
                        </div>
                        <div class="justify-content-center -mx-2">
                            <span class="text-xs" align="justify">
                                <h3><strong>Laporan yang telah dibuat hari ini</strong></h3>
                            </span>
                            @foreach ($dailykl as $kl)
                                <div class="text-center border bg-white my-3">
                                    <div class="card-header bg-base-100 text-white rounded-t-lg">
                                        {{ $kl->created_at->format('d-M-Y') }}
                                    </div>
                                    <div class="card-body">
                                        <h5><strong style="text-transform: uppercase">{{ $kl->plan }}</strong></h5>
                                        <div class="mt-2">
                                            <label for="viewModal-{{ $kl->id }}" class="btn btn-primary text-white"><i
                                                    class="fa-solid fa-eye"></i></label>
                                            <a href="dailykl/edit/{{ $kl->id }}" class="btn btn-warning"><i
                                                    class="fa-solid fa-pen-to-square" style="color: #ffffff"></i></a>
                                            <a class="btn bg-red-600 border-0 text-white" id="delete"
                                                data-id="{{ $kl->id }}"><i class="fa-solid fa-trash"></i></a>
                                        </div>
                                    </div>
                                    <div class="card-footer text-muted bg-slate-100 rounded-b-lg">
                                        @if ($kl->progress == 100)
                                            <strong><span class="text-sm"
                                                    style="color: green; text-transform: uppercase;">Terselesaikan</span></strong>
                                        @elseif ($kl->progress == 50)
                                            <strong><span class="text-sm"
                                                    style="color: blue; text-transform: uppercase;">Tidak
                                                    Terselesaikan</span></strong>
                                        @else
                                            <strong><span class="text-sm"
                                                    style="color: red; text-transform: uppercase;">Tidak
                                                    Tekerjakan</span></strong>
                                        @endif
                                    </div>
                                </div>

                                <input type="checkbox" id="viewModal-{{ $kl->id }}" class="modal-toggle" />
                                <label for="viewModal-{{ $kl->id }}" class="modal cursor-pointer">
                                    <label class="modal-box relative bg-white">
                                        <label for="viewModal-{{ $kl->id }}"
                                            class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                                        <h5 class="modal-title" id="viewModalLabel">
                                            <strong>{{ $kl->created_at->format('d-M-Y') }}</strong>
                                        </h5>
                                        <div class="form-control">
                                            <label class="label">
                                                <h4><strong>Plan:</strong></h4>
                                            </label>
                                            <textarea class="textarea textarea-bordered h-24 bg-slate-100" readonly>{{ $kl->plan }}</textarea>
                                        </div>
                                        <div class="form-control">
                                            <label class="label">
                                                <h4><strong>Actual:</strong></h4>
                                            </label>
                                            <textarea class="textarea textarea-bordered h-64 bg-slate-100" readonly>{{ $kl->actual }}</textarea>
                                        </div>
                                        <div class="form-control">
                                            <label class="label">
                                                <h4><strong>Status:</strong></h4>
                                            </label>
                                            <input type="text" class="input input-bordered w-full max-w-xs bg-slate-100"
                                                value="@if ($kl->progress == 100) Terselesaikan
                                                @elseif ($kl->progress == 50)Tidak Terselesaikan
                                                @else()Tidak Tekerjakan @endif"
                                                readonly />
                                        </div>
                                        <div class="form-control">
                                            <label class="label">
                                                <h4><strong>Dokumentasi:</strong></h4>
                                            </label>
                                            <img src="{{ asset($kl->pict) }}" alt="">
                                        </div>
                                        <div class="form-control">
                                            <label class="label">
                                                <h4><strong>Deskripsi:</strong></h4>
                                            </label>
                                            <textarea class="textarea textarea-bordered h-24 bg-slate-100" placeholder="Deskripsi" name="desc" readonly>{{ $kl->desc }}</textarea>
                                        </div>
                                    </label>
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#delete').click(function() {
            var klid = $(this).attr('data-id');
            Swal.fire({
                title: 'Yakin menghapus data ini?',
                text: "Setelah data dihapus, data tidak bisa di kembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "dailykl/delete/" + klid + ""
                    Swal.fire(
                        'Data terhapus!',
                        'Data berhasil dihapus.',
                        'success'
                    )
                }
            });
        });
    </script>
@endsection
