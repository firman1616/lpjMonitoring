$(document).ready(function() {
    tableCOA();
    // tableDetailLot();
    $('#id').val('');
    $('#modulForm').trigger("reset");
});

function tableCOA() {
    $.ajax({
        url: BASE_URL + "index.php/COA/tableCOA",
        type: "POST",
        success: function (data) {
            $('#div-table-coa').html(data);
            $('#tableCOA').DataTable({
                "processing": true,
                "responsive": true,
            });
        }
    });
}
