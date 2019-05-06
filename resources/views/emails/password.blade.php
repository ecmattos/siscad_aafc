<h2>Solicitação de nova senha de acesso</h2>

        <div>
            Recebemos a sua solicitação de nova senha de acesso para fins de utilização do SisCad !
            <br>
            <p>Segue os seus dados abaixo:</p>
			<p>Usuário: {{ $user->name }}</p>
			<p>e-mail: {{ $user->email }}</p>
			<br>
            Favor cadastrar nova senha, clique <a href="{{ url('password/reset/'.$token) }}">AQUI</a>.
            <br/>
            <br/>
            Caso não tenha solicitado, favor descosiderar !
        </div>