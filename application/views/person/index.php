<br>
    <div class="panel panel-default">
        <div class="panel-heading">
            รายชื่อกลุ่มเป้าหมาย
        </div>
        <div class="panel-body">
            <span><button class="btn btn-info pull-right" data-toggle="modal" data-target="#importPersonModal"> <i class="fa fa-plus-circle"></i> ลงทะเบียนกลุ่มเป้าหมาย</button></span>
            <div class="row">
                <table class="table table-responsive" id="tbl_person_list">

                    <thead>
                    <tr>
                    <th>#</th>
                    <th>เลขบัตรประชาชน</th>
                    <th>ชื่อสกุล</th>
                    <th>ที่อยู่</th>
                    <th>อายุ</th>
                    <th>การจัดการ</th>
                    </tr>
                    <tr>
                    <th>ค้นหา</th>
                    <th><input type="text" class="form-control" id="btn_cid_search" style="width: 200px;"></th>
                    <th><input type="text" class="form-control" id="btn_name_search" style="width: 200px;"></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                       <td colspan="4"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<!--Search Modal-->
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
                            <th>อายุ</th>
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

<!--End Search Modal-->
<!--// Person Modal-->
<div class="modal fade" id="PersonDetailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="trues">

    <div class="modal-dialog" role="document" style="width:1000px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-search "></i> Demogaphic Information (ข้อมูลทั่วไปผู้ป่วย)
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
                            <th>อายุ</th>
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

<div class="panel panel-info">
    <div class="panel-heading">
        Test
    </div>
    <div class="panel-body">
        <button class="btn btn-info" id="btn_test1"> Test1</button>
    </div>
</div>
<script src="<?php echo base_url()?>vendor/apps/js/person.index.js" charset="utf-8"></script>