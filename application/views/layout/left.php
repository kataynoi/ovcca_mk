<div class="sidebar w3-theme-l5" role="navigation" style="padding-top: 15px;margin-top: 54px">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="<?php echo site_url()?>"><i class="fa fa-dashboard"></i> Dashboard</a>
            </li>
            <li>
                <a href="<?php echo site_url('#')?>"><i class="fa fa-id-badge"></i> กลุ่มเป้าหมาย <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo site_url('person/')?>">กลุ่มเป้าหมาย</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('person/register_person')?>">ลงทะเบียนกลุ่มเป้าหมาย</a>
                    </li>

                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="<?php echo site_url('demographic/')?>"><i class="far fa-address-book"></i> บันทึกข้อมูล Demographic <span class="fa arrow"></span></a>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <!--http://localhost:8888/ovcca_mk/kato/kato/-->
                <a href="#"><i class="fa fa-flask"></i> บันทึกผลตรวจไข่พยาธิ<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo site_url('kato/')?>">บันทึกผลตรวจไข่พยาธิ</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <!--http://localhost:8888/ovcca_mk/kato/kato/-->
                <a href="#"><i class="fa fa-flask"></i>แบบเก็บข้อมูลพฤติกรรม<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo site_url('behavior/')?>">แบบเก็บข้อมูลพฤติกรรมและปัจจัยที่เกี่ยวข้อง</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-stethoscope fa-fw"></i> บันทึกผลตรวจ Ultrasound<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo site_url('cca/')?>">บันทึกผลตรวจ Ultrasound</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="<?php echo site_url('admin/login')?>"><i class="fa fa-user-secret fa-fw"></i> ผู้ใช้งานระบบ (สำหรับ Admin)</a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>