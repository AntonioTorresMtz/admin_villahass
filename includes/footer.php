  <!--SCRIPTS-->

  <footer class="pie">

  </footer>
  <script src="js/pago.js"></script>
  <script src="js/app.js"></script>
  <script src="js/modal.js"></script>
  <script>
			var evita=0;
      $(function(){
      // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
      $("#adicional").on('click', function(){
        $("#tabla tbody tr:eq(0)").clone().removeClass('fila-fija').appendTo("#tabla");
        evita= evita+1;
        
      });
     
      // Evento que selecciona la fila y la elimina 
      $(document).on("click",".eliminar",function(){
        if(evita > 0){
          var parent = $(this).parents().get(0);
          $(parent).remove();
          evita = evita - 1;
        }
      });
    });
  </script>
  

</body>
</html>

