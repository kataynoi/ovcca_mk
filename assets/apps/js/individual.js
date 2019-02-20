$(document).ready(function(){

    var demo = {};
    demo.ajax = {
        get_user: function (status, cb) {
            var url = '/outsite/get_message',
                params = {
                    items: status
                }

            app.ajax(url, params, function (err, data) {
                err ? cb(err) : cb(null, data);
            });
        },
        del_demo:function (id,cb){
            var url = '/demographic/del_demo',
                params = {
                    id: id
                }

            app.ajax(url, params, function (err, data) {
                err ? cb(err) : cb(null, data);
            });
        }
    };

    demo.save_demo = function(){
        //app.alert('Save Pass : '+user_id+' : '+password);
        demo.ajax.save_password(items, function (err, data) {
            if (err) {
                app.alert(err);
            }
            else {
                swal('บันทึกข้อมูลเรียบร้อย ...');
                app.goBack();
            }
        });



    }
    demo.del_demo = function(id){

        demo.ajax.del_demo(id, function (err, data) {
            if (err) {
                swal(err)
            }
            else {
                //swal('ลบข้อมูลเรียบร้อย')
                app.alert('ลบข้อมูลเรียบร้อย');

            }
        });
    }


    $(document).on('click', 'button[data-btn="btn_Demographic"]', function(e) {
        e.preventDefault();
        var cid = $(this).data('cid');
        console.log(cid);
        window.location= base_url+'person/individual/'+cid;

    });

    $('#btn_demographic_new').on('click',function(e){
        e.preventDefault();

        var cid = $('#cid').val();
        console.log(cid);
        window.location= base_url+'demographic/demographic/'+cid+'/0';

    });

    $('#btn_kato_new').on('click',function(e){
        e.preventDefault();

        var cid = $('#cid').val();
        console.log(cid);
        window.location= base_url+'kato/kato/'+cid+'/0';

    });
    $(document).on('click', 'a[data-btn="del_demo"]', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var tr = $(this).parent().parent().parent();
        console.log(id);
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
                demo.del_demo(id);
                tr.hide();
            }
        });
    });
});