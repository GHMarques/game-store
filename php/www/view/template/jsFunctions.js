window.onload = function showModal(){
  var dialog = document.querySelector('dialog');
  var showModalButton = document.querySelector('.show-modal');
  if (! dialog.showModal) {
    dialogPolyfill.registerDialog(dialog);
  }
  if(showModalButton && dialog){
    showModalButton.addEventListener('click', function() {
      dialog.showModal();
    });
    dialog.querySelector('.close').addEventListener('click', function() {
      dialog.close();
    });
  }
  
}

function validate(form){
  var blnReturn = true;
  if(form.name.value.length === 0){
    document.getElementById("div-name").classList.add("is-invalid");
    form.name.setAttribute("required", '');
    blnReturn = false;
  }

  if(form.email.value.length === 0){
    document.getElementById("div-email").classList.add("is-invalid");
    form.email.setAttribute("required", '');
    blnReturn = false;
  }

  if(form.password.value.length === 0){
    document.getElementById("div-password").classList.add("is-invalid");
    form.password.setAttribute("required", '');
    blnReturn = false;
  }

  if(form.confirmPassword.value.length === 0){
    document.getElementById("div-confirm-password").classList.add("is-invalid");
    form.confirmPassword.setAttribute("required", '');
    blnReturn = false;
  } else if(form.confirmPassword.value !== form.password.value){
    document.getElementById("div-confirm-password").classList.add("is-invalid");
    form.confirmPassword.setAttribute("required", '');
    blnReturn = false;
  }

  if(form.birth.value.length === 0){
    document.getElementById("div-birth").classList.add("is-invalid");
    form.birth.setAttribute("required", '');
    blnReturn = false;
  }

  if(form.street.value.length === 0){
    document.getElementById("div-street").classList.add("is-invalid");
    form.street.setAttribute("required", '');
    blnReturn = false;
  }

  if(form.number.value.length === 0){
    document.getElementById("div-number").classList.add("is-invalid");
    form.number.setAttribute("required", '');
    blnReturn = false;
  }

  if(form.state.value.length === 0){
    document.getElementById("div-state").classList.add("is-invalid");
    form.state.setAttribute("required", '');
    blnReturn = false;
  }

  return blnReturn;
}