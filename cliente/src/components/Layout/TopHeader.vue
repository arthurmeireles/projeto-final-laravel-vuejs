<template>
    <nav class="navbar nav bg-dark">
        <div class="container">
            <div class="d-flex menu-arthur">
                <a class="header-brand" href="#">
                    <img :src="logo" class="header-brand-img" alt="Portal">
                </a>
                <div class="d-flex">
                    <div class="dropdown">
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="#">
                                <i class="dropdown-icon fe fe-user"></i> Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="dropdown-icon fe fe-settings"></i> Settings
                            </a>
                            <a class="dropdown-item" href="#">
                                <span class="float-right"><span class="badge badge-primary">6</span></span>
                                <i class="dropdown-icon fe fe-mail"></i> Inbox
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="dropdown-icon fe fe-send"></i> Message
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">
                                <i class="dropdown-icon fe fe-help-circle"></i> Need help?
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="dropdown-icon fe fe-log-out"></i> Sign out
                            </a>
                        </div>
                    </div>
                </div>
                <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
                    <span class="header-toggler-icon"></span>
                </a>
            </div>
        </div>
    </nav>
</template>

<script>
    import Flamengo from '../../assets/flamengo.png';
    import LogoNaviSemTexto from '../../assets/logo-navi-sem-texto.png';


    export default {
        name: "TopHeader",
        data() {
            return {
                logo: Flamengo
            }
        },
        computed: {
            avatarStyle() {
                return { backgroundImage: `url(${LogoNaviSemTexto})` }
            }
        }
    }
</script>

<style>
    .menu-arthur{
        width: 100%;
        justify-content: center;
    }
</style>