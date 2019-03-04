$(document).ready(function() {
    var dataTable = $('#person_data').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "pageLength": 50,
        "ajax": {
            url: site_url + '/person/fetch_person',
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

var person = {};

person.ajax = {
    search_person:function (txt_search,search_type,cb){
        var url = '/person/search_person_hdc',
            params = {
                txt_search: txt_search,
                search_type: search_type
            }

        app.ajax(url, params, function (err, data) {
            err ? cb(err) : cb(null, data);
        });
    },
    import_person:function (cid,cb){
        var url = '/person/import_person',
            params = {
                cid: cid
            }

        app.ajax(url, params, function (err, data) {
            err ? cb(err) : cb(null, data);
        });
    },
    del_person:function (cid,cb){
        var url = '/person/del_person',
            params = {
                cid: cid
            }

        app.ajax(url, params, function (err, data) {
            err ? cb(err) : cb(null, data);
        });
    }

};

person.search_person = function(txt_search,search_type){

    person.ajax.search_person(txt_search,search_type, function (err, data) {
        if (err) {
            swal(err)
        }
        else {
            $('#tbl_search_result > tbody').empty();
            person.set_search_person(data);
        }
    });
}

person.set_search_person = function(data){

    $('#tbl_search_result > tbody').empty();

    if (_.size(data.rows) > 0) {
        var i =1;
        _.each(data.rows, function (v) {
            $('#tbl_search_result > tbody').append(
                '<tr>' +
                '<td>'+ i+'</td>' +
                '<td >'+ v.NAME+' '+ v.LNAME+'</td>' +
                '<td>'+ v.CID+'</td>' +
                '<td>'+ v.BIRTH+'</td>' +
                '<td>'+ v.age_y+'</td>' +
                '<td><button class="btn btn-success " data-btn="btn_import_person" data-cid="'+v.CID+'">' +
                '<i class="fa fa-plus-circle"></i> ลงทะเบียน Person</button></td>' +
                '</tr>'

            );
            i++;
        });
    }
}
// Event
person.import_person = function(cid){
    //app.alert('Save Pass : '+user_id+' : '+password);
    person.ajax.import_person(cid, function (err, data) {
        if (err) {

            swal('มีบุคคลนี้ในระบบแล้ว')
        }
        else {
            //console.log(data);
            app.alert('นำเข้าเรียบร้อย');
        }
    });
}
person.del_person = function(cid){

    person.ajax.del_person(cid, function (err, data) {
        if (err) {
            swal(err)
        }
        else {
            //swal('ลบข้อมูลเรียบร้อย')
            app.alert('ลบข้อมูลเรียบร้อย');

        }
    });
}


$('#importPersonModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    });

$('#btn_search').on('click', function(e) {

        var txt_search = $('#txt_search').val();
        var search_type ;
        if(!txt_search) {
            swal('กรุณาระบุบัตรประชาชนหรือชื่อผู้ต้องการค้นหา');
            $("#btn_login").removeProp("disabled");
            return false;
        }else {

            if(parseInt(txt_search)) {
                search_type='cid';
            }
            else {
                search_type='name';
            }
            $('#tbl_search_result > tbody').empty();
            person.search_person(txt_search,search_type);
        }
    });

$('#txt_search').bind('keypress', function(e) {
    if (e.keyCode == 13) {

        var txt_search = $('#txt_search').val();
        var search_type ;
        if(!txt_search) {
            swal('กรุณาระบุบัตรประชาชนหรือชื่อผู้ต้องการค้นหา');
            $("#btn_login").removeProp("disabled");
            return false;
        }else {

            if(parseInt(txt_search)) {
                search_type='cid';
            }
            else {
                search_type='name';
            }
            $('#tbl_search_result > tbody').empty();
            person.search_person(txt_search,search_type);
        }


    }
});

$(document).on('click', 'button[data-btn="btn_import_person"]', function(e) {
    e.preventDefault();
    var cid = $(this).data('cid');

    console.log(cid);
    person.import_person(cid);
    $(this).parent().parent().hide();
});
$(document).on('click', 'button[data-btn="btn_del"]', function(e) {
    e.preventDefault();
    var cid = $(this).data('cid');
    var name = $(this).data('name');
    var td = $(this).parent().parent();

    swal({
        title: "คำเตือน?",
        text: "คุณต้องการลบข้อมูล "+name,
        icon: "warning",
        buttons: [
            'cancel !',
            'Yes !'
        ],
        dangerMode: true,
    }).then(function(isConfirm){
        if(isConfirm){
            person.del_person(cid);
            td.hide();
        }
    });
});

// btn_Demographic

$(document).on('click', 'button[data-btn="btn_Demographic"]', function(e) {
    e.preventDefault();
    var cid = $(this).data('cid');
    console.log(cid);
    window.location= site_url+'/person/individual/'+cid;

});