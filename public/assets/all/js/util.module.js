(function($){
 var get = function(acao,dados,functionStart,functionEnd){
		//var formData = new FormData(formulario);
             /*formData.append(formulario.find('input[type="file"]').attr('name'),formulario.find('input[type="file"]').prop('files')[0]);
             //formData.append('acao',formulario.attr('action'));
             formulario.find("select").each(function(index,item){
                  formData.append($(item).attr("name"),$(item).val());
             });*/
            //dados = formData;
			 if(typeof functionStart  !="function")
			 {
					functionStart();
			 }
        $.ajax( 
                {
                     type: "get",
                   url: acao,
                   data:dados,// $(this).serialize()+'&acao='+action,
              success: function(data) {
                if(typeof functionEnd  ==="function"){
					functionEnd('success',data);
				}
                  
				  
              },
              error: function() {
                  if(typeof functionEnd  ==="function"){
					functionEnd('error');
				}
              },
               processData: false,
            cache: false,
            contentType: false
        });
   };
    var post = function(acao,dados,functionStart,functionEnd){
        //var formData = new FormData(formulario);
        /*formData.append(formulario.find('input[type="file"]').attr('name'),formulario.find('input[type="file"]').prop('files')[0]);
         //formData.append('acao',formulario.attr('action'));
         formulario.find("select").each(function(index,item){
         formData.append($(item).attr("name"),$(item).val());
         });*/
        //dados = formData;
        if(typeof functionStart  !="function")
        {
            functionStart();
        }
        $.ajax(
            {
                type: "post",
                url: acao,
                data:dados,// $(this).serialize()+'&acao='+action,
                success: function(data) {
                    if(typeof functionEnd  ==="function"){
                        functionEnd('success',data);
                    }


                },
                error: function() {
                    if(typeof functionEnd  ==="function"){
                        functionEnd('error');
                    }
                },
                processData: false,
                cache: false,
                contentType: false
            });
    };

    window.util = {};
	window.util.getRequest = function(acao,dados,funcaoSucesso,funcaoErro)
                          {
                              get(acao,dados,funcaoSucesso,funcaoErro);
                          };
    window.util.postRequest = function(acao,dados,funcaoSucesso,funcaoErro)
    {
        post(acao,dados,funcaoSucesso,funcaoErro);
    };
 })( jQuery );
