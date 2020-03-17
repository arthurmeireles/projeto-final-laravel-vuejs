<template>
    <div class="col-12">
        <PartidaForm :partidas-id="partidaId" modo="edicao" />
    </div>
</template>

<script>
    import PartidaForm from "../../Forms/PartidaForm";
    export default {
        name: "Edit",
        components: {PartidaForm},
        computed: {
            partidaId() {
                return this.$route.params.id
            }
        }
    }
</script>

<style scoped>

</style>