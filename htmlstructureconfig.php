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
    <div class="">
      <a href="<?php echo URL ?>/">Logo</a>
    </div>
    <div class="">
      <span><?php echo $_SESSION['merchant_admin_account']->getValueEncoded('username') ?> - </span><a href="<?php echo URL ?>/settings/logout"> Log Out</a>
    </div>
  </header>
  <section>
    <div class="">
      <ul>
        <li class="<?php echo ($active_page == 'dashboard') ? "active" : "" ?>"><a <?php echo ($active_page == 'dashboard') ? '' : 'href="' . URL . '/dashboard/"' ?>>Dashboard</a></li>
        <li class="<?php echo ($active_page == 'customer') ? "active" : "" ?>"><a <?php echo ($active_page == 'customer') ? '' : 'href="' . URL . '/customer/"' ?>>Customers</a></li>
        <li class="<?php echo ($active_page == 'order') ? "active" : "" ?>"><a <?php echo ($active_page == 'order') ? '' : 'href="' . URL . '/order/"' ?>>Orders</a></li>
        <li class="<?php echo ($active_page == 'membership') ? "active" : "" ?>"><a <?php echo ($active_page == 'membership') ? '' : 'href="' . URL . '/membership/"' ?>>Memberships</a></li>
        <li class="<?php echo ($active_page == 'conversation') ? "active" : "" ?>"><a <?php echo ($active_page == 'conversation') ? '' : 'href="' . URL . '/conversation/"' ?>>Conversations</a></li>
        <li class="<?php echo ($active_page == 'settings') ? "active" : "" ?>"><a <?php echo ($active_page == 'settings') ? '' : 'href="' . URL . '/settings/"' ?>>Settings</a></li>
      </ul>
    </div>
  </section>
  <?php
}

function displayPageFooter()
{?>
    </body>
  </html>
  <?php
}

 ?>
