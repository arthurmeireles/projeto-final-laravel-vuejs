<template>
    <div>
        <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg order-lg-first">
                        <ul class="nav nav-tabs justify-content-center border-0 flex-column flex-lg-row">
                            <li class="nav-item">
                                <router-link to="/" class="nav-link" exact-active-class="">
                                    Página inicial
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/posicoes" class="nav-link" exact-active-class="active">
                                    Posicões
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/partidas" class="nav-link" exact-active-class="active">
                                    Partidas
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/jogadores" class="nav-link" exact-active-class="active">
                                    Jogadores
                                </router-link>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        name: "Navbar"
    }
</script>

<style scoped>
.header{
    background-color: #c22a1e;
}
    ul li a{
        color: white !important;
    }
    body{
        font-family: Rajdhani, sans-serif;
    }
</style>