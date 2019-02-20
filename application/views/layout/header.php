

<div class="navbar-header w3-theme">
    <a class="navbar-brand w3-theme" href="<?php echo base_url()?>"><?php echo version();?>  </a>
    <a class="navbar-brand w3-theme"><?php echo $this->session->userdata('hosname')?>
    <?php echo " (".$this->session->userdata('fullname').":".$this->session->userdata('id').")"?></div></a>
<!-- /.navbar-header -->
<ul class="nav navbar-top-links navbar-right w3-theme">


    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-user">
            <li><a href="<?php echo site_url('user/user_profile/').$this->session->userdata('id')?>"><i class="fa fa-user fa-fw"></i> User Profile</a>
            </li>
            <li><a href="#"><i class="fa fa-cogs fa-fw"></i> Settings</a>
            </li>
            <li class="divider"></li>
            <li><a href="<?php echo site_url('user/logout')?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
            </li>
        </ul>
        <!-- /.dropdown-user -->
    </li>
    <!-- /.dropdown -->
</ul>
