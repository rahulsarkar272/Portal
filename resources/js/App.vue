

<template>
 <router-view v-slot="{ Component, route }">
        <div :key="route.name">
            <Component :is="Component" />
        </div>
    </router-view>
</template>

<script>
export default {
    name: "App.vue"
}
</script>

<style >

</style>