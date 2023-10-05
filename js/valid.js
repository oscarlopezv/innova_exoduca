function valid(){
    $("#erroresmsgs").html("");
    decimalexp=new RegExp(/^[0-9]+(\.[0-9]{1,2})?$/i)
    ver=true
    errores= [];
    $("form div").find("[required]").each(function(){        
        
            if ($(this).val()=="" || $(this).val()===null){
                ver=false
                
                errores.push("Debe llenar el campo "+$(this).attr('name'))    
            }            
        
    });
    $("form div").find("[isdecimal]").each(function(){        
        if ($(this).val()!=""){
            if (!decimalexp.test($(this).val())){
                ver=false
                
                errores.push("Debe ingresar un dato numerico al campo  "+$(this).attr('name')+" Ej: 100.00 ")    
            }            
        }
    });
    $("form div").find("[ifexistemp]").each(function(){        
        if ($(this).val()!=""){
            $.ajax({
              type: "GET",
              url: 'php/read.php',
                async:false,
              dataType: "json",
              data: {id:'verifymailem',mail:$(this).val()},
              success: function(e){ 
                
                if (e.length>0){
                    ver= false
                    errores.push("El mail ya se encuentra registrado")
                } 
              },	
              
            });          
        }
    });
    
    
    
    if (ver==false){
      
      for (var i=0; i<errores.length; i++) {
          $("#erroresmsgs").html($("#erroresmsgs").html()+"<div class='errormsg'><i class='fa fa-exclamation-triangle'></i>&nbsp"+errores[i]+"</div>")
      }
        
    }
    return ver;
}
function validmani(){
     
    $("#erroresmsgs").html("");
    decimalexp=new RegExp(/^[0-9]+(\.[0-9]{1,2})?$/i)
    ver=true
    errores= [];
    console.log($("#efe").val())
    if ($("#efe").val()=="Efectivo"){
        $("#cont").attr("required",true)
        $("#anosc").attr("required",true)
        $("#credi").attr("required",true)
        $("#tcli").attr("required",true)
        $("#inversion").attr("required",true)
        $("#pinicial").attr("required",true)
        
    } else {
        $("#cont").removeAttr("required")
        $("#anosc").removeAttr("required")
        $("#credi").removeAttr("required")
        $("#tcli").removeAttr("required")
        $("#inversion").removeAttr("required")
        $("#pinicial").removeAttr("required")
    }
    $("form div").find("[required]").each(function(){        
            
            if ($(this).val()=="" || $(this).val()===null){
                ver=false
                
                errores.push("Debe llenar el campo "+$(this).attr('name'))    
            }            
        
    });
    
    if (ver==false){
      
      for (var i=0; i<errores.length; i++) {
          $("#erroresmsgs").html($("#erroresmsgs").html()+"<div class='errormsg'><i class='fa fa-exclamation-triangle'></i>&nbsp"+errores[i]+"</div>")
      }
        
    }
    return ver
}