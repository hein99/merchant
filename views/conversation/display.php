<?php
displayPageHeader('Customer List | ' . WEB_NAME);
displayMainNavigation('conversation');
 ?>
 <div class="">
   <h1>Conversation</h1>
   <ul id="user-lists"></ul>
   <div id="user_model_details"></div>
 </div>
<script type="text/javascript">
  var ADMIN_ID = <?php echo $_SESSION['merchant_admin_account']->getValue('id') ?>
</script>
<script src="<?php echo FILE_URL ?>/scripts/conversation.js" charset="utf-8"></script>
<?php
displayPageFooter();
?>
