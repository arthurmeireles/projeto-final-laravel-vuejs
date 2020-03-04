import Vue from "vue";
import VueRouter from "vue-router";
import Home from "../components/Pages/Home"
import Posicoes from "../components/Pages/Posicoes"
import PosicaoForm from "../components/Forms/PosicaoForm"
import Partidas from "../components/Pages/Partidas"
import Jogadores from "../components/Pages/Jogadores"
import JogadorForm from "../components/Forms/JogadorForm"
import PosicoesEdit from "../components/Pages/Posicoes/Edit"
import JogadoresEdit from "../components/Pages/Jogadores/Edit"



Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    history: true,
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/posicoes',
            name: 'posicoes',
            component: Posicoes
        },
        {
            path: '/posicoes/create',
            name: 'posicoes.create',
            component: PosicaoForm
        },
        {
            path: '/posicoes/:id/edit',
            name: 'posicoes.edit',
            component: PosicoesEdit
        },
        {
            path: '/partidas',
            name: 'partidas',
            component: Partidas
        },
        {
            path: '/partidas/:id/edit',
            name: 'partidas.edit',
            component: Partidas
        },
        {
            path: '/jogadores',
            name: 'jogadores',
            component: Jogadores
        },
        {
            path: '/jogadores/create',
            name: 'jogadores.create',
            component: JogadorForm
        },
        {
            path: '/jogadores/:id/edit',
            name: 'jogadores.edit',
            component: JogadoresEdit
        },

    ]
});

export default router;