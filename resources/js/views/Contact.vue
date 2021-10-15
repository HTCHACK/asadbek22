<template>
    <div class="container">
        <table class="table table-bordered" style="background: #fff">
            <thead>
                <tr>
                    <th scope="col">Имя</th>
                    <th scope="col">Телефонный номер</th>
                    <th scope="col">Сообщение</th>
                    <th scope="col">Созданный</th>
                </tr>
            </thead>
            <tbody v-if="contacts.length > 0">
                <tr scope="row" v-for="contact in contacts" :key="contact.id">
                    <td>{{ contact.name }}</td>
                    <td>{{ contact.phone_number }}</td>
                    <td>
                        <el-button type="text" @click="dialogVisible = true"
                            >Деталь</el-button
                        >

                        <el-dialog
                            :title="contact.name"
                            :visible.sync="dialogVisible"
                            width="90%"
                            height="50%"
                        >
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Сообщение</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                                <tr>
                                    <td>{{ contact.message }}</td>
                                </tr>
                                <tbody></tbody>
                            </table>
                        </el-dialog>
                    </td>
                    <td>{{ contact.created_at }}</td>
                </tr>
            </tbody>
            <tbody v-else>
                <tr scope="row" >
                    <td colspan="4">
                    Сообщений пока нет
                    </td>
                </tr>
            </tbody>

            <tbody></tbody>
        </table>
    </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";

export default {
    data() {
        return {
            dialogVisible: false,
        };
    },

    computed: {
        ...mapGetters({
            contacts: "category/contacts",
        }),
    },

    mounted() {
        this.getContacts();
    },

    methods: {
        ...mapActions({
            getContacts: "category/getContacts",
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
