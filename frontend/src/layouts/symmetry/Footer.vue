<template>
  <footer class="bgDarkTexture" >
        <!--RRSS-->
        <div class="container-fluid border-top border-primary d-flex flex-md-row justify-content-center">
            <h5 class="text-uppercase mb-0 pt-4">{{ $t('footer.follow_idc_footer') }}</h5>
        </div>

        <div class="container-fluid d-flex flex-md-row justify-content-center pb-4"> 
            <div class="rrssIcons d-flex flex-row align-items-center justify-content-center flex-sm-nowrap flex-wrap mx-lg-5 px-lg-5 px-3">
                <a  rel="noopener noreferer" class="fa-stack m-lg-4 m-2" href="https://www.facebook.com/IDCgames"  target="_blank" aria-label="Facebook">
                    <i class="far fa-circle fa-stack-2x primaryColor"></i>
                    <i class="fab fa-facebook-f fa-stack-1x primaryColor"></i>
                </a>
                <a  rel="noopener noreferer" class="fa-stack m-lg-4 m-2" href="https://twitter.com/IDCgames"  target="_blank" aria-label="Twitter">
                    <i class="far fa-circle fa-stack-2x primaryColor"></i>
                    <i class="fab fa-twitter fa-stack-1x primaryColor"></i>
                </a>
                <a  rel="noopener noreferer" class="fa-stack m-lg-4 m-2" href="https://www.instagram.com/idcgames/"  target="_blank" aria-label="Instagram">
                    <i class="far fa-circle fa-stack-2x primaryColor"></i>
                    <i class="fab fa-instagram fa-stack-1x primaryColor"></i>
                </a>
                <a  rel="noopener noreferer" class="fa-stack m-lg-4 m-2" href="https://www.pinterest.com/IDCgames/"  target="_blank" aria-label="Pinterest">
                    <i class="far fa-circle fa-stack-2x primaryColor"></i>
                    <i class="fab fa-pinterest-p fa-stack-1x primaryColor"></i>
                </a>
                <!--a  rel="noopener noreferer" class="fa-stack m-lg-4 m-2" href="https://plus.google.com/110959600206128711708/posts"  target="_blank" aria-label="Google+">
                    <i class="far fa-circle fa-stack-2x primaryColor"></i>
                    <i class="fab fa-google-plus-g fa-stack-1x primaryColor"></i>
                </a-->
                <a  rel="noopener noreferer" class="fa-stack m-lg-4 m-2" href="https://www.youtube.com/user/IDCgames"  target="_blank" aria-label="Youtube">
                    <i class="far fa-circle fa-stack-2x primaryColor"></i>
                    <i class="fab fa-youtube fa-stack-1x primaryColor"></i>
                </a>
                <a  rel="noopener noreferer" class="fa-stack m-lg-4 m-2" href="https://www.twitch.tv/idcgames"  target="_blank" aria-label="Twitch">
                    <i class="far fa-circle fa-stack-2x primaryColor"></i>
                    <i class="fab fa-twitch fa-stack-1x primaryColor"></i>
                </a>
                <a  rel="noopener noreferer" class="fa-stack m-lg-4 m-2" href="https://vk.com/id367009144"  target="_blank" aria-label="Vk">
                    <i class="far fa-circle fa-stack-2x primaryColor"></i>
                    <i class="fab fa-vk fa-stack-1x primaryColor"></i>
                </a>
                <a  rel="noopener noreferer" class="fa-stack m-lg-4 m-2" href="https://www.tiktok.com/@idcgames"  target="_blank" aria-label="Ticktoc">
                    <i class="far fa-circle fa-stack-2x primaryColor"></i>
                    <i class="fab fa-tiktok fa-stack-1x primaryColor"></i>
                </a>
                <a  rel="noopener noreferer" class="fa-stack m-lg-4 m-2" href="https://discord.gg/Nztb8hSvjF"  target="_blank" aria-label="Discord">
                    <i class="far fa-circle fa-stack-2x primaryColor"></i>
                    <i class="fab fa-discord fa-stack-1x primaryColor"></i>
                </a>            
            </div>  
        </div>

        <!-- >> footer-default top bar>> -->
        <div class="container-fluid border-top border-bottom border-green-lighter py-4"> 
            <div class="d-flex flex-lg-row flex-column py-4"> 
                <div class="col-lg-2 d-none d-sm-block my-auto footer-logo-container"> 
                    <a  rel="noopener noreferer" href="https://==(language)==.==(domain)==/" class="big-logo-idc-footer">
                        <img class="logo-pegi footer-logo" src="https://cdn.idcgames.net/img/default/logo-idc-light.png" title="IDC/Games" alt="IDC/Games" height="92px">
                    </a>
                </div>

                <div class="col-lg-10 col-12 pl-0"> 
                    <div class="col-lg-12 d-flex flex-md-row flex-column mb-2 pl-0">
                        <a class="border-white-lighter py-2 px-4 text-center d-block my-auto mr-4 text-uppercase" :href="$t('footer.about_idc_url')" target="_blank">{{ $t('footer.about_idc_text') }}</a>   
                        <a class="border-white-lighter py-2 px-4 text-center d-block my-auto mr-4 text-uppercase" :href="$t('footer.idc_services_url')" target="_blank">{{ $t('footer.idc_services_text') }}</a> 
                        <a class="border-white-lighter py-2 px-4 text-center d-block my-auto mr-4 text-uppercase" :href="$t('footer.idc_games_tools')" target="_blank">{{ $t('footer.idc_games_tools_text') }}</a>   
                        <a class="border-white-lighter py-2 px-4 text-center d-block my-auto mr-4 text-uppercase" :href="$t('footer.idc_influencer_about_url')" target="_blank">{{ $t('footer.idc_influencer_about_text') }}</a> 
                        <a class="border-white-lighter py-2 px-4 text-center d-block my-auto mr-4 text-uppercase" :href="$t('footer.developer_corner_url')" target="_blank">{{ $t('footer.developer_corner_text') }}</a> 
                    </div>
                    <div class="col-lg-12 col-12 d-flex flex-md-row flex-column justify-content-center pl-0">
                        <a class="btn btn-outline-primary px-4 text-center d-block distribute-games-btn" href="https://about.idcgames.com/about/docs/Distribute-Your-Game" target="_blank">{{ $t('footer.distribute_your_game_text') }}</a>  
                        <div class="d-flex m-auto a-tag-contents">
                            <a class="no-border-lighter p-2 text-center d-block my-auto text-uppercase" :href="$t('footer.url_legal_conditions')" target="_blank">{{ $t('footer.privacy_legal_title_txt') }}</a>
                            <span class="d-none d-sm-block py-2 my-auto">|</span>

                            <a class="no-border-lighter p-2 text-center d-block my-auto text-uppercase" :href="$t('footer.url_privacy_policy')" target="_blank">{{ $t('footer.privacy_policy_footer') }}</a>
                            <span class="d-none d-sm-block py-2 my-auto">|</span>

                            <a class="no-border-lighter p-2 text-center d-block my-auto text-uppercase" :href="$t('footer.url_privacy_policy')" target="_blank">{{ $t('footer.cookies_footer') }}</a>
                            <span class="d-none d-sm-block py-2 my-auto">|</span>

                            <a class="no-border-lighter p-2 text-center d-block my-auto text-uppercase" :href="$t('footer.url_return_policy')" target="_blank">{{ $t('footer.return_policy_title') }}</a>
                        </div>
                    </div>              
                </div>
            </div>
        </div>
        <!-- << end of top bar -->  
        
        <!--Copyright-->
        <div class="d-flex flex-row justify-content-center bg-dark p-2"> 
            <p class="m-auto py-2">{{ $t('footer.rights_reserved') }}</p> 
        </div> 
        <!--Cookies-->
        <!-- <div class="position-relative d-flex justify-content-center align-items-center closeCookiesBox">
            <div class="cookies position-absolute bg-secondary px-2"> 
                <div class="d-row col-12">
                    <button type="button" class="closeCookies close pt-3" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="d-row col-12">
                    <p class="avisolegal text-center pt-3"> $t('footer.cookies_footer_text') <br>
                        <a :href="$t('footer.url_privacy_policy')" target="_blank" class="text-primary">{{ $t('footer.cookies_title_txt') }}</a> 
                    </p> 
                </div>
            </div>    
        </div> -->
    </footer>
</template>

<script>
export default {
  name: "SymmetryFooter",
  data() {
    return {
      showMenu: false,

      links: [
        { title: "Who We Are", url: "" },
        { title: "Our Privacy Policy", url: "" },
        { title: "Log Out", url: "" },
      ],
      images: {
        logo: require("@/assets/bbb-logo.png"),
      },
    };
  },
  watch: {
    showMenu(val) {
      if (val) {
        const timerId = setTimeout(() => {
          window.scrollTo({
            left: 0,
            top: document.body.scrollHeight,
            behavior: "smooth",
          });
          if (timerId) clearTimeout(timerId);
        }, 200);
      }
    },
  },
  methods: {
    toggleFooterMenu(force) {
      if (typeof force !== "undefined") this.showMenu = force;
      else this.showMenu = !this.showMenu;
    },
    scrollTop() {
      window.scrollTo({
        left: 0,
        top: 0,
        behavior: "smooth",
      });
    },
  },
};
</script>