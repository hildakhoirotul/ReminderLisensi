@extends('admin.main')
@section('title', 'Notifikasi')

@section('content')
<main id="main">
    <section id="about" class="about">
        <div class="container-fluid ps-5 pe-1" data-aos="fade-up">

            <div class="section-title justify-content-between d-flex align-items-center pe-3">
                <h2>Notifikasi</h2>
                <!-- <button type="button" class="button btn-delete p-1" id="removeDataButton" style="background-color: #bb0505;">
                    <span class="icon" style="padding-left: 7px;color: #fff;"><i class="bi bi-trash" style="font-size: 24px;"></i></span>
                    <span class="text ms-3" style="color: #fff;font-size: 16px;">Hapus</span>
                </button> -->
            </div>

            <div class="row">
                <div class="col-3">
                    <div class="grid search">
                        <div class="grid-body">
                            <!-- <h2 class="grid-title"><i class="fa fa-filter"></i>Filter</h2> -->
                            <!-- <hr> -->

                            <h6>search: </h6>
                            <div class="input-group">
                                <input type="text" class="form-control" id="searchInput" oninput="searchNotification()">
                                <button class="btn btn-outline-secondary btn-lg" id="search-btn" type="button" disabled><i class="bi bi-search"></i></button>
                                <!-- <div class="search-icon"><i class="bi bi-search"></i></div> -->
                            </div>

                            <!-- BEGIN FILTER BY CATEGORY -->
                            <hr>
                            <h6>Filter:</h6>
                            <div class="checkbox">
                                <label><input type="checkbox" class="icheck" data-category="Today"> Hari ini</label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" class="icheck" data-category="Yesterday"> Kemarin</label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" class="icheck" data-category="Last Week"> Minggu ini</label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" class="icheck" data-category="This Month"> Bulan ini</label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" class="icheck" data-category="Months ago"> Beberapa bulan lalu</label>
                            </div>
                            <hr>
                            <!-- END FILTER BY CATEGORY -->
                            <button type="button" class="btn btn-warning delete-all mb-2" id="removeDataButton"><i class="bi bi-trash3-fill me-2"></i>DELETE SELECTED</button>
                            <button type="button" class="btn btn-danger delete-all" onclick="showResetConfirmation(event, this)"><i class="bi bi-trash3-fill me-2"></i>DELETE ALL</button>
                        </div>
                    </div>
                </div>
                <div class="col-8" id="searchResults">
                    <!-- Hari ini -->
                    <div class="card mt-4 mb-5 searchable" data-category="Today" style="border-radius: unset;">
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
                                        <div class="box-body p-0 searchteks">
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
                    <div class="card mb-5 searchable" data-category="Yesterday" style="border-radius: unset;">
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
                                        <div class="box-body p-0 searchteks">
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
                    <div class="card mb-5 searchable" data-category="Last Week" style="border-radius: unset;">
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
                                        <div class="box-body p-0 searchteks">
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
                    <div class="card mb-5 searchable" data-category="This Month" style="border-radius: unset;">
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
                                        <div class="box-body p-0 searchteks">
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
                    <div class="card mb-5 searchable" data-category="Months ago" style="border-radius: unset;">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-faded-warning shadow-primary p-2">
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
                                        <div class="box-body p-0 searchteks">
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
        var totalChecked = 0;
        $(".checkbox").each(function() {
            var dataId = $(this).data("id");
            if (selectedIds.includes(dataId)) {
                $(this).prop("checked", true);
                totalChecked++;
            }
        });

        if (totalChecked > 0) {
            $("#removeDataButton").show(); // Munculkan tombol "Hapus"
        } else {
            $("#removeDataButton").hide(); // Sembunyikan tombol "Hapus"
        }

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
                    url: "{{ url('delete-notifikasi')}}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        ids: selectedIds
                    },
                    success: function(response) {
                        localStorage.removeItem("selectedIds");
                        $(".checkbox").prop("checked", false);
                        $("#removeDataButton").hide();
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
<script>
    function searchNotification() {
        var searchInput = document.getElementById("searchInput").value.toLowerCase();
        var searchableElements = document.querySelectorAll(".searchable");
        var searchableComponent = document.querySelectorAll(".searchteks");

        searchableElements.forEach(function(element) {
            var text = element.textContent.toLowerCase();

            if (text.includes(searchInput)) {
                element.style.display = "flex"; // Tampilkan elemen yang sesuai
            } else {
                element.style.display = "none"; // Sembunyikan elemen yang tidak sesuai
            }
        });

        searchableComponent.forEach(function(element) {
            var text = element.textContent.toLowerCase();

            if (text.includes(searchInput)) {
                element.style.display = "block"; // Tampilkan elemen yang sesuai
            } else {
                element.style.display = "none"; // Sembunyikan elemen yang tidak sesuai
            }
        });
    }
</script>
<script>
    function updateFilter() {
        // Dapatkan semua filter yang dicentang
        var selectedCategories = [];
        var checkboxes = document.querySelectorAll('.icheck:checked');
        checkboxes.forEach(function(checkbox) {
            selectedCategories.push(checkbox.getAttribute('data-category'));
        });

        // Dapatkan semua elemen yang dapat difilter
        var searchableElements = document.querySelectorAll('.searchable');

        // Tampilkan atau sembunyikan elemen sesuai dengan filter
        searchableElements.forEach(function(element) {
            var category = element.getAttribute('data-category');
            if (selectedCategories.length === 0 || selectedCategories.includes(category)) {
                element.style.display = 'flex';
            } else {
                element.style.display = 'none';
            }
        });
    }

    // Tambahkan event listener untuk memantau perubahan pada filter
    var checkboxes = document.querySelectorAll('.icheck');
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', updateFilter);
    });

    updateFilter();
</script>
<script type="text/javascript">
    function showResetConfirmation(event, button) {
        event.preventDefault();
        var form = $(button).closest("form");
        swal.fire({
                title: `Apakah anda yakin menghapus semua data ini?`,
                text: "Data yang dihapus tidak dapat dikembalikan.",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            })
            .then((willDelete) => {
                if (willDelete.isConfirmed) {
                    $.get("{{ url('reset-notifikasi') }}", function(data) {
                        location.reload();
                    });
                }
            });
    }
</script>
@endsection