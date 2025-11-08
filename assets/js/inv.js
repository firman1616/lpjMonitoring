$(document).ready(function() {
    tableINV();
    // tableDetailLot();
    $('#id').val('');
    $('#modulForm').trigger("reset");
});

function tableINV() {
    $.ajax({
        url: BASE_URL + "index.php/INV/tableINV",
        type: "POST",
        success: function (data) {
            $('#div-table-inv').html(data);
            $('#tableINV').DataTable({
                "processing": true,
                "responsive": true,
            });
        }
    });
}
