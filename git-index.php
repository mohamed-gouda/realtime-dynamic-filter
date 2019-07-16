<div class="order">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form class="filter">
                  <h5>Suchen Sie sich Ihre gewünschten Optionen aus und wir kalkulieren den Preis für Sie!</h5>
                    <br>
                    <select name="cat" id="cat">
                    <option selected>Select One</option>
                      <?php
                      
                      $select_cats = $cont->prepare("SELECT id , name FROM categories");
                      $select_cats->execute();
                      while($row_cat = $select_cats->fetch()){
                        ?>
                          <option id="<?php echo $row_cat['id'] ?>" value="<?php echo $row_cat['id']?>"><?php echo $row_cat['name'] ?></option>
                        <?php
                      }
                      
                      ?>
                    </select>

                    <select name="brand" id="brand" disabled>
                    <option selected>Select One</option>
                     
                    </select>

                    <select name="item" id="item" disabled>
                    <option selected>Select One</option>
                     
                    </select>
                </form>
            </div>
        </div>
    </div>
</div>
<br>
<hr>
<br>

<div id="res">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
          <img src="" class="d-block w-100" id="img-res" alt="...">
          <h4 id="header-res"></h4>
          <p id="des-res"></p>
      </div>
    </div>
  </div>
</div>

<script src="include/jquery-3.2.1.min.js">
</script>
<script>

  $(document).ready(function(){

    $("#cat").change(function(){
      var request = $("#cat").val(); 
      $.ajax({
        url:'back/filter.php',
        type:'POST',
        data:'request='+request,
      }).done(function(data){
        console.log(data);
        data = JSON.parse(data);
        $('#brand').empty();
        $("#header-res").html("");
        $("#des-res").html("");
        $("#brand").append("<option > Select One</option>");
        $('#item').empty();
        data.forEach(function(d){
          $("#brand").removeAttr("disabled");
          $("#brand").append("<option id="+d.id+" value="+d.id+" >" + d.name + "</option>");
        });
        request = "";
      });
    }); // End Cat - brand

    $("#brand").change(function(){
      var request2 = $("#brand").val(); 
      $.ajax({
        url:'back/filter.php',
        type:'POST',
        data:'request='+request2,
      }).done(function(data){
        console.log(data);
        data = JSON.parse(data);
        $('#item').empty();
        $("#header-res").html("");
        $("#des-res").html("");
        $("#item").append("<option > Select One</option>");
        data.forEach(function(d){
          $("#item").removeAttr("disabled");
          $("#item").append("<option id="+d.id+" value="+d.id+">" + d.name + "</option>");
        });
        request2 = "";
      });
    }); // End brand - item


    $("#item").change(function(){
      var request3 = $("#item").val(); 


      $.ajax({
        url:'back/filter.php',
        type:'POST',
        data:'request='+request3,
      }).done(function(data){
        console.log(data);
        data = JSON.parse(data);
        data.forEach(function(d){
          var src1 = 'dashboard/upload/' + d.img;
          $("#img-res").attr("src" , src1)
          $("#header-res").html(d.name);
          $("#des-res").html(d.name);
        });
      });
    }); // End brand - item


  });
</script>