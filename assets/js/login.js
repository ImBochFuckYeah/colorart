let user = {};

$("#submit").click(function () {
    if (validInputs()) {
        authUser();
    }
});

function validInputs() {
    let obj = {};
    obj.username = $("#username").val();
    obj.password = $("#password").val();

    if (obj.username && obj.password) {
        user = obj;
        return true;
    } else {
        alertInfo('Completa todos los campos!')
    }
    return false;
}

async function authUser() {
    try {
        const response = await fetch(server + '/colorart/api/authlogin.php', {
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
            window.location.href =  server + "/colorart/admin";
        }
    } catch (error) {
        await alertError('error: ' + error);
    }
}