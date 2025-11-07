$(document).ready(function () {
    tablePlate();
    // tableDetailLot();
    $('#id').val('');
    $('#modulForm').trigger("reset");

    $(document).on('click', '.btn-detail-lot', function () {
        const lotId = $(this).data('id');
        // console.log("Klik tombol lot:", lotId);

        $.ajax({
            url: BASE_URL + "index.php/Plate/get_lot_detail",
            type: 'POST',
            data: { id: lotId },
            success: function (response) {
                // console.log("Response diterima");
                $('#modal-lot-content').html(response);
                $('#lotDetailModal').modal('show');
            },
            error: function () {
                alert('Gagal mengambil data lot.');
            }
        });
    });
});

function tablePlate() {
    $.ajax({
        url: BASE_URL + "index.php/Plate/tablePlate",
        type: "POST",
        success: function (data) {
            $('#div-table-plate').html(data);
            $('#tablePlate').DataTable({
                "processing": true,
                "responsive": true,
            });
        }
    });
}

function tableDetailLot() {
    $.ajax({
        url: BASE_URL + "Plate/tableDetailLot",
        type: "POST",
        success: function (data) {
            $('#div-table-detail-lot').html(data);
            $('#tableLotDetail').DataTable({
                "processing": true,
                "responsive": true,
            });
        }
    });
}
