<h3>Realizando pagamento</h3>
<p>Entre com os dados do pagamento a ser realizado via PagSeguro:</p>
<div class="row-fluid">

    <div class="span6">


<form id="finalizar" method="post" action="<?= $this->here ?>">
    <fieldset>
        <legend>Seus dados</legend>
        <label>Nome</label>
        <input type="text" class="input-xlarge" required placeholder="Seu nome completo" name="nome">

        <label>E-Mail</label>
        <input type="email" class="input-xlarge" required placeholder="Endereço eletrônico" name="email">
        <span class="help-block">Exemplo: nome@provedor.com.br</span>

        <label>Telefone</label>

        <div class="input-prepend input-append">

            <input class="input-mini" type="text" placeholder="DDD" required name="ddd">
            <input type="text" placeholder="Número de telefone" required name="telefone">
        </div>
        <span class="help-block">Formato: (XX) XXXX-XXXX</span>

        <label>Valor a ser pago</label>

        <div class="input-prepend input-append">
            <span class="add-on">R$</span>
            <input class="input-mini" type="text" placeholder="Valor" required name="valor">
            <span class="add-on">,00</span>
        </div>

        <span class="help-block">Formato: R$ XX,00</span>

        <p>
            <button type="submit" class="btn btn-large btn-success"><i class="icon-ok"></i> Pagar com PagSeguro
            </button>
        </p>
    </fieldset>
</form>
        </div>
        <div class="span6" style="margin-top: 90px;">
            <img src="/img/box-pagseguro.png" alt="PagSeguro sua Compra está Segura">
        </div>
</div>
<script type="text/javascript">
    $('form').submit(function () {
        /* Valida nome completo */
        var palavrasNome = $("input[name='nome']").val().split(" ").length;
        if (palavrasNome < 2) {
            bootbox.alert("Digite seu nome completo");
            return false;
        }

        /* Valida email */
        var email = $("input[name='email']").val();
        if ((email.length == 0) && ((email.indexOf("@") < 1) || (email.indexOf('.') < 7))) {
            bootbox.alert("Digite um email válido");
            return false;
        }

        /* Digite o DDD */
        var ddd = $("input[name='ddd']").val();
        if (ddd.length == 0) {
            bootbox.alert("Digite o DDD do telefone");
            return false;
        }

        /* Digite o Telefone */
        var telefone = $("input[name='telefone']").val();
        if (telefone.length == 0) {
            bootbox.alert("Digite o telefone");
            return false;
        }

        /* Digite o valor */
        var valor = $("input[name='valor']").val();
        if (valor.length == 0) {
            bootbox.alert("Digite o valor");
            return false;
        }
        return true;;
    });
</script>
