<?php
displayPageHeader('Customer List | ' . WEB_NAME);
displayMainNavigation('conversation');
 ?>
 <div class="">
   <h1>Conversation</h1>
   <ul id="user-lists"></ul>
   <div id="user_model_details"></div>
 </div>
 <form method="post" id="image-form" enctype="multipart/form-data" >
   <input type="file" name="file" class="file">
   <button type="button" class="browse btn btn-primary">Browse...</button>
 </form>
<script>
  var ADMIN_ID = <?php echo $_SESSION['merchant_admin_account']->getValue('id') ?>;
</script>
<script src="<?php echo FILE_URL ?>/scripts/conversation.js" charset="utf-8"></script>
<?php
displayPageFooter();
?>
