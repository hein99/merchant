$(document).ready(function() {

  $('.btn-edit-percentage-js').show();
  $('.btn-save-percentage-js').hide();

  $('.btn-edit-text-js').show();
  $('.btn-gp-save-text-js').hide();

  $(document).on('click', '.btn-edit-percentage-js', function(){
    var parent = $(this).parent();
    $(this).hide();
    $('.btn-save-percentage-js', parent).show();
  });

  $(document).on('click', '.btn-save-percentage-js', function(){
    var parent = $(this).parent();
    $(this).hide();
    $('.btn-edit-percentage-js', parent).show();

    var id = $('.percentage-text-js', parent).data('id');
    var percentage = $('.percentage-text-js', parent).val();
    editPercentRequest(id, percentage);
  });

  $(document).on('click', '.btn-edit-text-js', function(){
    var parent = $(this).parent();
    $(this).hide();
    $('.btn-gp-save-text-js', parent).show();
  });

  $(document).on('click', '.btn-cancel-text-js', function(){
    var parent = $(this).parent().parent();
    $('.btn-gp-save-text-js', parent).hide();
    $('.btn-edit-text-js', parent).show();
  });

  $(document).on('click', '.btn-save-text-js', function(){
    var parent = $(this).parent().parent();
    $('.btn-gp-save-text-js', parent).hide();
    $('.btn-edit-text-js', parent).show();

    var id = $('.definition-text-js', parent).data('id');
    var definition = $('.definition-text-js', parent).html();
    editDefinitionRequest(id, definition);
  });



});

function editPercentRequest(id, percentage)
{
  console.log('id: ' + id + '<=>' + 'per: ' + percentage);
  $.ajax({
    method:"POST",
    url: PAGE_URL+'/membership/change_percentage',
    data: {id: id, percentage: percentage}
  })
}

function editDefinitionRequest(id, definition)
{
  $.ajax({
    method:"POST",
    url: PAGE_URL+'/membership/change_definition',
    data: {id: id, definition: definition}
  })
}
