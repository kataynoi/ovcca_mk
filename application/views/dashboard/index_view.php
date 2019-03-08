<div class="row" style="padding-top: 20px">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge" id="percent_audit"><?php echo $count_demo;?></div>
                        <div>Demographic Information</div>
                    </div>
                </div>
            </div>
            <a href="<?php echo site_url('/demographic/')?>">
                <div class="panel-footer">
                    <span class="pull-left">รายละเอียด</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-tasks fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge" id="percent_audit_true"><?php echo $count_kato; ?></div>
                        <div>OV-01K (Kato-Katz)</div>
                    </div>
                </div>
            </div>
            <a href="<?php echo site_url('/kato/')?>">
                <div class="panel-footer">
                    <span class="pull-left">รายละเอียด</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-shopping-cart fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $count_behavior;?></div>
                        <div>OV-02  แบบเก็บข้อมูลพฤติกรรม</div>
                    </div>
                </div>
            </div>
            <a href="<?php echo site_url('/behavior/')?>">
                <div class="panel-footer">
                    <span class="pull-left">รายละเอียดเพิ่มเติม</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-tasks fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $count_cca;?></div>
                        <div>CCA-02 อัลตร้าซาวด์</div>
                    </div>
                </div>
            </div>
            <a href="<?php echo site_url('/cca/')?>">
                <div class="panel-footer">
                    <span class="pull-left">รายละเอียดเพิ่มเติม</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>

<h3><label>สถานะข้อมูลล่าสุด</label></h3>
<div class="row">
    <table class="table table-responsive-lg">
        <thead>
        <tr class="text-center">
            <th rowspan="2" class="text-center">รายการ</th>
            <th rowspan="2" class="text-center">ทั้งหมด</th>
            <th colspan="4" class="text-center">หน่วยบริการนี้</th>
        </tr>
        <tr class="text-center">
            <th class="text-center">ทั้งหมด</th>
            <th class="text-center">ปีนี้</th>
            <th class="text-center">เดือนนี้</th>
            <th class="text-center">สัปดาห์นี้</th>
        </tr>

        </thead>
        <tbody>
            <tr>
                <td class="">1. Demographic Information</td>
                <td class="text-center"><?php echo $count_demo;?></td>
                <td class="text-center"><?php echo $count_demo;?></td>
                <td class="text-center"><?php echo $count_demo;?></td>
                <td class="text-center"><?php echo $count_demo;?></td>
                <td class="text-center"><?php echo $count_demo;?></td>

            </tr>
            <tr>
                <td class="">2. OV-01K (Kato-Katz)</td>
                <td class="text-center"><?php echo $count_kato;?></td>
                <td class="text-center"><?php echo $count_kato;?></td>
                <td class="text-center"><?php echo $count_kato;?></td>
                <td class="text-center"><?php echo $count_kato;?></td>
                <td class="text-center"><?php echo $count_kato;?></td>
            </tr>
            <tr>
                <td class="">3. OV-02  แบบเก็บข้อมูลพฤติกรรมและปัจจัยที่เกี่ยวข้อง</td>
                <td class="text-center"><?php echo $count_behavior;?></td>
                <td class="text-center"><?php echo $count_behavior;?></td>
                <td class="text-center"><?php echo $count_behavior;?></td>
                <td class="text-center"><?php echo $count_behavior;?></td>
                <td class="text-center"><?php echo $count_behavior;?></td>
            </tr>
            <tr>
                <td class="">4. CCA-02 อัลตร้าซาวด์</td>
                <td class="text-center"><?php echo $count_cca;?></td>
                <td class="text-center"><?php echo $count_cca;?></td>
                <td class="text-center"><?php echo $count_cca;?></td>
                <td class="text-center"><?php echo $count_cca;?></td>
                <td class="text-center"><?php echo $count_cca;?></td>
            </tr>
        </tbody>
    </table>
</div>