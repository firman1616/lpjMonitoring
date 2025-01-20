$(document).ready(function() {
    tablePlate();
    // tableDetailLot();
    $('#id').val('');
    $('#modulForm').trigger("reset");
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
