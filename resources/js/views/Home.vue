<template>
    <div class="container">
        <table class="table table-bordered" style="background:#fff;">
            <thead>
                <tr>
                    <th scope="col">Имя</th>
                    <th scope="col">Телефонный номер</th>
                    <th scope="col">Роль</th>
                    <th scope="col">Эл. адрес</th>
                </tr>
            </thead>
            <tbody>
                <tr scope="row" v-for="admin in user" :key="admin.id">
                    <td>{{ admin.name }}</td>
                    <td>{{ admin.phone_number }}</td>
                    <td>{{ admin.roles[0].name }}</td>
                    <td>{{ admin.email }}</td>
                </tr>
            </tbody>

            <tbody></tbody>
        </table>
    </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";

export default {
    computed: {
        ...mapGetters({
            user: "category/user",
        }),
    },

    mounted() {
        this.getUser();
    },

    methods: {
        ...mapActions({
            getUser: "category/getUser",
        }),
    },
};
</script>

<style scoped>
.container {
    margin-top: 2rem;
}
.paragraph {
    font-weight: bold;
    padding-bottom: 1rem;
}
</style>
