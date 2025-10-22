function errorConstruction() {
  Swal.fire(
    'Ops',
    'Em desenvolvimento!',
    'warning'
  )
}

function readURL(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
          $('#imagePreview').css('background-image', 'url('+e.target.result +')');
          $('#imagePreview').hide();
          $('#imagePreview').fadeIn(650);
      }
      reader.readAsDataURL(input.files[0]);
  }
}
$("#imageUpload").change(function() {
  readURL(this);
});

//Função para ativar a edição de perfil
document.getElementById("editProfile").addEventListener("click", function() {
  descricao = document.querySelector("#description").textContent;
  $('#name').hide();
  $('#description').hide();
  $('h4').hide();
  $('#editProfile').hide();
  $('.profile-container').hide();
  $('.editableInputs').show();
  $('#saveEdit').show();
}); 

/*document.getElementById("saveEdit").addEventListener("click", function() {
  $('#name').show();
  $('#description').show();
  $('h4').show();
  $('#editProfile').show();
  $('.editableInputs').hide();
  $('#saveEdit').hide();
  Swal.fire(
    'Sucesso',
    'Alterações salvas com sucesso!',
    'success'
  )
});*/