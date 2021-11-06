function getPresencial() {
  $("#planRetornoTerminos").modal("open");
}

function registroPlan() {
  $("#planRetornoTerminos").modal("close");
  $("#planRetornoRegistro").modal("open");
}

function registroSuccess() {
  $("#planRetornoRegistro").modal("close");
  $("#registroSuccess").modal("open");
}

function confirmaVirtual() {
  $("#virtualConfirmacion").modal("open");
}

function getVirtual() {
  $("#virtualConfirmacion").modal("close");
  $("#virtualSuccess").modal("open");
}
