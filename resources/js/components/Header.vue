<template>
    <header >
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <router-link class="nav-link active" :to="{name: 'home'}">Home</router-link>
            </li>
            <li class="nav-item">
                <router-link class="nav-link active" :to="{name: 'listaPost'}">Post</router-link>
            </li>
            <li class="nav-item">
                <router-link class="nav-link active" :to="{name: 'faq'}">FAQ</router-link>
            </li>
            <li class="nav-item">
                <router-link class="nav-link active" :to="{name: 'contattaci'}">Contattaci</router-link>
            </li>
        </ul>
    </header>
</template>

<script>
export default {
    name: 'Header'

}
</script>

<style>
    .router-link-exact-active {
        font-weight: bold;
    }
</style>