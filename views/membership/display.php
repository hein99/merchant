<?php
displayPageHeader('Membership | ' . WEB_NAME);
displayMainNavigation('membership');
 ?>
 <session class=""> <!-- cover all membership sessions -->
   <?php foreach($memberships as $membership) : ?>
     <div class=""> <!-- cover each membership session  -->
       <div class=""> <!-- header -->
         <div class=""> <!-- logo session -->
           <span><!-- logo --></span>
           <span><?php echo $membership->getValueEncoded('name') ?></span>
         </div>

         <div class=""> <!-- commission percentage -->
           <input type="text" value="<?php echo $membership->getValueEncoded('percentage') ?>" placeholder="2%" data-id="<?php echo $membership->getValueEncoded('id') ?>" class="percentage-text-js">
           <button type="button" class="btn-edit-percentage-js">Edit</button>
           <button type="button" class="btn-save-percentage-js">Save</button>
         </div>
       </div>

       <!-- body -->
       <div class="">
         <textarea class="definition-text-js" data-id="<?php echo $membership->getValueEncoded('id') ?>"><?php echo $membership->getValueEncoded('definition') ?></textarea>
         <button type="button" class="btn-edit-text-js">Edit</button>
         <div class="btn-gp-save-text-js"> <!-- Save and Canel buttons -->
           <button type="button" class="btn-save-text-js">Save</button>
           <button type="button" class="btn-cancel-text-js">Cancel</button>
         </div>
       </div>
     </div>
   <?php endforeach; ?>
 </session>
 <script src="<?php echo FILE_URL ?>/scripts/membership.js" charset="utf-8"></script>
<?php
displayPageFooter();
?>
