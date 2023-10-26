let user = {};

$("#submit").click(function () {
    if (validInputs()) {
        saveUser();
    }
});

function validInputs() {
    let obj = {};
    obj.name = $("#name").val();
    obj.lastname = $("#last-name").val();
    obj.email = $("#email").val();
    obj.password = $("#password").val();
    obj.confirm_password = $("#confirm-password").val();

    if (obj.name && obj.lastname && obj.email && obj.password && obj.confirm_password) {
        if (obj.password.length >= 6) {
            if (validPassword(obj)) {
                user = obj;
                return true;
            } else {
                alertError('La contraseña no conicide!')
            }
        } else {
            alertInfo('La contaseña debe contener almenos 6 caracteres!');
        }
    } else {
        alertError('Datos incompletos!')
    }

}

function validPassword(obj) {
    if (obj.password === obj.confirm_password) {
        return true;
    }
}

async function saveUser() {
    try {
        const response = await fetch('../api/saveuser.php', {
            method: 'POST',
            body: JSON.stringify(user)
        });
        const data = await response.json();

        const content = data.message + ` <a href="login.php" class="alert-link">Volver al login</a>.`;
        
        if (data.error) {
            alertError(content);
        } else if (data.info) {
            alertInfo(content);
        } else {
            alertSuccess(content);
        }

        if (!data.error && !data.info) {
            resetForm();
        }
    } catch (error) {
        await alertError('error: ' + error);
    }
}

function resetForm() {
    var form = document.getElementById('form');
    form.reset();
}