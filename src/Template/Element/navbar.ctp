<nav class="navbar navbar-static-top" role="navigation">
    
    <!-- Sidebar toggle button -->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
        
        <ul class="nav navbar-nav">
            <?php
                echo $this->element('navbar/messages');
                echo $this->element('navbar/notifications');
                echo $this->element('navbar/tasks');
                echo $this->element('navbar/user');
            ?>
        </ul>
        
    </div>
</nav>
