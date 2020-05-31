<?php
displayPageHeader('Customer List | ' . WEB_NAME);
displayMainNavigation('customer');
 ?>
<div class="wp-customer-page-container">
  <div class="wp-customer-page-header">
    <div class="wp-customer-count-container">
      <span>Customers</span>
      <div id="wp-customer-count"><i id="customer-count-js"></i>&nbsp;Total</div>
      <span id="user-plus-icon"><i class="fas fa-user-plus"></i></span>
    </div>

    <div class="wp-customer-ac-de-buttons">
      <button type="button" name="button" id="btn-activate-js">Activate</button>
      <button type="button" name="button" id="btn-deactivate-js">Deactivate</button>
    </div>

    <div id="extra"></div>
  </div>

  <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
 
  <div class="wp-customer-table">
    <table id="tb-activate-js">
      <thead>
        <tr>
          <th>Membership</th>
          <th>Customer ID</th>
          <th>Customer Name</th>
          <th>Phone no.</th>
          <th>Balance</th>
          <th>Created Date</th>
          <th>Activate/Deactivate</th>
        </tr>
      </thead>
    </table>

    <table id="tb-deactivate-js">
      <thead>
        <tr>
          <th>Membership</th>
          <th>Customer ID</th>
          <th>Customer Name</th>
          <th>Phone no.</th>
          <th>Balance</th>
          <th>Created Date</th>
          <th>Activate/Deactivate</th>
        </tr>
      </thead>
    </table>
  </div>

  <div class="wp-membership-logo">
    <svg width="159" height="202" viewBox="0 0 159 202" fill="none" xmlns="http://www.w3.org/2000/svg">
      <g clip-path="url(#clip0)">
        <path d="M40.2142 146.738C36.616 143.221 38.4917 144.213 29.813 141.943C25.8753 140.911 22.4138 138.928 19.2835 136.553L0.497688 181.565C-1.32003 185.923 2.07525 190.657 6.88661 190.479L28.7033 189.666L43.7088 205.155C47.0213 208.571 52.8347 207.506 54.6524 203.148L76.2041 151.508C71.7157 153.952 66.7346 155.385 61.5837 155.385C53.5096 155.385 45.924 152.314 40.2142 146.738ZM158.502 181.565L139.716 136.553C136.586 138.932 133.125 140.911 129.187 141.943C120.463 144.225 122.376 143.229 118.786 146.738C113.076 152.314 105.486 155.385 97.4122 155.385C92.2613 155.385 87.2802 153.948 82.7918 151.508L104.343 203.148C106.161 207.506 111.979 208.571 115.287 205.155L130.297 189.666L152.113 190.479C156.925 190.657 160.32 185.919 158.502 181.565ZM108.898 137.581C115.225 131.289 115.95 131.831 124.959 129.431C130.711 127.898 135.207 123.426 136.748 117.705C139.845 106.213 139.042 107.601 147.493 99.1925C151.703 95.0045 153.347 88.8985 151.807 83.1769C148.714 71.6932 148.71 73.2956 151.807 61.7998C153.347 56.0782 151.703 49.9722 147.493 45.7842C139.042 37.3758 139.845 38.7596 136.748 27.2719C135.207 21.5503 130.711 17.079 124.959 15.5455C113.416 12.4662 114.807 13.2714 106.348 4.85894C102.137 0.670918 95.9961 -0.967872 90.2448 0.565711C78.705 3.64097 80.3157 3.64502 68.7552 0.565711C63.0039 -0.967872 56.8634 0.666871 52.6525 4.85894C44.2015 13.2673 45.5928 12.4662 34.0447 15.5455C28.2934 17.079 23.7967 21.5503 22.2565 27.2719C19.1634 38.7596 19.9626 37.3758 11.5116 45.7842C7.30067 49.9722 5.65271 56.0782 7.19715 61.7998C10.2902 73.2754 10.2943 71.673 7.19715 83.1728C5.65685 88.8944 7.30067 95.0004 11.5116 99.1925C19.9626 107.601 19.1593 106.213 22.2565 117.705C23.7967 123.426 28.2934 127.898 34.0447 129.431C43.3113 131.9 44.0028 131.511 50.1019 137.581C55.5799 143.031 64.1136 144.006 70.6971 139.936C73.3298 138.302 76.3837 137.435 79.5021 137.435C82.6204 137.435 85.6744 138.302 88.307 139.936C94.8864 144.006 103.42 143.031 108.898 137.581ZM40.4378 71.2036C40.4378 49.7456 57.9276 32.3501 79.5 32.3501C101.072 32.3501 118.562 49.7456 118.562 71.2036C118.562 92.6616 101.072 110.057 79.5 110.057C57.9276 110.057 40.4378 92.6616 40.4378 71.2036Z" fill="#C0BFDF"/>
      </g>
      <defs>
        <clipPath id="clip0">
          <rect width="159" height="202" fill="white"/>
        </clipPath>
      </defs>
    </svg>
    <span id="membership-level">S</span>
  </div>

</div>

<script src="<?php echo FILE_URL ?>/scripts/customer.js" charset="utf-8"></script>
<script src="<?php echo FILE_URL ?>/scripts/datatables.min.js" charset="utf-8"></script>
<?php
displayPageFooter();
?>
