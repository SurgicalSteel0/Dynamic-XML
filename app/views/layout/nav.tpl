<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand new-page" href="home.php">Dynamic XML</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li {if ($location eq 'home')} class="active" {/if}>
                    <a class="hidden-sm new-page" href="home.php">
                        <span class="glyphicon glyphicon-home"></span> Home
                    </a>
                    <a class="hidden-lg hidden-md hidden-xs new-page" href="home.php">
                        <span class="glyphicon glyphicon-home"></span>
                    </a>
                </li>                
            </ul>
            <ul class="nav navbar-nav navbar-right">
                
                <li>
                    <a class="new-page" href="logout.php"><span class="glyphicon glyphicon-cog"></span> Settings</a>
                </li>
            </ul>
        </div>
    </div>
</nav>