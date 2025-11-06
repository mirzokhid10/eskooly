$(document).ready(function () {
    var table = $('#tb').DataTable({
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive:true
    });
});