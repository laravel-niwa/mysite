<template>
    <div class="container-fluid bg-dark mb-3">
        <div class="container">
            <nav class="navbar navbar-dark">
                <span class="navbar-brand mb-0 h1">Vue Laravel SPA</span>
                <div>
                    <router-link v-bind:to="{ name: 'login' }">
                        <button class="btn btn-success">login</button>
                    </router-link>

                    <router-link v-bind:to="{ name: 'register' }">
                        <button class="btn btn-success">新規登録</button>
                    </router-link>

                    <router-link v-bind:to="{ name: 'user.list' }">
                        <button class="btn btn-success">userList</button>
                    </router-link>

                    <router-link v-bind:to="{ name: 'user.create' }">
                        <button class="btn btn-success">userADD</button>
                    </router-link>
                </div>
            </nav>
        </div>
    </div>
</template>

<script>
export default {};
</script>
