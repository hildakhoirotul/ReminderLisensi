@extends('user.main')

@section('content')
<main id="main">
    <section id="about" class="about">
        <div class="container-fluid px-5" data-aos="fade-up">

            <div class="section-title justify-content-between d-flex align-items-center pe-3">
                <h2>Notifikasi</h2>
                <button type="button" class="button btn-delete p-1" id="removeDataButton" style="background-color: #bb0505;">
                    <span class="icon" style="padding-left: 7px;color: #fff;"><i class="bi bi-trash" style="font-size: 24px;"></i></span>
                    <span class="text ms-3" style="color: #fff;font-size: 16px;">Hapus</span>
                </button>
            </div>

            <div class="row">
                <div class="col-12">
                    <!-- Hari ini -->
                    <div class="card mt-4 mb-5" style="border-radius: unset;">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2" style="border-radius: 0px;">
                            <div class="bg-gradient-faded-info shadow-primary p-2 py-3 justify-content-between align-items-center d-flex">
                                <h5 class="text-white text-capitalize mb-0 ps-3">Hari ini</h5>
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
                                                    <input type="checkbox" class="checkbox mx-2" data-id="{{$notifikasi->id}}" data-checked="{{ $notifikasi->isChecked ? 'true' : 'false' }}">
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
                    <div class="card mb-5" style="border-radius: unset;">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-faded-primary d-flex align-items-center justify-content-between shadow-primary p-2">
                                <h5 class="text-white text-capitalize pt-1 ps-3">Kemarin</h5>
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
                                                    <input type="checkbox" class="checkbox mx-2" data-id="{{$notifikasi->id}}" data-checked="{{ $notifikasi->isChecked ? 'true' : 'false' }}">
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
                    <div class="card mb-5" style="border-radius: unset;">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-faded-danger shadow-primary p-2">
                                <h6 class="text-white text-capitalize pt-1 ps-3">Minggu ini</h6>
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
                                                    <input type="checkbox" class="checkbox mx-2" data-id="{{$notifikasi->id}}" data-checked="{{ $notifikasi->isChecked ? 'true' : 'false' }}">
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
                    <div class="card mb-5" style="border-radius: unset;">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-faded-success shadow-primary p-2">
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
                                                    <input type="checkbox" class="checkbox mx-2" data-id="{{$notifikasi->id}}" data-checked="{{ $notifikasi->isChecked ? 'true' : 'false' }}">
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
                                                    <input type="checkbox" class="checkbox mx-2" data-id="{{$notifikasi->id}}" data-checked="{{ $notifikasi->isChecked ? 'true' : 'false' }}">
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
<script src="{{ asset('js/jquery.js') }}"></script>
<script>
    function handleCheckboxChanges() {
        function updateSelectedIdsInLocalStorage(selectedIds) {
            localStorage.setItem("selectedIds", JSON.stringify(selectedIds));
        }

        var selectedIds = getSelectedIdsFromLocalStorage();
        $(".checkbox").each(function() {
            var dataId = $(this).data("id");
            if (selectedIds.includes(dataId)) {
                $(this).prop("checked", true);
            }
        });

        $(".checkbox").change(function() {
            var isChecked = $(this).prop("checked");
            var dataId = $(this).data("id");
            var selectedIds = getSelectedIdsFromLocalStorage();

            if (isChecked) {
                selectedIds.push(dataId);
            } else {
                selectedIds = selectedIds.filter(function(id) {
                    return id !== dataId;
                });
            }

            localStorage.setItem("selectedIds", JSON.stringify(selectedIds));
        });

    }

    function getSelectedIdsFromLocalStorage() {
        var selectedIds = JSON.parse(localStorage.getItem("selectedIds")) || [];
        return selectedIds;
    }

    $(document).ready(function() {
        handleCheckboxChanges();

        $(".checkbox").change(function() {
            handleCheckboxChanges();
        });
    });

    function deleteSelectedData() {
        var selectedIds = getSelectedIdsFromLocalStorage();

        if (selectedIds.length > 0) {
            if (confirm("Anda yakin ingin menghapus data yang dipilih?")) {
                $.ajax({
                    url: "{{ url('remove-notifikasi')}}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        ids: selectedIds
                    },
                    success: function(response) {
                        localStorage.removeItem("selectedIds");
                        $(".checkbox").prop("checked", false);
                        location.reload();
                    },
                    error: function(error) {
                        console.error("Terjadi kesalahan: " + error);
                    }
                });
            }

        } else {
            alert("Pilih setidaknya satu data untuk dihapus.");
        }
    };
    $("#removeDataButton").click(function() {
        deleteSelectedData();
    });
</script>
@endsection