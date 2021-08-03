<template>
    <!--Menu header -->
    <header class="nolauncher position-relative">
        <!--Side lateral menu -->
        <div id="sidenav-bar" class="sidenav sidenav-closed nav accordion d-flex flex-column border-right border-green-lighter box-shadow sidenav-after bgDarkTexture">
            <ul id="account-collapse" class="collapse show list-group">
                <li class="bg-gradient nav-item border-bottom border-green-lighter mb-0 py-2 px-4">
                    <form class="input-group form-inline">
                        <input class="form-control form-forum-menu" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append forum-append-button">
                            <button class="btn btn-sm btn-outline-secondary px-2" type="button"><i class="fas fa-search"></i></button>
                        </div>
                    </form>    
                </li>
                <li class="nav-item d-flex logged nolauncher">
                    <div class="d-flex flex-row justify-content-between align-items-center border-bottom border-green-lighter w-100">
                        <div class="logged nolauncher mb-0 h6 py-2 pl-4">
                            <a href="#" title="==(my_account_txt)==">
                                <span class="cUserName menu-reduced">{{ $t('header.user_name') }}</span>
                            </a>
                        </div>
                    </div>
                </li>                 
                <li class="unlogged h6 border-bottom border-green-lighter mb-0 py-2 px-4">
                    <a href="https://==(language)==.==(domain)==/==(url_register)==">{{ $t('header.register_txt') }}</a>
                </li>
                <li class="unlogged h6 border-bottom border-green-lighter mb-0 py-2 px-4">
                    <a href="https://==(language)==.==(domain)==/==(url_login)==">{{ $t('header.login_txt') }}</a>
                </li>
                <li class="unlogged h6 border-bottom border-green-lighter mb-0 py-2 px-4  logged actLogOff nolauncher">
                    <a href="https://==(language)==.==(domain)==/==(url_login)==">==(sign_out)==</a>
                </li>
                <li class="d-md-none d-block ">
                    <a class="nav-link d-flex flex-row h6 border-bottom border-green-lighter mb-0 py-2 px-4" href="https://==(language)==.==(domain)==/" data-toggle="collapse" data-target="#language-collapse" aria-expanded="false" aria-controls="language-collapse">
                        <!-- <img class="flag setflag" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt="==(language)=="> -->
                        <img class="flag flag-en" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt="English"  >
                        <div class="pl-2">==(change_language_txt)== <i class="pl-3 fas fa-chevron-down fa-xs mb-0"></i></div>
                    </a>
                    <div class="collapse" aria-labelledby="navbarDropdown2" id="language-collapse">
                        <a class="h6 border-bottom border-green-lighter mb-0 py-2 pl-4" href="https://es.==(domain)==" title="Español"	data-in="es" data-out="es"><img class="flag flag-es mr-1" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt="Español"  >ES</a>           
                        <a class="h6 border-bottom border-green-lighter mb-0 py-2 pl-4" href="https://en.==(domain)==" title="English"	data-in="en" data-out="en"><img class="flag flag-en mr-1" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt="English"  >EN</a>           
                        <a class="h6 border-bottom border-green-lighter mb-0 py-2 pl-4" href="https://de.==(domain)==" title="Deutsch"	data-in="de" data-out="de"><img class="flag flag-de mr-1" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt="Deutsch"  >DE</a>
                        <a class="h6 border-bottom border-green-lighter mb-0 py-2 pl-4" href="https://fr.==(domain)==" title="Français"	data-in="fr" data-out="fr"><img class="flag flag-fr mr-1" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt="Français"  >FR</a>
                        <a class="h6 border-bottom border-green-lighter mb-0 py-2 pl-4" href="https://cs.==(domain)==" title="Ceština"	data-in="cs" data-out="cz"><img class="flag flag-cz mr-1" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt="Ceština"  >CS</a>
                        <a class="h6 border-bottom border-green-lighter mb-0 py-2 pl-4" href="https://pl.==(domain)==" title="Polski"		data-in="pl" data-out="pl"><img class="flag flag-pl mr-1" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt="Polski"  >PL</a>
                        <a class="h6 border-bottom border-green-lighter mb-0 py-2 pl-4" href="https://pt.==(domain)==" title="Português"	data-in="pt" data-out="pt"><img class="flag flag-pt mr-1" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt="Português" >PT</a>
                        <a class="h6 border-bottom border-green-lighter mb-0 py-2 pl-4" href="https://it.==(domain)==" title="Italiano"	data-in="it" data-out="it"><img class="flag flag-it mr-1" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt="Italiano"  >IT</a>
                        <a class="h6 border-bottom border-green-lighter mb-0 py-2 pl-4" href="https://tr.==(domain)==" title="Türkçe"		data-in="tr" data-out="tr"><img class="flag flag-tr mr-1" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt="Türkçe"  >TR</a>
                        <a class="h6 border-bottom border-green-lighter mb-0 py-2 pl-4" href="https://el.==(domain)==" title="Ελληνικά"	data-in="el" data-out="gr"><img class="flag flag-gr mr-1" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt="Ελληνικά"  >EL</a>
                        <a class="h6 border-bottom border-green-lighter mb-0 py-2 pl-4" href="https://ro.==(domain)==" title="Român"		data-in="ro" data-out="ro"><img class="flag flag-ro mr-1" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt="Român"  >RO</a>
                        <a class="h6 border-bottom border-green-lighter mb-0 py-2 pl-4" href="https://ru.==(domain)==" title="Pусский"	data-in="ru" data-out="ru"><img class="flag flag-ru mr-1" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt="Pусский"  >RU</a>
                        <a class="h6 border-bottom border-green-lighter mb-0 py-2 pl-4" href="https://vi.==(domain)==" title="Tiếng Việt"	data-in="vi" data-out="vn"><img class="flag flag-vn mr-1" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt="Tiếng Việt" >VI</a>
                        <a class="h6 border-bottom border-green-lighter mb-0 py-2 pl-4" href="https://ja.==(domain)==" title="日本語"		data-in="ja" data-out="jp"><img class="flag flag-jp mr-1" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt="日本語"  >JA</a>
                        <a class="h6 border-bottom border-green-lighter mb-0 py-2 pl-4" href="https://ar.==(domain)==" title="عربي/عربى"		data-in="ar" data-out="sa"><img class="flag flag-sa mr-1" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt="عربي/عربى"  >AR</a>
                        <a class="h6 border-bottom border-green-lighter mb-0 py-2 pl-4" href="https://th.==(domain)==" title="ไทย"			data-in="th" data-out="th"><img class="flag flag-th mr-1" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt="ไทย"   >TH</a>
                        <a class="h6 border-bottom border-green-lighter mb-0 py-2 pl-4" href="https://ko.==(domain)==" title="한국어"		data-in="ko" data-out="kr"><img class="flag flag-kr mr-1" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt="한국어"   >KO</a>
                    </div>
                </li>
            </ul>
        </div>
        <!--Top menu-->
        <nav id="menu" class="navbar fixed-top nav-custom nav-custom-after nav-forum">
            <div class="d-flex flex-row align-items-center justify-content-sm-start justify-content-between px-0">
                <div id="categoriesBtn" class="openMenuBtn d-md-none d-flex pl-md-2 pr-md-3 px-1">
                    <div class="lottie" id="lottiehamburguer" data-bm-renderer='svg'></div>
                </div>
                <div class="d-flex">
                    <a class="navbar-brand mx-md-0 mx-2" href="https://==(language)==.==(domain)==/"></a>
                </div>
                <div class="col animated slideInLeft delay-2 px-0 mx-2 d-none">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb flex-row flex-nowrap mb-0 py-0 pl-0">
                            <li class="breadcrumb-item"><a class="fontSecondarySmall" href="#">Forum IDC</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span class="fontSecondarySmall">%%(game_name)%%</span></li>
                        </ol>
                    </nav>  
                </div>
            </div>
            <div class="d-flex flex-row align-items-center">
                <div class="nav-item logged dropdown">
                    <button class="nav-link notification-btn dropdown-toggle" title="Notifications" type="button" id="notification-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="fontSecondarySmall"><i class="far fa-bell"></i></span>
                    </button>
                    <div id="notifications" class="dropdown-menu dropdown-menu-xl-right dropdown-menu-md-left dropdown-menu-sm-right dropdown-menu-right notifications bg-gray-900 box-shadow border border-green-lighter py-0" aria-labelledby="notification-btn">
                        <a class="position-relative dropdown-item notification-item border-bottom border-green-lighter p-3" href="#">
                            <div class="d-flex flex-row justify-content-between">
                                <span class="small">You earned a card</span>
                                <div>
                                    <span class="small">22/02/2021</span>
                                    <button type="button" class="close delete-notification" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                
                            </div>
                            <div>
                                <span class="text-teal">Game XXX</span>
                                <span class="font-italic">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam convallis fringilla commodo. Morbi ut facilisis massa, vel porta nibh. Etiam tellus velit, elementum auctor quam eu, pretium vestibulum lacus. </span>
                            </div>
                        </a>
                        <a class="position-relative dropdown-item notification-item border-bottom border-green-lighter p-3" href="#">
                            <div class="d-flex flex-row justify-content-between">
                                <span class="small">You earned a card</span>
                                <div>
                                    <span class="small">22/02/2021</span>
                                    <button type="button" class="close delete-notification" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                
                            </div>
                            <div>
                                <span class="text-teal">Game XXX</span>
                                <span class="font-italic">Lorem ipsum dolor sit amet, co nsectetur adipiscing elit. Nullam convallis fringilla commodo. Morbi ut facilisis massa, vel porta nibh. Etiam tellus velit, elementum auctor quam eu, pretium vestibulum lacus. </span>
                            </div>
                        </a>
                        <a class="position-relative dropdown-item notification-item border-bottom border-green-lighter p-3" href="#">
                            <div class="d-flex flex-row justify-content-between">
                                <span class="small">You earned a card</span>
                                <div>
                                    <span class="small">22/02/2021</span>
                                    <button type="button" class="close delete-notification" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                
                            </div>
                            <div>
                                <span class="text-teal">Game XXX</span>
                                <span class="font-italic">Lorem ipsum dolor sit amet, cons ectetur adipiscing elit. Nullam convallis fringilla commodo. Morbi ut facilisis massa, vel porta nibh. Etiam tellus velit, elementum auctor quam eu, pretium vestibulum lacus. </span>
                            </div>
                        </a>
                        <a class="position-relative dropdown-item notification-item border-bottom border-green-lighter p-3" href="#">
                            <div class="d-flex flex-row justify-content-between">
                                <span class="small">You earned a card</span>
                                <div>
                                    <span class="small">22/02/2021</span>
                                    <button type="button" class="close delete-notification" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                
                            </div>
                            <div>
                                <span class="text-teal">Game XXX</span>
                                <span class="font-italic">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam convallis fringilla commodo. Morbi ut facilisis massa, vel porta nibh. Etiam tellus velit, elementum auctor quam eu, pretium vestibulum lacus. </span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="d-md-flex d-none justify-content-end" id="navbarNav">
                    <ul class="navbar m-0 p-0">
                        <li class="nav-item logged">
                            <a class="nav-link" href="https://==(language)==.==(domain)==/==(url_my_account)==" title="==(my_account_txt)==">
                                <span class="fontSecondarySmall pl-2 cUserName menu-reduced">{{ $t('header.user_name') }}</span>
                            </a>
                        </li>
                        <li class="nav-item d-none">
                            <form class="form-inline">
                                <input class="form-control form-forum-menu mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                            </form>    
                        </li>
                        <li class="nav-item logged actLogOff">
                            <a href="#" class="nav-link" title="==(sign_out)=="><i class="fas fa-sign-out-alt"></i></a>
                        </li>
                        <li class="nav-item dropdown unlogged">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-sign-in-alt"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mt-2" aria-labelledby="navbarDropdown1">
                                <button class="dropdown-item fontSecondarySmall" type="button" data-toggle="modal" data-target=".loginModal">{{ $t('header.login_txt') }}</button>
                                <div class="dropdown-divider"></div>
                                <button class="dropdown-item fontSecondarySmall" type="button" data-toggle="modal" data-target=".registerModal">{{ $t('header.register_txt') }}</button>
                            </div>
                        </li>
                        <li class="nav-item ">
                            <!-- Flags/languages -->            
                            <div class="nav-item dropdown d-md-block d-none">
                                <a class="nav-link" href="https://==(language)==.==(domain)==/" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img v-if="$i18n.locale === 'en'" class="flag flag-en" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt="English"  >
                                    <img v-if="$i18n.locale === 'fr'" class="flag flag-fr" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt="Français"  >
                                </a>
                                <div class="dropdown-menu dropdown-menu-right language-menu p-0 border-0 bg-transparent" aria-labelledby="navbarDropdown2">
                                    <a class="h6 mb-0 d-flex flex-row px-3 py-2 border-right border-bottom border-green-lighter bgDarkTexture box-shadow" href="#" title="English"	data-in="en" data-out="en"><img class="flag flag-en mr-1" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt="English"  @click="changeLocale('en')">EN</a>           
                                    <a class="h6 mb-0 d-flex flex-row px-3 py-2 border-right border-bottom border-green-lighter bgDarkTexture box-shadow" href="#" title="Français"	data-in="fr" data-out="fr"><img class="flag flag-fr mr-1" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt="Français" @click="changeLocale('fr')">FR</a>
                                    <!-- <a class="h6 mb-0 d-flex flex-row px-3 py-2 border-right border-bottom border-green-lighter bgDarkTexture box-shadow" href="#" title="Español"	data-in="es" data-out="es"><img class="flag flag-es mr-1" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt="Español"  @click="changeLocale('es')">ES</a>           
                                    <a class="h6 mb-0 d-flex flex-row px-3 py-2 border-right border-bottom border-green-lighter bgDarkTexture box-shadow" href="#" title="Deutsch"	data-in="de" data-out="de"><img class="flag flag-de mr-1" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt="Deutsch"  >DE</a>
                                    <a class="h6 mb-0 d-flex flex-row px-3 py-2 border-right border-bottom border-green-lighter bgDarkTexture box-shadow" href="#" title="Ceština"	data-in="cs" data-out="cz"><img class="flag flag-cz mr-1" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt="Ceština"  >CS</a>
                                    <a class="h6 mb-0 d-flex flex-row px-3 py-2 border-right border-bottom border-green-lighter bgDarkTexture box-shadow" href="#" title="Polski"		data-in="pl" data-out="pl"><img class="flag flag-pl mr-1" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt="Polski"  >PL</a>
                                    <a class="h6 mb-0 d-flex flex-row px-3 py-2 border-right border-bottom border-green-lighter bgDarkTexture box-shadow" href="#" title="Português"	data-in="pt" data-out="pt"><img class="flag flag-pt mr-1" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt="Português" >PT</a>
                                    <a class="h6 mb-0 d-flex flex-row px-3 py-2 border-right border-bottom border-green-lighter bgDarkTexture box-shadow" href="#" title="Italiano"	data-in="it" data-out="it"><img class="flag flag-it mr-1" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt="Italiano"  >IT</a>
                                    <a class="h6 mb-0 d-flex flex-row px-3 py-2 border-right border-bottom border-green-lighter bgDarkTexture box-shadow" href="#" title="Türkçe"		data-in="tr" data-out="tr"><img class="flag flag-tr mr-1" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt="Türkçe"  >TR</a>
                                    <a class="h6 mb-0 d-flex flex-row px-3 py-2 border-right border-bottom border-green-lighter bgDarkTexture box-shadow" href="#" title="Ελληνικά"	data-in="el" data-out="gr"><img class="flag flag-gr mr-1" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt="Ελληνικά"  >EL</a>
                                    <a class="h6 mb-0 d-flex flex-row px-3 py-2 border-right border-bottom border-green-lighter bgDarkTexture box-shadow" href="#" title="Român"		data-in="ro" data-out="ro"><img class="flag flag-ro mr-1" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt="Român"  >RO</a>
                                    <a class="h6 mb-0 d-flex flex-row px-3 py-2 border-right border-bottom border-green-lighter bgDarkTexture box-shadow" href="#" title="Pусский"	data-in="ru" data-out="ru"><img class="flag flag-ru mr-1" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt="Pусский"  >RU</a>
                                    <a class="h6 mb-0 d-flex flex-row px-3 py-2 border-right border-bottom border-green-lighter bgDarkTexture box-shadow" href="#" title="Tiếng Việt"	data-in="vi" data-out="vn"><img class="flag flag-vn mr-1" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt="Tiếng Việt" >VI</a>
                                    <a class="h6 mb-0 d-flex flex-row px-3 py-2 border-right border-bottom border-green-lighter bgDarkTexture box-shadow" href="#" title="日本語"		data-in="ja" data-out="jp"><img class="flag flag-jp mr-1" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt="日本語"  >JA</a>
                                    <a class="h6 mb-0 d-flex flex-row px-3 py-2 border-right border-bottom border-green-lighter bgDarkTexture box-shadow" href="#" title="عربي/عربى"		data-in="ar" data-out="sa"><img class="flag flag-sa mr-1" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt="عربي/عربى"  >AR</a>
                                    <a class="h6 mb-0 d-flex flex-row px-3 py-2 border-right border-bottom border-green-lighter bgDarkTexture box-shadow" href="#" title="ไทย"			data-in="th" data-out="th"><img class="flag flag-th mr-1" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt="ไทย"   >TH</a>
                                    <a class="h6 mb-0 d-flex flex-row px-3 py-2 border-right border-bottom border-green-lighter bgDarkTexture box-shadow" href="#" title="한국어"		data-in="ko" data-out="kr"><img class="flag flag-kr mr-1" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt="한국어"   >KO</a> -->
                                </div>
                            </div>  
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Login -->
        <div class="loginModal modal fade">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content bgDarkTexture">
                    <div class="d-flex flex-column align-items-center justify-content-center m-3 p-xl-2 px-lg-2 py-lg-2 px-5 py-2">
                        <button type="button" class="close align-self-start colorLight" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="align-self-md-end align-self-start noYetRegistered">
                            <p class="mb-1">==(not_a_member_yet)==
                                <a href="#" class="text-primary pl-2 bordered-bottom-sm" data-toggle="modal" data-target=".registerModal" data-dismiss="modal">==(register_now_txt)== <i class="fas fa-chevron-right pl-1"></i></a>
                            </p>
                        </div>
                        <div class="modalMainContentContainer px-lg-5">
                            <div class="formularyAccount">
                                <h2 class="display-4 bordered-bottom animated slideInLeft fast mt-2">{{ $t('header.login_txt') }}</h2>
                                <h3 class="h6 pt-1 fontSecondarySmall text-primary animated fadeIn">==(login_your_account_and_start_playing_right_now)==!</h3>
                                <form class="getAuth loginForm">
                                    <div class="form-group">
                                        <input type="text" class="form-control my-3 p-3 borderPrimaryColor bg-transparent colorLight" id="login-user" placeholder="==(user_name_txt)==" autocomplete="on" required>
                                        <input type="password" class="form-control my-3 p-3 borderPrimaryColor bg-transparent colorLight" id="login-pass" placeholder="==(password)==" autocomplete="on" required>
                                        <div class="row mx-0">
                                            <div class="form-check col-6">
                                                <input type="checkbox" class="form-check-input" id="loggedIn" checked="checked">
                                                <label class="form-check-label" for="loggedIn">==(stay_connected_txt)==</label>
                                            </div>
                                            <div class="col-6 text-right"><a href="==(url_forgot_password)==" class="text-primary">==(forgot_password_txt)==</a></div>
                                        </div>
                                        <p class="callbackLogin mt-3"></p>
                                        <button id="login_btn" type="submit" class="btn-cta mt-xl-4 mt-md-2">{{ $t('header.login_txt') }}</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col d-flex flex-column mt-xl-5 pt-2 px-0">
                                <div><h4>==(or_login_with)==</h4></div>
                                <div class="d-flex flex-row flex-wrap align-items-center justify-content-start">
                                    <button class="btn-google btn-social fontPrimarySmall m-1" data-opt="login">
                                        <i class="fab fa-google fa-lg pr-2"></i>Sign in with <b>Google</b>      
                                    </button>
                                    <button class="btn-facebook btn-social fontPrimarySmall m-1" data-opt="login">
                                        <i class="fab fa-facebook-square fa-lg pr-2"></i>Sign in with <b>Facebook</b>      
                                    </button>
                                    <button type="button" class="btn-social btn-steam fontPrimarySmall m-1" data-id="steambtnLogin">
                                        <i class="fab fa-steam-symbol fa-lg pr-2"></i>Sign in with <b>STEAM</b>                
                                    </button>
                                    <button type="button" class="btn-social btn-twitter fontPrimarySmall m-1" data-id="twitterbtnLogin">
                                        <i class="fab fa-twitter fa-lg pr-2"></i>Sign in with <b>Twitter</b>                
                                    </button>
                                    <button type="button" class="btn-social btn-yahoo fontPrimarySmall m-1" data-id="yahoobtnLogin">
                                        <i class="fab fa-yahoo fa-lg pr-2"></i>Sign in with <b>Yahoo</b>              
                                    </button>
                                    <button type="button" class="btn-social btn-msn fontPrimarySmall m-1" data-id="msnbtnLogin">
                                        <img src="https://cdn.idcgames.com/img/login/icon-ms-reg.png" class="pr-2" alt="">Sign in with <b>MSN</b>                
                                    </button>
                                </div>
                            </div>
                            <div class="pt-xl-4 pt-2">
                                <!--p class="fontPrimarySmall">==(by_signing_help_1)== <a class="text-primary" href="https://==(language)==.==(domain)==/==(url_legal_conditions)==">==(legal_conditions_txt)==</a>, ==(by_signing_help_2)== <a class="primaryColor" href="https://==(language)==.==(domain)==/==(url_privacy_policy)==">==(privacy_policy_txt)==</a> ==(by_signing_help_3)== <a class="primaryColor" href="https://==(language)==.==(domain)==/==(url_use_of_cookies)==">==(use_of_cookies_txt)==</a> ==(by_signing_help_4)==</p-->
                                <p class="fontPrimarySmall">By signing up, I agree to the Legal conditions, the Privacy Policy and the use of cookies of IDC/Games.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Register -->
        <div class="registerModal modal fade">
            <div class="modal-dialog modal-dialog-centered modal-lg transformModal">
                <div class="modal-content bgDarkTexture">
                    <div class="d-flex flex-column align-items-center justify-content-center m-3 p-xl-2 px-lg-2 py-lg-2 px-5 py-2">
                        <button type="button" class="close align-self-start colorLight" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="align-self-md-end align-self-start noYetRegistered">
                            <p class="fontPrimaryModal mb-1">==(are_you_a_member)==
                                <a href="#" class="text-primary pl-2 bordered-bottom-sm" data-toggle="modal" data-target=".loginModal" data-dismiss="modal">==(login_now)==<i class="fas fa-chevron-right pl-1"></i></a>
                            </p>
                        </div>
                        <div class="modalMainContentContainer tranformModal px-lg-5">
                            <div class="formularyAccount">
                                <h2 class="display-4 bordered-bottom animated slideInLeft fast mt-2">==(new_at_idc)==</h2>
                                <h3 class="h6 pt-1 fontSecondarySmall text-primary animated fadeIn">==(create_your_free_account_and_start_playing_right_now)==</h3>
                                <form class="getAuth registerForm">
                                    <div class="form-group">
                                        <input type="text" class="form-control my-3 p-md-3 p-2 borderPrimaryColor bg-transparent colorLight" id="register-user" placeholder="==(user_name_txt)==" minlength="4" maxlength="14" autocomplete="on" required />
                                        <div class="row my-3 mx-0">
                                            <div class="col-6 pr-2 pl-0">
                                                <input type="password" class="form-control p-md-3 p-2 borderPrimaryColor bg-transparent colorLight" id="register-pass" placeholder="==(password)==" autocomplete="on" required />
                                            </div>
                                            <div class="col-6 pl-2 pr-0">
                                                <input type="password" class="form-control p-md-3 p-2 borderPrimaryColor bg-transparent colorLight" id="register-conf" placeholder="==(confirm_password)==" autocomplete="on" required />
                                            </div>
                                        </div>
                                        <div class="row my-3 mx-0">
                                            <div class="form-check col-6">
                                                <input type="checkbox" class="form-check-input" id="registerIn" checked="checked">
                                                <label class="form-check-label" for="registerIn">==(stay_connected_txt)==</label>
                                            </div>
                                        </div>
                                        <p class="callbackRegister mt-3"></p>
                                        <button id="btnRegister" type="submit" class="btn-cta mt-xl-4 mt-md-2 animated pulse fast delay-1">==(create_your_account)==</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col d-flex flex-column mt-xl-5 pt-2 px-0">
                                <div><h4>==(or_login_with)==</h4></div>
                                <div class="d-flex flex-row flex-wrap align-items-center justify-content-start">
                                    <button class="btn-google btn-social fontPrimarySmall m-1" data-opt="register">
                                        <i class="fab fa-google fa-lg pr-2"></i>Sign in with <b>Google</b>      
                                    </button>
                                    <button class="btn-facebook btn-social fontPrimarySmall m-1" data-opt="register">
                                        <i class="fab fa-facebook-square fa-lg pr-2"></i>Sign in with <b>Facebook</b>      
                                    </button>
                                    <button type="button" class="btn-social btn-steam fontPrimarySmall m-1" data-id="steambtnLogin">
                                        <i class="fab fa-steam-symbol fa-lg pr-2"></i>Sign in with <b>STEAM</b>                
                                    </button>
                                    <button type="button" class="btn-social btn-twitter fontPrimarySmall m-1" data-id="twitterbtnLogin">
                                        <i class="fab fa-twitter fa-lg pr-2"></i>Sign in with <b>Twitter</b>                
                                    </button>
                                    <button type="button" class="btn-social btn-yahoo fontPrimarySmall m-1" data-id="yahoobtnLogin">
                                        <i class="fab fa-yahoo fa-lg pr-2"></i>Sign in with <b>Yahoo</b>              
                                    </button>
                                    <button type="button" class="btn-social btn-msn fontPrimarySmall m-1" data-id="msnbtnLogin">
                                        <img src="https://cdn.idcgames.com/img/login/icon-ms-reg.png" class="pr-2" alt="">Sign in with <b>MSN</b>
                                    </button>
                                </div>
                            </div>
                            <div class="pt-xl-4 pt-2">
                                <!--p class="fontPrimarySmall">==(by_signing_help_1)== <a class="text-primary" href="https://==(language)==.==(domain)==/==(url_legal_conditions)==">==(legal_conditions_txt)==</a>, ==(by_signing_help_2)== <a class="text-primary" href="https://==(language)==.==(domain)==/==(url_privacy_policy)==">==(privacy_policy_txt)==</a> ==(by_signing_help_3)== <a class="text-primary" href="https://==(language)==.==(domain)==/==(url_use_of_cookies)==">==(use_of_cookies_txt)==</a> ==(by_signing_help_4)==</p-->
                                <p class="fontPrimarySmall">By signing up, I agree to the Legal conditions, the Privacy Policy and the use of cookies of IDC/Games.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <input type="hidden" class="runLogIn">
        <input type="hidden" class="runLogOff">
    </header>
</template>

<script>
export default {
  name: "SymmetryHeader",
  props: {
    username: String,
    mode: String,
    items: Array,
  },
  components: {
  },
  data() {
    return {};
  },
  methods: {
    toggleSidebar() {
      this.$store.commit("setDrawer", !this.$store.state.layout.drawer);
    },
    changeLocale(locale) {
        this.$i18n.locale = locale;
    }
  },
};
</script>

<style lang="sass" scoped>
</style>
