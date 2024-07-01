
    var _nome = document.getElementById("name");
    var _email = document.getElementById("email");
    var _telefone = document.getElementById("tel");
    var _senha = document.getElementById("senha");

    async function Cadastro() {

        if(_nome.value == "" )
        {
            alert("Campo Nome é obrigatorio");
            _nome.focus;
        }
        else if(_email.value == "" )
        {
            alert("Campo email é obrigatorio");
            _email.focus;
        }
        else if(_telefone.value == "" )
        {
            alert("Campo Celular é obrigatorio");
            _telefone.focus;
        }
        else if(_telefone.value.length < 11)
        {
            await alert("Faltaram numeros no campo Celular");
            _telefone.focus;
        }
        else if(_senha.value == "" )
        {
            alert("Campo senha é obrigatorio");
            _senha.focus;                    
        }
        else
        {

            var usuario = {
                'nome': _nome.value,
                'email': _email.value,
                'telefone': _telefone.value,
                'senha': _senha.value,
            };

            try {
                var dados = JSON.stringify(usuario);
                var response = await fetch('http://localhost/AtpFront/Back/Login.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: dados,
                });
                if (!response.ok) {
                    throw new Error('Erro ao cadastrar usuário');
                }
        
                var data = await response.json();
        
                if (data.status === 'ok') {
                    console.log(data.message);
                    alert('Usuário cadastrado com sucesso!');
                } else {
                    console.log('Erro:', data.message);
                    alert('Erro ao cadastrar usuário: ' + data.message);
                }
            } catch (error) {
                console.error('Erro:', error);
                alert('Erro ao tentar fazer cadastro. Por favor, tente novamente mais tarde.');
            }
        }
    }

    async function Login() {
        if (_nome.value == "") {
            alert("Campo Nome é obrigatório");
            _nome.focus();
        } else if (_senha.value == "") {
            alert("Campo senha é obrigatório");
            _senha.focus();                    
        } else {
            var usuario = {
                'nome': _nome.value,
                'senha': _senha.value
            };
    
            var dados = JSON.stringify(usuario);
            fetch('http://localhost/AtpFront/Back/Login.php', {
                method: 'POST',  // Mudança para POST aqui
                headers: {
                    'Content-Type': 'application/json'
                },
                body: dados,
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'ok') {
                    console.log(data.message);
                    alert(data.status);
                } else {
                    console.log('Erro:', data.message);
                    alert(data.message); // Exibir mensagem de erro para o usuário
                }
            })
            .catch((error) => {
                console.log('Erro:', error);
                alert('Erro ao tentar fazer login. Por favor, tente novamente mais tarde.');
            });
        }
    }
    
    
