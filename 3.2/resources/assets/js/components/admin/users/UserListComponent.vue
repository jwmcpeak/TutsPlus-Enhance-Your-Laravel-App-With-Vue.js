<template>
    <div>
    <div v-if="status" class="alert alert-info">
        {{ status }}
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Roles</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="user in userData.data" :key="user.id">
                <td>
                    <a :href="getUserUrl(user)" @click="checkUser" :data-user-id="user.id">{{ user.name }}</a>
                </td>
                <td>{{ user.email }}</td>
                <td>
                    {{ getUserRoles(user) }}
                </td>
            </tr>

        </tbody>
    </table>

    <pagination :data="userData" v-on:pagination-change-page="getUserList" />

    </div>
</template>


<script>
import axios from 'axios';
export default {
    props: ['model', 'currentUserId'],
    data: function() {
        return {
            status: null,
            userData: null
        }
    },
    methods: {
        getUserUrl(user) {
            return `/admin/users/${user.id}/edit`;
        },
        getUserRoles(user) {
            let roles = user.roles.map(val => {
                return val.name;
            });

            return roles.join(',');
        },
        checkUser(e) {
            let target = e.target;
            let id = target.getAttribute('data-user-id');

            if (id == this.currentUserId) {
                e.preventDefault();
                this.status = 'You cannot edit yourself.';
            }
        },
        getUserList(page) {
            axios.get('/admin/users/user-list', {
                params: { page }
            }).then(response => {
                this.userData = response.data;
            });
        }
    },
    created() {
        this.userData = this.model;
    }
}
</script>
