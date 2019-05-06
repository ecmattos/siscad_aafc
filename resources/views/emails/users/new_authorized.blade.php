<h2>Sua conta foi ativada.</h2>

    <div>
        <p>Segue os seus dados abaixo:</p>
        <br>
        <p>Usuário: {{ $user_new->name }}</p>
        <p>e-mail: {{ $user_new->email }}</p>
        <br>

        Para começar a usar o SisCad, clique <a href="{{ URL::to('/') }}">AQUI</a>.

        <br/>
    </div>
