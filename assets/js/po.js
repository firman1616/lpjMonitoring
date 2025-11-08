$(document).ready(function() {
    tablePO();
    // tableDetailLot();
    $('#id').val('');
    $('#modulForm').trigger("reset");
});

function tablePO() {
    $.ajax({
        url: BASE_URL + "index.php/PO/tablePO",
        type: "POST",
        success: function (data) {
            $('#div-table-po').html(data);
            $('#tablePO').DataTable({
                "processing": true,
                "responsive": true,
            });
        }
    });
}
