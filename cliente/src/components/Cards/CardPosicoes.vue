<template>
    <div class="card">
        <div class="card-status bg-teal"></div>
        <div class="card-header">
            <h3 class="card-title">Posicões</h3>
            <div class="card-options">
                <router-link :to="{ name: 'posicoes.create' }" class="btn btn-primary btn-sm">
                    Criar novo
                </router-link>
            </div>
        </div>
        <ApiTable :traducao-campos="traducaoCampos" :campos-excluidos="camposExcluidos" recurso="posicoes"/>
    </div>
</template>

<script>
    import ApiTable from "../ApiTable";
    export default {
        name: "CardPosicoes",
        components: {ApiTable},
        data() {
            return {
                camposExcluidos: ["id"],
                traducaoCampos: {
                    created_at: "Criado em",
                    updated_at: "Atualizado em"
                }
            }
        }
    }
</script>

<style scoped>

</style>