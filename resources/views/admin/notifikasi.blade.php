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
                    <!-- Hari ini -->
                    <div class="card mt-4 mb-5">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-faded-info shadow-primary border-radius-lg p-2">
                                <h6 class="text-white text-capitalize pt-1 ps-3">Hari ini</h6>
                            </div>
                        </div>
                        <div class="card-body pb-2">
                            <div class="row">
                                <div class="col-lg-12 right">
                                    <div class="box shadow-sm rounded bg-white mb-3">
                                        @php $i=1 @endphp
                                        @foreach($categorizedNotifikasi as $notifikasi)
                                        @if($notifikasi->category == 'Today')
                                        <div class="box-body p-0">
                                            <div class="px-3 py-2 d-flex align-items-center justify-content-between bg-light border-bottom">
                                                <div>
                                                    <input type="checkbox" class="checkbox mx-2">
                                                    <span class="text-truncate" style="font-weight: 700;">License Reminder</span>
                                                    <p class="small mb-0 mt-2">Masa berlaku lisensi {{ $notifikasi->nama_dokumen }} akan berakhir pada {{ \Carbon\Carbon::parse($notifikasi->end)->format('d F Y') }}</p>
                                                </div>
                                                <div class="d-flex">
                                                    <span class="time">{{ $notifikasi->category }}</span>
                                                    <!-- <p class="time mb-0 mt-2" style="color: #b5b5b5; font-size: 20px;"><i class="bi bi-check2-all"></i></p> -->
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Kemarin -->
                    <div class="card mb-5">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-faded-primary shadow-primary border-radius-lg p-2">
                                <h6 class="text-white text-capitalize pt-1 ps-3">Kemarin</h6>
                            </div>
                        </div>
                        <div class="card-body pb-2">
                            <div class="row">
                                <div class="col-lg-12 right">
                                    <div class="box shadow-sm rounded bg-white mb-3">
                                        @php $i=1 @endphp
                                        @foreach($categorizedNotifikasi as $notifikasi)
                                        @if($notifikasi->category == 'Yesterday')
                                        <div class="box-body p-0">
                                            <div class="px-3 py-2 d-flex align-items-center justify-content-between bg-light border-bottom">
                                                <div>
                                                    <input type="checkbox" class="checkbox mx-2">
                                                    <span class="text-truncate" style="font-weight: 700;">License Reminder</span>
                                                    <p class="small mb-0 mt-2">Masa berlaku lisensi {{ $notifikasi->nama_dokumen }} akan berakhir pada {{ \Carbon\Carbon::parse($notifikasi->end)->format('d F Y') }}</p>
                                                </div>
                                                <div class="d-flex">
                                                    <span class="time">{{ $notifikasi->category }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Seminggu yang lalu -->
                    <div class="card mb-5">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-faded-danger shadow-primary border-radius-lg p-2">
                                <h6 class="text-white text-capitalize pt-1 ps-3">Seminggu yang lalu</h6>
                            </div>
                        </div>
                        <div class="card-body pb-2">
                            <div class="row">
                                <div class="col-lg-12 right">
                                    <div class="box shadow-sm rounded bg-white mb-3">
                                        @php $i=1 @endphp
                                        @foreach($categorizedNotifikasi as $notifikasi)
                                        @if($notifikasi->category == 'Last Week')
                                        <div class="box-body p-0">
                                            <div class="px-3 py-2 d-flex align-items-center justify-content-between bg-light border-bottom">
                                                <div>
                                                    <input type="checkbox" class="checkbox mx-2">
                                                    <span class="text-truncate" style="font-weight: 700;">License Reminder</span>
                                                    <p class="small mb-0 mt-2">Masa berlaku lisensi {{ $notifikasi->nama_dokumen }} akan berakhir pada {{ \Carbon\Carbon::parse($notifikasi->end)->format('d F Y') }}</p>
                                                </div>
                                                <div class="d-flex">
                                                    <span class="time">{{ $notifikasi->category }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Bulan ini -->
                    <div class="card mb-5">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-faded-success shadow-primary border-radius-lg p-2">
                                <h6 class="text-white text-capitalize pt-1 ps-3">Bulan ini</h6>
                            </div>
                        </div>
                        <div class="card-body pb-2">
                            <div class="row">
                                <div class="col-lg-12 right">
                                    <div class="box shadow-sm rounded bg-white mb-3">
                                        @php $i=1 @endphp
                                        @foreach($categorizedNotifikasi as $notifikasi)
                                        @if($notifikasi->category == 'This Month')
                                        <div class="box-body p-0">
                                            <div class="px-3 py-2 d-flex align-items-center justify-content-between bg-light border-bottom">
                                                <div>
                                                    <input type="checkbox" class="checkbox mx-2">
                                                    <span class="text-truncate" style="font-weight: 700;">License Reminder</span>
                                                    <p class="small mb-0 mt-2">Masa berlaku lisensi {{ $notifikasi->nama_dokumen }} akan berakhir pada {{ \Carbon\Carbon::parse($notifikasi->end)->format('d F Y') }}</p>
                                                </div>
                                                <div class="d-flex">
                                                    <span class="time">{{ $notifikasi->category }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Berbulan-bulan yang lalu -->
                    <div class="card mb-5">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-faded-warning shadow-primary border-radius-lg p-2">
                                <h6 class="text-white text-capitalize pt-1 ps-3">Beberapa bulan lalu</h6>
                            </div>
                        </div>
                        <div class="card-body pb-2">
                            <div class="row">
                                <div class="col-lg-12 right">
                                    <div class="box shadow-sm rounded bg-white mb-3">
                                        @php $i=1 @endphp
                                        @foreach($categorizedNotifikasi as $notifikasi)
                                        @if($notifikasi->category == 'Months ago')
                                        <div class="box-body p-0">
                                            <div class="px-3 py-2 d-flex align-items-center justify-content-between bg-light border-bottom">
                                                <div>
                                                    <input type="checkbox" class="checkbox mx-2">
                                                    <span class="text-truncate" style="font-weight: 700;">License Reminder</span>
                                                    <p class="small mb-0 mt-2">Masa berlaku lisensi {{ $notifikasi->nama_dokumen }} akan berakhir pada {{ \Carbon\Carbon::parse($notifikasi->end)->format('d F Y') }}</p>
                                                </div>
                                                <div class="d-flex">
                                                    <span class="time">{{ $notifikasi->category }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach
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