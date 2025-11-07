$(document).ready(function() {
    tableSPH();
    // tableDetailLot();
    $('#id').val('');
    $('#modulForm').trigger("reset");
});

function tableSPH() {
    $.ajax({
        url: BASE_URL + "index.php/SPH/tableSPH",
        type: "POST",
        success: function (data) {
            $('#div-table-sph').html(data);
            $('#tableSPH').DataTable({
                "processing": true,
                "responsive": true,
            });
        }
    });
}
