<?php
displayPageHeader('Membership | ' . WEB_NAME);
displayMainNavigation('membership');
 ?>
 <session id="ky-memberships-section"> <!-- cover all membership sessions -->
   <?php foreach($memberships as $membership) : ?>
     <div class="ky-membership-container"> <!-- cover each membership session  -->
       <div class="ky-membership-header"> <!-- header -->
         <div class="ky-membership-logo-container"> <!-- logo session -->
           <?php echo chooseMembership($membership->getValueEncoded('id')) ?>
           <span><?php echo $membership->getValueEncoded('name') ?></span>
         </div>

         <div class="ky-percentage-container"> <!-- commission percentage -->
           <div class="ky-percentage-input-container"><input type="text" value="<?php echo $membership->getValueEncoded('percentage') ?>" placeholder="2" data-id="<?php echo $membership->getValueEncoded('id') ?>" class="percentage-text-js"></div>
           <div class="">%</div>
           <div  class="btn-edit-percentage-js"><button type="button" ><i class="fas fa-pen"></i></button></div>
           <div class="btn-save-percentage-js"><button type="button" ><i class="fas fa-check"></i></button></div>
         </div>
       </div>

       <!-- body -->
       <div class="ky-membership-body">
         <textarea class="definition-text-js" data-id="<?php echo $membership->getValueEncoded('id') ?>"><?php echo $membership->getValueEncoded('definition') ?></textarea>
       </div>
       <div class="ky-membership-body-footer">
         <div>
           <button type="button" class="btn-edit-text-js">Edit</button>
         </div>
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

function chooseMembership($membership_id)
{
  $membership_name = '';
  // change from membership id to membership name
  switch($membership_id)
  {
    case 1:
      $membership_name = ' <div class="ky-silver-icon">
         <i class="fas fa-award"></i></div>';
      break;

    case 2:
      $membership_name = '<div class="ky-gold-icon">
         <i class="fas fa-award"></i></div>';
      break;

    case 3:
      $membership_name = '<div class="ky-platinum-icon">
         <i class="fas fa-award"></i></div>';
      break;

    case 4:
      $membership_name = '<div class="ky-diamond-icon">
        <i class="fas fa-gem"></i>
       </div>';
      break;

    default:
      exit();
  }
  return $membership_name;
}
?>
