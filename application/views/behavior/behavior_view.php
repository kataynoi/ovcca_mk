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
                <h3>ตอนที่ 1 ข้อมูลเกี่ยวกับตัวท่าน</h3>
                <label>1. วันที่เข้ารับการตรวจหาพยาธิใบไม้ตับครั้งนี้ </label>
                <input style="padding-left: 20px;width: 200px;margin-left: 20px" type="text" id="vdate"
                       data-type="date" class="form-control datepicker" data-date-language="th"
                       data-rel="tooltip" data-date-format="mm/dd/yyyy">
                <br>

                <div class="row">

                    <div class="col-md-3">
                        <label>2. น้ำหนัก (ก.ก.) </label>
                        <input type="text" id="weight" value="" class="form-control number" data-type="number"
                               style="width: 200px;padding-left: 20px;margin-left: 20px">
                    </div>
                    <div class="col-md-3">
                        <label>ส่วนสูง (เซ็นติเมตร)</label>
                        <input type="text" id="height" value="" class="form-control" style="width: 200px" data-type="number">
                    </div>
                </div>


                <br>
                <label>3. ท่านรับทราบผลการตรวจว่าอย่างไร </label>

                <div class="form-check" style="padding-left: 20px">
                    <input class="form-check-input" type="radio" name="know" value="1">
                    <label class="form-check-label" style="padding-left: 10px"
                           for="fecal_exam">ไม่พบเชื้อพยาธิใบไม้ตับ</label><br>
                    <input class="form-check-input" type="radio" name="know" value="2">
                    <label class="form-check-label" style="padding-left: 10px"
                           for="fecal_exam">พบเชื้อพยาธิใบไม้ตับ</label><br>

                </div>

                <label>4. ท่านตั้งใจจะเลิกกินลาบปลาดิบ ก้อยปลาดิบ หรือไม่ </label>

                <div class="form-check" style="padding-left: 20px">
                    <input class="form-check-input" type="radio" name="stop" value="0">
                    <label class="form-check-label" style="padding-left: 10px" for="fecal_exam">เลิก</label><br>
                    <input class="form-check-input" type="radio" name="stop" value="1">
                    <label class="form-check-label" style="padding-left: 10px" for="fecal_exam">ไม่เลิก</label>

                    <div style="padding-left: 20px;display: nonex" class="row">
                        <div class="col-md-3">
                            <label>โปรดระบุเหตุผล (ไม่ว่าจะเลิกหรือไม่เลิกกิน)</label>
                            <input type="text" id="stopx" value="" class="form-control" style="width: 500px">
                        </div>
                    </div>

                    <br>
                </div>


                <label>5. ท่านตั้งใจจะกลับมารับการตรวจหาพยาธิใบไม้ตับครั้งต่อไปหรือไม่</label>

                <div class="form-check" style="padding-left: 20px">
                    <input class="form-check-input" type="radio" name="return" value="1">
                    <label class="form-check-label" style="padding-left: 10px" for="fecal_exam">ไม่มา</label><br>
                    <input class="form-check-input" type="radio" name="return" value="2">
                    <label class="form-check-label" style="padding-left: 10px" for="return">มา</label>

                    <div style="padding-left: 20px;display: nonex" class="row">
                        <div class="col-md-3">
                            <label>โปรดระบุเหตุผล (ไม่ว่าจะมาหรือไม่มา)</label>
                            <input type="text" id="returnx" value="" class="form-control" style="width: 500px">
                        </div>
                    </div>

                    <br>
                </div>

                <h3>ตอนที่ 2 ความรู้เกี่ยวกับโรคพยาธิใบไม้ตับและโรคมะเร็งท่อน้ำดี</h3>
                <label> 6. เรื่องต่อไปนี้ ท่านเห็นว่าใช่หรือไม่ </label>
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="text-center">ใช่</th>
                            <th class="text-center">ไม่ใช่</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1 . การชิมปลาดิบเพียงเล็กน้อย ทำให้เป็นโรคพยาธิใบไม้ตับได้</td>
                            <td class="text-center">
                                <input type="radio" class="form-control" name="conform1" value="1">
                            </td >
                            <td class="text-center">
                                <input type="radio" class="form-control" name="conform1" value="2">
                            </td>
                        </tr>
                        <tr>
                            <td>2 . การรับประทาน ปลาส้มดิบ ทำให้เป็นโรคพยาธิใบไม้ตับได้</td>
                            <td class="text-center">
                                <input type="radio" class="form-control" name="conform2" value="1">
                            </td >
                            <td class="text-center">
                                <input type="radio" class="form-control" name="conform2" value="2">
                            </td>
                        </tr>

                        <tr>
                            <td>3 . การบีบมะนาว หรือใส่มดแดงส้ม ลงไปในก้อยปลา เป็นการทำให้ก้อยสุก</td>
                            <td class="text-center">
                                <input type="radio" class="form-control" name="conform3" value="1">
                            </td >
                            <td class="text-center">
                                <input type="radio" class="form-control" name="conform3" value="2">
                            </td>
                        </tr>

                        <tr>
                            <td>4 . การกินก้อยปลาแกล้มเหล้า เป็นการทำให้ก้อยสุก</td>
                            <td class="text-center">
                                <input type="radio" class="form-control" name="conform4" value="1">
                            </td >
                            <td class="text-center">
                                <input type="radio" class="form-control" name="conform4" value="2">
                            </td>
                        </tr>

                        <tr>
                            <td>5 . ยาฆ่าพยาธิใบไม้ตับสามารถรับประทานได้บ่อยๆ </td>
                            <td class="text-center">
                                <input type="radio" class="form-control" name="conform5" value="1">
                            </td >
                            <td class="text-center">
                                <input type="radio" class="form-control" name="conform5" value="2">
                            </td>
                        </tr>

                        <tr>
                            <td>6 . มะเร็งท่อน้ำดีในระยะเริ่มต้น สามารถรักษาให้หายขาดได้</td>
                            <td class="text-center">
                                <input type="radio" class="form-control" name="conform6" value="1">
                            </td >
                            <td class="text-center">
                                <input type="radio" class="form-control" name="conform6" value="2">
                            </td>
                        </tr>



                    </tbody>
                </table>
                <label>7. ในรอบ 6 เดือนที่ผ่านมา ท่านรับประทานอาหารต่อไปนี้หรือไม่</label>

                <p>ประจำ หมายถึง ทุกวัน เกือบทุกวัน เกือบทุกสัปดาห์ หรือ ทุกเดือน
                นานๆครั้ง หมายถึง หลายเดือนจึงมีพฤติกรรมเสี่ยงสักครั้ง หรือในบางโอกาส ซึ่งไม่บ่อย
                ไม่กิน หมายถึง ไม่มีพฤติกรรมเสี่ยงเลย</p>
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th class="text-center">กินประจำ</th>
                        <th class="text-center">กินนนานๆครั้ง</th>
                        <th class="text-center">ไม่กิน</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1 . ลาบปลาดิบ ก้อยปลาดิบ</td>
                        <td class="text-center">
                            <input type="radio" class="form-control" value="1" name="foodr1">
                        </td >
                        <td class="text-center">
                            <input type="radio" class="form-control" value="2" name="foodr1">
                        </td>
                        <td class="text-center">
                            <input type="radio" class="form-control" value="3" name="foodr1">
                        </td>
                    </tr>
                    <tr>
                        <td>2 . ปลาจ่อมดิบ ปลาเจ่าดิบ ส้มปลาน้อยดิบ</td>
                        <td class="text-center">
                            <input type="radio" class="form-control" value="1" name="foodr2">
                        </td >
                        <td class="text-center">
                            <input type="radio" class="form-control" value="2" name="foodr2">
                        </td>
                        <td class="text-center">
                            <input type="radio" class="form-control" value="3" name="foodr2">
                        </td>
                    </tr>
                    <tr>
                        <td>3 . แจ่วบองปลาร้าดิบ ปลาร้าดิบ</td>
                        <td class="text-center">
                            <input type="radio" class="form-control" value="1" name="foodr3">
                        </td >
                        <td class="text-center">
                            <input type="radio" class="form-control" value="2" name="foodr3">
                        </td>
                        <td class="text-center">
                            <input type="radio" class="form-control" value="3" name="foodr3">
                        </td>
                    </tr>
                    <tr>
                        <td>4 . ส้มตำใส่ปลาร้าดิบ</td>
                        <td class="text-center">
                            <input type="radio" class="form-control" value="1" name="foodr4">
                        </td >
                        <td class="text-center">
                            <input type="radio" class="form-control" value="2" name="foodr4">
                        </td>
                        <td class="text-center">
                            <input type="radio" class="form-control" value="3" name="foodr4">
                        </td>
                    </tr>
                    <tr>
                        <td>5 . ปลาส้มดิบ ปลาส้มฟักดิบ</td>
                        <td class="text-center">
                            <input type="radio" class="form-control" value="1" name="foodr5">
                        </td >
                        <td class="text-center">
                            <input type="radio" class="form-control" value="2" name="foodr5">
                        </td>
                        <td class="text-center">
                            <input type="radio" class="form-control" value="3" name="foodr5">
                        </td>
                    </tr>
                    <tr>
                        <td>6 . หม่ำปลาดิบ </td>
                        <td class="text-center">
                            <input type="radio" class="form-control" value="1" name="foodr6">
                        </td >
                        <td class="text-center">
                            <input type="radio" class="form-control" value="2" name="foodr6">
                        </td>
                        <td class="text-center">
                            <input type="radio" class="form-control" value="3" name="foodr6">
                        </td>
                    </tr>
                    </tbody>
                    </table>
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



 
 