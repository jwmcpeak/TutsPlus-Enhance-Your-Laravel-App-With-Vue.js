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
            <tr v-for="user in model.data" :key="user.id">
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
    </div>
</template>


<script>
export default {
    props: ['model', 'currentUserId'],
    data: function() {
        return {
            status: null
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
        }
    }
}
</script>
