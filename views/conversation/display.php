<?php
displayPageHeader('Customer List | ' . WEB_NAME);
displayMainNavigation('conversation');
 ?>
 <div class="wp-conversation-container">
 	<h1>Conversation</h1>
 	<div class="wp-conversation-list">
	   <ul id="user-lists"></ul>
	</div>
   <div id="user_model_details"></div>
 </div>
<script>
  var ADMIN_ID = <?php echo $_SESSION['merchant_admin_account']->getValue('id') ?>;
</script>
<script src="<?php echo FILE_URL ?>/scripts/conversation.js" charset="utf-8"></script>
<?php
displayPageFooter();
?>
