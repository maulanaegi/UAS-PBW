<template>
    <div>
        <h2>Daftar Pengunjung</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Destinasi</th>
                    <th>Tanggal Kunjungan</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(visitor, index) in visitors" :key="visitor.id">
                    <td>{{ index + 1 }}</td>
                    <td>{{ visitor.name }}</td>
                    <td>{{ visitor.email }}</td>
                    <td>{{ visitor.destination }}</td>
                    <td>{{ visitor.visit_date }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            visitors: [],
        };
    },
    mounted() {
        this.fetchVisitors();
    },
    methods: {
        fetchVisitors() {
            fetch('http://127.0.0.1:8000/api/visitors')
                .then(response => response.json())
                .then(data => {
                    this.visitors = data;
                })
                .catch(error => {
                    console.error('Error fetching visitors:', error);
                });
        },
    },
};
</script>
