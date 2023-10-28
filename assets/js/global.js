// Initialize popovers
const popoverElements = document.querySelectorAll('[data-bs-toggle="popover"]');

for (const popover of popoverElements) {
  new bootstrap.Popover(popover); // eslint-disable-line no-new
}

// Initialize tooltips
const tooltipElements = document.querySelectorAll('[data-bs-toggle="tooltip"]');

for (const tooltip of tooltipElements) {
  new bootstrap.Tooltip(tooltip); // eslint-disable-line no-new
}

function blockUI() {
  document.getElementById("spinnerOverlay").style.display = "flex";
}

// Función para ocultar el spinner
function unblockUI() {
  document.getElementById("spinnerOverlay").style.display = "none";
}

const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 5000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
});

async function removeAlert() {
  var alert = document.querySelector('.alert-dismissible');
  if (alert) {
    alert.remove();
  }
}

function timerRemove() {
  setTimeout(() => {
    removeAlert();
  }, 3000);
}

async function alertError(content) {
  await removeAlert();
  const alertContainer = document.getElementById('alert');
  const alertError = document.createElement('div');
  alertError.classList.add('alert', 'alert-dismissible', 'alert-danger');
  alertError.innerHTML = `
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <i class="fa-solid fa-circle-xmark"></i> <strong>Ouh!</strong> ` + content;

  alertContainer.appendChild(alertError);
  timerRemove();
}

async function alertSuccess(content) {
  await removeAlert();
  const alertContainer = document.getElementById('alert');
  const alertSuccess = document.createElement('div');
  alertSuccess.classList.add('alert', 'alert-dismissible', 'alert-success');
  alertSuccess.innerHTML = `
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <i class="fa-solid fa-circle-check"></i>  <strong>Todo en orden!</strong> ` + content;
  
  alertContainer.appendChild(alertSuccess);
  timerRemove();
}

async function alertInfo(content) {
  await removeAlert();
  const alertContainer = document.getElementById('alert');
  const alertInfo = document.createElement('div');
  alertInfo.classList.add('alert', 'alert-dismissible', 'alert-primary');
  alertInfo.innerHTML = `
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <i class="fa-solid fa-circle-exclamation"></i> <strong>Cuidado!</strong> ` + content;

  alertContainer.appendChild(alertInfo);
  timerRemove();
}

$(window).scroll(function() {
  if ($(this).scrollTop() > 100) {
    $('#back-to-top').fadeIn();
  } else {
    $('#back-to-top').fadeOut();
  }
});

// Desplaza la página al principio cuando se hace clic en el botón "Back to Top"
$('#back-to-top').click(function() {
  $('html, body').animate({ scrollTop: 0 }, 800);
  return false;
});