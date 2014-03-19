<h3>Finalizar pedido</h3>
<p>Entre com seus dados para que possamos entrar em contato:</p>


<form id="finalizar" method="post" action="<?= $this->here ?>">
    <fieldset>
        <legend>Seus dados</legend>
        <label>Nome</label>
        <input type="text" class="input-xlarge" required placeholder="Seu nome completo" name="nome">

        <label>E-Mail</label>
        <input type="email" class="input-xlarge" required placeholder="Endereço eletrônico" name="email">
        <span class="help-block">Exemplo: nome@provedor.com.br</span>

        <label>Telefone</label>
        <input type="text" placeholder="Número de telefone" name="telefone">
        <span class="help-block">Formato: (XX) XXXX-XXXX</span>

        <label>Endereço</label>
        <input type="text" placeholder="Nome da Rua, número e bairro" name="endereco">
        <span class="help-block">Exemplo: Rua Monte Carmelo, 126. Centro</span>

        <label>Cidade</label>
        <input type="text" placeholder="Nome da cidade / Estado" name="cidade">
        <span class="help-block">Exemplo: Aparecida/SP</span>

        <label>CEP</label>
        <input type="text" placeholder="Número do seu CEP" name="cep">
        <span class="help-block">Formato: 00.000-000</span>

        <label>Mensagem</label>
        <textarea class="input-xlarge" onclick="required" placeholder="Se for necessário deixe uma mensagem aqui"
                  name="mensagem"></textarea>
        <p class="text-error"><strong>Frete por conta do Cliente</strong></p>
        <p>
            <button type="submit" class="btn btn-large btn-success"><i class="icon-ok"></i> Finalizar</button>
        </p>
    </fieldset>
</form>
