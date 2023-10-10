@extends('admin.main')

@section('content')
<main id="main">
    <section id="about" class="about">
        <div class="container-fluid px-5" data-aos="fade-up">

            <div class="section-title">
                <h2>Notifikasi</h2>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card mt-4 mb-5">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-info shadow-primary border-radius-lg p-2">
                                <h6 class="text-white text-capitalize pt-1 ps-3">Hari ini</h6>
                            </div>
                        </div>
                        <div class="card-body pb-2">
                            <div class="row">
                                <div class="col-lg-12 right">
                                    <div class="box shadow-sm rounded bg-white mb-3">
                                        <div class="box-body p-0">
                                            <div class="px-3 pt-2 d-flex align-items-center justify-content-between bg-light border-bottom">
                                                <div>
                                                    <!-- <div class="dropdown-list-image"> -->
                                                    <input type="checkbox" class="checkbox mx-2">
                                                    <!-- </div> -->
                                                    <!-- <div class="font-weight-bold me-3"> -->
                                                    <span class="text-truncate">DAILY RUNDOWN: WEDNESDAY</span>
                                                    <p class="small">Income tax sops on the cards, The bias in VC funding, and other top news for you</p>
                                                </div>
                                                <div>
                                                    <span class="time me-2">1 jam lalu</span>

                                                </div>
                                                <!-- <span class="ms-auto mb-auto">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-light btn-sm rounded" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="bi bi-three-dots-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <button class="dropdown-item" type="button"><i class="mdi mdi-delete"></i> Delete</button>
                                                            <button class="dropdown-item" type="button"><i class="mdi mdi-close"></i> Turn Off</button>
                                                        </div>
                                                    </div>
                                                    <br />
                                                    <div class="text-right text-muted pt-1">1 jam yang lalu</div>
                                                </span> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-5">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg p-2">
                                <h6 class="text-white text-capitalize pt-1 ps-3">Seminggu yang lalu</h6>
                            </div>
                        </div>
                        <div class="card-body pb-2">
                            <div class="row">
                                <div class="col-lg-12 right">
                                    <div class="box shadow-sm rounded bg-white mb-3">
                                        <div class="box-body p-0">
                                            <div class="px-3 pt-2 d-flex align-items-center justify-content-between bg-light border-bottom">
                                                <div>
                                                    <!-- <div class="dropdown-list-image"> -->
                                                    <input type="checkbox" class="checkbox mx-2">
                                                    <!-- </div> -->
                                                    <!-- <div class="font-weight-bold me-3"> -->
                                                    <span class="text-truncate">DAILY RUNDOWN: WEDNESDAY</span>
                                                    <p class="small">Income tax sops on the cards, The bias in VC funding, and other top news for you</p>
                                                </div>
                                                <div>
                                                    <span class="time me-2">25-oct-23</span>

                                                </div>
                                                <!-- <span class="ms-auto mb-auto">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-light btn-sm rounded" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="bi bi-three-dots-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <button class="dropdown-item" type="button"><i class="mdi mdi-delete"></i> Delete</button>
                                                            <button class="dropdown-item" type="button"><i class="mdi mdi-close"></i> Turn Off</button>
                                                        </div>
                                                    </div>
                                                    <br />
                                                    <div class="text-right text-muted pt-1">1 jam yang lalu</div>
                                                </span> -->
                                            </div>
                                        </div>
                                        <div class="box-body p-0">
                                            <div class="px-3 pt-2 d-flex align-items-center justify-content-between bg-light border-bottom">
                                                <div>
                                                    <!-- <div class="dropdown-list-image"> -->
                                                    <input type="checkbox" class="checkbox mx-2">
                                                    <!-- </div> -->
                                                    <!-- <div class="font-weight-bold me-3"> -->
                                                    <span class="text-truncate">DAILY RUNDOWN: WEDNESDAY</span>
                                                    <p class="small">Income tax sops on the cards, The bias in VC funding, and other top news for you</p>
                                                </div>
                                                <div>
                                                    <span class="time me-2">26-oct-23</span>

                                                </div>
                                                <!-- <span class="ms-auto mb-auto">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-light btn-sm rounded" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="bi bi-three-dots-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <button class="dropdown-item" type="button"><i class="mdi mdi-delete"></i> Delete</button>
                                                            <button class="dropdown-item" type="button"><i class="mdi mdi-close"></i> Turn Off</button>
                                                        </div>
                                                    </div>
                                                    <br />
                                                    <div class="text-right text-muted pt-1">1 jam yang lalu</div>
                                                </span> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
    </section>

</main>
@endsection