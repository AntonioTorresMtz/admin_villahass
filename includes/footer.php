  <!--SCRIPTS-->

  <script src="js/app.js"></script>
  <script src="js/modal.js"></script>
  <script>
			
      $(function(){
      // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
      $("#adicional").on('click', function(){
        $("#tabla tbody tr:eq(0)").clone().removeClass('fila-fija').appendTo("#tabla");
      });
     
      // Evento que selecciona la fila y la elimina 
      $(document).on("click",".eliminar",function(){
        var parent = $(this).parents().get(0);
        $(parent).remove();
      });
    });
  </script>

</body>
</html>

