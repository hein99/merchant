<?php
function displayPageHeader($page_title, $dir_level=false)
{?>
  <!DOCTYPE html>
  <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title><?php echo $page_title ?></title>
      <link rel="stylesheet" href="<?php echo FILE_URL ?>/styles/reset.css">
      <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.13.0/css/all.css'>
      <link rel="stylesheet" href="<?php echo FILE_URL ?>/styles/<?php echo $dir_level ? 'login.css' : 'config.css'?>">
      <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

      <script>window.jQuery || document.write('<script src="<?php echo FILE_URL ?>/scripts/jquery-3.4.1.min.js"><\/script>')</script>
      <script>
        var PAGE_URL = '<?php echo URL ?>';
        var PAGE_FILE_URL = '<?php echo FILE_URL ?>';
      </script>
    </head>
    <body>
  <?php
}

function displayMainNavigation($active_page='')
{?>
  <header>
    <div class="ky-logo-name-container">
      <a href="<?php echo URL ?>/"><img src="<?php echo FILE_URL ?>/logos/globe-solid.png"/></a><span>The Best Shop</span>
    </div>
    <div class="ky-user-container">
      <i class="fas fa-user-circle"></i><span>Swe Swe Nyein</span><i class="fas fa-caret-down"></i>
      <div>
        <div class="ky-logout-dropdown-menu">
          <a href="<?php echo URL ?>/settings">Account settings</a><a href="<?php echo URL ?>/settings/logout">Log out<i class="fas fa-arrow-right"></i></a>
        </div>
      </div>
    </div>
  </header>
  <nav>
    <div class="ky-sidemenu-list">
      <ul>
        <li class="<?php echo ($active_page == 'dashboard') ? "active" : "" ?>"><span><a <?php echo ($active_page == 'dashboard') ? '' : 'href="' . URL . '/dashboard/"' ?>><i class="fas fa-th-large"></i>Dashboard</a></span></li>
        <li class="<?php echo ($active_page == 'customer') ? "active" : "" ?>"><span><a <?php echo ($active_page == 'customer') ? '' : 'href="' . URL . '/customer/"' ?>><i class="fas fa-users"></i>Customers</a></span></li>
        <li class="<?php echo ($active_page == 'order') ? "active" : "" ?>"><span><a <?php echo ($active_page == 'order') ? '' : 'href="' . URL . '/order/"' ?>><i class="fas fa-shapes"></i>Orders</a></span></li>
        <li class="<?php echo ($active_page == 'membership') ? "active" : "" ?>"><span><a <?php echo ($active_page == 'membership') ? '' : 'href="' . URL . '/membership/"' ?>><i class="fas fa-medal"></i>Memberships</a></span></li>
        <li class="<?php echo ($active_page == 'conversation') ? "active" : "" ?>"><span><a <?php echo ($active_page == 'conversation') ? '' : 'href="' . URL . '/conversation/"' ?>><i class="fas fa-comments"></i>Conversations</a></span></li>
        <li class="<?php echo ($active_page == 'settings') ? "active" : "" ?>"><span><a <?php echo ($active_page == 'settings') ? '' : 'href="' . URL . '/settings/"' ?>><i class="fas fa-cog"></i>Settings</a></span></li>
      </ul>
    </div>
  </nav>
  <script src="<?php echo FILE_URL ?>/scripts/header.js"></script>
  <?php
}

function displayPageFooter()
{?>
    </body>
  </html>
  <?php
}

 ?>
