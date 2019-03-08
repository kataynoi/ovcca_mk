$(document).ready(function(){
    var dataTable = $('#person_data').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "pageLength": 50,
        "ajax": {
            url: site_url + '/demographic/fetch_person',
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
        save_demo: function (items,action, cb) {
            var url = '/demographic/save_demo',
                params = {
                    items: items,
                    action: action
                }

            app.ajax(url, params, function (err, data) {
                err ? cb(err) : cb(null, data);
            });
        }
    };
    $("#date_serve").datepicker('setDate', new Date(date_serve));
    demo.save_demo = function(items, action){
        //app.alert('Save Pass : '+user_id+' : '+password);
        demo.ajax.save_demo(items,action, function (err, data) {
            if (err) {
                app.alert(err);
            }
            else {
                swal('บันทึกข้อมูลเรียบร้อย ...');
                app.goBack();
            }
        });



    }

     $('#btn_save_demo').on('click', function(e) {
            console.log('a');
         var action = $('#action').val();
         var items={};
         items.demo1=   $("input[name='demo1']:checked"). val();
         items.demo2=   $("input[name='demo2']:checked"). val();
         items.demo3=   $("input[name='demo3']:checked"). val();
         items.demo4=   $("input[name='demo4']:checked"). val();
         items.demo5=   $("input[name='demo5']:checked"). val();
         items.demo6=   $("input[name='demo6']:checked"). val();
         items.demo7=   $("input[name='demo7']:checked"). val();
         items.demo8=   $("input[name='demo8']:checked"). val();
         items.demo9=   $("input[name='demo9']:checked"). val();
         items.date_serve=  $('#date_serve').val();
         items.pid=   $('#pid').val();
         items.cid=$('#cid').val();
         items.answer_id=$('#answer_id').val();
         items.provider=$('#provider').val();
         items.action = $('#action').val();

         if (!items.demo1 || !items.demo2 ||!items.demo3 ||!items.demo4 ||!items.demo5 ||!items.demo6 ||!items.demo7 ||!items.demo8 ||!items.demo9 ||!items.date_serve) {
             swal('กรุณาตอบคำถามให้ครบถ้วน');

         }
         else{
             //console.log(items);
             //console.log(action);
             demo.save_demo(items,action);
         }

    });


});