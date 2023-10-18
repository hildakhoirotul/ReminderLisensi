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
                                <button type="button" class="btn btn-block btn-cancel ms-2" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="importExcelLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('import.database') }}" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header p-2 px-3">
                        <h5 class="modal-title" id="importExcelLabel">Import Data Excel</h5>
                    </div>
                    <div class="modal-body px-3 pt-2 pb-1 mb-0">
                        <!-- Tempatkan form import di sini -->
                        @csrf
                        <div class="form-group p-0">
                            <input type="file" name="file" accept=".xlsx, .xls, .csv">
                        </div>
                    </div>
                    <div class="modal-footer p-1">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Import</button>
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
                                    <button type="button" class="button" data-bs-toggle="modal" data-bs-target="#importExcel">
                                        <span class="icon"><i class="bi bi-upload" style="padding-left: 6px;font-size: 20px;"></i></span>
                                        <span class="text ms-2">Unggah</span>
                                    </button>
                                    <!-- <a href="#" class="button">
                                        <span class="icon"><i class="bi bi-plus" style="font-size: 38px;"></i></span>
                                        <span class="text">Tambah</span>
                                    </a> -->
                                    <!-- <a href="#" class="button" data-toggle="modal" data-target="#importExcel">
                                        <span class="icon" style="padding-left: 9px;"><i class="bi bi-upload" style="font-size: 20px;"></i></span>
                                        <span class="text ms-2">Unggah</span>
                                    </a> -->
                                    <a href="{{ route('export.database') }}" class="button">
                                        <span class="icon" style="padding-left: 9px;"><i class="bi bi-download" style="font-size: 20px;"></i></span>
                                        <span class="text ms-2">Unduh</span>
                                    </a>
                                    <button type="button" class="button" onclick="showResetConfirmation(event, this)">
                                        <span class="icon" style="padding-left: 5px;"><i class="bi bi-trash" style="font-size: 21px;"></i></span>
                                        <span class="text ms-2">Reset</span>
                                    </button>
                                    <!-- <a href="#" class="button" onclick="showDeleteConfirmation(event, this)">
                                        <span class="icon" style="padding-left: 9px;"><i class="bi bi-trash" style="font-size: 21px;"></i></span>
                                        <span class="text ms-2">Reset</span>
                                    </a> -->
                                </div>
                                <div class="button-container">
                                    <span class="text-xs text-white">Jumlah data: {{ $count }}</span>
                                    <div class="search-form">
                                        <i class="bi bi-search"></i>
                                        <input type="text" class="form-control form-input" placeholder="Cari disini..." name="search" id="searchLisensi">
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
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 text-start">nama dokumen</th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">start</th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">end</th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">reminder 1</th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">reminder 2</th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">reminder 3</th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="lisensiTableBody">
                                        @php $i=1 @endphp
                                        @foreach($data as $datas)
                                        <tr data-id="{{ $datas->id }}">
                                            <td data-field="nomor">
                                                <p class="text-xs font-weight-bold mb-0">{{ $i++ }}</p>
                                            </td>
                                            <td data-field="nama_dokumen">
                                                <p class="text-xs mb-0 text-start">{{ $datas->nama_dokumen }}</p>
                                            </td>
                                            <td data-field="start" data-display="{{ \Carbon\Carbon::parse($datas->start)->format('d F Y') }}">
                                                <p class="text-xs mb-0">{{ $datas->start }}</p>
                                            </td>
                                            <td data-field="end">
                                                <p class="text-xs mb-0">{{ $datas->end }}</p>
                                            </td>
                                            <td data-field="reminder1">
                                                <p class="text-xs mb-0">{{ $datas->reminder1 }}</p>
                                            </td>
                                            <td data-field="reminder2">
                                                <p class="text-xs mb-0">{{ $datas->reminder2 }}</p>
                                            </td>
                                            <td data-field="reminder3">
                                                <p class="text-xs mb-0">{{ $datas->reminder3 }}</p>
                                            </td>
                                            <td data-field="action">
                                                <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                                                    <button type="button" class="btn btn-warning" onclick="startEditing(this)"><i class="bi bi-pen-fill"></i></button>
                                                    <form action="{{ route('lisensi.destroy', ['id' => $datas->id]) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" onclick="showDeleteConfirmation(event, this)"><i class="bi bi-trash-fill"></i></button>
                                                    </form>
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
                        <div class="d-flex justify-content-center mt-3" id="paging">
                            {{ $data->links()}}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->

</main><!-- End #main -->
<script src="{{ asset('js/app.js') }}"></script> <!-- Memuat file JavaScript dari Laravel Mix -->
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
                    $.get("{{ url('reset-lisensi') }}", function(data) {
                        location.reload();
                    });
                }
            });
    }
</script>
<script>
    function filterData() {
        const selected = document.getElementById('searchLisensi').value;

        fetch(`{{ route('search.lisensi') }}?search=${selected}`)
            .then(response => response.text())
            .then(data => {
                document.getElementById('lisensiTableBody').innerHTML = data;
            });
    }

    document.getElementById('searchLisensi').addEventListener('input', function() {
        filterData();
    });
</script>
<script type="text/javascript">
    function showDeleteConfirmation(event, button) {
        event.preventDefault();
        var form = $(button).closest("form");
        swal.fire({
                title: `Apakah anda yakin menghapus data ini?`,
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
                    form.submit();
                }
            });
    }
</script>

<script>
    function startEditing(button) {
        var row = button.closest("tr");
        var editButton = row.querySelector("button.btn-warning");
        var saveButton = document.createElement("button");

        var cells = row.querySelectorAll("td");
        var editedData = {};
        for (let i = 0; i < cells.length; i++) {
            let cell = cells[i];
            let fieldName = cell.dataset.field;
            if (fieldName !== 'nomor' && fieldName !== 'action') {
                let input;
                if (fieldName !== 'nama_dokumen') {
                    input = document.createElement("input");
                    input.type = "date";
                    input.value = cell.dataset.value;
                } else {
                    input = document.createElement("input");
                    input.type = "text"; // Menggunakan input biasa untuk nama_dokumen
                }
                input.value = cell.innerText;
                input.dataset.field = fieldName;

                input.addEventListener('input', function(event) {
                    let field = event.target.dataset.field;
                    editedData[field] = input.value;
                });

                cell.innerHTML = "";
                cell.appendChild(input);
                cell.contentEditable = true;
            }
        }

        saveButton.type = "button";
        saveButton.className = "btn btn-success";
        saveButton.innerHTML = '<i class="bi bi-check-circle-fill"></i>';
        saveButton.onclick = function() {
            saveChanges(row, editedData);
        };


        editButton.replaceWith(saveButton);

        function saveChanges(row, editedData) {
            var dataId = row.dataset.id;
            console.log(editedData);

            $.ajax({
                type: "POST",
                url: "{{ url('edit-lisensi') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: dataId,
                    newData: editedData
                },
                success: function(response) {
                    var saveButton = row.querySelector("button.btn-success");
                    var editButton = document.createElement("button");
                    editButton.type = "button";
                    editButton.className = "btn btn-warning";
                    editButton.innerHTML = '<i class="bi bi-pen-fill"></i>';
                    editButton.onclick = function() {
                        startEditing(editButton);
                    };

                    saveButton.replaceWith(editButton);
                },
                error: function(error) {
                    console.error(error);
                }
            });
        }
 
    }
</script>
@endsection