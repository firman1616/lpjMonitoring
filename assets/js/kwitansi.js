$(document).ready(function() {
    tableKwitansi();
    // tableDetailLot();
    $('#id').val('');
    $('#modulForm').trigger("reset");
});

function tableKwitansi() {
    $.ajax({
        url: BASE_URL + "index.php/Kwitansi/tableKwitansi",
        type: "POST",
        success: function (data) {
            $('#div-table-kwitansi').html(data);
            $('#tableKwitansi').DataTable({
                "processing": true,
                "responsive": true,
            });
        }
    });
}
