
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Sales Member</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item <?php echo ($this->uri->segment(1) == 'team') ? 'active' : ''; ?>">
                <a class="nav-link" href="<?php echo base_url('team'); ?>">Teams</span></a>
            </li>
            <li class="nav-item <?php echo ($this->uri->segment(1) == 'member') ? 'active' : ''; ?>">
                <a class="nav-link" href="<?php echo base_url('member'); ?>">Members</a>
            </li>
            <li class="nav-item <?php echo ($this->uri->segment(1) == 'comment') ? 'active' : ''; ?>">
                <a class="nav-link" href="<?php echo base_url('comment'); ?>">Comments</a>
            </li>
        </ul>
    </div>
</nav>