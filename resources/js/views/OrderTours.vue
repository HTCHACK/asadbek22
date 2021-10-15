<template>
    <div class="container">
        <table class="table table-bordered" style="background: #fff">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Телефонный номер</th>
                    <th scope="col">ТУР Пакеты</th>
                </tr>
            </thead>
            <tbody v-if="orders.length > 0">
                <tr scope="row" v-for="order in orders" :key="order.id">
                    <td>{{ order.id }}</td>
                    <td>{{ order.name }}</td>
                    <td>{{ order.phone_number }}</td>
                    <td>{{ order.tour.city }}</td>
                </tr>
            </tbody>
            <tbody v-else>
                <tr scope="row">
                    <td colspan="4">Еще нет Заказы</td>
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
            orders: "category/orders",
        }),
    },

    mounted() {
        this.getOrders();
    },

    methods: {
        ...mapActions({
            getOrders: "category/getorders",
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
