<template>
    <div class="col-12">
        <PartidasForm :partidas-id="partidaId" modo="edicao" />
    </div>
</template>

<script>
    import PartidasForm from "../../Forms/PartidasForm";
    export default {
        name: "Edit",
        components: {PartidasForm},
        computed: {
            partidaId() {
                return this.$route.params.id
            }
        }
    }
</script>

<style scoped>

</style>