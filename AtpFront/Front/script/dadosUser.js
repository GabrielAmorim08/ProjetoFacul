window.onload = function() {

    let queryParams = window.location.search.substring(1);
    let paramsArray = queryParams.split('&');

    for (let param of paramsArray) {
        let [key, value] = param.split('=');

        if(key == 'name')
        { 
            document.getElementById('nome').value = value;
            document.getElementById('nomeUsuario').textContent += value;
        }
        else if(key == 'email')
        {   
            document.getElementById('email').value = value;
        }
        else if(key == 'phone')
        {
            document.getElementById('tel').value = value;
        }
        else if(key == 'senha')
        {                                            
            document.getElementById('senha').value = value;
        }                                    
    }
}

function voltar()
{
    window.location.href = '../pages/form.html';
}

