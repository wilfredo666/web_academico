<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
  <p class="font-weight-light h4">Lista de Noticias</p>
    <table id="DataTable" class="display">
     
      <thead>
        <tr>
          <th>Título</th>
          <th>Fecha</th>
          <th>Imagen Noticia</th>
          <th>Estado</th>
          <td>
            <button class="btn btn-primary btn-sm"  onclick="MNuevoNoticia()"> <i class="fas fa-plus"></i> Nuevo</button>
          </td>
        </tr>
      </thead>
      <tbody>
       <?php 
        $Noticia=controladorNoticia::ctrInfoNoticias();
        
        foreach($Noticia as $value){
          ?>
          <tr>
            <td><?php echo $value["titulo_noticia"];?></td>
            <td><?php echo $value["fecha_noticia"];?></td>
            <td><?php
                if ($value["img_noticia"] == "") {
                ?>
                <img src="assest/dist/img/noticiaDefault.jpg" width='150' class="img-thumbnail">
              <?php
                } else {
              ?>
                <img src='assest/dist/img/noticias/<?php echo $value["img_noticia"]; ?>' width='150' height="150" class="img-thumbnail">
              <?php
                }
              ?>
            </td>
            <?php 
            if($value["estado_noticia"]==1){
              ?>
              <td><span class="badge badge-success">Activo</span></td>
              <?php
            }else{
              ?>
              <td><span class="badge badge-danger">Inactivo</span></td>
              <?php
            }
            ?>
            <td>
              <div class="btn-group">
                <button class="btn btn-sm btn-info" onclick="MVerNoticia(<?php echo $value['id_noticia'];?>)">
                  <i class="fas fa-eye"></i>
                </button>
                <button class="btn btn-sm btn-secondary" onclick="MEditNoticia(<?php echo $value['id_noticia'];?>)">
                  <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-sm btn-danger" onclick="MEliNoticia(<?php echo $value['id_noticia'];?>)">
                  <i class="fas fa-trash"></i>
                </button>
              </div>
            </td>
          </tr>
          <?php
        }
        ?>
      </tbody>
    </table>

  </section>
</div>