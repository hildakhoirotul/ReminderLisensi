@extends('admin.main')

@section('content')
<main id="main">
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="importExcelLabel" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog" role="document">
            <form action="{{ route('data.store') }}" method="POST">
                <div class="modal-content">
                    <div class="modal-header p-2 px-3" style="background-color: #5791ff;">
                        <h5 class="modal-title text-center" id="importExcelLabel">Tambah Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body justify-content-center px-3 pt-2 pb-1 mb-0">
                        @csrf
                        <div class="registration-form">
                            <div class="form-group">
                                <label for="nama_dokumen">NAMA DOKUMEN</label>
                                <input type="text" class="form-control item" name="nama_dokumen" id="nama_dokumen" placeholder="Type here ...">
                            </div>
                            <div class="form-group">
                                <label for="start">START</label>
                                <input type="date" class="form-control item" name="start" id="start">
                            </div>
                            <div class="form-group">
                                <label for="end">END</label>
                                <input type="date" class="form-control item" name="end" id="end">
                            </div>
                            <div class="form-group">
                                <label for="reminder1">REMINDER 1</label>
                                <input type="date" class="form-control item" name="reminder1" id="reminder1">
                            </div>
                            <div class="form-group">
                                <label for="reminder2">REMINDER 2</label>
                                <input type="date" class="form-control item" name="reminder2" id="reminder2">
                            </div>
                            <div class="form-group">
                                <label for="reminder3">REMINDER 3</label>
                                <input type="date" class="form-control item" name="reminder3" id="reminder3">
                            </div>
                            <div class="form-group d-flex justify-content-center">
                                <button type="submit" class="btn btn-block create-account">Simpan</button>
                                <button type="button" class="btn btn-block btn-cancel ms-2">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- ======= About Section ======= -->
    <section id="about" class="about">

        <div class="container-fluid px-5" data-aos="fade-up">

            <div class="section-title">
                <h2>Database Lisensi</h2>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-info shadow-primary border-radius-lg p-3">
                                <div class="button-container">
                                    <button type="button" class="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <span class="icon"><i class="bi bi-plus" style="font-size: 31px;"></i></span>
                                        <span class="text">Tambah</span>
                                    </button>
                                    <!-- <a href="#" class="button">
                                        <span class="icon"><i class="bi bi-plus" style="font-size: 38px;"></i></span>
                                        <span class="text">Tambah</span>
                                    </a> -->
                                    <a href="#" class="button" data-toggle="modal" data-target="#importExcel">
                                        <span class="icon" style="padding-left: 9px;"><i class="bi bi-upload" style="font-size: 20px;"></i></span>
                                        <span class="text ms-2">Unggah</span>
                                    </a>
                                    <a href="#" class="button">
                                        <span class="icon" style="padding-left: 9px;"><i class="bi bi-download" style="font-size: 20px;"></i></span>
                                        <span class="text ms-2">Unduh</span>
                                    </a>
                                    <a href="#" class="button">
                                        <span class="icon" style="padding-left: 9px;"><i class="bi bi-trash" style="font-size: 21px;"></i></span>
                                        <span class="text ms-2">Reset</span>
                                    </a>
                                </div>
                                <div class="button-container">
                                    <span class="text-xs text-white">Jumlah data: 1</span>
                                    <div class="search-form">
                                        <i class="bi bi-search"></i>
                                        <input type="text" class="form-control form-input" placeholder="Cari disini...">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center align-middle text-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">no</th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">nama dokumen</th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">start</th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">end</th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">reminder 1</th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">reminder 2</th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">reminder 3</th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i=1 @endphp
                                        @foreach($data as $datas)
                                        <tr>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $i++ }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs mb-0">{{ $datas->nama_dokumen }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs mb-0">{{ $datas->start }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs mb-0">{{ $datas->end }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs mb-0">{{ $datas->reminder1 }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs mb-0">{{ $datas->reminder2 }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs mb-0">{{ $datas->reminder3 }}</p>
                                            </td>
                                            <td>
                                                <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                                                    <button type="button" class="btn btn-warning"><i class="bi bi-pen-fill"></i></button>
                                                    <button type="button" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- <tr>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">1</p>
                                            </td>
                                            <td>
                                                <p class="text-xs mb-0">Dokumen Lisensi B</p>
                                            </td>
                                            <td>
                                                <p class="text-xs mb-0">25 Feb 2020</p>
                                            </td>
                                            <td>
                                                <p class="text-xs mb-0">25 Feb 2025</p>
                                            </td>
                                            <td>
                                                <p class="text-xs mb-0">25 Feb 2024</p>
                                            </td>
                                            <td>
                                                <p class="text-xs mb-0">25 Jul 2024</p>
                                            </td>
                                            <td>
                                                <p class="text-xs mb-0">25 Oct 2024</p>
                                            </td>
                                            <td>
                                                <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                                                    <button type="button" class="btn btn-warning"><i class="bi bi-pen-fill"></i></button>
                                                    <button type="button" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">1</p>
                                            </td>
                                            <td>
                                                <p class="text-xs mb-0">Dokumen Lisensi C</p>
                                            </td>
                                            <td>
                                                <p class="text-xs mb-0">25 Mar 2020</p>
                                            </td>
                                            <td>
                                                <p class="text-xs mb-0">25 Mar 2025</p>
                                            </td>
                                            <td>
                                                <p class="text-xs mb-0">25 Mar 2024</p>
                                            </td>
                                            <td>
                                                <p class="text-xs mb-0">25 Aug 2024</p>
                                            </td>
                                            <td>
                                                <p class="text-xs mb-0">25 Nov 2024</p>
                                            </td>
                                            <td>
                                                <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                                                    <button type="button" class="btn btn-warning"><i class="bi bi-pen-fill"></i></button>
                                                    <button type="button" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                                                </div>
                                            </td>
                                        </tr> -->
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->

</main><!-- End #main -->
@endsection