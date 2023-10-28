let documentdata = new Vue({
    el: "#body",
    data: {
        bodydata: []
    },
    methods: {},
    async created() {
        await getData();
    },
});

async function getData() {
    try {
        const response = await fetch(server + '/colorart/api/content-homepage.php');
        const data = await response.json();
        if (data) {
            documentdata.bodydata = data.data;
        }
    } catch (error) {
        await alertError('error: ' + error);
    }
}