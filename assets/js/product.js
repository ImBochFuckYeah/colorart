let documentdata = new Vue({
    el: "#body",
    data: {
        bodydata: []
    },
    methods: {},
    async created() {
        await getData(id);
    },
});

async function getData(id) {
    try {
        const response = await fetch(server + '/colorart/api/product/getbyid.php', {
            method: 'POST',
            body: JSON.stringify({"id":id})
        });
        const data = await response.json();
        if (data) {
            documentdata.bodydata = data.data;
        }
    } catch (error) {
        await alertError('error: ' + error);
    }
}