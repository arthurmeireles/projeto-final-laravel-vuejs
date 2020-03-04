<template>
    <div class="col-12">
        <PosicaoForm :posicao-id="posicaoId" modo="edicao" />
    </div>
</template>

<script>
    import PosicaoForm from "../../Forms/PosicaoForm";
    export default {
        name: "Edit",
        components: {PosicaoForm},
        computed: {
            posicaoId() {
                return this.$route.params.id
            }
        },
        data() {
            return {
                posicao: {
                    nome: ''
                }
            }
        },
    }
</script>

<style scoped>

</style>