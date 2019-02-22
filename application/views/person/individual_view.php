
<br>
<div class="panel panel-info ">
    <div class="panel-heading w3-theme">
        <?php echo $title." : ". $person['PRENAME'].$person['NAME']." ".$person['LNAME']?>
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
            <input type="hidden" id="cid" value="<?PHP echo $person['CID']?>">
            </form>
        </div>
        <div class="panel panel-success">
            <div class="panel-heading w3-theme-l3" style="padding-bottom: 20px">
                ประวัติการบันทึกข้อมูล <?php echo $title;?>
                <span class="pull-right" ><button class="btn  btn-circle w3-theme-action" id="btn_demographic_new"><i class="fa fa-plus" style="color: white; "></i></button></span>
                
            </div>
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th> # </th>
                        <th> วันที่คัดกรอง </th>
                        <th> ผู้คัดกรอง </th>
                        <th  class="pull-right"> การจัดการ </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no=1;
                    foreach($answer_demo as $a){
                        $a['approve']==1?$approve=' disabled':$approve='';
                        echo "<tr><td>$no</td><td>".to_thai_date_short($a['date_serve'])."</td><td>".get_provider($a['provider'])."</td><td>";
                        echo "<div class='btn-group btn-group-sm pull-right' role='group' aria-label='Basic example'>
                            <a  href='".site_url()."/demographic/demographic/".$a['cid']."/".$a['id']."/view' data-btn= 'view_demo' data-id='".$a['id']."' type='button' class='btn btn-secondary btn-info'><i class='fa fa-eye'></i></a>
                            <a  href='".site_url()."/demographic/demographic/".$a['cid']."/".$a['id']."' data-btn= 'edit_demo' data-id='".$a['id']."' type='button' class='btn btn-secondary btn-warning $approve'><i class='fa fa-pencil-square-o'></i></a>
                            <a  data-btn='del_demo' data-id='".$a['id']."' type='button' class='btn btn-secondary btn-danger $approve'><i class='fa fa-times'></i></a>
                            </div>";
                        echo "</td></tr>";
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="panel panel-info  ">
            <div class="panel-heading w3-theme-l2" style="padding-bottom: 20px">
                ประวัติการบันทึกข้อมูล OV-01K (Kato-Katz)
                <span class="pull-right" ><button class="btn  btn-circle w3-theme-action" id="btn_kato_new"><i class="fa fa-plus" style="color: white; "></i></button></span>

            </div>
            <table class="table table-responsive">
                <thead>
                <tr>
                    <th> # </th>
                    <th> วันที่คัดกรอง </th>
                    <th> ผู้คัดกรอง </th>
                    <th> การจัดการ </th>
                </tr>
                </thead>
                <tbody>
                <?php
                $no=1;
                foreach($answer_kato as $a){
                    $a['approve']==1?$approve=' disabled':$approve='';
                    echo "<tr><td>$no</td><td>".to_thai_date_short($a['date_sample'])."</td><td>".get_provider($a['provider'])."</td><td>";
                    echo "<div class='btn-group btn-group-sm pull-right' role='group' aria-label='Basic example'>
                            <a  href='".site_url()."/kato/kato/".$a['cid']."/".$a['id']."/view' data-btn= 'view_demo' data-id='".$a['id']."' type='button' class='btn btn-secondary btn-info'><i class='fa fa-eye'></i></a>
                            <a  href='".site_url()."/kato/kato/".$a['cid']."/".$a['id']."' data-btn= 'edit_demo' data-id='".$a['id']."' type='button' class='btn btn-secondary btn-warning $approve'><i class='fa fa-eye'></i></a>
                            <a  data-btn='del_kato' data-id='".$a['id']."' type='button' class='btn btn-secondary btn-danger $approve'><i class='fa fa-times'></i></a>
                            </div>";
                    echo "</td></tr>";
                    $no++;
                }
                ?>
                </tbody>
            </table>
        </div>
        <div class="panel panel-warning ">
            <div class="panel-heading w3-theme-l1" style="padding-bottom: 20px">
                ประวัติการบันทึกข้อมูล  CCA-02 (V.6)  Ultrasound Form (Form V.6)
                <span class="pull-right"><button class="btn btn-circle w3-theme-action"><i class="fa fa-plus" style="color: white"></i></button></span>

            </div>
            <table class="table table-responsive">
                <thead>
                <tr>
                    <th> # </th>
                    <th> วันที่คัดกรอง </th>
                    <th> ผู้คัดกรอง </th>
                    <th> การจัดการ </th>
                </tr>
                </thead>
                <tbody>
                <?php
                $no=1;
                foreach($answer_ultrasound as $a){
                    echo "<tr><td>$no</td><td>".to_thai_date_short($a['date_serve'])."</td><td>".get_provider($a['provider'])."</td><td>";
                    echo "<div class='btn-group btn-group-sm' role='group' aria-label='Basic example'>
                            <button type='button' class='btn btn-secondary'>Left</button>
                            <button type='button' class='btn btn-secondary'>Middle</button>
                            <button type='button' class='btn btn-secondary'>Right</button>
                            </div>";
                    echo "</td></tr>";
                    $no++;
                }
                ?>
                </tbody>
            </table>
        </div>
</div>
</div>
<script src="<?php echo base_url()?>assets/apps/js/individual.js" charset="utf-8"></script>



 
 