$(document).ready(function(){
    var action = $('#action').val();
    console.log(action);
    if(action=='update'){
        get_answer(1);
    }
});


var kato = {};


kato.ajax = {
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
    },
    get_answer: function (id, cb) {
        var url = '/kato/get_answer',
            params = {
                id: id,
            }

        app.ajax(url, params, function (err, data) {
            err ? cb(err) : cb(null, data);
        });
    }
};




kato.save_kato = function(items, action){
    kato.ajax.save_kato(items,action, function (err, data) {
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
        kato.save_kato(items,action);
    }

});



function get_answer (id){
    kato.ajax.get_answer(id, function (err, data) {
        if (err) {
            app.alert(err);
        }
        else {
            //swal('บันทึกข้อมูลเรียบร้อย ...');
            //app.goBack();
            set_answer(data);
        }
    });
}

function set_answer(data){
    console.log(data);
    var v = data.rows;
    //swal(v.date_sample);
    $("#answer_id").val(v.id);
    $("#date_sample").datepicker('setDate', new Date(v.date_sample));
    $("#date_exam").datepicker('setDate', new Date(v.date_exam));
    $("input[name=fecal_exam][value=" + v.fecal_exam + "]").attr('checked', 'checked');
    if(v.ov == '1'){

        $("input[name=ov]").attr('checked', 'checked');
        $("#ov_egg").val(v.ov_egg);
        $("#ov_epg").val(v.ov_epg);
    } 
    if(v.mif == '1'){

        $("input[name=mif]").attr('checked', 'checked');
        $("#mif_egg").val(v.mif_egg);
        $("#mif_epg").val(v.mif_epg);
    }
    if(v.ss == '1'){

        $("input[name=ss]").attr('checked', 'checked');
        $("#ss_egg").val(v.ss_egg);
        $("#ss_epg").val(v.ss_epg);
    }
    if(v.ech == '1'){

        $("input[name=ech]").attr('checked', 'checked');
        $("#ech_egg").val(v.ech_egg);
        $("#ech_epg").val(v.ech_epg);
    }
     if(v.taenia == '1'){

            $("input[name=taenia]").attr('checked', 'checked');
            $("#taenia_egg").val(v.taenia_egg);
            $("#taenia_epg").val(v.taenia_epg);
        }
     if(v.tt == '1'){

            $("input[name=tt]").attr('checked', 'checked');
            $("#tt_egg").val(v.tt_egg);
            $("#tt_epg").val(v.tt_epg);
        }
     if(v.others == '1'){

            $("input[name=others]").attr('checked', 'checked');
            $("#others_egg").val(v.others_egg);
            $("#others_epg").val(v.others_epg);
            $("#others_specify").val(v.others_specify);
        }
    $("input[name=treatment][value=" + v.treatment + "]").attr('checked', 'checked');
    if(v.treatment == '1'){
        $("#drug").val(v.drug);
    }
}
