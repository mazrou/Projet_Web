
<?php  session_start();?>
<h1>Mes marchendeise</h1>
              
          <div class="tab-content">
            <div class="tab-pane active" id="home">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Discription</th>
                      <th>lieu du depart</th>
                      <th>date de depart</th>
                      <th>lieu d'arrive</th>
                      <th>date arrive</th>
                      <th>tarif</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody id="items">
                  <?php foreach ($this->_data["marchendise"] as $march ){ 
                    echo '<tr data-toggle="collapse" data-target="#demo1" class="accordion-toggle ">  
                      <td>'.$march->getDescription().'</td>
                      <td>'.$march->getLieuDepart().'</td>
                      <td>'.$march->getDateArrive().'</td>
                      <td>'.$march->getLieuArrive().'</td>
                      <td>'.$march->getDateDepart().'</td>
                      <td>'.$march->getTarif().'</td>
                      <td><button type="button" data-toggle="modal" data-target="#edit" data-uid="1" class="update btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil"></span></button></td>
                      <td><button class="btn btn-default btn-xs"><span class="glyphicon glyphicon-eye-open"></span></button></td>
                    </tr>
                    ';
                  } ?>
                    <tr>
            <td colspan="12" class="hiddenRow"><div class="accordian-body collapse" id="demo1"> 
 
              
              
              
              <hr>
              
              <h1>Les trajets disponible</h1>
             </div><!--/tab-pane-->
             <div class="tab-pane" id="messages">
               
               <h2></h2>
               
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Moyen</th>
                      <th>lieu du depart</th>
                      <th>date de depart</th>
                      <th>lieu d'arrive</th>
                      <th>date arrive</th>
                      <th>Devis</th>
                    </tr>
                  </thead>
                  <tbody id="items">
                    
                       <?php
                  foreach ($this->_data["trajet"] as $march) {
                   echo '<tr data-toggle="collapse" data-target="#demo1" class="accordion-toggle ">
                      <td>' . $march->getMoyenTranspor() . '</td>
                      <td>' . $march->getLieuDepart() . '</td>
                      <td>' . $march->getDateDepart() . '</td>
                      <td>' . $march->getLieuArrive() . '</td>
                      <td>' . $march->getDateArrive() . '</td>
                      <td>' . $march->getDevis() . '</td>
                      <td><button type="button" data-toggle="modal" data-target="#edit" data-uid="1" class="update btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil"></span></button></td>
                    </tr>
                    ';
                      }?>  
                  </tbody>
                </table>
                </div>
               
             </div><!--/tab-pane-->
             <div class="tab-pane" id="settings">
            		
               	
                  <hr>
                  <form class="form" action="##" method="post" id="registrationForm">
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="first_name"><h4>Nome</h4></label>
                              <input type="text" class="form-control" name="first_name" id="first_name" placeholder="nome" title="Inserisci il nome">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Cognome</h4></label>
                              <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Cognome" title="Inserisci il cognome">
                          </div>
                      </div>
          
                      
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h4>Telefono</h4></label>
                              <input type="text" class="form-control" name="mobile" id="mobile" placeholder="inserisci il numero di telefono" title="inserisci il numero di telefono">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Email</h4></label>
                              <input type="email" class="form-control" name="email" id="email" placeholder="tua@email.it" title="Inserisci l'email">
                          </div>
                      </div>
                      
                      
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Salva</button>
                               	<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Ripristina</button>
                            </div>
                      </div>
              	</form>
              </div>
               
              </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->
                               </hr>
<script type="text/javascript">
        $(document).ready(function() {
          $(".expandable").on("click", ".add-more", function(e) {
            e.preventDefault();
            var rmButton = '<button class="btn btn-danger remove-me" type="button">-</button>';
            var grandParent = $(this).parent().parent();
            var countVal = grandParent.data("count");
            var count = parseInt(countVal);
            if (count == 1) {
              $(this).before(rmButton);
            }
            var toBeCopied = $(this).parent().clone();
            if (count == 1) { 
                var curClass = toBeCopied.find("input").attr('class');
                toBeCopied.find("input:first").attr('class', curClass + " offset-md-3");
                toBeCopied.find("label").remove();

            }
            var add_button = $(this).detach();
            grandParent.append(toBeCopied);
            count++;
            grandParent.data("count", count);
          });
          $(".expandable").on("click", ".remove-me", function(e) {
            e.preventDefault();
            var grandParent = $(this).parent().parent();
            var countVal = grandParent.data("count");
            count = parseInt(countVal);
            count--;
            grandParent.data("count", count);

            var nextButton = $(this).next("button");
            var prevButton = $(this).parent().prev().find("button");

            //When we click remove on the last entry:
            if (/add-more/.test(nextButton.attr("class")) && /remove-me/.test(prevButton.attr("class"))) {
              var add_button = nextButton.detach();
              $(this).parent().prev().find(".remove-me").after(add_button);
            }
            //When we click on the first entry:
            if ($(this).parent().children().is("label")) {
                secondEntry=$(this).parent().next().find("input");
                secondEntry.removeClass("offset-md-3");
                secondEntry.before($(this).parent().find("label"));
            }
            if (count == 1) {
              $(this).parent().prev().find(".remove-me").remove();
              $(this).parent().next().find(".remove-me").remove();
            }
            $(this).parent().remove();
          });


        });
        
        
        
        
             $(document).ready(function(){
      var i=1;
     $("#add_row").click(function(){
      $('#addr'+i).html("<td>"+ (i+1) +"</td><td><input name='name"+i+"' type='text' placeholder='Name' class='form-control input-md'  /> </td><td><input  name='mail"+i+"' type='text' placeholder='Mail'  class='form-control input-md'></td><td><input  name='mobile"+i+"' type='text' placeholder='Mobile'  class='form-control input-md'></td>");

      $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
      i++; 
  });
     $("#delete_row").click(function(){
    	 if(i>1){
		 $("#addr"+(i-1)).html('');
		 i--;
		 }
	 });

});

</script>
</body>
</html>