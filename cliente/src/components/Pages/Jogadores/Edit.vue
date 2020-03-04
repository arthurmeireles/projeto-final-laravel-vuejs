<template>
    <div class="col-12">
        <JogadorForm :jogador-id="jogadorId" modo="edicao" />
    </div>
</template>

<script>
    import JogadorForm from "../../Forms/JogadorForm";
    export default {
        name: "Edit",
        components: {JogadorForm},
        computed: {
            jogadorId() {
                return this.$route.params.id
            }
        }
    }
</script>

<style scoped>

</style>