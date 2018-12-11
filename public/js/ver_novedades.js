
$(document).ready(function(){
    $("#1").click(function(){
        $('#pai').show();
		$('#pai').children("#1").show();
		$('#pai').children('#2').hide();        
		$('#pai').children('#3').hide();        
		$('#pai').children('#4').hide();        
		$('#pai').children('#5').hide();        
		$('#pai').children('#6').hide();                
    });
    $("#2").click(function(){
        $('#pai').show();
		$('#pai').children("#2").show();
		$('#pai').children('#1').hide();        
		$('#pai').children('#3').hide();        
		$('#pai').children('#4').hide();        
		$('#pai').children('#5').hide();        
		$('#pai').children('#6').hide();                
    });
    $("#3").click(function(){
        $('#pai').show();
		$('#pai').children("#3").show();
		$('#pai').children('#1').hide();        
		$('#pai').children('#2').hide();        
		$('#pai').children('#4').hide();        
		$('#pai').children('#5').hide();        
		$('#pai').children('#6').hide();                
    });
    $("#4").click(function(){
        $('#pai').show();
		$('#pai').children("#4").show();
		$('#pai').children('#1').hide();        
		$('#pai').children('#3').hide();        
		$('#pai').children('#2').hide();        
		$('#pai').children('#5').hide();        
		$('#pai').children('#6').hide();                
    });
    $("#5").click(function(){
        $('#pai').show();
		$('#pai').children("#5").show();
		$('#pai').children('#1').hide();        
		$('#pai').children('#3').hide();        
		$('#pai').children('#4').hide();        
		$('#pai').children('#2').hide();        
		$('#pai').children('#6').hide();                
    });
    $("#6").click(function(){
        $('#pai').show();
		$('#pai').children("#6").show();
		$('#pai').children('#1').hide();        
		$('#pai').children('#3').hide();        
		$('#pai').children('#4').hide();        
		$('#pai').children('#5').hide();        
		$('#pai').children('#2').hide();                
    });
});
// $(document).ready(function () {

//     // El objeto components actua como un diccionario de componentes
//     // Cada componente tiene dos propiedades:
//     // - template: Es el html a ser renderizado.
//     // - controller: Son las operaciones a ser realizadas sobre el
//     //               html renderizado, el argumento "element" hace
//     //               referencia al elemento DOM contenedor del html
//     //               renderizado.
//     // NOTA: se está usando la notación de "template literals" de ES2015
//     // para evitar concatenar strings, así que puede que navegadores
//     // extremadamente antiguos no puedan soportar este ejemplo.
//     // https://developer.mozilla.org/en/docs/Web/JavaScript/Reference/Template_literals
//     var components = {
//       o1: {
//         template:`
//           <div>
//             <span>Contenido de la opción 1</span>
//           </div>
//         `,
//         controller: function (element) {
//           element.find('span').css('color', 'red');
//         }
//       },
//       o2: {
//         template: `
//           <div>
//             <h1>Opción 2</h1>
//             <span>Contenido de la opción 2</span>
//           </div>
//         `,
//         controller: function (element) {
//           element.find('h1').css('color', 'blue');
//         }
//       },
//       o3: {
//         template: `
//           <div>
//             <h2>Opción 3</h2>
//             <pre>Contenido de la opción 2</pre>
//           </div>
//         `,
//         controller: function (element) {
//           element.find('pre').css('color', 'green');
//         }
//       }
//     };
    
//     // Renderiza el html de cada componente y ejecuta el controlador
//     // de este pasando el elemento contenedor como argumento.
//     function renderComponent(element, componentName) {
//       var component = components[componentName];
//       element.html(component.template);
//       component.controller(element);
//     }
    
//     // Un selector que busca todos los links y les asigna un click
//     // listener que hace el cambio de componente sobre el elemento
//     // usando el nombre del atributo "id" como llave del diccionario
//     // de componentes.
//     $('li.opcion a').click(function () {
    
//       var aside = $('#mi-aside');
//       // this hace referencia al elemento encontrado
//       // this.id hace referncia al atributo "id"
//       renderComponent(aside, this.id);
//     });
//   });