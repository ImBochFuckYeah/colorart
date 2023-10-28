let documentdata = new Vue({
    el: "#body",
    data: {
        datatable: []
    },
    methods: {},
    async created() {
        getDataTable();
    },
});

let table = new DataTable('#myTable', {
    data: documentdata.datatable,
    responsive: true,
    dom: 'Bfrtip',
    buttons: [
        {
            text: 'Agregar categoria',
            action: function (e, dt, node, config) {
                openModal();
            },
            className: 'btn btn-outline-primary' // Agrega la clase de Bootstrap aquí
        }
    ],
    columns: [
        { data: 'id' },
        { data: 'descripcion' },
        {
            data: 'ignore',
            render: function (data) {
                if (data.estado != 0) {
                    return '<button class="btn btn-success btn-sm" onclick="changeEstatus(' + data.id + ', 0)"> ACTIVO </button>';
                } else {
                    return '<button class="btn btn-danger btn-sm" onclick="changeEstatus(' + data.id + ', 1)"> INACTIVO </button>';
                }
            }
        }
    ]
});

async function getDataTable() {
    try {
        const response = await fetch(server + '/colorart/api/category/getcategories.php');
        const data = await response.json();

        const content = data;

        if (data.error) {
            alertError(content.message);
        } else if (data.info) {
            alertInfo(content.message);
        } else {
            alertSuccess(content.message);
        }
        if (content.data) {
            documentdata.datatable = content.data;
            table.clear().rows.add(documentdata.datatable).draw();
        }
    } catch (error) {
        await alertError('error: ' + error);
    }
}

$("#submit").click(function () {
    if (validInputs()) {
        saveData();
    }
});

function validInputs() {
    const descripcion = $("#descripcion").val();

    if (descripcion) {
        return true;
    } else {
        alertInfo('Ingresa una descripcion!')
    }
    return false;
}

async function saveData() {
    let obj = {};
    obj.descripcion = $('#descripcion').val();
    try {
        await fetch(server + '/colorart/api/category/insertcategory.php', {
            method: 'POST',
            body: JSON.stringify(obj)
        });
    } catch (error) {
        await alertError('error: ' + error);
    } finally {
        getDataTable();
        closeModal();
    }
}

function changeEstatus(id, estado) {
    let estatus; if (estado === 0) { estatus = 'inactivo' } else { estatus = 'activo' }
    Swal.fire({
        title: '¿Estás seguro de tu elección?',
        text: 'Cambiar el estado a ' + estatus,
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Sí',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            update(id, estado);
        }
    });
}

async function update(id, estado) {
    try {
        await fetch(server + "/colorart/api/category/updatecategory.php", {
            method: 'POST',
            body: JSON.stringify({ id, estado })
        });
    } catch (e) {
        Swal.fire({
            icon: "error",
            title: "No se puede actualizar",
            text: "Ocurrio un error al intentar modificar el registro",
            footer: '<a href="javascript:void(0)">Why do I have this issue?</a>',
        });
    } finally {
        getDataTable();
        closeModal();
    }
}

function closeModal() {
    $('#myModal').modal('hide');
    refreshForm();
}

function refreshForm() {
    const form = document.getElementById('form');
    form.reset();
}

function openModal() {
    $('#myModal').modal('show');
}