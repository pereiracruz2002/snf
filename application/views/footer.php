
   </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
<?php if($this->uri->segment(1)=="nota"):?>
    <div class="modal fade bs-example-modal-lg" id="modalEditarCliente" >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>
            <h4 class="modal-title">Editar Cliente</h4>
          </div>
          <div class="modal-body">
            
            <form role="form" method="post" action="<?= base_url('index.php/clientes/salvar')?>" id="formulario_clientes">
              <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome">
              </div>
              <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" name="email">
              </div>
              <input type="hidden" name="id_cliente" id="id_cliente" value="" />
            </form>     
                
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal --> 
    <script>
    
        /*
         * Função que carrega após o DOM estiver carregado.
         * Como estou usando o ajaxForm no formulário, é aqui que eu o configuro.
         * Basicamente somente digo qual função será chamada quando os dados forem postados com sucesso.
         * Se o retorno for igual a 1, então somente recarrego a janela.
         */
        $(function(){
            $('#formulario_clientes').ajaxForm({
                success: function(data) {
                    if (data == 1) {
                        
                        //se for sucesso, simplesmente recarrego a página. Aqui você pode usar sua imaginação.
                        document.location.href = document.location.href;
                        
                    }
                }
            });
        });
    
        //Aqui eu seto uma variável javascript com o base_url do CodeIgniter, para usar nas funções do post.
        var base_url = "<?= base_url() ?>";
        
        /*
         *  Esta função serve para preencher os campos do cliente na janela flutuante
         * usando jSon.  
         */
        function carregaDadosClienteJSon(id_cliente){
            $.post(base_url+'/nota/dados_nota', {
                id_nota: id_cliente
            }, function (data){
                $('#nome').val(data.cUF);
                $('#email').val(data.cNF);
                $('#id_cliente').val(data.id_cliente);//aqui eu seto a o input hidden com o id do cliente, para que a edição funcione. Em cada tela aberta, eu seto o id do cliente. 
            }, 'json');
        }
    
        function janelaEditarCliente(id_cliente){
            
            //antes de abrir a janela, preciso carregar os dados do cliente e preencher os campos dentro do modal
            carregaDadosClienteJSon(id_cliente);
            
            $('#modalEditarCliente').modal('show');
        }
        
    </script> 
<?php endif;?>  

    <!-- Arquivos Javascripts
    ================================================== -->

        <!-- jQuery -->
    <script src="<?php echo base_url() ?>assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url() ?>assets/js/plugins/morris/raphael.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/plugins/morris/morris.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/plugins/morris/morris-data.js"></script>

  </body>
</html>


