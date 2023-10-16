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
@endforeach