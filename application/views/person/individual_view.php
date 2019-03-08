
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


                            <dt class="col-sm-3 text-truncate">สถานะการจำหน่าย :</dt>
                            <dd class="col-sm-9"><?php echo get_discharge_type($person['DISCHARGE']); if($person['DISCHARGE'] =='1'){ echo "<span style='color: red'> วันที่ ".to_thai_date($person['DDISCHARGE'])."</span>" ;} ?></dd>

                        </dl>
                    </div>
                </div>
            <input type="hidden" id="cid" value="<?PHP echo $person['CID']?>"
            </form>
        </div>
    </div>
</div>


<div id="navbar-example">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item in active">
            <a class="nav-link " data-toggle="tab" href="#demo" role="tab">
                Demographic Information <span class="badge badge-info" id="count_demo"><?php echo sizeof($answer_demo);?></span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#kato1" role="tab">
                OV-01K (Kato-Katz) <span class="badge badge-success" id="count_demo"><?php echo sizeof($answer_kato);?></span></a>
        </li>
        <!--<li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#parasep" role="tab">OV-01P (Parasep)</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#fect" role="tab">OV-01F (FECT)</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#urine" role="tab">OV-01U (Urine)</a>
        </li>-->
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#behavior" role="tab">
                OV-02  แบบเก็บข้อมูลพฤติกรรมและปัจจัยที่เกี่ยวข้อง <span class="badge badge-warning" id="count_demo"><?php echo sizeof($answer_behavior);?></span></a>
        </li>
        <!--<li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#treatments" role="tab">OV-03 Treatments</a>
        </li>-->
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#cca" role="tab">
                CCA-02 อัลตร้าซาวด <span class="badge badge-inverse" id="count_demo"><?php echo sizeof($answer_behavior);?></span>์</a>
        </li>
    </ul>

    <!-- Tab panes {Fade}  -->
    <div class="tab-content">
        <div class="tab-pane fade in active" id="demo" name="demo" role="tabpanel">
            <button class="btn  btn-circle w3-theme-action" id="btn_demographic_new"><i class="fa fa-plus" style="color: white; "></i></button>
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
                    echo "<tr>";
                    echo "<td>$no</td>";
                    echo "<td>".to_thai_date_short($a['date_serve'])."</td>";
                    echo "<td>".get_provider($a['provider'])."</td>";
                    echo "<td><div class='btn-group btn-group-sm pull-right' role='group' aria-label='Basic example'>
                                            <a  href='".site_url()."/demographic/demographic/".$a['cid']."/".$a['id']."/view' data-btn= 'view_demo' data-id='".$a['id']."' type='button' class='btn btn-secondary btn-info'><i class='fa fa-eye'></i></a>
                                            <a  href='".site_url()."/demographic/demographic/".$a['cid']."/".$a['id']."' data-btn= 'edit_demo' data-id='".$a['id']."' type='button' class='btn btn-secondary btn-warning $approve'><i class='fa fa-pencil-square-o'></i></a>
                                            <a  href='#' data-btn='del_demo' data-id='".$a['id']."' type='button' class='btn btn-secondary btn-danger $approve'><i class='fa fa-times'></i></a>
                                            </div>";
                    echo "</td></tr>";
                    $no++;
                }
                ?>
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="kato1" role="tabpanel">
            <button class="btn  btn-circle w3-theme-action" id="btn_kato_new"><i class="fa fa-plus" style="color: white; "></i></button>
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
        <div class="tab-pane fade" id="parasep" name="parasep" role="tabpanel">
            <button class="btn  btn-circle w3-theme-action" id="btn_kato_new"><i class="fa fa-plus" style="color: white; "></i></button>
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
        <div class="tab-pane fade" id="fect" name="fect" role="tabpanel">
            test4
        </div>
        <div class="tab-pane fade" id="urine" name="urine" role="tabpanel">
            test5
        </div>
        <div class="tab-pane fade" id="behavior" name="behavior" role="tabpanel">
            <button class="btn  btn-circle w3-theme-action" id="btn_behavior_new"><i class="fa fa-plus" style="color: white; "></i></button>
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
                foreach($answer_behavior as $a){
                    $a['approve']==1?$approve=' disabled':$approve='';
                    echo "<tr><td>$no</td><td>".to_thai_date_short($a['vdate'])."</td><td>".get_provider($a['provider'])."</td><td>";
                    echo "<div class='btn-group btn-group-sm pull-right' role='group' aria-label='Basic example'>
                            <a  href='".site_url()."/behavior/behavior/".$a['cid']."/".$a['id']."/view' data-btn= 'view_demo' data-id='".$a['id']."' type='button' class='btn btn-secondary btn-info'><i class='fa fa-eye'></i></a>
                            <a  href='".site_url()."/behavior/behavior/".$a['cid']."/".$a['id']."' data-btn= 'edit_demo' data-id='".$a['id']."' type='button' class='btn btn-secondary btn-warning $approve'><i class='fa fa-eye'></i></a>
                            <a  data-btn='del_behavior' data-id='".$a['id']."' type='button' class='btn btn-secondary btn-danger $approve'><i class='fa fa-times'></i></a>
                            </div>";
                    echo "</td></tr>";
                    $no++;
                }
                ?>
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="treatments" name="treatments" role="tabpanel">
            test7
        </div>
        <div class="tab-pane fade" id="cca" name="cca" role="tabpanel">
            <button class="btn  btn-circle w3-theme-action" id="btn_cca_new"><i class="fa fa-plus" style="color: white; "></i></button>
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
    </div>
</div>
<script src="<?php echo base_url()?>assets/apps/js/individual.js" charset="utf-8"></script>
 
 