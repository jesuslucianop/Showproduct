<?php
include "./Library/Header.php";
?>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Codigo</th>
            <th scope="col">Nombre</th>
            <th scope="col">detalle</th>
            
        </tr>
    </thead>
    <tbody id="caja">
       
    </tbody>
</table>
<script>
    $(document).ready(function() {
    


        $.ajax({
            url: './Library/Motor.php',
            data: {
                "prodcuto": "s"
            },
            type: "GET",
            dataType: 'json',
            success: function(data) {
           
                console.log(data);
                console.log(data);
                
                for (x = 0; x < data.length; x++) {
                    $("#caja").append("<tr><td>" + data[x].codigo + "</td>"+
                    "<td>"+data[x].nombre+"</td>"+
                    "<td>"+data[x].detalles+"</td>"
                    +"</tr>");
                    console.log(data[x]);
                }

            }
        })

    });
</script>
<div class="row"></div>

<?php
include "./Library/footer.php";
?>