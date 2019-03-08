<script src="<?php echo base_url()?>assets/vendor/js/jquery.dataTables.min.js" charset="utf-8"></script>
<script src="<?php echo base_url()?>assets/vendor/js//dataTables.bootstrap4.min.js" charset="utf-8"></script>
<link href="<?php echo base_url()?>assets/vendor/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<html>
<body>
<br>
<div class="row">
    <div class="panel panel-info ">
        <div class="panel-heading w3-theme">
            <i class="fa fa-user fa-2x "></i> จัดการข้อมูลผู้ใช้งาน
            <span><button class="btn btn-success pull-right" data-toggle="modal" data-target="#importPersonModal"> <i class="fa fa-plus-circle"></i> ลงทะเบียนกลุ่มเป้าหมาย</button></span>

        </div>
        <div class="panel-body">

            <table id="person_data" class="table table-responsive">
                <thead>
                <tr>
                    <th width="10%">CID</th>
                    <th width="35%">ชื่อ สกุล</th>
                    <th width="25%">วันเดือนปี เกิด</th>
                    <th width="10%">อายุ</th>
                    <th>วันรับบริการ</th>
                    <th>ผลการตรวจ</th>
                    <th>view</th>
                </tr>
                </thead>
            </table>
        </div>

    </div>

</div>


<!--##import Modal##-->

<div class="modal fade" id="importPersonModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="trues">

    <div class="modal-dialog" role="document" style="width:1000px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-search "></i> ค้นหากลุ่มเป้าหมาย
                    <div class="form-inline">
                        <input type="text" class="form-control" placeholder="ค้นหา ด้วย ชื่อ-สกุลหรือเลขบัตรประชาชน" id="txt_search" style="width: 400px;">

                        <button class="btn btn-info btn-sm " id="btn_search"><i class="fa fa-search"></i> ค้นหา</button>
                    </div>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <table class="table table-responsive" id="tbl_search_result">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>ชื่อ สกุล</th>
                            <th>เลขบัตรประชาชน</th>
                            <th>วัน เดือน ปี เกิด </th>
                            <th>วันรับบริการ</th>
                            <th>ผลการตรวจ</th>
                            <th>อายุ</th>
                            <th>
                                view
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td colspan="4">.....</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!--## End import Modal##-->


</body>
</html>

<script src="<?php echo base_url()?>assets/apps/js/demo_person_list.js" charset="utf-8"></script>