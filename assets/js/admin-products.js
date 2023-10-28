let documentdata = new Vue({
    el: "#body",
    data: {
        datatable: [],
        brands: [],
        categories: [],
        product: {}
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
            text: 'Agregar producto',
            action: function (e, dt, node, config) {
                openModal();
            },
            className: 'btn btn-outline-primary' // Agrega la clase de Bootstrap aquí
        }
    ],
    columns: [
        { data: 'id_producto' },
        { data: 'titulo' },
        { data: 'descripcion_producto' },
        { data: 'precio' },
        { data: 'url' },
        { data: 'descripcion_marca' },
        { data: 'descripcion_categoria' },
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
        const response = await fetch(server + '/colorart/api/product/getproducts.php');
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

async function getBrands() {
    try {
        const response = await fetch(server + '/colorart/api/brand/getbrands.php');
        const data = await response.json();
        const content = data;

        if (content.data) {
            documentdata.brands = content.data;
        }
    } catch (error) {
        await alertError('error: ' + error);
    }
}

async function getCategoreis() {
    try {
        const response = await fetch(server + '/colorart/api/category/getcategories.php');
        const data = await response.json();
        const content = data;

        if (content.data) {
            documentdata.categories = content.data;
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
    let obj = {};
    obj.titulo = $("#titulo").val();
    obj.descripcion = $("#descripcion").val();
    obj.precio = $("#precio").val();
    obj.url = $("#url").val();
    obj.id_marca = $("#marca").val();
    obj.id_categoria = $("#categoria").val();

    if (obj.titulo && obj.descripcion && obj.precio && obj.url && obj.id_marca && obj.id_categoria) {
        documentdata.product = obj;
        return true;
    } else {
        alertInfo('Completa todos los campos!')
    }
    return false;
}

async function saveData() {
    try {
        await fetch(server + '/colorart/api/product/insertproduc.php', {
            method: 'POST',
            body: JSON.stringify(documentdata.product)
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
        await fetch(server + "/colorart/api/product/updateproduct.php", {
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

function openModal() {
    getBrands();
    getCategoreis();
    $('#myModal').modal('show');
}

function closeModal() {
    $('#myModal').modal('hide');
    refreshForm();
}

function refreshForm() {
    const form = document.getElementById('form');
    form.reset();
}