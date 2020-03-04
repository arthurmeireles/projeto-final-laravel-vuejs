<template>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ textosCard.titulo }}</h3>
        </div>
        <div class="ml-2 row">
            <div class="col-auto">
                <form action="">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input v-model="posicao.nome" id="nome" type="text" class="form-control" />
                    </div>
                </form>
                <button @click.prevent="tratarSubmissao" class="btn btn-outline-primary">{{ textosCard.botao }}</button>
            </div>
        </div>
    </div>
</template>

<script>
    import Swal from 'sweetalert2'

    const BASE_URL = "http://localhost:8000/api"
    const MODO_CRIACAO = "criacao"
    const MODO_EDICAO = "edicao"
    export default {
        name: "PosicaoForm",
        props: {
            posicaoId: {
                type: Number,
                default: null
            },
            modo: {
                type: String,
                default: MODO_CRIACAO
            }
        },
        data() {
            return {
                posicao: {
                    nome: ''
                }
            }
        },
        mounted() {
            if (this.modo === MODO_EDICAO) {
                this.resgatarPosicao()
            }
        },
        computed: {
            textosCard() {
                return this.modo === MODO_CRIACAO ?
                    {
                        titulo: "Criação de posições",
                        botao: "Criar"
                    } :
                    {
                        titulo: "Edição de posições",
                        botao: "Atualizar"
                    }
            },
            tituloCard() {
                return this.modo === MODO_CRIACAO ? "Criação de posições" : "Edição de posições"
            },
        },
        methods: {
            tratarSubmissao() {
                if (this.modo === MODO_CRIACAO) {
                    this.criarPosicao()
                } else if (this.modo === MODO_EDICAO) {
                    this.editarPosicao()
                }
            },
            criarPosicao() {
                fetch(`${BASE_URL}/posicoes`, {
                    method: "post",
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },

                    //make sure to serialize your JSON body
                    body: JSON.stringify(this.posicao)
                })
                    .then( (response) => {
                        window.console.log(response)
                        Swal.fire('Posição criada com sucesso!', '', 'success')
                        return this.$router.push({ name: 'posicoes' })
                    });
            },
            editarPosicao() {
                fetch(`${BASE_URL}/posicoes/${this.posicaoId}`, {
                    method: "put",
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },

                    //make sure to serialize your JSON body
                    body: JSON.stringify(this.posicao)
                })
                    .then( (response) => {
                        window.console.log(response)

                        Swal.fire('Posição editada com sucesso!', '', 'success')

                        return this.$router.push({ name: 'posicoes' })
                    });

            },
            data() {
                return {
                    posicao: {
                        nome: ''
                    }
                }
            },
            resgatarPosicao() {
                const vm = this
                fetch(`${BASE_URL}/posicoes/${this.posicaoId}`)
                    .then(function(response) {
                        response.json()
                            .then(function (posicao) {
                                vm.posicao = posicao
                            })
                    })
            }
        }
    }
</script>

<style scoped>

</style>