
        <h2>Notificação: INCLUSÃO de nova conta de usuário</h2>

        <div>
            Recebemos a solicitacao de cadastro de um novo usuário para fins de utilização do SisCad !
            <br>
            <p>Segue os dados abaixo:</p>
			<br>
			<p>Usuário: {{ $user->name }}</p>
            <p>e-mail: {{ $user->email }}</p>
			<br>

            Para realizar a ativação da conta acima, clique <a href="{{ URL::to('/users') }}">AQUI</a>.

            <br/>
            <p>Obrigado</p>
            <br>
            <br>
            <br>
            <hr>
            <p>Este e um e-mail gerado automaticamente.</p>

        </div>
