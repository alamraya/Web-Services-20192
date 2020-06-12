<!-- Modal -->
<div class="modal fade" id="addModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" id="labelModalKu">Tambah Produk</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Tutup</span>
                </button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form action="add-data.php" method="post">
                    <div class="form-group">
                        <label for="namaProduk">Nama Produk</label>
                        <input type="text" name="nama" class="form-control" id="namaProduk" placeholder="Nama produk..." required>
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <input type="text" name="kategori" class="form-control" id="kategori" placeholder="Kategori produk..." required>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" name="harga" class="form-control" id="harga" placeholder="Harga produk..." required>
                    </div>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary submitBtn" name="submit">Tambah Produk</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
