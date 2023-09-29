function MNuevoGrupo() {
  $("#modal-default").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/grupo/FNuevoGrupo.php",
    data: obj,
    success: function (data) {
      $("#content-default").html(data)
    }
  })
}

function RegGrupo() {

  var formData = new FormData($("#FormRegGrupo")[0])

  $.ajax({
    type: "POST",
    url: "controlador/grupoControlador.php?ctrRegGrupo",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (data) {
      console.log(data);
      if (data == "ok") {
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'El Grupo ha sido registrada',
          timer: 1000
        })
        setTimeout(function () {
          location.reload()
        }, 1200)
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Error!',
          text: 'El Grupo no puede ser registrada',
          showConfirmButton: false,
          timer: 1500
        })
      }
    }
  })
}


function MEditGrupo(id) {
  $("#modal-default").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/grupo/FEditGrupo.php?id=" + id,
    data: obj,
    success: function (data) {
      $("#content-default").html(data)
    }
  })
}

function EditGrupo() {

  var formData = new FormData($("#FormEditGrupo")[0])

  $.ajax({
    type: "POST",
    url: "controlador/grupoControlador.php?ctrEditGrupo",
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
          title: 'El Grupo ha sido actualizada',
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

function MVerGrupo(id) {
  $("#modal-default").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/Grupo/MVerGrupo.php?id=" + id,
    data: obj,
    success: function (data) {
      $("#content-default").html(data)
    }
  })
}

function MEliGrupo(id) {
  var obj = {
    id: id
  }

  Swal.fire({
    title: '¿Esta seguro de eliminar ésta Grupo?',
    showDenyButton: true,
    showCancelButton: false,
    confirmButtonText: 'Confirmar',
    denyButtonText: 'Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        data: obj,
        url: "controlador/grupoControlador.php?ctrEliGrupo",
        success: function (data) {

          if (data == "ok") {
            Swal.fire({
              icon: 'success',
              showConfirmButton: false,
              title: 'Grupo eliminado',
              timer: 1000
            })
            setTimeout(function () {
              location.reload()
            }, 1200)
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Error!!!',
              text: 'El Grupo no puede ser eliminado, porque esta en uso',
              showConfirmButton: false,
              timer: 1500
            })
          }
        }
      })

    }
  })
}

/* ¡¡¡¡¡¡¡¡¡¡ HORARIO  Grupo */
function MNuevoHorarioGrupo() {
  $("#modal-default").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/horarioGrupo/FNuevoHorarioGrupo.php",
    data: obj,
    success: function (data) {
      $("#content-default").html(data)
    }
  })
}

function RegHorarioGrupo() {

  var formData = new FormData($("#FormRegHorarioGrupo")[0])

  $.ajax({
    type: "POST",
    url: "controlador/GrupoControlador.php?ctrRegHorarioGrupo",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (data) {
      console.log(data);
      if (data == "ok") {
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'El Asignación ha sido registrada',
          timer: 1000
        })
        setTimeout(function () {
          location.reload()
        }, 1200)
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Error!',
          text: 'El Grupo no puede ser registrada',
          showConfirmButton: false,
          timer: 1500
        })
      }
    }
  })
}

function MEditHorarioGrupo(id) {
  $("#modal-default").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/horarioGrupo/FEditHorarioGrupo.php?id=" + id,
    data: obj,
    success: function (data) {
      $("#content-default").html(data)
    }
  })
}

function EditHorarioGrupo() {

  var formData = new FormData($("#FormEditHorarioGrupo")[0])

  $.ajax({
    type: "POST",
    url: "controlador/GrupoControlador.php?ctrEditHorarioGrupo",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (data) {
      if (data == "ok") {
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'El Horario ha sido actualizado',
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

function MVerInformacion(id) {
  $("#modal-lg").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/Grupo/MVerDetalleGrupo.php?id=" + id,
    data: obj,
    success: function (data) {
      $("#content-lg").html(data)
    }
  })
}

function MostrarCurso() {
  var cursoSelect = document.getElementById("nomCurso").value;
  var curso = document.getElementById("nombreGrupo");

  var obj = {
    id: cursoSelect
  }

  curso.disabled = false;

  $.ajax({
    type: "POST",
    data: obj,
    url: "controlador/grupoControlador.php?ctrInfoGruposCurso",
    success: function (data) {

      var datos = JSON.parse(data);
      console.log(datos);
      // Limpia el select actual eliminando todas las opciones
      curso.innerHTML = '';

      // Agrega una opción en blanco si es necesario
      const optionEnBlanco = document.createElement('option');
      optionEnBlanco.value = '';
      optionEnBlanco.textContent = 'Selecciona una opción';
      curso.appendChild(optionEnBlanco);

      // Agrega las opciones basadas en los datos
      datos.forEach(item => {
        const option = document.createElement('option');
        option.value = item.id_grupo;
        option.textContent = item.desc_grupo;
        curso.appendChild(option);
      });
    }
  })
}
