@extends('admin.main')

@section('content')
<main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container-fluid px-5" data-aos="fade-up">

            <div class="section-title">
                <h2>Daftar Pengguna</h2>
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
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">nik</th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">nama</th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">email</th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">password</th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">1</p>
                                            </td>
                                            <td>
                                                <p class="text-xs mb-0">000000</p>
                                            </td>
                                            <td>
                                                <p class="text-xs mb-0">Fulan</p>
                                            </td>
                                            <td>
                                                <p class="text-xs mb-0">Fulan@email.com</p>
                                            </td>
                                            <td>
                                                <p class="text-xs mb-0">******</p>
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