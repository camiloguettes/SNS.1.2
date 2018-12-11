// $(document).ready(function(){
//     $('#tipo').on('change',function(){
  
//           var selectValor = '#'+$(this).val();
  
//           // alert(selectValor);
//           $('#pai').show();
          
//           $('#pai').children('div').hide();
  
//           $('#pai').children(selectValor).show();
//     });
//   });
$(document).ready(function(){
      $('#tipo').on('change',function(){
    
            var selectValor = '#'+$(this).val();
    
            // alert(selectValor);
            $('#pai').show();
            
            $('#pai').children('div').children('div').children('select').hide().prop("disabled", true);
    
            $('#pai').children('div').children('div').children(selectValor).show().prop("disabled", false);
      });
    });