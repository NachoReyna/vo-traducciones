$(document).ready(function(){
 $("#elijeTraduccion").attr("tabindex",-1).focus();
  $( function() {
    $( "#date_input" ).datepicker({ dateFormat: 'dd-mm-yy' });
  } );
  //break word
  

    $("#btn-popover")
.popover({html:true})
            
                    $("#disscount10").hide();
                    $("#total10").hide();
                    $("#disscount5").hide();
                    $("#total5").hide();
                    $("#disscount").show();
                    $("#total").show();
 $("#online, #newClient").click(function() {
                if ($('#online').is(':checked') && $('#newClient').is(':checked')) {
                    $("#disscount").hide("slow");
                    $("#total").hide("slow");
                    $("#disscount5").hide("slow");
                    $("#total5").hide("slow");
                    $("#disscount10").show("slow");
                    $("#total10").show("slow");
                } else if ($('#online').is(':checked') && $('#newClient').not(':checked')) {
                    $("#disscount").hide("slow");
                    $("#total").hide("slow");
                    $("#disscount10").hide("slow");
                    $("#total10").hide("slow");
                    $("#disscount5").show("slow");
                    $("#total5").show("slow");
                } else if ($('#online').not(':checked') && $('#newClient').is(':checked')) {
                    $("#disscount").hide("slow");
                    $("#total").hide("slow");
                    $("#disscount10").hide("slow");
                    $("#total10").hide("slow");
                    $("#disscount5").show("slow");
                    $("#total5").show("slow");
                } else {
                    $("#disscount10").hide("slow");
                    $("#total10").hide("slow");
                    $("#disscount5").hide("slow");
                    $("#total5").hide("slow");
                    $("#disscount").show("slow");
                    $("#total").show("slow");
                }
            });
            
            
            
            
            
            
            
            $("#theForm").submit(function(e){
                $("#theForm2 :input").prop("disabled", false);
                $("#theForm2 :button").prop("disabled", false);
                
            });
            
            
            
             $("#theForm2").submit(function(e){
                          //$('#exampleModal').modal('show');
            });
            
            
            
            
});