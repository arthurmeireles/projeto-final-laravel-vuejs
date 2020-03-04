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
                        <input v-model="jogador.nome" id="nome" type="text" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Example select</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                                <template v-for="item in items.data">
                                    <option :key="item.id"></option>
                                </template>

                            </select>
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
        name: "JogadorForm",
        props: {
            jogadorId: {
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
                jogador: {
                    nome: ''
                },
                items: {
                    data: []
                },
                paginaAtual: 1
            }
        },
        mounted() {
            if (this.modo === MODO_EDICAO) {
                this.resgatarJogador()
            }
        },
        computed: {
            textosCard() {
                return this.modo === MODO_CRIACAO ?
                    {
                        titulo: "Criação de jogadores",
                        botao: "Criar"
                    } :
                    {
                        titulo: "Edição de jogadores",
                        botao: "Atualizar"
                    }
            },
            tituloCard() {
                return this.modo === MODO_CRIACAO ? "Criação de jogadores" : "Edição de jogadores"
            },
            chavesCabecalho() {
                if (this.items.data.length > 0) {
                    const vm = this
                    return Object.keys(this.items.data[0]).filter(function (chave) {
                        return vm.camposExcluidos.indexOf(chave) === -1
                    })
                }

                return []
            }
        },
        methods: {
            tratarSubmissao() {
                if (this.modo === MODO_CRIACAO) {
                    this.criarJogador()
                } else if (this.modo === MODO_EDICAO) {
                    this.editarJogador()
                }
            },
            criarJogador() {
                fetch(`${BASE_URL}/jogadores`, {
                    method: "post",
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },

                    //make sure to serialize your JSON body
                    body: JSON.stringify(this.jogador)
                })
                    .then( (response) => {
                        window.console.log(response)

                        Swal.fire('Jogadores criada com sucesso!', '', 'success')

                        return this.$router.push({ name: 'jogadores' })
                    });
            },
            editarJogador() {
                fetch(`${BASE_URL}/jogadores/${this.jogadorId}`, {
                    method: "put",
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },

                    //make sure to serialize your JSON body
                    body: JSON.stringify(this.jogador)
                })
                    .then( (response) => {
                        window.console.log(response)

                        Swal.fire('Jogador editada com sucesso!', '', 'success')

                        return this.$router.push({ name: 'jogadores' })
                    });
            },
            resgatarJogador() {
                const vm = this
                fetch(`${BASE_URL}/jogadores/${this.jogadorId}`)
                    .then(function(response) {
                        response.json()
                            .then(function (jogador) {
                                vm.jogador = jogador
                            })
                    })
            },
            carregarDados() {
                const vm = this
                fetch(`${BASE_URL}/${this.recurso}?page=${this.paginaAtual}`)
                    .then(function(response) {
                        response.json()
                            .then(function (items) {
                                vm.items = items
                            })
                    })
            },
            atribuirPaginaAtual(pagina) {
                this.paginaAtual = pagina

                this.carregarDados()
            },
        }
    }
</script>

<style scoped>

</style>