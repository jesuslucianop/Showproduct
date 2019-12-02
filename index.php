<?php
//include "./Library/Motor.php";
include "./Library/Header.php";


?>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="btnmodal">
 Inscribir nueva empresa corporativa

</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="md-form mb-5" id="caja23">
          <i class="fas fa-user prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-name">Your name</label>
   
         
        </div>
     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<table class="table table-striped">
    <thead>
    <h1>Empresas / hadwares adquiridos</h1>
   
        <tr>
            <th scope="col">Empresa</th>
            <th scope="col">Hadwares Adquiridos</th>
         
        </tr>
    </thead>
    <tbody id="caja">
       
    </tbody>
</table>
<script>
    $(document).ready(function() {
     
        datos = [];

        $.ajax({
            url: './Library/Motor.php',
            data: {
                "corps_options": "s"
            },
            type: "GET",
            dataType: 'json',
            success: function(data) {

                console.log(data);
                
                for (x = 0; x < data.length; x++) {
                    $("#caja").append("<tr><td>" + data[x].nombre + "</td>"+
                    "<td>"+data[x].hadwares+"</td>"
                    +"</tr>");
                    console.log(data[x]);
                }
                //console.log(data[0]);
                datos.push(data);
            }
        })
        $("#btnmodal").click(function(){
       
            $.ajax({
            url: './Library/Motor.php',
            data: {
                "prodcuto": "s"
            },
            type: "GET",
            dataType: 'json',
            success: function(data) {
            
                console.log(data);
                for (x = 0; x < data.length; x++) {
                    $("#caja23").append("<select>"
                    +"<option>" 
                    + data[x].nombre
                    +"</option>"+
                    + "</select>"
                  
               );
                    console.log(data[x]);
                }
            }
        })
        });
    });
</script>

<?php
include "./Library/footer.php";

?>