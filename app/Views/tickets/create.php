<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="max-w-7xl mx-auto px-6 py-8 bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-3xl font-bold mb-8 text-blue-900 select-none border-b border-blue-300 pb-2">Buat Tiket Baru</h2>

    <?php if (session()->getFlashdata('errors')): ?>
        <div class="mb-6 p-4 bg-red-100 border border-red-300 text-red-700 rounded shadow-sm">
            <ul class="list-disc list-inside">
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form id="createTicketForm" enctype="multipart/form-data" class="space-y-8">
        <?= csrf_field() ?>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Nama Requestor (readonly) -->
            <div>
                <label for="nama_requestor" class="block font-semibold mb-1">Nama Requestor</label>
                <input type="text" id="nama_requestor" name="nama_requestor"
                    value="<?= esc(session()->get('nama')) ?>" readonly
                    class="w-full border rounded px-3 py-2 bg-gray-100 cursor-not-allowed" />
            </div>

            <!-- Prioritas -->
            <div>
                <label for="prioritas" class="block font-semibold mb-1">Prioritas</label>
                <select id="prioritas" name="prioritas" required
                    class="w-full border rounded px-3 py-2">
                    <option value="">-- Pilih Prioritas --</option>
                    <option value="High">High</option>
                    <option value="Medium" selected>Medium</option>
                    <option value="Low">Low</option>
                </select>
            </div>

            <!-- Tujuan Tiket -->
            <div>
                <label for="id_unit_tujuan" class="block font-semibold mb-1">Tujuan Tiket (Unit Kerja)</label>
                <select id="id_unit_tujuan" name="id_unit_tujuan" required
                    class="w-full border rounded px-3 py-2">
                    <option value="">-- Pilih Unit Kerja Tujuan --</option>
                    <?php foreach ($units as $unit): ?>
                        <option value="<?= esc($unit['id_unit_kerja']) ?>"><?= esc($unit['nm_unit_kerja']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Upload Gambar -->
            <div>
                <label for="gambar" class="block font-semibold mb-1">Upload Gambar </label>
                <input type="file" id="gambar" name="gambar" accept="image/*" class="w-full" />
            </div>

            <!-- Pilih Kategori -->
            <div>
                <label for="kategori" class="block font-semibold mb-1">Kategori</label>
                <select id="kategori" name="kategori" required class="w-full border rounded px-3 py-2">
                    <option value="">-- Pilih Kategori --</option>
                    <?php foreach ($kategori as $kat): ?>
                        <option value="<?= esc($kat['id_kategori']) ?>"><?= esc($kat['nama_kategori']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Pilih Subkategori -->
            <div>
                <label for="subkategori" class="block font-semibold mb-1">Sub Kategori</label>
                <select id="subkategori" name="subkategori" required class="w-full border rounded px-3 py-2">
                    <option value="">-- Pilih Sub Kategori --</option>
                    <?php foreach ($subkategori as $sub): ?>
                        <option data-kategori="<?= esc($sub['id_kategori']) ?>" value="<?= esc($sub['id_subkategori']) ?>">
                            <?= esc($sub['nama_subkategori']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <!-- Judul -->
        <div>
            <label for="judul" class="block font-semibold mb-1">Judul</label>
            <input type="text" id="judul" name="judul" required
                class="w-full border rounded px-3 py-2" />
        </div>

        <!-- Deskripsi -->
        <div>
            <label for="deskripsi" class="block font-semibold mb-1">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" rows="5" required
                class="w-full border rounded px-3 py-2"></textarea>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition duration-200">
            Kirim Tiket
        </button>
    </form>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $('#kategori').on('change', function() {
        var kategoriId = $(this).val();
        $('#subkategori option').each(function() {
            var $this = $(this);
            if ($this.val() === '') {
                $this.show();
            } else if ($this.data('kategori') == kategoriId) {
                $this.show();
            } else {
                $this.hide();
            }
        });
        $('#subkategori').val(''); // reset pilihan subkategori saat kategori berubah
    });
    
    $('#createTicketForm').on('submit', function(e) {
        e.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            url: "<?= base_url('tickets/create') ?>",
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(res) {
                if (res.status === 'success' || !res.status) {
                    alert('Tiket berhasil dibuat');
                    window.location.href = "<?= base_url('tickets') ?>";
                } else {
                    alert(res.message || 'Terjadi kesalahan');
                }
            },
            error: function(xhr) {
                let errors = xhr.responseJSON?.errors || {};
                let message = Object.values(errors).flat().join('\n');
                alert('Error:\n' + message);
            }
        });
    });
</script>

<?= $this->endSection() ?>