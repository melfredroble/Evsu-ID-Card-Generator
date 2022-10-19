    <div class="d-flex wrapper " id="wrapper">
            <!-- SideBar Menu -->
            <div class=" sidebar-wrapper">
                <div class="sidebar-header text-center py-4 fs-4 fw-bold text-uppercase">
                    Admin
                </div>
                <div class="list-group list-group-flush ">
                    <a href="?page=dashboard" class="list-group-item list-group-item-action bg-transparent text-light <?php if($_GET['page'] == dashboard){ echo 'active'; }  ?>">
                        <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                    </a>
                    <a href="?page=id_list" class="list-group-item list-group-item-action bg-transparent text-light <?php if($_GET['page'] == id_list){ echo 'active'; }  ?>">
                        <i class="fas fa-id-card me-2"></i>Generated ID list
                    </a>
                    <a data-bs-toggle='modal' href="#bulkprint" class="bulkprinting list-group-item list-group-item-action bg-transparent text-light ">
                        <i class="fas fa-print me-2"></i>Bulk printing
                    </a>
                    <a href="?page=request" class="list-group-item list-group-item-action bg-transparent text-light <?php if($_GET['page'] == request){ echo 'active'; }  ?> ">
                        <i class="fas fa-thumbtack me-2"></i>Request
                    </a>
                    <a href="?page=students" class="list-group-item list-group-item-action bg-transparent text-light <?php if($_GET['page'] == students){ echo 'active'; }  ?> ">
                        <i class="fas fa-users me-2"></i>Students
                    </a>
                    <a href="?page=admin" class="list-group-item list-group-item-action bg-transparent text-light ">
                        <i class="fas fa-user-secret me-2"></i>Admin
                    </a>
                    <a href="" class="list-group-item list-group-item-action bg-transparent text-light ">
                        <i class="fas fa-cogs me-2"></i>Settings
                    </a>
                </div>
            </div>
            <!-- End -->