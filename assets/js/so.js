$(document).ready(function() {
    tableSO();
    // tableDetailLot();
    $('#id').val('');
    $('#modulForm').trigger("reset");
});

function tableSO() {
    $.ajax({
        url: BASE_URL + "index.php/SO/tableSO",
        type: "POST",
        success: function (data) {
            $('#div-table-so').html(data);
            $('#tableSO').DataTable({
                "processing": true,
                "responsive": true,
            });
        }
    });
}
