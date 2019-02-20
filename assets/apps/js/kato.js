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
        save_kato: function (items,action, cb) {
            var url = '/kato/save_kato',
                params = {
                    items: items,
                    action: action
                }

            app.ajax(url, params, function (err, data) {
                err ? cb(err) : cb(null, data);
            });
        }
    };

    demo.save_kato = function(items, action){
        //app.alert('Save Pass : '+user_id+' : '+password);
        demo.ajax.save_kato(items,action, function (err, data) {
            if (err) {
                app.alert(err);
            }
            else {
                swal('บันทึกข้อมูลเรียบร้อย ...');
                app.goBack();
            }
        });



    }

     $('#btn_save_kato').on('click', function(e) {
            console.log('a');
         var action = $('#action').val();
         var items={};

         items.cid=$('#cid').val();
         items.pid=   $('#pid').val();
         items.date_sample=  $('#date_sample').val();
         items.date_exam=  $('#date_exam').val();
         items.fecal_exam = $("input[name='fecal_exam']:checked"). val();

         items.ov = $("input[name='ov']:checked").val()?$("input[name='ov']:checked").val():'';
         items.ov_egg = $('#ov_egg').val();
         items.ov_epg = $('#ov_epg').val();
         
         items.mif = $("input[name='mif']:checked"). val()?$("input[name='mif']:checked").val():'';
         items.mif_egg = $('#mif_egg').val();
         items.mif_epg = $('#mif_epg').val();
         
         items.ss = $("input[name='ss']:checked"). val()?$("input[name='ss']:checked").val():'';
         items.ss_egg = $('#ss_egg').val();
         items.ss_epg = $('#ss_epg').val();
                 
         items.ech = $("input[name='ech']:checked"). val()?$("input[name='ech']:checked").val():'';
         items.ech_egg = $('#ech_egg').val();
         items.ech_epg = $('#ech_epg').val();
         
         items.taenia = $("input[name='taenia']:checked"). val()?$("input[name='taenia']:checked").val():'';
         items.taenia_egg = $('#taenia_egg').val();
         items.taenia_epg = $('#taenia_epg').val();
         
         items.tt = $("input[name='tt']:checked"). val()?$("input[name='tt']:checked").val():'';
         items.tt_egg = $('#tt_egg').val();
         items.tt_epg = $('#tt_epg').val();
         
         items.others = $("input[name='others']:checked"). val()?$("input[name='others']:checked").val():'';
         items.others_specify = $('#others_specify').val();
         items.others_egg = $('#others_egg').val();
         items.others_epg = $('#others_epg').val();

         items.treatment = $("input[name='treatment']:checked"). val();
         items.drug = $('#drug').val();

         items.answer_id=$('#answer_id').val();
         items.provider=$('#provider').val();
         items.action = $('#action').val();

         if (!items.date_sample) {
             swal('กรุณาเลือก Sample collection date');

         }if(!items.date_exam){
             swal('กรุณาเลือก Examination date ');
         }
         else{
             console.log(items);
             console.log(action);
             demo.save_kato(items,action);
         }

    });


});