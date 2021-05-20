<div class="header">
    <div>
        <a href="index.php"><span class="logo-container">Agendix <i class="fas fa-calendar-alt"></i></span></a>
    </div>
    <ul class="link-header-container">

        <?php 
        if (isset($_SESSION['user'])) {
            ?>
        <li class="link-header-item">
            <a href="index.php"><i class="fas fa-home"></i></a>
        </li>
            <li class="link-header-item">
                <div class="tooltip">
            <div class="fas fa-user-circle"></div>
            <span class="tooltiptext">
            <?php echo $_SESSION['user_prenom'];?>
            </span>
            </div>
        </li>
        <li class="link-header-item">
            <a href="logout.php"><i class="fas fa-sign-out-alt"></i></a>
        </li>
        <?php
        }
        else{
        ?>
        <li class="link-header-item">
        <?php 
        $login ='login';
        $signup ='signup';
           echo " <a href=\"". (strpos($_SERVER['REQUEST_URI'],'signup.php') != false ? $login : $signup) .".php\">". (strpos($_SERVER['REQUEST_URI'],'signup.php') != false ? 'Connexion' : 'Inscription') ."</a>";
        ?>
        </li>
        <?php
        }
        ?>
    </ul>
</div>
