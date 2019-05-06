
        <h2>Notificação de INCLUSÃO de usuário</h2>

        <div>
            Recebemos o seu cadastro para fins de utilização do SisCad !
            <br>
            <p>Segue os seus dados abaixo:</p>
			<p>Usuário: {{ $user->name }}</p>
			<p>e-mail: {{ $user->email }}</p>
			<br>
            Favor ativar a sua conta <a href="{{ URL::to('activate/'.$user->confirmation_code) }}">AQUI</a>.
            <br/>
        </div>
