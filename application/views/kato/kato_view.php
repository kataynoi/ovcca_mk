<script>
    var date_sample = '<?php echo $answer[0]['date_sample']?>';
    var date_exam = '<?php echo $answer[0]['date_exam']?>';

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
                <input type="hidden" id="cid" value="<?php echo $cid;?>">
                <input type="hidden" id="pid" value="<?php echo $person['PID'];?>">
                <input type="hidden" id="provider" value="<?php echo $this->session->userdata('id');?>">
                <input type="hidden" id="action" value="<?php echo $action ;?>"><br>
                <input type="hidden" id="answer_id" value="<?php echo $answer_id ;?>"><br>
                <label>1. Sample collection date</label>
                <input style="padding-left: 20px;width: 200px;margin-left: 20px" type="text" id="date_sample" data-type="date" class="form-control datepicker" data-date-language="th"
                       data-rel="tooltip" data-date-format="mm/dd/yyyy">
                <br>
                <label>2. Examination date </label>
                <input style="padding-left: 20px;width: 200px;margin-left: 20px" type="text" id="date_exam" data-type="date" class="form-control datepicker" data-date-language="th"
                       data-rel="tooltip" data-date-format="mm/dd/yyyy">
                <br>
                <label>3. Fecal examination results </label>
                        <div class="form-check" style="padding-left: 20px">
                            <input class="form-check-input" type="radio" name="fecal_exam" value="1">
                                <label class="form-check-label" style="padding-left: 10px" for="fecal_exam">Parasite negative</label><br>
                            <input class="form-check-input" type="radio" name="fecal_exam" value="2">
                                <label class="form-check-label" style="padding-left: 10px" for="fecal_exam">Parasite positive</label><br>
                                <div style="padding-left: 40px">
                                    <!--OV-->
                                    <input class="form-check-input" type="checkbox" name="ov" value="1">
                                    <label class="form-check-label" style="padding-left: 10px" for="fecal_exam">OV</label><br>
                                    <div style="padding-left: 60px;display: nonex" class="row">
                                        <div class="col-md-3">
                                            <label>จำนวนไข่หรือตัวอ่อนพยาธิที่พบ</label>
                                            <input type="text" id="ov_egg" value="" class="form-control" style="width: 150px">
                                        </div>
                                        <div class="col-md-3"><label>จำนวนไข่ต่อกรัม (epg)</label>
                                            <input type="text" id="ov_epg" value="" class="form-control" style="width: 150px">
                                        </div>
                                    </div>

                                    <!--MIF-->
                                    <input class="form-check-input" type="checkbox" name="mif" value="1">
                                    <label class="form-check-label" style="padding-left: 10px" for="fecal_exam">MIF</label><br>
                                    <div style="padding-left: 60px;display: nonex" class="row">
                                        <div class="col-md-3">
                                            <label>จำนวนไข่หรือตัวอ่อนพยาธิที่พบ</label>
                                            <input type="text" id="mif_egg" value="" class="form-control" style="width: 150px">
                                        </div>
                                        <div class="col-md-3"><label>จำนวนไข่ต่อกรัม (epg)</label>
                                            <input type="text" id="mif_epg" value="" class="form-control" style="width: 150px">
                                        </div>
                                    </div>
                        <!--SS-->
                                    <input class="form-check-input" type="checkbox" name="ss" value="1">
                                    <label class="form-check-label" style="padding-left: 10px" for="fecal_exam">SS</label><br>
                                    <div style="padding-left: 60px;display: nonex" class="row">
                                        <div class="col-md-3">
                                            <label>จำนวนไข่หรือตัวอ่อนพยาธิที่พบ</label>
                                            <input type="text" id="ss_egg" value="" class="form-control" style="width: 150px">
                                        </div>
                                        <div class="col-md-3"><label>จำนวนไข่ต่อกรัม (epg)</label>
                                            <input type="text" id="ss_epg" value="" class="form-control" style="width: 150px">
                                        </div>
                                    </div>
                        <!--Ech-->
                                    <input class="form-check-input" type="checkbox" name="ech" value="1">
                                    <label class="form-check-label" style="padding-left: 10px" for="fecal_exam">Ech</label><br>
                                    <div style="padding-left: 60px;display: nonex" class="row">
                                        <div class="col-md-3">
                                            <label>จำนวนไข่หรือตัวอ่อนพยาธิที่พบ</label>
                                            <input type="text" id="ech_egg" value="" class="form-control" style="width: 150px">
                                        </div>
                                        <div class="col-md-3"><label>จำนวนไข่ต่อกรัม (epg)</label>
                                            <input type="text" id="ech_epg" value="" class="form-control" style="width: 150px">
                                        </div>
                                    </div>
                        <!--Taenia-->
                                    <input class="form-check-input" type="checkbox" name="taenia" value="1">
                                    <label class="form-check-label" style="padding-left: 10px" for="fecal_exam">Taenia</label><br>
                                    <div style="padding-left: 60px;display: nonex" class="row">
                                        <div class="col-md-3">
                                            <label>จำนวนไข่หรือตัวอ่อนพยาธิที่พบ</label>
                                            <input type="text" id="taenia_egg" value="" class="form-control" style="width: 150px">
                                        </div>
                                        <div class="col-md-3"><label>จำนวนไข่ต่อกรัม (epg)</label>
                                            <input type="text" id="taenia_epg" value="" class="form-control" style="width: 150px">
                                        </div>
                                    </div>

                        <!--Tt-->
                                    <input class="form-check-input" type="checkbox" name="tt" value="1">
                                    <label class="form-check-label" style="padding-left: 10px" for="fecal_exam">Tt</label><br>
                                    <div style="padding-left: 60px;display: nonex" class="row">
                                        <div class="col-md-3">
                                            <label>จำนวนไข่หรือตัวอ่อนพยาธิที่พบ</label>
                                            <input type="text" id="tt_egg" value="" class="form-control" style="width: 150px">
                                        </div>
                                        <div class="col-md-3"><label>จำนวนไข่ต่อกรัม (epg)</label>
                                            <input type="text" id="tt_epg" value="" class="form-control" style="width: 150px">
                                        </div>
                                    </div>
                        <!--Tt-->
                                    <input class="form-check-input" type="checkbox" name="others" value="1">
                                    <label class="form-check-label" style="padding-left: 10px" for="fecal_exam">Others</label><br>
                                    <div style="padding-left: 60px;display: nonex" class="row">
                                        <div class="col-md-3">
                                            <label>Specify</label>
                                            <input type="text" id="others_specify" value="" class="form-control" style="width: 350px">
                                        </div>
                                    </div>
                                    <div style="padding-left: 60px;display: nonex" class="row">
                                        <div class="col-md-3">
                                            <label>จำนวนไข่หรือตัวอ่อนพยาธิที่พบ</label>
                                            <input type="text" id="others_egg" value="" class="form-control" style="width: 150px">
                                        </div>
                                        <div class="col-md-3"><label>จำนวนไข่ต่อกรัม (epg)</label>
                                            <input type="text" id="others_epg" value="" class="form-control" style="width: 150px">
                                        </div>
                                    </div>

                                </div>

    </div>

                <label>4. Treatment prescribed </label>
                <div class="form-check" style="padding-left: 20px">
                    <input class="form-check-input" type="radio" name="treatment"  value="0">
                    <label class="form-check-label" style="padding-left: 10px" for="fecal_exam">No</label><br>
                    <input class="form-check-input" type="radio" name="treatment" value="1">
                    <label class="form-check-label" style="padding-left: 10px" for="fecal_exam">Yes, Drug</label>

                    <div style="padding-left: 60px;display: nonex" class="row">
                        <div class="col-md-3">
                            <label>Drug name</label>
                            <input type="text" id="drug" value="" class="form-control" style="width: 350px">
                        </div>
                    </div>

                    <br>
                 </div>
    <div class="panel-footer" style="text-align: center;">
        <button type="button" class="btn btn-primary " id="btn_save_kato" <?php echo $disable;?>><i class="fa fa-save "></i> บันทึก</button>
        <button type="button" class="btn btn-warning disabled" id="btn_cancle_demo" <?php echo $disable;?>><i class="fa fa-edit "></i> แก้ไข</button>

    </div>
</div>
<script src="<?php echo base_url()?>assets/apps/js/kato.js" charset="utf-8"></script>



 
 