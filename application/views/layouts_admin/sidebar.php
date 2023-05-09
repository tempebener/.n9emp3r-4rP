<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="" class="brand-link text-center">
    <!-- <img src="<?php echo base_url(); ?>assets/adminlte3/dist/img/AdminLTELogo.png"
         alt="AdminLTE Logo"
         class="brand-image img-circle elevation-3"
         style="opacity: .8"> -->
    <span class="brand-text font-weight-light"><?php echo $company_profile['initial']; ?></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?php echo base_url(); ?>assets/bulkapp/img/user.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?php echo $nama; ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Dashboard -->
        <li class="nav-item">
          <a href="<?php echo base_url('dashboard'); ?>" class="nav-link <?php if ($page == 'dashboard') echo " active";  ?>">
            <!-- <i class="nav-icon fas fa-tachometer-alt"></i> -->
            <i class="nav-icon fa fa-home"></i>
            <p>
              Home
            </p>
          </a>
        </li>

        <!-- Bank Soal -->
        <!-- <li class="nav-item has-treeview <?php if ($page == 'bank_soal') echo "menu-open";  ?>">
          <a href="#" class="nav-link <?php if ($page == 'bank_soal') echo "active";  ?>">
            <i class="nav-icon fas fa-question-circle"></i>
            <p>
              Data Bank Soal
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <?php
            $kategoriSoal = $this->db->get('tbl_kategori_soal')->result_array(); 
           ?> -->
          <!-- Side Menu Kategori Soal -->
          <!-- <?php foreach ($kategoriSoal as $menu): ?>
            <?php 
                  $idKategoriSoal = $menu['id'];
                  //Segment idKategoriSoal ---- 'banksoal/index/'.$idKategoriSoal
                  $url = $this->uri->segment(3);
            ?>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('banksoal/index/'.$idKategoriSoal); ?>" class="nav-link <?php if ($idKategoriSoal == $url) echo "active";  ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p><?php echo $menu['singkatan']; ?></p>
                </a>
              </li>
            </ul>
          <?php endforeach ?>
        </li> -->

        <!-- Purchasing -->
        <li class="nav-item has-treeview <?php if ($page == 'purchasing') echo "menu-open";  ?>">
          <a href="#" class="nav-link <?php if ($page == 'purchasing') echo "active";  ?>">
            <i class="nav-icon fas fa-shopping-cart"></i>
            <p>
              Purchasing
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item submenu-custom">
              <a href="<?php echo base_url('purchasing/purchase_advance'); ?>" class="nav-link <?php if ($page == 'purchasing/purchase_advance') echo "active";  ?> disabled">
                <i class="far fa-circle fa-sm"></i>
                <p>
                  Purchase Advance
                </p>
              </a>
            </li>
            <li class="nav-item submenu-custom">
              <a href="<?php echo base_url('purchasing/purchase_order'); ?>" class="nav-link <?php if ($page == 'purchasing/purchase_order') echo "active";  ?> disabled">
                <i class="far fa-circle fa-sm"></i>
                <p>
                  Purchase Order
                </p>
              </a>
            </li>
            <li class="nav-item submenu-custom">
              <a href="<?php echo base_url('purchasing/purchase_invoice'); ?>" class="nav-link <?php if ($page == 'purchasing/purchase_invoice') echo "active";  ?> disabled">
                <i class="far fa-circle fa-sm"></i>
                <p>
                  Purchase Invoice
                </p>
              </a>
            </li>
            <li class="nav-item submenu-custom">
              <a href="<?php echo base_url('purchasing/purchase_return'); ?>" class="nav-link <?php if ($page == 'purchasing/purchase_return') echo "active";  ?> disabled">
                <i class="far fa-circle fa-sm"></i>
                <p>
                  Purchase Return
                </p>
              </a>
            </li>
            <li class="nav-item submenu-custom">
              <a href="<?php echo base_url('purchasing/purchase_payment'); ?>" class="nav-link <?php if ($page == 'purchasing/purchase_payment') echo "active";  ?> disabled">
                <i class="far fa-circle fa-sm"></i>
                <p>
                  Purchase Payment
                </p>
              </a>
            </li>
            <li class="nav-item submenu-custom">
              <a href="<?php echo base_url('purchasing/payable_book'); ?>" class="nav-link <?php if ($page == 'purchasing/payable_book') echo "active";  ?> disabled">
                <i class="far fa-circle fa-sm"></i>
                <p>
                  Payable Book
                </p>
              </a>
            </li>
            <li class="nav-item submenu-custom">
              <a href="<?php echo base_url('purchasing/list_supplier'); ?>" class="nav-link <?php if ($page == 'purchasing/list_supplier') echo "active";  ?> disabled">
                <i class="far fa-circle fa-sm"></i>
                <p>
                  List Supplier
                </p>
              </a>
            </li>
          </ul>

        </li>

        <!-- Logistic -->
        <li class="nav-item has-treeview <?php if ($page == 'logistic') echo "menu-open";  ?>">
          <a href="#" class="nav-link <?php if ($page == 'logistic') echo "active";  ?>">
            <i class="nav-icon fas fa-boxes"></i>
            <p>
              Logistic
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item submenu-custom">
              <a href="<?php echo base_url('purchasing/purchase_advance'); ?>" class="nav-link <?php if ($page == 'purchasing/purchase_advance') echo "active";  ?> disabled">
                <i class="far fa-circle fa-sm"></i>
                <p>
                  Goods Receipt
                </p>
              </a>
            </li>
            <li class="nav-item submenu-custom">
              <a href="<?php echo base_url('purchasing/purchase_order'); ?>" class="nav-link <?php if ($page == 'purchasing/purchase_order') echo "active";  ?> disabled">
                <i class="far fa-circle fa-sm"></i>
                <p>
                  Re-Work
                </p>
              </a>
            </li>
            <li class="nav-item submenu-custom">
              <a href="<?php echo base_url('purchasing/purchase_invoice'); ?>" class="nav-link <?php if ($page == 'purchasing/purchase_invoice') echo "active";  ?> disabled">
                <i class="far fa-circle fa-sm"></i>
                <p>
                  Goods Issue
                </p>
              </a>
            </li>
            <li class="nav-item submenu-custom">
              <a href="<?php echo base_url('purchasing/purchase_return'); ?>" class="nav-link <?php if ($page == 'purchasing/purchase_return') echo "active";  ?> disabled">
                <i class="far fa-circle fa-sm"></i>
                <p>
                  Delivery Order
                </p>
              </a>
            </li>
            <li class="nav-item submenu-custom">
              <a href="<?php echo base_url('purchasing/purchase_payment'); ?>" class="nav-link <?php if ($page == 'purchasing/purchase_payment') echo "active";  ?> disabled">
                <i class="far fa-circle fa-sm"></i>
                <p>
                  Stock Opname
                </p>
              </a>
            </li>
            <li class="nav-item submenu-custom">
              <a href="<?php echo base_url('purchasing/payable_book'); ?>" class="nav-link <?php if ($page == 'purchasing/payable_book') echo "active";  ?> disabled">
                <i class="far fa-circle fa-sm"></i>
                <p>
                  Stock Monitoring
                </p>
              </a>
            </li>
            <li class="nav-item submenu-custom">
              <a href="<?php echo base_url('purchasing/list_supplier'); ?>" class="nav-link <?php if ($page == 'purchasing/list_supplier') echo "active";  ?> disabled">
                <i class="far fa-circle fa-sm"></i>
                <p>
                  List Material
                </p>
              </a>
            </li>
            <li class="nav-item submenu-custom">
              <a href="<?php echo base_url('purchasing/list_supplier'); ?>" class="nav-link <?php if ($page == 'purchasing/list_supplier') echo "active";  ?> disabled">
                <i class="far fa-circle fa-sm"></i>
                <p>
                  List Warehouse
                </p>
              </a>
            </li>
          </ul>

        </li>

        <!-- Production -->
        <li class="nav-item has-treeview <?php if ($page == 'production') echo "menu-open";  ?>">
          <a href="#" class="nav-link <?php if ($page == 'production') echo "active";  ?>">
            <i class="nav-icon fas fa-industry"></i>
            <p>
              Production
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item submenu-custom">
              <a href="<?php echo base_url('purchasing/purchase_advance'); ?>" class="nav-link <?php if ($page == 'purchasing/purchase_advance') echo "active";  ?> disabled">
                <i class="far fa-circle fa-sm"></i>
                <p>
                  Production
                </p>
              </a>
            </li>
            <li class="nav-item submenu-custom">
              <a href="<?php echo base_url('purchasing/purchase_order'); ?>" class="nav-link <?php if ($page == 'purchasing/purchase_order') echo "active";  ?> disabled">
                <i class="far fa-circle fa-sm"></i>
                <p>
                  List Farm
                </p>
              </a>
            </li>
            <li class="nav-item submenu-custom">
              <a href="<?php echo base_url('purchasing/list_supplier'); ?>" class="nav-link <?php if ($page == 'purchasing/list_supplier') echo "active";  ?> disabled">
                <i class="far fa-circle fa-sm"></i>
                <p>
                  List Pen
                </p>
              </a>
            </li>
            <li class="nav-item submenu-custom">
              <a href="<?php echo base_url('purchasing/list_supplier'); ?>" class="nav-link <?php if ($page == 'purchasing/list_supplier') echo "active";  ?> disabled">
                <i class="far fa-circle fa-sm"></i>
                <p>
                  List Formula
                </p>
              </a>
            </li>
          </ul>

        </li>

        <!-- Marketing -->
        <li class="nav-item has-treeview <?php if ($page == 'marketing') echo "menu-open";  ?>">
          <a href="#" class="nav-link <?php if ($page == 'marketing') echo "active";  ?>">
            <i class="nav-icon fas fa-poll-h"></i>
            <p>
              Marketing
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item submenu-custom">
              <a href="<?php echo base_url('purchasing/purchase_advance'); ?>" class="nav-link <?php if ($page == 'purchasing/purchase_advance') echo "active";  ?> disabled">
                <i class="far fa-circle fa-sm"></i>
                <p>
                  Sales Advance
                </p>
              </a>
            </li>
            <li class="nav-item submenu-custom">
              <a href="<?php echo base_url('purchasing/purchase_order'); ?>" class="nav-link <?php if ($page == 'purchasing/purchase_order') echo "active";  ?> disabled">
                <i class="far fa-circle fa-sm"></i>
                <p>
                  Sales Order
                </p>
              </a>
            </li>
            <li class="nav-item submenu-custom">
              <a href="<?php echo base_url('purchasing/purchase_invoice'); ?>" class="nav-link <?php if ($page == 'purchasing/purchase_invoice') echo "active";  ?> disabled">
                <i class="far fa-circle fa-sm"></i>
                <p>
                  Sales Invoice
                </p>
              </a>
            </li>
            <li class="nav-item submenu-custom">
              <a href="<?php echo base_url('purchasing/purchase_return'); ?>" class="nav-link <?php if ($page == 'purchasing/purchase_return') echo "active";  ?> disabled">
                <i class="far fa-circle fa-sm"></i>
                <p>
                  Sales Return
                </p>
              </a>
            </li>
            <li class="nav-item submenu-custom">
              <a href="<?php echo base_url('purchasing/purchase_payment'); ?>" class="nav-link <?php if ($page == 'purchasing/purchase_payment') echo "active";  ?> disabled">
                <i class="far fa-circle fa-sm"></i>
                <p>
                  Sales Discount
                </p>
              </a>
            </li>
            <li class="nav-item submenu-custom">
              <a href="<?php echo base_url('purchasing/payable_book'); ?>" class="nav-link <?php if ($page == 'purchasing/payable_book') echo "active";  ?> disabled">
                <i class="far fa-circle fa-sm"></i>
                <p>
                  Sales Netoff
                </p>
              </a>
            </li>
            <li class="nav-item submenu-custom">
              <a href="<?php echo base_url('purchasing/payable_book'); ?>" class="nav-link <?php if ($page == 'purchasing/payable_book') echo "active";  ?> disabled">
                <i class="far fa-circle fa-sm"></i>
                <p>
                  Sales Receipt
                </p>
              </a>
            </li>
            <li class="nav-item submenu-custom">
              <a href="<?php echo base_url('purchasing/payable_book'); ?>" class="nav-link <?php if ($page == 'purchasing/payable_book') echo "active";  ?> disabled">
                <i class="far fa-circle fa-sm"></i>
                <p>
                  Receivable Book
                </p>
              </a>
            </li>
            <li class="nav-item submenu-custom">
              <a href="<?php echo base_url('purchasing/list_supplier'); ?>" class="nav-link <?php if ($page == 'purchasing/list_supplier') echo "active";  ?> disabled">
                <i class="far fa-circle fa-sm"></i>
                <p>
                  List Customer
                </p>
              </a>
            </li>
            <li class="nav-item submenu-custom">
              <a href="<?php echo base_url('purchasing/list_supplier'); ?>" class="nav-link <?php if ($page == 'purchasing/list_supplier') echo "active";  ?> disabled">
                <i class="far fa-circle fa-sm"></i>
                <p>
                  List Salesman
                </p>
              </a>
            </li>
          </ul>

        </li>

        <!-- HR & GA -->
        <li class="nav-item has-treeview <?php if ($page == 'hrnga') echo "menu-open";  ?>">
          <a href="#" class="nav-link <?php if ($page == 'hrnga') echo "active";  ?>">
            <i class="nav-icon fas fa-sitemap"></i>
            <p>
              HR & GA
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item submenu-custom">
              <a href="<?php echo base_url('purchasing/purchase_advance'); ?>" class="nav-link <?php if ($page == 'purchasing/purchase_advance') echo "active";  ?> disabled">
                <i class="far fa-circle fa-sm"></i>
                <p>
                  Employee
                </p>
              </a>
            </li>
            <li class="nav-item submenu-custom">
              <a href="<?php echo base_url('purchasing/purchase_order'); ?>" class="nav-link <?php if ($page == 'purchasing/purchase_order') echo "active";  ?> disabled">
                <i class="far fa-circle fa-sm"></i>
                <p>
                  Fixed Asset
                </p>
              </a>
            </li>
          </ul>

        </li>

        <!-- Finance -->
        <li class="nav-item has-treeview <?php if ($page == 'finance') echo "menu-open";  ?>">
          <a href="#" class="nav-link <?php if ($page == 'finance') echo "active";  ?>">
            <i class="nav-icon fas fa-money-check-alt"></i>
            <p>
              Finance
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item submenu-custom">
              <a href="<?php echo base_url('purchasing/purchase_advance'); ?>" class="nav-link <?php if ($page == 'purchasing/purchase_advance') echo "active";  ?> disabled">
                <i class="far fa-circle fa-sm"></i>
                <p>
                  Bank Transaction
                </p>
              </a>
            </li>
            <li class="nav-item submenu-custom">
              <a href="<?php echo base_url('purchasing/purchase_order'); ?>" class="nav-link <?php if ($page == 'purchasing/purchase_order') echo "active";  ?> disabled">
                <i class="far fa-circle fa-sm"></i>
                <p>
                  Cast Transaction
                </p>
              </a>
            </li>
            <li class="nav-item submenu-custom">
              <a href="<?php echo base_url('purchasing/list_supplier'); ?>" class="nav-link <?php if ($page == 'purchasing/list_supplier') echo "active";  ?> disabled">
                <i class="far fa-circle fa-sm"></i>
                <p>
                  Bank Book
                </p>
              </a>
            </li>
            <li class="nav-item submenu-custom">
              <a href="<?php echo base_url('purchasing/list_supplier'); ?>" class="nav-link <?php if ($page == 'purchasing/list_supplier') echo "active";  ?> disabled">
                <i class="far fa-circle fa-sm"></i>
                <p>
                  Cash Book
                </p>
              </a>
            </li>
            <li class="nav-item submenu-custom">
              <a href="<?php echo base_url('purchasing/list_supplier'); ?>" class="nav-link <?php if ($page == 'purchasing/list_supplier') echo "active";  ?> disabled">
                <i class="far fa-circle fa-sm"></i>
                <p>
                  List Bank
                </p>
              </a>
            </li>
            <li class="nav-item submenu-custom">
              <a href="<?php echo base_url('purchasing/list_supplier'); ?>" class="nav-link <?php if ($page == 'purchasing/list_supplier') echo "active";  ?> disabled">
                <i class="far fa-circle fa-sm"></i>
                <p>
                  List Cash
                </p>
              </a>
            </li>
          </ul>

        </li>

        <!-- Accounting -->
        <li class="nav-item has-treeview <?php if ($page == 'accounting') echo "menu-open"; ?>">
          <a href="#" class="nav-link <?php if ($page == 'accounting') echo "active"; ?>">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Accounting
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item submenu-custom">
              <a href="<?php echo base_url('purchasing/purchase_advance'); ?>" class="nav-link <?php if ($page == 'purchasing/purchase_advance') echo "active";  ?> disabled">
                <i class="far fa-circle fa-sm"></i>
                <p>
                  Beginning Balance
                </p>
              </a>
            </li>
            <li class="nav-item submenu-custom">
              <a href="<?php echo base_url('purchasing/purchase_order'); ?>" class="nav-link <?php if ($page == 'purchasing/purchase_order') echo "active";  ?> disabled">
                <i class="far fa-circle fa-sm"></i>
                <p>
                  Journal
                </p>
              </a>
            </li>
            <li class="nav-item submenu-custom">
              <a href="<?php echo base_url('purchasing/purchase_invoice'); ?>" class="nav-link <?php if ($page == 'purchasing/purchase_invoice') echo "active";  ?> disabled">
                <i class="far fa-circle fa-sm"></i>
                <p>
                  General Ledger
                </p>
              </a>
            </li>
            <li class="nav-item submenu-custom">
              <a href="<?php echo base_url('purchasing/purchase_return'); ?>" class="nav-link <?php if ($page == 'purchasing/purchase_return') echo "active";  ?> disabled">
                <i class="far fa-circle fa-sm"></i>
                <p>
                  Profit Loss
                </p>
              </a>
            </li>
            <li class="nav-item submenu-custom">
              <a href="<?php echo base_url('purchasing/purchase_payment'); ?>" class="nav-link <?php if ($page == 'purchasing/purchase_payment') echo "active";  ?> disabled">
                <i class="far fa-circle fa-sm"></i>
                <p>
                  Balance Sheet
                </p>
              </a>
            </li>
            <li class="nav-item submenu-custom">
              <a href="<?php echo base_url('purchasing/payable_book'); ?>" class="nav-link <?php if ($page == 'purchasing/payable_book') echo "active";  ?> disabled">
                <i class="far fa-circle fa-sm"></i>
                <p>
                  List Chart of Account
                </p>
              </a>
            </li>
            <li class="nav-item submenu-custom">
              <a href="<?php echo base_url('purchasing/payable_book'); ?>" class="nav-link <?php if ($page == 'purchasing/payable_book') echo "active";  ?> disabled">
                <i class="far fa-circle fa-sm"></i>
                <p>
                  List Supplier
                </p>
              </a>
            </li>
            <li class="nav-item submenu-custom">
              <a href="<?php echo base_url('purchasing/payable_book'); ?>" class="nav-link <?php if ($page == 'purchasing/payable_book') echo "active";  ?> disabled">
                <i class="far fa-circle fa-sm"></i>
                <p>
                  List Customer
                </p>
              </a>
            </li>
            <li class="nav-item submenu-custom">
              <a href="<?php echo base_url('purchasing/list_supplier'); ?>" class="nav-link <?php if ($page == 'purchasing/list_supplier') echo "active";  ?> disabled">
                <i class="far fa-circle fa-sm"></i>
                <p>
                  List Material
                </p>
              </a>
            </li>
            <li class="nav-item submenu-custom">
              <a href="<?php echo base_url('purchasing/list_supplier'); ?>" class="nav-link <?php if ($page == 'purchasing/list_supplier') echo "active";  ?> disabled">
                <i class="far fa-circle fa-sm"></i>
                <p>
                  List Bank
                </p>
              </a>
            </li>
            <li class="nav-item submenu-custom">
              <a href="<?php echo base_url('purchasing/list_supplier'); ?>" class="nav-link <?php if ($page == 'purchasing/list_supplier') echo "active";  ?> disabled">
                <i class="far fa-circle fa-sm"></i>
                <p>
                  List Cash
                </p>
              </a>
            </li>
            <li class="nav-item submenu-custom">
              <a href="<?php echo base_url('purchasing/list_supplier'); ?>" class="nav-link <?php if ($page == 'purchasing/list_supplier') echo "active";  ?> disabled">
                <i class="far fa-circle fa-sm"></i>
                <p>
                  List Tax
                </p>
              </a>
            </li>
          </ul>

        </li>

        <!-- Helpdesk -->
        <li class="nav-item has-treeview <?php if ($page == 'datamember') echo "menu-open"; ?>">
          <a href="#" class="nav-link <?php if ($page == 'datamember') echo "active"; ?>">
            <i class="nav-icon fas fa-user-check"></i>
            <p>
              Helpdesk
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item submenu-custom">
              <a href="<?php echo base_url('datamember'); ?>" class="nav-link <?php if ($page == 'data_members') echo " active";  ?>">
                <i class="far fa-circle fa-sm"></i>
                <p>
                  Users
                </p>
              </a>
            </li>
          </ul>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>