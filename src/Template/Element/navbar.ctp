<nav class="navbar navbar-static-top" role="navigation">
    
    <!-- Sidebar toggle button -->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
        
        <ul class="nav navbar-nav">
            <?php
                //echo $this->element('Navbar/messages');
                //echo $this->element('Navbar/notifications');
                //echo $this->element('Navbar/tasks');
                echo $this->element('Navbar/user');
            ?>
        </ul>
        
    </div>
</nav>
