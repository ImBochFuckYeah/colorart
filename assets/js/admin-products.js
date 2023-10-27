let documentdata = new Vue({
    el: "#body",
    data: {
        datatable: []
    },
    methods: {},
    async created() {
    },
});

let table = new DataTable('#myTable', {
    data: documentdata.datatable,
    language: {
        url: "https://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"
    },
    responsive: true,
    dom: 'Bfrtip',
    buttons: [
        {
            text: 'Agregar producto',
            action: function (e, dt, node, config) {
                alert('Button activated');
            },
            className: 'btn btn-info btn-sm' // Agrega la clase de Bootstrap aquí
        }
    ],
    columns: [
        { data: 'row1' },
        { data: 'row2' },
        { data: 'row3' },
        { data: 'row4' }
    ]
});