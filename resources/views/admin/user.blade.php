@extends('admin.main')

@section('content')
<main id="main">

    <!-- Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="importExcelLabel" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog" role="document">
            <form action="{{ route('user.store') }}" method="POST">
                <div class="modal-content">
                    <div class="modal-header p-2 px-3" style="background-color: #5791ff;">
                        <h5 class="modal-title text-center" id="importExcelLabel">Tambah Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body justify-content-center px-3 pt-2 pb-1 mb-0">
                        @csrf
                        <div class="registration-form">
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="text" class="form-control item" name="nik" id="nik" placeholder="Type here ...">
                            </div>
                            <div class="form-group">
                                <label for="nama">NAMA</label>
                                <input type="text" class="form-control item" name="nama" id="nama" placeholder="Type here ...">
                            </div>
                            <div class="form-group">
                                <label for="email">EMAIL</label>
                                <input type="email" class="form-control item" name="email" id="email" placeholder="Type here ...">
                            </div>
                            <div class="form-group">
                                <label for="password">PASSWORD</label>
                                <input type="password" class="form-control item" name="password" id="password">
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
                                    <button type="button" class="button" data-bs-toggle="modal" data-bs-target="#addModal">
                                        <span class="icon"><i class="bi bi-plus" style="font-size: 31px;"></i></span>
                                        <span class="text">Tambah</span>
                                    </button>
                                </div>
                                <div class="button-container">
                                    <span class="text-xs text-white">Jumlah data: {{ $count }}</span>
                                    <div class="search-form">
                                        <i class="bi bi-search"></i>
                                        <input type="text" class="form-control form-input" placeholder="Cari disini..." name="search" id="searchUser">
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
                                    <tbody id="userTableBody">
                                        @php $i=1 @endphp
                                        @foreach($data as $datas)
                                        <tr>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $i++ }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs mb-0">{{ $datas->nik }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs mb-0">{{ $datas->nama }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs mb-0">{{ $datas->email }}</p>
                                            </td>
                                            <td>
                                                <div class="password-container">
                                                    <input type="password" class="password-text" value="{{ $datas->chain }}" readonly>
                                                    <i class="toggle-password-icon bi bi-eye-slash-fill" onclick="togglePasswordVisibility(this)"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                                                    <button type="button" class="btn btn-warning"><i class="bi bi-pen-fill"></i></button>
                                                    <form action="{{ route('user.destroy', ['id' => $datas->id]) }}" method="POST">
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
    </section>

</main>
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
    function togglePasswordVisibility(icon) {
        var passwordInput = icon.previousElementSibling;
        var type = passwordInput.getAttribute('type');

        if (type === 'password') {
            passwordInput.setAttribute('type', 'text');
            icon.classList.remove('bi-eye-slash-fill');
            icon.classList.add('bi-eye-fill');
        } else {
            passwordInput.setAttribute('type', 'password');
            icon.classList.remove('bi-eye-fill');
            icon.classList.add('bi-eye-slash-fill');
        }
    }
</script>
<script>
    function filterData() {
        const selected = document.getElementById('searchUser').value;

        fetch(`{{ route('search.user') }}?search=${selected}`)
            .then(response => response.text())
            .then(data => {
                document.getElementById('userTableBody').innerHTML = data;
            });
    }

    document.getElementById('searchUser').addEventListener('input', function() {
        filterData();
    });
</script>
@endsection