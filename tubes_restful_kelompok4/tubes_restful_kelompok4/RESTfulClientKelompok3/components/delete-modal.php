<!-- Modal -->
<div class="modal fade" id="deleteModal<?= $herb["id"]; ?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" id="labelModalKu">Hapus Data Produk</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Tutup</span>
                </button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form action="delete-data.php" method="post">
                    <h5>Yakin ingin menghapus data ini?</h5>
                    <input type="hidden" name="id" value="<?= $herb["id"]; ?>">
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-danger submitBtn" name="submit">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
