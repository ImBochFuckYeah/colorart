let user = {};

$("#submit").click(function () {
    if (validInputs()) {
        authUser();
    }
});

function validInputs() {
    let obj = {};
    obj.email = $("#email").val();
    obj.password = $("#password").val();

    if (obj.email && obj.password) {
        user = obj;
        return true;
    } else {
        alertInfo('Completa todos los campos!')
    }
    return false;
}

async function authUser() {
    try {
        const response = await fetch('../api/authlogin.php', {
            method: 'POST',
            body: JSON.stringify(user)
        });
        const data = await response.json();
        
        const content = data.message;

        if (data.error) {
            alertError(content);
        } else if (data.info) {
            alertInfo(content);
        } else {
            alertSuccess(content);
        }
    } catch (error) {
        await alertError('error: ' + error);
    }
}