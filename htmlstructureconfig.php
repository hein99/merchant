<?php
function displayPageHeader($page_title, $dir_level=false)
{?>
  <!DOCTYPE html>
  <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title><?php echo $page_title ?></title>
      <link rel="stylesheet" href="<?php echo FILE_URL ?>/styles/reset.css">
      <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
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
      <a href="<?php echo URL ?>/">
        <img src="<?php echo FILE_URL ?>/logos/globe-solid.png"/><span>The Best Shop</span>
      </a>
    </div>
    <div class="ky-user-container">
      <div class="ky-user-content">
        <i class="fas fa-user-circle"></i>
          <span>Swe Swe Nyein</span>
        <i class="fas fa-caret-down"></i>
      </div>
      <div class="ky-logout-dropdown-menu">
        <a href="<?php echo URL ?>/settings">Account settings</a><a href="<?php echo URL ?>/settings/logout">Log out<i class="fas fa-arrow-right"></i></a>
      </div>
    </div>
  </header>
  <nav>
    <div class="ky-sidemenu-list">
        <a <?php echo ($active_page == 'dashboard') ? '' : 'href="' . URL . '/dashboard/"' ?>>
          <li class="<?php echo ($active_page == 'dashboard') ? "active" : "" ?>">
            <span>
              <i class="fas fa-th-large"></i>Dashboard
            </span>
          </li>
        </a>
        <a <?php echo ($active_page == 'customer') ? '' : 'href="' . URL . '/customer/"' ?>>
          <li class="<?php echo ($active_page == 'customer') ? "active" : "" ?>">
            <span>
              <i class="fas fa-users"></i>Customers
            </span>
          </li>
        </a>
        <a <?php echo ($active_page == 'order') ? '' : 'href="' . URL . '/order/"' ?>>
          <li class="<?php echo ($active_page == 'order') ? "active" : "" ?>">
            <span>
              <i class="fas fa-shapes"></i>Orders
            </span>
          </li>
        </a>
        <a <?php echo ($active_page == 'membership') ? '' : 'href="' . URL . '/membership/"' ?>>
          <li class="<?php echo ($active_page == 'membership') ? "active" : "" ?>">
            <span>
              <i class="fas fa-medal"></i>Memberships
            </span>
          </li>
        </a>
        <a <?php echo ($active_page == 'conversation') ? '' : 'href="' . URL . '/conversation/"' ?>>
          <li class="<?php echo ($active_page == 'conversation') ? "active" : "" ?>">
            <span>
              <i class="fas fa-comments"></i>Conversations
            </span>
          </li>
        </a>
        <a <?php echo ($active_page == 'settings') ? '' : 'href="' . URL . '/settings/"' ?>>
          <li class="<?php echo ($active_page == 'settings') ? "active" : "" ?>">
            <span>
              <i class="fas fa-cog"></i>Settings
            </span>
          </li>
        </a>
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
