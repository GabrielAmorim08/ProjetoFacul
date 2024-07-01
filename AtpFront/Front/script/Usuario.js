
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
            var nome = _nome.value;
            var email = _email.value;
            var telefone = _telefone.value;
            var senha = _senha.value; 

            var url = `../pages/formAction.html?${nome}&${email}&${telefone}&${senha}`;
            window.location.href = url;
        }
    }

    async function Login()
    {
        if(_nome.value == "" )
        {
            alert("Campo Nome é obrigatorio");
            _nome.focus;
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
                'senha':_senha.value
            }

            var dados = JSON.stringify(usuario);
        }
    }
