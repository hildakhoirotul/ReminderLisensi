@extends('user.main')

@section('content')
<main id="main">

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
                                    <a href="#" class="button">
                                        <span class="icon"><i class="bi bi-plus" style="font-size: 38px;"></i></span>
                                        <span class="text">Tambah</span>
                                    </a>
                                    <a href="#" class="button">
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
                                        <tr>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">1</p>
                                            </td>
                                            <td>
                                                <p class="text-xs mb-0">Dokumen Lisensi A</p>
                                            </td>
                                            <td>
                                                <p class="text-xs mb-0">25 Jan 2020</p>
                                            </td>
                                            <td>
                                                <p class="text-xs mb-0">25 Jan 2025</p>
                                            </td>
                                            <td>
                                                <p class="text-xs mb-0">25 Jan 2024</p>
                                            </td>
                                            <td>
                                                <p class="text-xs mb-0">25 Jun 2024</p>
                                            </td>
                                            <td>
                                                <p class="text-xs mb-0">25 Sep 2024</p>
                                            </td>
                                            <td>
                                                <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                                                    <button type="button" class="btn btn-warning"><i class="bi bi-pen-fill"></i></button>
                                                    <button type="button" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                                                </div>
                                            </td>
                                        </tr>
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