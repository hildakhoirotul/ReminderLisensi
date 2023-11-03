@extends('user.main')

@section('content')
<main id="main">
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="importExcelLabel" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog" role="document">
            <form action="{{ route('user.data.store') }}" method="POST">
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
                            <div class="reminder-error" id="end-error"></div>
                            <div class="form-group">
                                <label for="reminder1">REMINDER 1</label>
                                <input type="date" class="form-control item" name="reminder1" id="reminder1">
                            </div>
                            <div class="reminder-error" id="reminder1-error"></div>
                            <div class="form-group">
                                <label for="reminder2">REMINDER 2</label>
                                <input type="date" class="form-control item" name="reminder2" id="reminder2">
                            </div>
                            <div class="reminder-error" id="reminder2-error"></div>
                            <div class="form-group">
                                <label for="reminder3">REMINDER 3</label>
                                <input type="date" class="form-control item" name="reminder3" id="reminder3">
                            </div>
                            <div class="reminder-error" id="reminder3-error"></div>
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
            <form action="{{ route('user.import.database') }}" method="post" enctype="multipart/form-data">
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
                                    <button type="button" class="button p-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <span class="icon"><i class="bi bi-plus" style="font-size: 31px;"></i></span>
                                        <span class="text">Tambah</span>
                                    </button>
                                    <button type="button" class="button p-1" data-bs-toggle="modal" data-bs-target="#importExcel">
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
                                    <a href="{{ route('user.export.database') }}" class="button">
                                        <span class="icon" style="padding-left: 9px;"><i class="bi bi-download" style="font-size: 20px;"></i></span>
                                        <span class="text ms-2">Unduh</span>
                                    </a>
                                    <button type="button" class="button p-1" onclick="showResetConfirmation(event, this)">
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
                                                <p class="text-xs mb-0 text-start" data-nama_dokumen="{{ $datas->nama_dokumen}}">{{ $datas->nama_dokumen }}</p>
                                            </td>
                                            <td data-field="start">
                                                <p class="text-xs mb-0" data-start="{{ $datas->start }}">{{ $datas->start }}</p>
                                            </td>
                                            <td data-field="end">
                                                <p class="text-xs mb-0" data-end="{{ $datas->end }}">{{ $datas->end }}</p>
                                            </td>
                                            <td data-field="reminder1">
                                                <p class="text-xs mb-0" data-reminder1="{{ $datas->reminder1 }}">{{ $datas->reminder1 }}</p>
                                            </td>
                                            <td data-field="reminder2">
                                                <p class="text-xs mb-0" data-reminder2="{{ $datas->reminder2 }}">{{ $datas->reminder2 }}</p>
                                            </td>
                                            <td data-field="reminder3">
                                                <p class="text-xs mb-0" data-reminder3="{{ $datas->reminder3 }}">{{ $datas->reminder3 }}</p>
                                            </td>
                                            <td data-field="action">
                                                <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                                                    <button type="button" class="btn btn-warning" onclick="startEditing(this)"><i class="bi bi-pen-fill"></i></button>
                                                    <form action="{{ route('user.lisensi.destroy', ['id' => $datas->id]) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" onclick="showDeleteConfirmation(event, this)"><i class="bi bi-trash-fill"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
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
                    $.get("{{ url('reset-database') }}", function(data) {
                        location.reload();
                    });
                }
            });
    }
</script>
<script>
    function filterData() {
        const selected = document.getElementById('searchLisensi').value;

        fetch(`{{ route('user.search.lisensi') }}?search=${selected}`)
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

        editedData.nama_dokumen = row.querySelector("[data-field='nama_dokumen'] p").dataset.nama_dokumen;
        editedData.start = row.querySelector("[data-field='start'] p").dataset.start;
        editedData.end = row.querySelector("[data-field='end'] p").dataset.end;
        editedData.reminder1 = row.querySelector("[data-field='reminder1'] p").dataset.reminder1;
        editedData.reminder2 = row.querySelector("[data-field='reminder2'] p").dataset.reminder2;
        editedData.reminder3 = row.querySelector("[data-field='reminder3'] p").dataset.reminder3;
        for (let i = 0; i < cells.length; i++) {
            let cell = cells[i];
            let fieldName = cell.dataset.field;
            if (fieldName !== 'nomor' && fieldName !== 'action') {
                let input;
                if (fieldName !== 'nama_dokumen') {
                    input = document.createElement("input");
                    input.type = "date";
                    input.value = cell.innerText;
                    input.dataset.field = fieldName;
                } else {
                    input = document.createElement("input");
                    input.type = "text";
                    input.value = cell.innerText;
                    input.dataset.field = fieldName;
                }

                input.addEventListener('input', function(event) {
                    let field = event.target.dataset.field;
                    editedData[field] = input.value;
                });

                input.classList.add('edit-input');

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
            var start = new Date(editedData.start);
            var end = new Date(editedData.end);
            var reminder1 = new Date(editedData.reminder1);
            var reminder2 = new Date(editedData.reminder2);
            var reminder3 = new Date(editedData.reminder3);

            if (end <= start) {
                alert('Oops!, End tidak bisa lebih awal dari Start.');
                return;
            }

            if (reminder1 <= start) {
                alert('Oops!, Reminder 1 tidak bisa lebih awal dari Start.');
                return;
            }

            if (reminder2 <= reminder1) {
                alert('Oops!, Reminder 2 tidak bisa lebih awal dari Reminder 1.');
                return;
            }

            if (reminder3 <= reminder2) {
                alert('Oops!, Reminder 3 tidak bisa lebih awal dari Reminder 2.');
                return;
            }

            if (end <= reminder3) {
                alert('Oops!, End tidak bisa lebih awal dari Reminder 3.');
                return;
            }
            console.log(editedData);

            $.ajax({
                type: "POST",
                url: "{{ url('user-edit-lisensi') }}",
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
                    var cells = row.querySelectorAll("td");
                    for (let i = 0; i < cells.length; i++) {
                        let cell = cells[i];
                        let fieldName = cell.dataset.field;
                        if (fieldName !== 'nomor' && fieldName !== 'action') {
                            if (fieldName !== 'nama_dokumen') {
                                cell.innerHTML = "<p class='text-xs mb-0' data-" + fieldName + "='" + editedData[fieldName] + "'>" + editedData[fieldName] + "</p>";
                            } else {
                                cell.innerHTML = "<p class='text-xs mb-0 text-start' data-" + fieldName + "='" + editedData[fieldName] + "'>" + editedData[fieldName] + "</p>";
                            }
                        }
                    }
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
<script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#start, #end, #reminder1, #reminder2, #reminder3').on('change', function() {
            var start = new Date($('#start').val());
            var end = new Date($('#end').val());
            var reminder1 = new Date($('#reminder1').val());
            var reminder2 = new Date($('#reminder2').val());
            var reminder3 = new Date($('#reminder3').val());

            if (end <= start) {
                $('#end').val(''); // Hapus tanggal jika tidak valid
                $('#end-error').text('Oops!, End tidak bisa lebih awal dari Start.');
            } else {
                $('#end-error').text(''); // Hapus pesan peringatan jika valid
            }

            if (reminder1 <= start) {
                $('#reminder1').val(''); // Hapus tanggal jika tidak valid
                $('#reminder1-error').text('Oops!, Reminder 1 tidak bisa lebih awal dari Start.');
            } else {
                $('#reminder1-error').text(''); // Hapus pesan peringatan jika valid
            }

            if (reminder2 <= reminder1) {
                $('#reminder2').val(''); // Hapus tanggal jika tidak valid
                $('#reminder2-error').text('Oops!, Reminder 2 tidak bisa lebih awal dari Reminder 1.');
            } else {
                $('#reminder2-error').text(''); // Hapus pesan peringatan jika valid
            }

            if (reminder3 < reminder2) {
                $('#reminder3').val(''); // Hapus tanggal jika tidak valid
                $('#reminder3-error').text('Oops!, Reminder 3 tidak bisa lebih awal dari Reminder 2.');
            } else if (end < reminder3) {
                $('#reminder3').val(''); // Hapus tanggal jika tidak valid
                $('#reminder3-error').text('Oops!, Reminder 3 tidak bisa lebih lama dari End.');
            } else {
                $('#reminder3-error').text(''); // Hapus pesan peringatan jika valid
            }
        });
    });
</script>
@endsection