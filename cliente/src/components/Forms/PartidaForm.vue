<template>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ textosCard.titulo }}</h3>
        </div>
        <div class="ml-2 row">
            <div class="col-auto">
                <form action="">
                    <div class="form-group">
                        <label for="titulo">Titulo</label>
                        <input v-model="partida.titulo" id="titulo" type="text" class="form-control" />
                    
                        <label for="descricao">Descrição</label>
                        <input v-model="partida.descricao" id="descricao" type="text" class="form-control" />
                    </div>



                    <div class="form-group">
                        <label>Escalação</label>
                        .batata
                        <input type="checkbox" v-model="jogadores" :value="jogadores.jogador_id">
                        {{jogadores.jogador_nome}}
                        
                            <!--<select class="form-control" id="exampleFormControlSelect1" v-model="jogador.jogador_id ">
                                    <option :key="index" :value="jogador.id" v-for="(jogador, index) in items.data"> {{ posicao.nome}}</option>
                            </select>-->
                           <!--<select id ="meuForm"> 
                            //     <option :key="index" v-for="(chave, index) in items.data"> {{ item[chave].nome}}</option>
                            // </select>-->
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
        name: "PartidaForm",
        props: {
            partidaId: {
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
                partida: {
                    titulo: '',
                    descricao: '',
                    
                },
                jogadores_selecionados: [],
                jogadores: [
                    {
                        jogador_id: 0,
                        jogador_nome: '',
                    },
                    {
                        jogador_id: 1,
                        jogador_nome: '',
                    },
                ],
                items: {
                    data: []
                },
                paginaAtual: 1,
            }

        },
        mounted() {
            if (this.modo === MODO_EDICAO) {
                this.resgatarPartida()
            }
            this.carregarPartidas()
        },
        computed: {
            textosCard() {
                return this.modo === MODO_CRIACAO ?
                    {
                        titulo: "Criação de partidas",
                        botao: "Criar"
                    } :
                    {
                        titulo: "Edição de partidas",
                        botao: "Atualizar"
                    }
            },
            tituloCard() {
                return this.modo === MODO_CRIACAO ? "Criação de partidas" : "Edição de partidas"
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
                    this.criarPartida()
                } else if (this.modo === MODO_EDICAO) {
                    this.editarPartida()
                }
            },
            criarPartida() {
                fetch(`${BASE_URL}/partida`, {
                    method: "post",
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },

                    //make sure to serialize your JSON body
                    body: JSON.stringify(this.partida)
                })
                    .then( (response) => {
                        window.console.log(response)

                        Swal.fire('Partida criada com sucesso!', '', 'success')

                        return this.$router.push({ name: 'partidas' })
                    });
            },
            editarPartida() {
                fetch(`${BASE_URL}/partidas/${this.partidaId}`, {
                    method: "put",
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },

                    //make sure to serialize your JSON body
                    body: JSON.stringify(this.partida)
                })
                    .then( (response) => {
                        window.console.log(response)

                        Swal.fire('Partida editada com sucesso!', '', 'success')

                        return this.$router.push({ name: 'partidas' })
                    });
            },
            resgatarPartida() {
                const vm = this
                fetch(`${BASE_URL}/partidas/${this.partidaId}`)
                    .then(function(response) {
                        response.json()
                            .then(function (partida) {
                                parseInt(partida)
                                vm.partida = partida
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

            carregarPartidas() {
                const vm = this
                fetch(`${BASE_URL}/partidas?page=${this.paginaAtual}`)
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