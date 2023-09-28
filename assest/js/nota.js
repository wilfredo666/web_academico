<<<<<<< HEAD
function buscarEstudiante() {
    var curso = document.getElementById('nomCurso').value;
    var estudiantesSelect = document.getElementById('nomEstudiante');
    var idEstudiante = document.getElementById('idEstudiante');

    var obj = {
        id: curso
    }
    $.ajax({
        type: "POST",
        data: obj,
        url: "controlador/cursoControlador.php?ctrBuscarEstudiante",
        success: function (data) {

            var datos = JSON.parse(data);
            console.log(datos);
            // Limpia el select actual eliminando todas las opciones
            estudiantesSelect.innerHTML = '';

            // Agrega una opción en blanco si es necesario
            const optionEnBlanco = document.createElement('option');
            optionEnBlanco.value = '';
            optionEnBlanco.textContent = 'Selecciona una opción';
            estudiantesSelect.appendChild(optionEnBlanco);

            // Agrega las opciones basadas en los datos
            datos.forEach(item => {
                const option = document.createElement('option');
                option.value = item.id_estudiante;
                option.textContent = item.nombre_estudiante + ' ' + item.ap_pat_estudiante + ' ' + item.ap_mat_estudiante;
                estudiantesSelect.appendChild(option);
            });


            /* if (data == "ok") {
                Swal.fire({
                    icon: 'success',
                    showConfirmButton: false,
                    title: 'Noticia eliminado',
                    timer: 1000
                })
                setTimeout(function () {
                    location.reload()
                }, 1200)
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!!!',
                    text: 'La Noticia no puede ser eliminado, porque esta en uso',
                    showConfirmButton: false,
                    timer: 1500
                })
            } */
        }
    })


}

function MNotaEstudiante(id) {
    let identificativo = id.split('-');
    var obj = {
        idEstudiante: identificativo[0],
        idCurso: identificativo[1],
        idGrupo: identificativo[2],
        idModulo: identificativo[3],
        idMateria: identificativo[4],
    }

    $("#modal-default").modal("show")
    $.ajax({
        type: "POST",
        url: "vista/nota/FNuevoNota.php",
        data: obj,
        cache: false,
        success: function (data) {
            $("#content-default").html(data)
            console.log(identificativo);
        }
    })
}
/* =====================================
REGISITRAR LAS NOTAS
====================================== */
function RegNota() {
    let examen = document.getElementById("examen").value
    let practicas = document.getElementById("practicas").value
    let asistencia = document.getElementById("asistencia").value
    let controles = document.getElementById("controles").value
    let observacion = document.getElementById("observacion").value
   
    let idEstudiante = document.getElementById("idEstudiante").value
    let idGrupo = document.getElementById("idGrupo").value
    let idCurso = document.getElementById("idCurso").value
    let idModulo = document.getElementById("idModulo").value
    let idMateria = document.getElementById("idMateria").value

    var notas = {
        examen: examen,
        practicas: practicas,
        asistencia: asistencia,
        controles: controles,
        observacion: observacion
    }
  
    let obj = {
      "idEstudiante": idEstudiante,
      "idGrupo": idGrupo,
      "idCurso": idCurso,
      "idModulo": idModulo,
      "idMateria": idMateria,
      "notas": JSON.stringify(notas)
    }
  
    $.ajax({
      type: "POST",
      url: "controlador/notaControlador.php?ctrRegNotas",
      data: obj,
      cache: false,
      success: function (data) {
        console.log(data);
        if (data == "ok") {
          Swal.fire({
            icon: 'success',
            showConfirmButton: false,
            title: 'Nota registrada',
            timer: 1000
          })
          setTimeout(function () {
            location.reload()
          }, 1200)
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Error de registro',
            showConfirmButton: false,
            timer: 1500
          })
        }
      }
    })
  
  
=======
function buscarEstudiante() {
    var curso = document.getElementById('nomCurso').value;
    var estudiantesSelect = document.getElementById('nomEstudiante');
    var idEstudiante = document.getElementById('idEstudiante');

    var obj = {
        id: curso
    }
    $.ajax({
        type: "POST",
        data: obj,
        url: "controlador/cursoControlador.php?ctrBuscarEstudiante",
        success: function (data) {

            var datos = JSON.parse(data);
            console.log(datos);
            // Limpia el select actual eliminando todas las opciones
            estudiantesSelect.innerHTML = '';

            // Agrega una opción en blanco si es necesario
            const optionEnBlanco = document.createElement('option');
            optionEnBlanco.value = '';
            optionEnBlanco.textContent = 'Selecciona una opción';
            estudiantesSelect.appendChild(optionEnBlanco);

            // Agrega las opciones basadas en los datos
            datos.forEach(item => {
                const option = document.createElement('option');
                option.value = item.id_estudiante;
                option.textContent = item.nombre_estudiante + ' ' + item.ap_pat_estudiante + ' ' + item.ap_mat_estudiante;
                estudiantesSelect.appendChild(option);
            });


            /* if (data == "ok") {
                Swal.fire({
                    icon: 'success',
                    showConfirmButton: false,
                    title: 'Noticia eliminado',
                    timer: 1000
                })
                setTimeout(function () {
                    location.reload()
                }, 1200)
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!!!',
                    text: 'La Noticia no puede ser eliminado, porque esta en uso',
                    showConfirmButton: false,
                    timer: 1500
                })
            } */
        }
    })


}

function MNotaEstudiante(id) {
    let identificativo = id.split('-');
    var obj = {
        idEstudiante: identificativo[0],
        idCurso: identificativo[1],
        idGrupo: identificativo[2],
        idModulo: identificativo[3],
        idMateria: identificativo[4],
    }

    $("#modal-default").modal("show")
    $.ajax({
        type: "POST",
        url: "vista/nota/FNuevoNota.php",
        data: obj,
        cache: false,
        success: function (data) {
            $("#content-default").html(data)
            console.log(identificativo);
        }
    })
}
/* =====================================
REGISITRAR LAS NOTAS
====================================== */
function RegNota() {
    let examen = document.getElementById("examen").value
    let practicas = document.getElementById("practicas").value
    let asistencia = document.getElementById("asistencia").value
    let controles = document.getElementById("controles").value
    let observacion = document.getElementById("observacion").value
   
    let idEstudiante = document.getElementById("idEstudiante").value
    let idGrupo = document.getElementById("idGrupo").value
    let idCurso = document.getElementById("idCurso").value
    let idModulo = document.getElementById("idModulo").value
    let idMateria = document.getElementById("idMateria").value

    var notas = {
        examen: examen,
        practicas: practicas,
        asistencia: asistencia,
        controles: controles,
        observacion: observacion
    }
  
    let obj = {
      "idEstudiante": idEstudiante,
      "idGrupo": idGrupo,
      "idCurso": idCurso,
      "idModulo": idModulo,
      "idMateria": idMateria,
      "notas": JSON.stringify(notas)
    }
  
    $.ajax({
      type: "POST",
      url: "controlador/notaControlador.php?ctrRegNotas",
      data: obj,
      cache: false,
      success: function (data) {
        console.log(data);
        if (data == "ok") {
          Swal.fire({
            icon: 'success',
            showConfirmButton: false,
            title: 'Nota registrada',
            timer: 1000
          })
          setTimeout(function () {
            location.reload()
          }, 1200)
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Error de registro',
            showConfirmButton: false,
            timer: 1500
          })
        }
      }
    })
  
  
>>>>>>> 46ea6d0945d471e47c5cfaa690c948d7f4b450e8
  }