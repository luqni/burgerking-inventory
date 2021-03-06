<!-- Sidebar -->
<ul class="sidebar navbar-nav">

<img style="display: block;margin-top: 20px;margin-left: auto;margin-right: auto;width: 50%;" src="<?php echo base_url('assets/img/burger-king.png') ?>" rel="stylesheet" alt="logo" width="90" height="100">
<h4 style="color:white;" align="center">BELLAGIO</h4> 
    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'products' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Inventory</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/siswa') ?>">Daily</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/siswa/monthly') ?>">Monthly</a>
            <!-- <a class="dropdown-item" href="<?php echo site_url('admin/siswa') ?>">Monthly</a> -->
        </div>
    </li>
    <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin/transfer') ?>">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Transfer</span>
        </a>
    </li>
    <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin/waste') ?>">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Waste</span>
        </a>
    </li>
    <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin/barang') ?>">
            <i class="fas fa-fw fa-boxes"></i>
            <span>List Barang</span>
        </a>
    </li>
    <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin/cabang') ?>">
            <i class="fas fa-fw fa-boxes"></i>
            <span>List Cabang</span>
        </a>
    </li>
    <!-- <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-users"></i>
            <span>Users</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-cog"></i>
            <span>Settings</span></a>
    </li> -->
</ul>
