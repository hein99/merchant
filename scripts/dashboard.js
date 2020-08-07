$(document).ready(function(){
  getTotalCustomersCount();
  getNewOrdersCount();
  getNewMessagesCount();

  setInterval(function(){
    getTotalCustomersCount();
    getNewOrdersCount();
    getNewMessagesCount();
  }, 3000);

  function getTotalCustomersCount()
  {
    $.ajax({
      url: PAGE_URL+'/customer/get_customers_count',
      method:"POST",
      success:function(data){
        $('#customers_count').html(data);
      }
    })
  }

  function getNewOrdersCount()
  {
    $.ajax({
      url: PAGE_URL+'/order/get_new_orders_count',
      method:"POST",
      success:function(data){
        $('#orders_count').html(data);
      }
    })
  }

  function getNewMessagesCount()
  {
    $.ajax({
      url: PAGE_URL+'/conversation/get_all_new_messages_count',
      method:"POST",
      success:function(data){
        $('#messages_count').html(data);
      }
    })
  }

  function changeExchangeRateAjax()
  {
    var mmk = $('#mmk-input-js').val();
    $.ajax({
      url: PAGE_URL+'/dashboard/created_exchange_rate',
      method:"POST",
      data: "mmk=" + mmk
    })
  }

  function changeFloatTextareaAjax()
  {
    var text = $('#float-textarea-js').val();
    $.ajax({
      url: PAGE_URL+'/dashboard/edit_float_text',
      method:"POST",
      data: {text: text}
    })
  }

  function displayPhotoEditForm(id, selectedObj)
  {
    var img_src = $('img', selectedObj).attr('src');
    var img_alt = $('img', selectedObj).attr('alt');
    $('#edit-image-link-form-js').show();
    $('#edit-img-js').attr('src', img_src);
    $('#edit-img-js').attr('alt', img_alt);
    $('input[type=hidden]').val(id);
    $('input[type=url]').focus();
  }

  function deletePhotoRequestAjax(id, toRemoveObj)
  {
    $.ajax({
      url: PAGE_URL+'/dashboard/delete_photo',
      method:"POST",
      data: {id: id},
      success:function(data){
        if(data == 'success')
        {
          toRemoveObj.remove();
        }
      }
    });
  }

  function createSortPhotos()
  {
    var title = $('<h1>').html('Sort Photos');

    var order_list = $('<ol>').sortable();

    $('.swiper-slide').each(function(){
      var id = $(this).data('id');
      var img = $('img', $(this)).clone();
      var new_list = $('<li>', {'data-id': id}).append(img).append('<i class="fas fa-sort"></i>');
      order_list.append(new_list);
    });

    var save_btn = $('<button>', {class: 'hk-save-btn'}).html('Save').click(function(){
      $('.hk-sort-photos-wrap>ol li').each(function(){
        var order_number = $('.hk-sort-photos-wrap>ol li').index(this);
        var id = $(this).data('id');
        order_number += 1;
        changePhotoOrderRequestAjax(id, order_number);
      });
      $('.hk-sort-photos-wrap').remove();
    });
    var close_btn = $('<button>', {class: 'button button--sacnite button--round-l hk-close-btn'}).html('<i class="fas fa-times"></i>').click(function(){
      $('.hk-sort-photos-wrap').remove();
    });
    $('<article>', {class: "hk-sort-photos-wrap"}).append(title).append(order_list).append(save_btn).append(close_btn).appendTo('.sn-grid-warpper');
  }

  function changePhotoOrderRequestAjax(id, order_number)
  {
    $.ajax({
      url: PAGE_URL+'/dashboard/edit_photo_order',
      method:"POST",
      data: {id: id, order_no: order_number}
    });
  }

  $('#customer-create-form-js').validate({
    rules: {
      username: {
        required: true,
        minlength: 2
      },
      password1: {
        required: true,
        minlength: 6
      },
      password2: {
        required: true,
        minlength: 6,
        equalTo: "#password1-js"
      },
      phone: {
        required: true,
        number: true
      },
      address: {
        required: true
      }
    }
  });

  $(document).on('click', '#edit-currency-rate-btn-js', function(){
    $('#mmk-input-js').prop('disabled', false).focus().select();
    $('#mmk-input-js').addClass("sn-edit-currency");
    $(this).hide();
    $('#save-currency-rate-btn-js').show();
  });
  $(document).on('click', '#save-currency-rate-btn-js', function(){
    $('#mmk-input-js').prop('disabled', true).blur();
    $('#mmk-input-js').removeClass("sn-edit-currency");
    $(this).hide();
    $('#edit-currency-rate-btn-js').show();
    changeExchangeRateAjax();
  });

  $(document).on('click', '#edit-float-text-btn-js', function(){
    $('#float-textarea-js').prop('disabled', false).focus().select();
    $('#float-textarea-js').addClass("sn-edit-text");
    $(this).hide();
    $('#save-float-text-btn-js').show();
  });
  $(document).on('click', '#save-float-text-btn-js', function(){
    $('#float-textarea-js').prop('disabled', true).blur();
    $('#float-textarea-js').removeClass("sn-edit-text");
    $(this).hide();
    $('#edit-float-text-btn-js').show();
    changeFloatTextareaAjax();
  });

  $(document).on('click', '.sort-photos-btn-js', function(){
    createSortPhotos();
  });


  $(".swiper-slide").hover(function(){
      var showEdit = jQuery(this).find('.sn-show-edit');
      $(showEdit).show();
    }, function(){
      var showEdit = jQuery(this).find('.sn-show-edit');
      $(showEdit).hide();
  });
  $(".sn-show-edit").click(function(){
      $(this).hide();
      var list = jQuery(this).parent().children('.sn-edit-list');
      $(list).show();
    });
  $(".sn-edit-list").hover(function(){
      var showEdit = jQuery(this).parent().children('.sn-show-edit');
      $(showEdit).hide();
      var list = jQuery(this).parent().children('.sn-edit-list');
      $(list).show();
    }, function(){
      var showEdit = jQuery(this).parent().children('.sn-show-edit');
      $(showEdit).show();
      var list = jQuery(this).parent().children('.sn-edit-list');
      $(list).hide();
  });

  $(document).on('click', '#sn-image-upload-js', function(){
    $('.sn-add-image-form').show();
  });
  $(document).on('click', '#sn-image-upload-close-js', function(){
    $('.sn-add-image-form').hide();
  });

  $(document).on('click', '.edit-link-js', function(){
    displayPhotoEditForm($(this).data('id'), $(this).parent().parent());
  });
  $(document).on('click', '#edit-image-link-close-js', function(){
    $('#edit-image-link-form-js').hide();
  });
  $(document).on('click', '.delete-photo-js', function(){
    if(confirm('Are you sure?'))
    {
      deletePhotoRequestAjax($(this).data('id'), $(this).parent().parent());
    }
  });

  $(document).on('change', '#uploadImageFile', function(e){
    var reader = new FileReader();
    reader.onload = function(e) {
      document.getElementById("preview").src = e.target.result;
    };
    reader.readAsDataURL(this.files[0]);
  });

  $(document).on('click', '#choose-photo-js', function(){
    $('#uploadImageFile').trigger('click');
  });

  var swiper = new Swiper('.swiper-container', {
    slidesPerView: 2,
    slidesPerColumn: 2,
    spaceBetween: 30,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });
});
