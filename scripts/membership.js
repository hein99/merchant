$(document).ready(function() {

  $('.percentage-text-js').prop("disabled", true);
  $('.definition-text-js').prop("disabled", true);
  $('.btn-edit-percentage-js').show();
  $('.btn-save-percentage-js').hide();

  $('.btn-edit-text-js').show();
  $('.btn-gp-save-text-js').hide();

  $(document).on('click', '.btn-edit-percentage-js', function(){
    var parent = $(this).parent();
    $(this).hide();
    $('.btn-save-percentage-js', parent).show();
    $('.percentage-text-js', parent).prop("disabled", false);
    $('.percentage-text-js', parent).focus();
  });

  $(document).on('click', '.btn-save-percentage-js', function(){
    var parent = $(this).parent();
    $(this).hide();
    $('.btn-edit-percentage-js', parent).show();
    $('.percentage-text-js', parent).prop("disabled", true);

    var id = $('.percentage-text-js', parent).data('id');
    var percentage = $('.percentage-text-js', parent).val();
    editPercentRequest(id, percentage);
  });

  $(document).on('click', '.btn-edit-text-js', function(){
    var body_parent = $(this).parent().parent().prev();
    var footer_parent = $(this).parent().parent();
    $(this).hide();
    $('.btn-gp-save-text-js', footer_parent).show();
    $('.definition-text-js', body_parent).prop("disabled", false);
    $('.definition-text-js', body_parent).addClass("animate");
    $('.definition-text-js', body_parent).focus();
  });

  $(document).on('click', '.btn-cancel-text-js', function(){
    var body_parent = $(this).parent().parent().prev();
    var footer_parent = $(this).parent().parent();
    $('.btn-gp-save-text-js', footer_parent).hide();
    $('.btn-edit-text-js', footer_parent).show();
    $('.definition-text-js', body_parent).prop("disabled", true);
    $('.definition-text-js', body_parent).removeClass("animate");
  });

  $(document).on('click', '.btn-save-text-js', function(){
    var body_parent = $(this).parent().parent().prev();
    var footer_parent = $(this).parent().parent();
    $('.btn-gp-save-text-js', footer_parent).hide();
    $('.btn-edit-text-js', footer_parent).show();
    $('.definition-text-js', body_parent).prop("disabled", true);
    $('.definition-text-js', body_parent).removeClass("animate");

    var id = $('.definition-text-js', body_parent).data('id');
    var definition = $('.definition-text-js', body_parent).val();
    editDefinitionRequest(id, definition);
  });
});

function editPercentRequest(id, percentage)
{
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
