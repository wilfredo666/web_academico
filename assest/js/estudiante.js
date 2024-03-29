function MNuevoEstudiante() {
  $("#modal-lg").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/estudiante/FNuevoEstudiante.php",
    data: obj,
    success: function (data) {
      $("#content-lg").html(data)
    }
  })
}

function RegEstudiante() {

  var formData = new FormData($("#FormRegEstudiante")[0])

  $.ajax({
    type: "POST",
    url: "controlador/estudianteControlador.php?ctrRegEstudiante",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (data) {

      if (data == "ok") {
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'El Estudiante ha sido registrado',
          timer: 1000
        })
        setTimeout(function () {
          location.reload()
        }, 1200)
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Error!',
          text: 'El Estudiante no puede ser registrado',
          showConfirmButton: false,
          timer: 1500
        })
      }
    }
  })
}


function MEditEstudiante(id) {
  $("#modal-lg").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/estudiante/FEditEstudiante.php?id=" + id,
    data: obj,
    success: function (data) {
      $("#content-lg").html(data)
    }
  })
}

function EditEstudiante() {

  var formData = new FormData($("#FormEditEstudiante")[0])

  $.ajax({
    type: "POST",
    url: "controlador/estudianteControlador.php?ctrEditEstudiante",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (data) {
      /* console.log(data) */
      if (data == "ok") {
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'El Estudiante ha sido actualizado',
          timer: 1000
        })
        setTimeout(function () {
          location.reload()
        }, 1200)
      } else {
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'El Estudiante ha sido actualizado',
          timer: 1000
        })
        setTimeout(function () {
          location.reload()
        }, 1200)
        /* Swal.fire({
          icon: 'error',
          title: 'Error!',
          text: 'No se ha podido actualizar!!!',
          showConfirmButton: false,
          timer: 1500
        }) */
      }
    }
  })
}

function MVerEstudiante(id) {
  $("#modal-lg").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/estudiante/MVerEstudiante.php?id=" + id,
    data: obj,
    success: function (data) {
      $("#content-lg").html(data)
    }
  })
}

function MEliEstudiante(id) {
  var obj = {
    id: id
  }

  Swal.fire({
    title: '¿Esta seguro de eliminar este Estudiante?',
    showDenyButton: true,
    showCancelButton: false,
    confirmButtonText: 'Confirmar',
    denyButtonText: 'Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        data: obj,
        url: "controlador/estudianteControlador.php?ctrEliEstudiante",
        success: function (data) {

          if (data == "ok") {
            Swal.fire({
              icon: 'success',
              showConfirmButton: false,
              title: 'Estudiante eliminado',
              timer: 1000
            })
            setTimeout(function () {
              location.reload()
            }, 1200)
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Error!!!',
              text: 'El estudiante no puede ser eliminado, porque esta en uso o activo',
              showConfirmButton: false,
              timer: 1500
            })
          }
        }
      })

    }
  })
}

function previsualizarEst() {
  let imagen = document.getElementById("ImgEstudiante").files[0]

  if (imagen["type"] != "image/png" && imagen["type"] != "image/jpeg" && imagen["type"] != "image/jpg") {
    $("#ImgEstudiante").val("")
    swal.fire({
      icon: "error",
      showConfirmButton: true,
      title: "La imagen debe ser formato PNG, JPG o JPEG"
    })
  } else if (imagen["size"] > 10000000) {
    $("#ImgEstudiante").val("")
    Swal.fire({
      icon: "error",
      showConfirmButton: true,
      title: "La imagen no debe superior a 10MB"
    })

  } else {
    let datosImagen = new FileReader
    datosImagen.readAsDataURL(imagen)

    $(datosImagen).on("load", function (event) {
      let rutaImagen = event.target.result
      $(".previsualizar").attr("src", rutaImagen)

    })
  }
}
/* ASIGANACION ESTUDIANTE CURSO */

function MNuevoGrupoAsig() {
  $("#modal-default").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/estudiante/asignacion/FNuevoGrupoAsig.php",
    data: obj,
    success: function (data) {
      $("#content-default").html(data)
    }
  })
}

function RegGrupoAsig() {

  var formData = new FormData($("#FormRegAsignacion")[0])

  $.ajax({
    type: "POST",
    url: "controlador/estudianteControlador.php?ctrRegGrupoAsig",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (data) {
      /* console.log(data); */
      if (data == "ok") {
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'La Asignación ha sido registrada',
          timer: 1000
        })
        setTimeout(function () {
          location.reload()
        }, 1200)
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Error!',
          text: 'El Materia no puede ser registrada',
          showConfirmButton: false,
          timer: 1500
        })
      }
    }
  })
}


function MEditGrupoAsig(id) {
  $("#modal-default").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/estudiante/asignacion/FEditGrupoAsig.php?id=" + id,
    data: obj,
    success: function (data) {
      $("#content-default").html(data)
    }
  })
}

function EditGrupoAsig() {

  var formData = new FormData($("#FormEditGrupoAsig")[0])

  $.ajax({
    type: "POST",
    url: "controlador/estudianteControlador.php?ctrEditGrupoAsig",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (data) {
      /* console.log(data); */
      if (data == "ok") {
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'El Materia ha sido actualizada',
          timer: 1000
        })
        setTimeout(function () {
          location.reload()
        }, 1200)
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Error!',
          text: 'No se ha podido actualizar!!!',
          showConfirmButton: false,
          timer: 1500
        })
      }
    }
  })
}

function MEliGrupoAsig(id) {
  var obj = {
    id: id
  }

  Swal.fire({
    title: '¿Esta seguro de eliminar esta Asignación de grupo a Estudiante?',
    showDenyButton: true,
    showCancelButton: false,
    confirmButtonText: 'Confirmar',
    denyButtonText: 'Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        data: obj,
        url: "controlador/estudianteControlador.php?ctrEliGrupoAsig",
        success: function (data) {

          if (data == "ok") {
            Swal.fire({
              icon: 'success',
              showConfirmButton: false,
              title: 'Estudiante eliminado',
              timer: 1000
            })
            setTimeout(function () {
              location.reload()
            }, 1200)
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Error!!!',
              text: 'El estudiante no puede ser eliminado, porque esta en uso o activo',
              showConfirmButton: false,
              timer: 1500
            })
          }
        }
      })

    }
  })
}

/* MOSTRAR LAS MATERIAS DE LOS ESTUDIANTES */
function MostrarMaterias(id) {
  var divDetalleModulo = document.getElementById("detalleModulo");

  var obj = {
    id: id
  }
  $.ajax({
    type: "POST",
    data: obj,
    url: "controlador/materiaControlador.php?ctrMatModulo",
    success: function (data) {

      console.log(data);
      $("#detalleModulo").html(data)
      
    }
  })
}
