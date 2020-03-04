<template>
    <div class="card">
        <div class="card-status bg-purple"></div>
        <div class="card-header">
            <h3 class="card-title">Partidas</h3>
        </div>
        <ApiTable :campos-excluidos="camposExcluidos" recurso="partidas"/>
    </div>
</template>

<script>
    import ApiTable from "../ApiTable";
    export default {
        name: "CardPartidas",
        components: {ApiTable},
        data() {
            return {
                camposExcluidos: ["created_at", "updated_at"]
            }
        }
    }
</script>

<style scoped>

</style>