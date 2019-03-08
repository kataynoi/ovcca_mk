$(document).ready(function() {
    var dataTable = $('#person_data').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "pageLength": 50,
        "ajax": {
            url: site_url + '/cca/fetch_person',
            data: {
                'csrf_token': csrf_token
            },
            type: "POST"
        },
        "columnDefs": [
            {
                "targets": [2, 3],
                "orderable": false,
            },
        ],
    });

});
$(document).on('click', 'button[data-btn="btn_view"]', function(e) {
    e.preventDefault();
    var cid = $(this).data('cid');
    console.log(cid);
    window.location= site_url+'/person/individual/'+cid;

});