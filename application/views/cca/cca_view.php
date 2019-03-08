<script>

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
        <h4><?php echo $title . " : " . $person['PRENAME'] . $person['NAME'] . " " . $person['LNAME'] ?></h4>
    </div>
    <div class="panel-body">
        <div class="navbar navbar-default">
            <form action="#" class="navbar-form">
                <div class="row">
                    <div class="col col-md-6">
                        <dl class="row">
                            <dt class="col-sm-4">ชื่อ สกุล</dt>
                            <dd class="col-sm-8"><?php echo $person['PRENAME'] . $person['NAME'] . " " . $person['LNAME'] ?></dd>

                            <dt class="col-sm-4">ที่อยู่</dt>
                            <dd class="col-sm-8"><?php echo $person['addr'] . " " . $person['vhid'] ?></dd>

                            <dt class="col-sm-4">วัน/เดือน/ปี เกิด :</dt>
                            <dd class="col-sm-8"><?php echo $person['BIRTH'] ?></dd>

                            <dt class="col-sm-4 text-truncate">อายุ :</dt>
                            <dd class="col-sm-8"><?php echo $person['age_y'] ?> ปี</dd>

                            <dt class="col-sm-4">เพศ :</dt>
                            <dd class="col-sm-8"><?php echo $person['SEX'] ?></dd>
                        </dl>
                    </div>

                    <div class="col col-md-6">
                        <dl class="row">
                            <dt class="col-sm-3">อาชีพ</dt>
                            <dd class="col-sm-9"><?php echo $person['OCCUPATION_NEW'] ?></dd>

                            <dt class="col-sm-3">การศึกษา</dt>
                            <dd class="col-sm-9"><?php echo $person['EDUCATION'] ?></dd>

                            <dt class="col-sm-3">สัญชาติ:</dt>
                            <dd class="col-sm-9"><?php echo $person['NATION'] ?></dd>

                            <dt class="col-sm-3 text-truncate">ประเภทการอยู่อาศัย :</dt>
                            <dd class="col-sm-9"><?php echo $person['TYPEAREA'] ?></dd>


                        </dl>
                    </div>
                </div>

            </form>
        </div>
        <div class="panel panel-info">
            <form action="#" class="">
                <input type="hidden" id="cid" value="<?php echo $cid; ?>">
                <input type="hidden" id="pid" value="<?php echo $person['PID']; ?>">
                <input type="hidden" id="provider" value="<?php echo $this->session->userdata('id'); ?>">
                <input type="hidden" id="action" value="<?php echo $action; ?>"><br>
                <input type="hidden" id="answer_id" value="<?php echo $answer_id; ?>"><br>

                <label>1. Exam date</label>
                <input style="padding-left: 20px;width: 200px;margin-left: 20px" type="text" id="edate"
                       data-type="date" class="form-control datepicker" data-date-language="th"
                       data-rel="tooltip" data-date-format="mm/dd/yyyy">
                <br>
                <label style="padding-left: 10px;">1.1 Clinical Suspected CCA (มาด้วยอาการแสดง)</label>
                <div class="form-check" style="padding-left: 20px">
                    <input class="form-check-input" type="radio" name="know" value="1">
                    <label class="form-check-label" style="padding-left: 10px"
                           for="fecal_exam">No</label><br>
                    <input class="form-check-input" type="radio" name="know" value="2">
                    <label class="form-check-label" style="padding-left: 10px"
                           for="fecal_exam">Yes</label><br>
                    <div style="padding-left: 30px;">
                        <input class="form-check-input" type="checkbox" name="ov" value="1" >
                        <label class="form-check-label" style="padding-left: 10px" for="fecal_exam"> ตัวเหลือง ตาเหลือง คัน </label><br>

                        <input class="form-check-input" type="checkbox" name="ov" value="1">
                        <label class="form-check-label" style="padding-left: 10px" for="fecal_exam"> ท้องมาน </label><br>

                        <input class="form-check-input" type="checkbox" name="ov" value="1">
                        <label class="form-check-label" style="padding-left: 10px" for="fecal_exam"> น้ำหนักลด (ลด 5% ใน 1 เดือน หรือ 10% ใน 3 เดือน) </label><br>

                        <input class="form-check-input" type="checkbox" name="ov" value="1">
                        <label class="form-check-label" style="padding-left: 10px" for="fecal_exam"> เบื่ออาหาร  </label><br>

                        <input class="form-check-input" type="checkbox" name="ov" value="1">
                        <label class="form-check-label" style="padding-left: 10px" for="fecal_exam"> ตับโต คลำได้ก้อน </label><br>
                    </div>

                </div>

                <br>
                2. Liver <br>
                <label style="padding-left: 10px;">2.1) Liver Parenchymal ECHO </label>
                <div class="form-check" style="padding-left: 20px">
                    <input class="form-check-input" type="radio" name="know" value="1">
                    <label class="form-check-label" style="padding-left: 10px"
                           for="fecal_exam">0. Normal</label><br>
                    <input class="form-check-input" type="radio" name="know" value="2">
                    <label class="form-check-label" style="padding-left: 10px"
                           for="fecal_exam">1. Abnormal</label><br>
                    <div style="padding-left: 30px;">
                        <div class="row">
                            <div class="col col-md-4">
                                <label>Fatty Liver </label><br>
                                <input class="form-check-input" type="radio" name="know" value="1">
                                <label class="form-check-label" style="padding-left: 10px"
                                       for="fecal_exam">1a) Mild fatty liver</label><br>

                                <input class="form-check-input" type="radio" name="know" value="2">
                                <label class="form-check-label" style="padding-left: 10px"
                                       for="fecal_exam">1b) Moderate fatty liver</label><br>

                                <input class="form-check-input" type="radio" name="know" value="2">
                                <label class="form-check-label" style="padding-left: 10px"
                                       for="fecal_exam">1c) Severe fatty liver</label><br>
                            </div>

                            <div class="col col-md-4">
                                <label>Periductal Fibrosis </label><br>
                                <input class="form-check-input" type="radio" name="know" value="1">
                                <label class="form-check-label" style="padding-left: 10px"
                                       for="fecal_exam">2a) PDF 1</label><br>

                                <input class="form-check-input" type="radio" name="know" value="2">
                                <label class="form-check-label" style="padding-left: 10px"
                                       for="fecal_exam">2b) PDF 2</label><br>

                                <input class="form-check-input" type="radio" name="know" value="2">
                                <label class="form-check-label" style="padding-left: 10px"
                                       for="fecal_exam">2c) PDF 3</label><br>
                            </div>

                            <div class="col col-md-4">
                                <input class="form-check-input" type="checkbox" name="know" value="1">
                                <label class="form-check-label" style="padding-left: 10px"
                                       for="fecal_exam">3a) Cirrhosis </label><br>

                                <input class="form-check-input" type="checkbox" name="know" value="2">
                                <label class="form-check-label" style="padding-left: 10px"
                                       for="fecal_exam">4a) Parenchymal change </label><br>
                            </div>
                        </div>
                    </div>

                </div>


                <label style="padding-left: 10px;">2.2) Liver Mass</label>
                <div class="form-check" style="padding-left: 20px">
                    <input class="form-check-input" type="radio" name="know" value="1">
                    <label class="form-check-label" style="padding-left: 10px"
                           for="fecal_exam">0. No</label><br>
                    <input class="form-check-input" type="radio" name="know" value="2">
                    <label class="form-check-label" style="padding-left: 10px"
                           for="fecal_exam">1. Single Mass</label><br>
                    <input class="form-check-input" type="radio" name="know" value="2">
                    <label class="form-check-label" style="padding-left: 10px"
                           for="fecal_exam">2. Multiple Mass</label><br>
                    <div style="padding-left: 30px;">
                        <div class="row">

                            <div class="">
                                <input class="form-check-input" type="checkbox" name="know" value="1">
                                <label class="form-check-label" style="padding-left: 10px"
                                       for="fecal_exam"> a) Liver cyst </label><br>
                                        <div class="row" style="padding-left: 50px">
                                            <div class="col col-md-4">
                                                <label class="form-check-label" for="fecal_exam">Size of Hemangioma (cm)</label>
                                                <input type="text" class="form-control" style="width: 200px;">
                                            </div>
                                            <div class="col col-md-4">
                                                <input class="form-check-input" type="checkbox" name="know" value="1">
                                                <label class="form-check-label" style="padding-left: 10px"
                                                       for="fecal_exam">a1) Lt </label><br>
                                            </div>
                                            <div class="col col-md-4">
                                                <input class="form-check-input" type="checkbox" name="know" value="1">
                                                <label class="form-check-label" style="padding-left: 10px"
                                                       for="fecal_exam">a2) Rt </label><br>
                                            </div>
                                        </div>

                                <input class="form-check-input" type="checkbox" name="know" value="2">
                                <label class="form-check-label" style="padding-left: 10px"
                                       for="fecal_exam">b) Hemangioma </label><br>
                                        <div class="row" style="padding-left: 50px">
                                    <div class="col col-md-4">
                                        <label class="form-check-label" for="fecal_exam">Size of Hemangioma (cm)</label>
                                        <input type="text" class="form-control" style="width: 200px;">
                                    </div>
                                    <div class="col col-md-4">
                                        <input class="form-check-input" type="checkbox" name="know" value="1">
                                        <label class="form-check-label" style="padding-left: 10px"
                                               for="fecal_exam">a1) Lt </label><br>
                                    </div>
                                    <div class="col col-md-4">
                                        <input class="form-check-input" type="checkbox" name="know" value="1">
                                        <label class="form-check-label" style="padding-left: 10px"
                                               for="fecal_exam">a2) Rt </label><br>
                                    </div>
                                </div>

                                <input class="form-check-input" type="checkbox" name="know" value="2">
                                <label class="form-check-label" style="padding-left: 10px"
                                       for="fecal_exam">c) Calcification </label><br>
                                        <div class="row" style="padding-left: 50px">
                                    <div class="col col-md-4">
                                        <label class="form-check-label" for="fecal_exam">Size of Hemangioma (cm)</label>
                                        <input type="text" class="form-control" style="width: 200px;">
                                    </div>
                                    <div class="col col-md-4">
                                        <input class="form-check-input" type="checkbox" name="know" value="1">
                                        <label class="form-check-label" style="padding-left: 10px"
                                               for="fecal_exam">a1) Lt </label><br>
                                    </div>
                                    <div class="col col-md-4">
                                        <input class="form-check-input" type="checkbox" name="know" value="1">
                                        <label class="form-check-label" style="padding-left: 10px"
                                               for="fecal_exam">a2) Rt </label><br>
                                    </div>
                                </div>

                                <input class="form-check-input" type="checkbox" name="know" value="2">
                                <label class="form-check-label" style="padding-left: 10px"
                                       for="fecal_exam">d) Intrahepatic duct stone </label><br>
                                        <div class="row" style="padding-left: 50px">
                                    <div class="col col-md-4">
                                        <label class="form-check-label" for="fecal_exam">Size of Hemangioma (cm)</label>
                                        <input type="text" class="form-control" style="width: 200px;">
                                    </div>
                                    <div class="col col-md-4">
                                        <input class="form-check-input" type="checkbox" name="know" value="1">
                                        <label class="form-check-label" style="padding-left: 10px"
                                               for="fecal_exam">a1) Lt </label><br>
                                    </div>
                                    <div class="col col-md-4">
                                        <input class="form-check-input" type="checkbox" name="know" value="1">
                                        <label class="form-check-label" style="padding-left: 10px"
                                               for="fecal_exam">a2) Rt </label><br>
                                    </div>
                                </div>
                                <input class="form-check-input" type="checkbox" name="know" value="2">
                                <label class="form-check-label" style="padding-left: 10px"
                                       for="fecal_exam">e) High echo </label><br>
                                        <div class="row" style="padding-left: 50px">
                                    <div class="col col-md-4">
                                        <label class="form-check-label" for="fecal_exam">Size of Hemangioma (cm)</label>
                                        <input type="text" class="form-control" style="width: 200px;">
                                    </div>
                                    <div class="col col-md-4">
                                        <input class="form-check-input" type="checkbox" name="know" value="1">
                                        <label class="form-check-label" style="padding-left: 10px"
                                               for="fecal_exam">a1) Lt </label><br>
                                    </div>
                                    <div class="col col-md-4">
                                        <input class="form-check-input" type="checkbox" name="know" value="1">
                                        <label class="form-check-label" style="padding-left: 10px"
                                               for="fecal_exam">a2) Rt </label><br>
                                    </div>
                                </div>
                                <input class="form-check-input" type="checkbox" name="know" value="2">
                                <label class="form-check-label" style="padding-left: 10px"
                                       for="fecal_exam">f) Low echo </label><br>
                                        <div class="row" style="padding-left: 50px">
                                    <div class="col col-md-4">
                                        <label class="form-check-label" for="fecal_exam">Size of Hemangioma (cm)</label>
                                        <input type="text" class="form-control" style="width: 200px;">
                                    </div>
                                    <div class="col col-md-4">
                                        <input class="form-check-input" type="checkbox" name="know" value="1">
                                        <label class="form-check-label" style="padding-left: 10px"
                                               for="fecal_exam">a1) Lt </label><br>
                                    </div>
                                    <div class="col col-md-4">
                                        <input class="form-check-input" type="checkbox" name="know" value="1">
                                        <label class="form-check-label" style="padding-left: 10px"
                                               for="fecal_exam">a2) Rt </label><br>
                                    </div>
                                </div>
                                <input class="form-check-input" type="checkbox" name="know" value="2">
                                <label class="form-check-label" style="padding-left: 10px"
                                       for="fecal_exam">g) Mixed echo </label><br>
                                         <div class="row" style="padding-left: 50px">
                                    <div class="col col-md-4">
                                        <label class="form-check-label" for="fecal_exam">Size of Hemangioma (cm)</label>
                                        <input type="text" class="form-control" style="width: 200px;">
                                    </div>
                                    <div class="col col-md-4">
                                        <input class="form-check-input" type="checkbox" name="know" value="1">
                                        <label class="form-check-label" style="padding-left: 10px"
                                               for="fecal_exam">a1) Lt </label><br>
                                    </div>
                                    <div class="col col-md-4">
                                        <input class="form-check-input" type="checkbox" name="know" value="1">
                                        <label class="form-check-label" style="padding-left: 10px"
                                               for="fecal_exam">a2) Rt </label><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <br>
                <label style="padding-left: 10px;">2.3) Dilated Bile Duct </label>
                    <div class="form-check" style="padding-left: 20px">
                        <input class="form-check-input" type="checkbox" name="know" value="2">
                        <label class="form-check-label" style="padding-left: 10px">0. No dilated duct </label>

                        <input class="form-check-input" type="checkbox" name="know" value="2" style="margin-left: 100px">
                        <label class="form-check-label" style="padding-left: 10px" >1. Right lobe </label>

                        <input class="form-check-input" type="checkbox" name="know" value="2" style="margin-left: 100px">
                        <label class="form-check-label" style="padding-left: 10px" >2. Left lobe </label>

                        <input class="form-check-input" type="checkbox" name="know" value="2" style="margin-left: 100px">
                        <label class="form-check-label" style="padding-left: 10px" >3. Common bile duct </label>

                    </div>


                <label style="padding-left: 10px;">2.3)Gallbladder</label>

                <div class="form-check" style="padding-left: 20px">

                    <input class="form-check-input" type="checkbox" name="know" value="2" style="margin-left: 100px">
                    <label class="form-check-label" style="padding-left: 10px">1. Normal </label>
                    <br>
                    <input class="form-check-input" type="checkbox" name="know" value="2" style="margin-left: 100px">
                    <label class="form-check-label" style="padding-left: 10px" >2. Wall </label>
                    <br>
                            <input class="form-check-input" type="checkbox" name="know" value="2" style="margin-left: 150px">
                            <label class="form-check-label" style="padding-left: 10px" >2a) Thickening </label>
                    <br>
                            <input class="form-check-input" type="checkbox" name="know" value="2" style="margin-left: 150px">
                            <label class="form-check-label" style="padding-left: 10px" >2. Wall </label>
                    <br>
                            <input class="form-check-input" type="checkbox" name="know" value="2" style="margin-left: 150px">
                            <label class="form-check-label" style="padding-left: 10px" >2c) Mass </label>
                    <br>
                    <input class="form-check-input" type="checkbox" name="know" value="2" style="margin-left: 100px">
                    <label class="form-check-label" style="padding-left: 10px" >3. Gallstone </label>

                    <br>
                            <input class="form-check-input" type="radio" name="galstonex" value="1" style="margin-left: 150px">
                            <label class="form-check-label" style="padding-left: 10px" >3.1 Single</label>
                    <br>
                            <input class="form-check-input" type="radio" name="Galstonex" value="2" style="margin-left: 150px">
                            <label class="form-check-label" style="padding-left: 10px" >3.2 Multiple</label>
                    <br>
                    <input class="form-check-input" type="checkbox" name="know" value="2" style="margin-left: 100px">
                    <label class="form-check-label" style="padding-left: 10px" >4. Post cholecystectomy </label>
                    <br>
                    <input class="form-check-input" type="checkbox" name="know" value="2" style="margin-left: 100px">
                    <label class="form-check-label" style="padding-left: 10px" >5. Not seen </label>

                </div>

                <label style="padding-left: 10px;">4. Kidney</label>

                <div class="form-check" style="padding-left: 20px">

                    <input class="form-check-input" type="checkbox" name="know" value="2" style="margin-left: 100px">
                    <label class="form-check-label" style="padding-left: 10px">1. Normal </label>
                    <br>
                    <input class="form-check-input" type="checkbox" name="know" value="2" style="margin-left: 100px">
                    <label class="form-check-label" style="padding-left: 10px" >2. Renal cyst </label>
                            <br>
                            <input class="form-check-input" type="checkbox" name="know" value="2" style="margin-left: 150px">
                            <label class="form-check-label" style="padding-left: 10px" >2.1) Right </label>
                            <br>
                            <input class="form-check-input" type="checkbox" name="know" value="2" style="margin-left: 150px">
                            <label class="form-check-label" style="padding-left: 10px" >2.2) Left </label>
                            <br>
                    <input class="form-check-input" type="checkbox" name="know" value="2" style="margin-left: 100px">
                    <label class="form-check-label" style="padding-left: 10px" >3. Parenchymal change </label>

                            <br>
                            <input class="form-check-input" type="radio" name="galstonex" value="1" style="margin-left: 150px">
                            <label class="form-check-label" style="padding-left: 10px" >3.1) Right </label>
                            <br>
                            <input class="form-check-input" type="radio" name="Galstonex" value="2" style="margin-left: 150px">
                            <label class="form-check-label" style="padding-left: 10px" >3.2) Left </label>
                            <br>
                    <input class="form-check-input" type="checkbox" name="know" value="2" style="margin-left: 100px">
                    <label class="form-check-label" style="padding-left: 10px" >4. Renal stone </label>
                            <br>
                            <input class="form-check-input" type="radio" name="galstonex" value="1" style="margin-left: 150px">
                            <label class="form-check-label" style="padding-left: 10px" >4.1) Renal stone without hydronephrosis </label>
                            <br>
                            <input class="form-check-input" type="radio" name="Galstonex" value="2" style="margin-left: 150px">
                            <label class="form-check-label" style="padding-left: 10px" >4.2) Renal stone with hydronephrosis </label>
                            <br>
                    <input class="form-check-input" type="checkbox" name="know" value="2" style="margin-left: 100px">
                    <label class="form-check-label" style="padding-left: 10px" >5. Post nephrectomy </label>
                            <br>
                            <input class="form-check-input" type="radio" name="galstonex" value="1" style="margin-left: 150px">
                            <label class="form-check-label" style="padding-left: 10px" >5.1a) Right </label>
                            <br>
                            <input class="form-check-input" type="radio" name="Galstonex" value="2" style="margin-left: 150px">
                            <label class="form-check-label" style="padding-left: 10px" >51.b) Left </label>
                            <br>
                    <input class="form-check-input" type="checkbox" name="know" value="2" style="margin-left: 100px">
                    <label class="form-check-label" style="padding-left: 10px" >6. Not seen kidney </label>

                </div>


                <label style="padding-left: 10px;">5. Other Finding</label>
                <div class="form-check" style="padding-left: 20px">
                    <input class="form-check-input" type="checkbox" name="know" value="2" style="margin-left: 100px">
                    <label class="form-check-label" style="padding-left: 10px">1. Ascites finding </label>
                        <br>
                    <input class="form-check-input" type="checkbox" name="know" value="2" style="margin-left: 100px">
                    <label class="form-check-label" style="padding-left: 10px" > 2. Splenomegaly </label>
                        <br>
                    <input class="form-check-input" type="checkbox" name="know" value="2" style="margin-left: 100px">
                    <label class="form-check-label" style="padding-left: 10px" >3. Others </label>
                        <br>
                    <label class="" style="margin-left: 143px">ระบุ (Other finding) </label>
                    <input class="form-control" type="text" name="know" value="2" style="width: 200px;margin-left: 143px;">

                </div>

                <label style="padding-left: 10px;">6. การพบแพทย์ครั้งต่อไป</label>
                <div class="form-check" style="padding-left: 20px">
                    <input class="form-check-input" type="radio" name="know" value="1">
                    <label class="form-check-label" style="padding-left: 10px"
                           for="fecal_exam">2. นัด 6 เดือน (กรณีตรวจพบ PDF)</label><br>
                    <input class="form-check-input" type="radio" name="know" value="2">
                    <label class="form-check-label" style="padding-left: 10px"
                           for="fecal_exam">1. Abnormal</label><br>
                    <input class="form-check-input" type="checkbox" name="know" value="2">
                    <label class="form-check-label" style="padding-left: 10px"
                           for="fecal_exam">3. ส่งรักษาต่อที่โรงพยาบาล (กรณีสงสัยมะเร็งท่อน้ำดีให้เลือก Suspected CCA ด้วย) </label>

                    <br>
                    <label class="" style="margin-left: 30px">ระบุ โรงพยาบาล </label>
                    <input class="form-control" type="text" name="know" style="width: 400px;margin-left: 30px;">
                    ส่งต่อเนื่องจาก <br>
                    <input class="form-check-input" type="radio" name="know" value="1">
                    <label class="form-check-label" style="padding-left: 10px"
                           for="fecal_exam">3.1 Suspected CCA </label><br>
                    <input class="form-check-input" type="radio" name="know" value="2">
                    <label class="form-check-label" style="padding-left: 10px"
                           for="fecal_exam">3.2 สาเหตุอื่นๆ โปรดระบุ </label>
                    <br>

                    <input class="form-check-input" type="checkbox" name="know" value="2">
                    <label class="form-check-label" style="padding-left: 10px"
                           for="fecal_exam">วินิจฉัยโดยแพทย์ แต่ตรวจอัลตราซาวด์โดยบุคคลอื่น </label>

                    <br>
                    <label class="" style="margin-left: 30px">แพทย์ผู้ตรวจ</label>
                    <input class="form-control" type="text" name="know" style="width: 400px;margin-left: 30px;">

                    <br>
                <div class="panel-footer" style="text-align: center;">
                    <button type="button" class="btn btn-primary " id="btn_save_behavior" <?php echo $disable; ?>><i
                            class="fa fa-save "></i> บันทึก
                    </button>
                    <button type="button" class="btn btn-warning disabled" id="btn_cancle_behavior" <?php echo $disable; ?>>
                        <i class="fa fa-edit "></i> แก้ไข
                    </button>

                </div>
        </div>
        <script src="<?php echo base_url() ?>assets/apps/js/behavior.js" charset="utf-8"></script>



 
 