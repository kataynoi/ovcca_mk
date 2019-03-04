<script>
    var date_serve = '<?php if(isset($answer)){ echo $answer[0]['date_serve'];}?>';

    $(document).ready(function () {
        var id = $('#id').val();
        console.log(id);
        if (!id) {
            $('.datepicker').datepicker({
                format: 'dd/mm/yyyy',
                todayBtn: false,
                language: 'th',             //เปลี่ยน label ต่างของ ปฏิทิน ให้เป็น ภาษาไทย   (ต้องใช้ไฟล์ bootstrap-datepicker.th.min.js นี้ด้วย)
                thaiyear: true,             //Set เป็นปี พ.ศ.
                autoclose: true
            }).datepicker("setDate", "0");

        } else {
            $('.datepicker').datepicker({
                format: 'dd/mm/yyyy',
                todayBtn: false,
                language: 'th',             //เปลี่ยน label ต่างของ ปฏิทิน ให้เป็น ภาษาไทย   (ต้องใช้ไฟล์ bootstrap-datepicker.th.min.js นี้ด้วย)
                thaiyear: true,              //Set เป็นปี พ.ศ.
                autoclose: true
            });
        }
    });
</script>
<br>
<div class="panel panel-info">
    <div class="panel-heading">
        <h4><?php echo $title." : ". $person['PRENAME'].$person['NAME']." ".$person['LNAME']?></h4>
    </div>
    <div class="panel-body">
        <div class="navbar navbar-default">
            <form action="#" class="navbar-form">
                <div class="row">
                    <div class="col col-md-6">
                        <dl class="row">
                            <dt class="col-sm-4">ชื่อ สกุล </dt>
                            <dd class="col-sm-8"><?php echo $person['PRENAME'].$person['NAME']." ".$person['LNAME']?></dd>

                            <dt class="col-sm-4">ที่อยู่ </dt>
                            <dd class="col-sm-8"><?php echo $person['addr']." ".$person['vhid']?></dd>

                            <dt class="col-sm-4">วัน/เดือน/ปี เกิด :</dt>
                            <dd class="col-sm-8"><?php echo $person['BIRTH']?></dd>

                            <dt class="col-sm-4 text-truncate">อายุ :</dt>
                            <dd class="col-sm-8"><?php echo $person['age_y']?> ปี</dd>

                            <dt class="col-sm-4">เพศ : </dt>
                            <dd class="col-sm-8"><?php echo $person['SEX']?></dd>
                        </dl>
                    </div>

                    <div class="col col-md-6">
                        <dl class="row">
                            <dt class="col-sm-3">อาชีพ </dt>
                            <dd class="col-sm-9"><?php echo $person['OCCUPATION_NEW']?></dd>

                            <dt class="col-sm-3">การศึกษา </dt>
                            <dd class="col-sm-9"><?php echo $person['EDUCATION']?></dd>

                            <dt class="col-sm-3">สัญชาติ:</dt>
                            <dd class="col-sm-9"><?php echo $person['NATION']?></dd>

                            <dt class="col-sm-3 text-truncate">ประเภทการอยู่อาศัย :</dt>
                            <dd class="col-sm-9"><?php echo $person['TYPEAREA']?></dd>

                        </dl>
                    </div>
                </div>

            </form>
        </div>
        <div class="panel panel-info">
            <form action="#" class="">
                <?php
                //echo $answer[0];
                ?>
                <input type="hidden" id="id" class="form-control" placeholder="" value="<?php if(isset($answer)){ echo $answer[0]['id']; }?>">
                <input type="hidden" id="cid" value="<?php echo $cid;?>">
                <input type="hidden" id="pid" value="<?php echo $person['PID'];?>">
                <input type="hidden" id="provider" value="<?php echo $this->session->userdata('id');?>">
                <input type="hidden" id="action" value="<?php echo $action ;?>"><br>
                <input type="hidden" id="answer_id" value="<?php echo $answer_id ;?>"><br>
                <label>วันที่สอบถาม </label>
                <input style="padding-left: 10px;width: 200px" type="text" id="date_serve" data-type="date" class="form-control datepicker" data-date-language="th"
                       data-rel="tooltip" data-date-format="mm/dd/yyyy">
                <?php
                foreach( $question as $q){
                    isset($answer)?$checked = $answer[0][$q->q_name]:$checked='';
                    echo "<br><div style='padding-left: 10px'>".$q->q_id .". ".$q->question."</div>";
                    if($q->q_type=='radio'){
                        foreach ($q->answer as $a){
                            $a->answer_id == $checked ? $check='checked':$check='';
                            echo '<div class="form-check" style="padding-left: 20px">';
                            echo '<input class="form-check-input" type="radio" '.$check.' name="'.$q->q_name.'" value="'.$a->answer_id.'" '.$disable.'>';
                            echo '<label class="form-check-label" style="padding-left: 10px" for="exampleRadios1"> '.$a->answer_id . " : ".$a->answer.'</label>';
                            echo '</div>';
                        }
                    }elseif($q->q_type=='textbox'){
                        //$a->answer_id == $checked ? $check='checked':$check='';
                        echo '<div class="form-check" style="padding-left: 20px">';
                        echo '<input class="form-check-input" type="text" '.$check.' name="'.$q->q_name.'" value="'.$a->answer.'" '.$disable.'>';
                        //echo '<label class="form-check-label" style="padding-left: 10px" for="exampleRadios1"> '.$a->answer_id . " : ".$a->answer.'</label>';
                        echo '</div>';
                    }

                }
                ?>
            </form>
        </div>

    </div>
    <div class="panel-footer" style="text-align: center;">
        <button type="button" class="btn btn-primary " id="btn_save_demo" <?php echo $disable;?>><i class="fa fa-save "></i> บันทึก</button>
        <button type="button" class="btn btn-warning disabled" id="btn_cancle_demo" <?php echo $disable;?>><i class="fa fa-edit "></i> แก้ไข</button>

    </div>
</div>
<script src="<?php echo base_url()?>assets/apps/js/demographic.js" charset="utf-8"></script>



 
 