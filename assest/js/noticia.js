function MNuevoNoticia() {
  $("#modal-default").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/noticia/FNuevoNoticia.php",
    data: obj,
    success: function (data) {
      $("#content-default").html(data)
    }
  })
}

function RegNoticia() {

  var formData = new FormData($("#FormRegNoticia")[0])

  $.ajax({
    type: "POST",
    url: "controlador/noticiaControlador.php?ctrRegNoticia",
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
          title: 'El Noticia ha sido registrada',
          timer: 1000
        })
        setTimeout(function () {
          location.reload()
        }, 1200)
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Error!',
          text: 'El Noticia no puede ser registrada',
          showConfirmButton: false,
          timer: 1500
        })
      }
    }
  })
}


function MEditNoticia(id) {
  $("#modal-default").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/noticia/FEditNoticia.php?id=" + id,
    data: obj,
    success: function (data) {
      $("#content-default").html(data)
    }
  })
}

function EditNoticia() {

  var formData = new FormData($("#FormEditNoticia")[0])

  $.ajax({
    type: "POST",
    url: "controlador/noticiaControlador.php?ctrEditNoticia",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (data) {
      if (data == "ok") {
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'El Noticia ha sido actualizada',
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

function MVerNoticia(id) {
  $("#modal-lg").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/noticia/MVerNoticia.php?id=" + id,
    data: obj,
    success: function (data) {
      $("#content-lg").html(data)
    }
  })
}

function MEliNoticia(id) {
  var obj = {
    id: id
  }

  Swal.fire({
    title: '¿Esta seguro de eliminar esta Noticia?',
    showDenyButton: true,
    showCancelButton: false,
    confirmButtonText: 'Confirmar',
    denyButtonText: 'Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        data: obj,
        url: "controlador/noticiaControlador.php?ctrEliNoticia",
        success: function (data) {
console.log(data);
          if (data == "ok") {
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
          }
        }
      })

    }
  })
}

function previsualizar() {
  let imagen = document.getElementById("ImgNoticia").files[0]

  if (imagen["type"] != "image/png" && imagen["type"] != "image/jpeg" && imagen["type"] != "image/jpg") {
    $("#ImgNoticia").val("")
    swal.fire({
      icon: "error",
      showConfirmButton: true,
      title: "La imagen debe ser formato PNG, JPG o JPEG"
    })
  } else if (imagen["size"] > 10000000) {
    $("#ImgNoticia").val("")
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