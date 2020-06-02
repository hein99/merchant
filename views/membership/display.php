<?php
displayPageHeader('Membership | ' . WEB_NAME);
displayMainNavigation('membership');
 ?>
 <session id="ky-memberships-section"> <!-- cover all membership sessions -->
   <?php foreach($memberships as $membership) : ?>
     <div class="ky-membership-container"> <!-- cover each membership session  -->
       <div class="ky-membership-header"> <!-- header -->
         <div class="ky-membership-logo-container"> <!-- logo session -->
           <div class="ky-silver-icon">
             <i class="fas fa-award"></i><span>s</span>
           </div>
           <span><?php echo $membership->getValueEncoded('name') ?></span>
         </div>

         <div class="ky-percentage-container"> <!-- commission percentage -->
           <input type="text" value="<?php echo $membership->getValueEncoded('percentage') ?>" placeholder="2%" data-id="<?php echo $membership->getValueEncoded('id') ?>" class="percentage-text-js">
           <div><button type="button" class="btn-edit-percentage-js"><i class="fas fa-pen"></i></button></div>
           <button type="button" class="btn-save-percentage-js">Save</button>
         </div>
       </div>

       <!-- body -->
       <div class="">
         <textarea class="definition-text-js" data-id="<?php echo $membership->getValueEncoded('id') ?>"><?php echo $membership->getValueEncoded('definition') ?></textarea>
       </div>
       <div>
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
