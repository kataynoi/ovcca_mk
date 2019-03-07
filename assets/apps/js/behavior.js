$(document).ready(function(){
    var action = $('#action').val();
    console.log(action);
    if(action=='update'){
        get_answer(1);
    }
});


var behavior = {};


behavior.ajax = {
    get_user: function (status, cb) {
        var url = '/outsite/get_message',
            params = {
                items: status
            }

        app.ajax(url, params, function (err, data) {
            err ? cb(err) : cb(null, data);
        });
    },
    save_behavior: function (items,action, cb) {
        var url = '/behavior/save_behavior',
            params = {
                items: items,
                action: action
            }

        app.ajax(url, params, function (err, data) {
            err ? cb(err) : cb(null, data);
        });
    },
    get_answer: function (id, cb) {
        var url = '/behavior/get_answer',
            params = {
                id: id,
            }

        app.ajax(url, params, function (err, data) {
            err ? cb(err) : cb(null, data);
        });
    }
};




behavior.save_behavior = function(items, action){
    behavior.ajax.save_behavior(items,action, function (err, data) {
        if (err) {
            app.alert(err);
        }
        else {
            swal('บันทึกข้อมูลเรียบร้อย ...');
            //app.goBack();
        }
    });



}


$('#btn_save_behavior').on('click', function(e) {
    console.log('save Behavior');
    var action = $('#action').val();
    var items={};

    items.cid=$('#cid').val();
    items.pid=   $('#pid').val();
    items.vdate=  $('#vdate').val();

    items.weight = $('#weight').val();
    items.height = $('#height').val();
    items.know = $("input[name='know']:checked"). val();
    items.stop = $("input[name='stop']:checked"). val();
    items.stopx = $('#stopx').val();
    items.return = $("input[name='return']:checked"). val();
    items.returnx = $('#returnx').val();
    items.conform1 = $("input[name='conform1']:checked"). val();
    items.conform2 = $("input[name='conform2']:checked"). val();
    items.conform3 = $("input[name='conform3']:checked"). val();
    items.conform4 = $("input[name='conform4']:checked"). val();
    items.conform5 = $("input[name='conform5']:checked"). val();
    items.conform6 = $("input[name='conform6']:checked"). val();

    console.log('conform1'+items.conform1);
    items.foodr1 = $("input[name='foodr1']:checked"). val();
    items.foodr2 = $("input[name='foodr2']:checked"). val();
    items.foodr3 = $("input[name='foodr3']:checked"). val();
    items.foodr4 = $("input[name='foodr4']:checked"). val();
    items.foodr5 = $("input[name='foodr5']:checked"). val();
    items.foodr6 = $("input[name='foodr6']:checked"). val();


    items.answer_id=$('#answer_id').val();
    items.provider=$('#provider').val();
    items.action = $('#action').val();

    if (validate(items)) {
        behavior.save_behavior(items,action);
    } else{
        console.log('Validate Error');

    }

});

function validate(items){
if(!items.vdate){
    swal('กรุณาระบุวันที่เข้ารับบริการ');
}else if(!items.weight){
    swal('กรุณาระบุน้ำหนัก');
}else if(!items.height){
    swal('กรุณาระบุส่วนสูง');
}else if(!items.know){
    swal('กรุณาตอบคำถามข้อ 3');
}else if(!items.stop){
    swal('กรุณาตอบคำถามข้อ 4');
}else if(!items.stopx){
    swal('กรุณาระบุเหตุผลข้อ 4');
}else if(!items.return){
    swal('กรุณาตอบคำถามข้อ 5');
}else if(!items.returnx){
    swal('กรุณาระบุเหตุผลข้อ 5');
}else if(!items.conform1 || !items.conform2 ||!items.conform3 ||!items.conform4 ||!items.conform5 ||!items.conform6){
    swal('กรุณาตอบคำภามข้อ 6 ให้ครบถ้วน');
}else if(!items.foodr1 || !items.foodr2 || !items.foodr3 || !items.foodr4 || !items.foodr5 || !items.foodr6 ){
        swal('กรุณาตอบคำภามข้อ 7 ให้ครบถ้วน');
}else{
    return true;
}
}

function get_answer (id){
    behavior.ajax.get_answer(id, function (err, data) {
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
    $("#vdate").datepicker('setDate', new Date(v.vdate));
    $("#date_exam").datepicker('setDate', new Date(v.date_exam));
    $("#weight").val(v.weight);
    $("#height").val(v.height);
    $("input[name=know][value=" + v.know + "]").attr('checked', 'checked');
    $("input[name=stop][value=" + v.stop + "]").attr('checked', 'checked');
    $("#stopx").val(v.stopx);
    $("input[name=return][value=" + v.return + "]").attr('checked', 'checked');
    $("#returnx").val(v.returnx);
    $("input[name=conform1][value=" + v.conform1 + "]").attr('checked', 'checked');
    $("input[name=conform2][value=" + v.conform2 + "]").attr('checked', 'checked');
    $("input[name=conform3][value=" + v.conform3 + "]").attr('checked', 'checked');
    $("input[name=conform4][value=" + v.conform4 + "]").attr('checked', 'checked');
    $("input[name=conform5][value=" + v.conform5 + "]").attr('checked', 'checked');
    $("input[name=conform6][value=" + v.conform6 + "]").attr('checked', 'checked');
    
    $("input[name=foodr1][value=" + v.foodr1 + "]").attr('checked', 'checked');
    $("input[name=foodr2][value=" + v.foodr2 + "]").attr('checked', 'checked');
    $("input[name=foodr3][value=" + v.foodr3 + "]").attr('checked', 'checked');
    $("input[name=foodr4][value=" + v.foodr4 + "]").attr('checked', 'checked');
    $("input[name=foodr5][value=" + v.foodr5 + "]").attr('checked', 'checked');
    $("input[name=foodr6][value=" + v.foodr6 + "]").attr('checked', 'checked');
    


}
