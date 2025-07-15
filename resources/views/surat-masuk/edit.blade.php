<form action="{{ route('surat-masuk.update', $surat->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nomor Surat:</label>
    <input type="text" name="nomor_surat" value="{{ $surat->nomor_surat }}" required>

    <label>Tanggal Surat:</label>
    <input type="date" name="tanggal_surat" value="{{ $surat->tanggal_surat }}" required>

    <label>Pengirim:</label>
    <input type="text" name="pengirim" value="{{ $surat->pengirim }}" required>

    <label>Perihal:</label>
    <input type="text" name="perihal" value="{{ $surat->perihal }}" required>

    <button type="submit">Update</button>
</form>