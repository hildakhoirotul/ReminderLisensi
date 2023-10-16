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