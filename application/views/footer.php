
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
                <label for="nome">cUF</label>
                <input type="text" class="form-control" id="cUF" name="cUF">
              </div>
              <div class="form-group">
                <label for="email">cNF</label>
                <input type="email" class="form-control" id="cNF" name="cNF">
              </div>
              <div class="form-group">
                <label for="nome">natOp</label>
                <input type="text" class="form-control" id="natOp" name="natOp">
              </div>
               <div class="form-group">
                <label for="nome">natOp</label>
                <input type="text" class="form-control" id="natOp" name="natOp">
              </div>
              <div class="form-group">
                <label for="nome">indPag</label>
                <input type="text" class="form-control" id="indPag" name="indPag">
              </div>
              <div class="form-group">
                <label for="nome">modInfo</label>
                <input type="text" class="form-control" id="modInfo" name="modInfo">
              </div>
              <div class="form-group">
                <label for="nome">serie</label>
                <input type="text" class="form-control" id="serie" name="serie">
              </div>
              <div class="form-group">
                <label for="nome">nNF</label>
                <input type="text" class="form-control" id="nNF" name="nNF">
              </div>
              <div class="form-group">
                <label for="nome">dEmi</label>
                <input type="text" class="form-control" id="dEmi" name="dEmi">
              </div>
              <div class="form-group">
                <label for="nome">tpNF</label>
                <input type="text" class="form-control" id="tpNF" name="tpNF">
              </div>
              <div class="form-group">
                <label for="nome">cMunFG</label>
                <input type="text" class="form-control" id="cMunFG" name="cMunFG">
              </div>
              <div class="form-group">
                <label for="nome">tpImp</label>
                <input type="text" class="form-control" id="tpImp" name="tpImp">
              </div>
              <div class="form-group">
                <label for="nome">tpEmis</label>
                <input type="text" class="form-control" id="tpEmis" name="tpEmis">
              </div>
              <div class="form-group">
                <label for="nome">cDV</label>
                <input type="text" class="form-control" id="cDV" name="cDV">
              </div>
              <div class="form-group">
                <label for="nome">tpAmb</label>
                <input type="text" class="form-control" id="tpAmb" name="tpAmb">
              </div>
              <div class="form-group">
                <label for="nome">finNFe</label>
                <input type="text" class="form-control" id="finNFe" name="finNFe">
              </div>
              <div class="form-group">
                <label for="nome">procEmi</label>
                <input type="text" class="form-control" id="procEmi" name="procEmi">
              </div>
              <div class="form-group">
                <label for="nome">verProc</label>
                <input type="text" class="form-control" id="verProc" name="verProc">
              </div>
              <div class="form-group">
                <label for="nome">CNPJ</label>
                <input type="text" class="form-control" id="CNPJ" name="CNPJ">
              </div>
              <div class="form-group">
                <label for="nome">xNomeCliente</label>
                <input type="text" class="form-control" id="xNomeCliente" name="xNomeCliente">
              </div>
              <div class="form-group">
                <label for="nome">enderEmit</label>
                <input type="text" class="form-control" id="enderEmit" name="enderEmit">
              </div>
              <div class="form-group">
                <label for="nome">IE</label>
                <input type="text" class="form-control" id="IE" name="IE">
              </div>
              <div class="form-group">
                <label for="nome">IM</label>
                <input type="text" class="form-control" id="IM" name="IM">
              </div>
              <div class="form-group">
                <label for="nome">CNAE</label>
                <input type="text" class="form-control" id="CNAE" name="CNAE">
              </div>
              <div class="form-group">
                <label for="nome">CRT</label>
                <input type="text" class="form-control" id="CRT" name="CRT">
              </div>
               <div class="form-group">
                <label for="nome">CPF</label>
                <input type="text" class="form-control" id="CPF" name="CPF">
              </div>
               <div class="form-group">
                <label for="nome">xNome</label>
                <input type="text" class="form-control" id="xNome" name="xNome">
              </div>
               <div class="form-group">
                <label for="nome">enderDest</label>
                <input type="text" class="form-control" id="enderDest" name="enderDest">
              </div>
               <div class="form-group">
                <label for="nome">IE2</label>
                <input type="text" class="form-control" id="IE2" name="IE2">
              </div>
              <div class="form-group">
                <label for="nome">email</label>
                <input type="text" class="form-control" id="email" name="email">
              </div>
              <div class="form-group">
                <label for="nome">prod</label>
                <input type="text" class="form-control" id="prod" name="prod">
              </div>
              <div class="form-group">
                <label for="nome">imposto</label>
                <input type="text" class="form-control" id="imposto" name="imposto">
              </div>
              <div class="form-group">
                <label for="nome">ICMSTot</label>
                <input type="text" class="form-control" id="ICMSTot" name="ICMSTot">
              </div>
              <div class="form-group">
                <label for="nome">modFrete</label>
                <input type="text" class="form-control" id="modFrete" name="modFrete">
              </div>
              <div class="form-group">
                <label for="nome">transporta</label>
                <input type="text" class="form-control" id="transporta" name="transporta">
              </div>
              <div class="form-group">
                <label for="nome">vol</label>
                <input type="text" class="form-control" id="vol" name="vol">
              </div>
              <div class="form-group">
                <label for="nome">infCpl</label>
                <input type="text" class="form-control" id="infCpl" name="infCpl">
              </div>
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
                $('#cUF').val(data.cUF);
                $('#cNF').val(data.cNF);
                $('#natOp').val(data.natOp);
                $('#indPag').val(data.indPag);
                $('#modInfo').val(data.modInfo);
                $('#serie').val(data.serie);
                $('#nNF').val(data.nNF);
                $('#dEmi').val(data.dEmi);
                $('#cMunFG').val(data.cMunFG);
                $('#cDV').val(data.cDV);
                $('#tpAmb').val(data.tpAmb);
                $('#finNFe').val(data.finNFe);
                $('#procEmi').val(data.procEmi);
                $('#verProc').val(data.verProc);
                $('#CNPJ').val(data.CNPJ);
                $('#xNomeCliente').val(data.xNomeCliente);
                $('#enderEmit').val(data.enderEmit);
                $('#xNome').val(data.xNome);
                $('#IM').val(data.IM);
                $('#CNAE').val(data.CNAE);
                $('#CRT').val(data.CRT);
                $('#CPF').val(data.CPF);
                $('#enderDest').val(data.enderDest);
                $('#IE2').val(data.IE2);
                $('#email').val(data.email);
                $('#prod').val(data.prod);
                $('#imposto').val(data.imposto);
                $('#ICMSTot').val(data.ICMSTot);//aqui eu seto a o input hidden com o id do cliente, para que a edição funcione. Em cada tela aberta, eu seto o id do cliente. 
                $('#modFrete').val(data.modFrete);
                $('#transporta').val(data.transporta);
                $('#vol').val(data.vol);
                $('#infCpl').val(data.infCpl);
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


