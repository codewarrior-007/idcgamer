<template>
    <main>
        <section>
            <div class="container-fluid d-flex flex-column align-items-center justify-content-center breadcrumb-nav-post bg-gradient py-15 px-0 mt-5">
                <h1 class="display-2 text-shadow mt-5 px-3">IDC Gamer</h1>
                <div class="d-flex align-items-center justify-content-center py-3 px-3">
                    <form class="form-inline">
                        <input class="form-control form-forum mr-sm-2" type="search" :placeholder="$t('dashboard.search_user')" aria-label="Search">
                        <button class="btn btn-outline-success btn-search my-2 my-sm-0" type="submit">{{ $t('dashboard.search') }}</button>
                    </form>    
                </div>
            </div>
            <div class="container-fluid px-0">
                <div class="bg-dark-translucid justify-content-between align-items-center h-50px mb-3"></div>
                
                <div class="container-custom">
                    <nav class="navbar navbar-expand-lg d-flex flex-row justify-content-between border-bottom border-green-lighter pt-3 px-0 pb-0 mx-3">
                        <ul class="nav nav-tabs d-flex flex-row flex-nowrap justify-content-end border-0 grid-btns">
                            <li class="nav-item d-flex">
                                <a id="grid-square-tab" class="grid-square-tab nav-link active h6 text-shadow mb-0"><i class="fas fa-th"></i></a>
                            </li>
                            <li class="nav-item d-flex">
                                <a id="grid-rectangle-tab" class="grid-rectangle-tab nav-link h6 text-shadow mb-0"><i class="fas fa-th-list"></i></a>
                            </li> 
                        </ul>  
                    </nav>
                    <div class="tab-content">
                        <div id="all" class="tab-pane fade show active" role="tabpanel" aria-labelledby="all-tab">
                            <div class="grid-square d-block">
                                <div class="animated slideInUp fast d-flex flex-row flex-wrap pt-lg-3 pb-5">
                                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                        <div class="card small-card flex-column bg-gray-900 border border-green-lighter mb-lg-3 mt-3">
                                            <div class="d-flex flex-column">
                                                <a href="#" class="h-100">
                                                    <div class="img-container">
                                                        <div class="col overflow-hidden px-0">
                                                            <div class="overlay">
                                                                <img src="https://cdn1.idcgames.com/storage/image/1118/sabotaj-logo/2x1_1-8_0.png" class="logo-overlay card-img-overlay d-flex align-items-center img-fluid m-auto">
                                                            </div>
                                                            <div class="overflow-hidden logo-img-container">
                                                                <img class="gameCard-img" src="https://cdn13.idcgames.com/storage/image/1118/sabotaj-banner/2x1_1-4_0.jpg" alt="...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="card-body text-white position-relative border-top border-green-lighter py-2">
                                                    <div class="d-flex flex-column justify-content-center h-100"> 
                                                        <div><h4 class="card-title h6 text-shadow mb-0">Name of the game really really long game really really long</h4></div>
                                                    </div>        
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                        <div class="card small-card flex-column bg-gray-900 border border-green-lighter mb-lg-3 mt-3">
                                            <div class="d-flex flex-column">
                                                <a href="#" class="h-100">
                                                    <div class="img-container">
                                                        <div class="col overflow-hidden px-0">
                                                            <div class="overlay">
                                                                <img src="https://cdn.idcgames.com/img/home/hero-versus-logo-xl.png" class="logo-overlay card-img-overlay d-flex align-items-center img-fluid m-auto">
                                                            </div>
                                                            <div class="overflow-hidden logo-img-container">
                                                                <img class="gameCard-img" src="https://cdn.idcgames.com/img/home/hero-versus-detacado.jpg" alt="...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="card-body text-white position-relative border-top border-green-lighter py-2">
                                                    <div class="d-flex flex-column justify-content-center h-100"> 
                                                        <div><h4 class="card-title h6 text-shadow mb-0">Name of the game</h4></div>
                                                    </div>        
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                        <div class="card small-card flex-column bg-gray-900 border border-green-lighter mb-lg-3 mt-3">
                                            <div class="d-flex flex-column">
                                                <a href="#" class="h-100">
                                                    <div class="img-container">
                                                        <div class="col overflow-hidden px-0">
                                                            <div class="overlay">
                                                                <img src="https://cdn.idcgames.com/img/home/hero-versus-logo-xl.png" class="logo-overlay card-img-overlay d-flex align-items-center img-fluid m-auto">
                                                            </div>
                                                            <div class="overflow-hidden logo-img-container">
                                                                <img class="gameCard-img" src="https://cdn.idcgames.com/img/home/hero-versus-detacado.jpg" alt="...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="card-body text-white position-relative border-top border-green-lighter py-2">
                                                    <div class="d-flex flex-column justify-content-center h-100"> 
                                                        <div><h4 class="card-title h6 text-shadow mb-0">Name </h4></div>
                                                    </div>        
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                        <div class="card small-card flex-column bg-gray-900 border border-green-lighter mb-lg-3 mt-3">
                                            <div class="d-flex flex-column">
                                                <a href="#" class="h-100">
                                                    <div class="img-container">
                                                        <div class="col overflow-hidden px-0">
                                                            <div class="overlay">
                                                                <img src="https://cdn.idcgames.com/img/home/hero-versus-logo-xl.png" class="logo-overlay card-img-overlay d-flex align-items-center img-fluid m-auto">
                                                            </div>
                                                            <div class="overflow-hidden logo-img-container">
                                                                <img class="gameCard-img" src="https://cdn.idcgames.com/img/home/hero-versus-detacado.jpg" alt="...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="card-body text-white position-relative border-top border-green-lighter py-2">
                                                    <div class="d-flex flex-column justify-content-center h-100"> 
                                                        <div><h4 class="card-title h6 text-shadow mb-0">Name of the game really really long</h4></div>
                                                    </div>        
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                        <div class="card small-card flex-column bg-gray-900 border border-green-lighter mb-lg-3 mt-3">
                                            <div class="d-flex flex-column">
                                                <a href="#" class="h-100">
                                                    <div class="img-container">
                                                        <div class="col overflow-hidden px-0">
                                                            <div class="overlay">
                                                                <img src="https://cdn.idcgames.com/img/home/hero-versus-logo-xl.png" class="logo-overlay card-img-overlay d-flex align-items-center img-fluid m-auto">
                                                            </div>
                                                            <div class="overflow-hidden logo-img-container">
                                                                <img class="gameCard-img" src="https://cdn.idcgames.com/img/home/hero-versus-detacado.jpg" alt="...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="card-body text-white position-relative border-top border-green-lighter py-2">
                                                    <div class="d-flex flex-column justify-content-center h-100"> 
                                                        <div><h4 class="card-title h6 text-shadow mb-0">Name of the game really really long game really really long</h4></div>
                                                    </div>        
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                        <div class="card small-card flex-column bg-gray-900 border border-green-lighter mb-lg-3 mt-3">
                                            <div class="d-flex flex-column">
                                                <a href="#" class="h-100">
                                                    <div class="img-container">
                                                        <div class="col overflow-hidden px-0">
                                                            <div class="overlay">
                                                                <img src="https://cdn.idcgames.com/img/home/hero-versus-logo-xl.png" class="logo-overlay card-img-overlay d-flex align-items-center img-fluid m-auto">
                                                            </div>
                                                            <div class="overflow-hidden logo-img-container">
                                                                <img class="gameCard-img" src="https://cdn.idcgames.com/img/home/hero-versus-detacado.jpg" alt="...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="card-body text-white position-relative border-top border-green-lighter py-2">
                                                    <div class="d-flex flex-column justify-content-center h-100"> 
                                                        <div><h4 class="card-title h6 text-shadow mb-0">Name of the game</h4></div>
                                                    </div>        
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                        <div class="card small-card flex-column bg-gray-900 border border-green-lighter mb-lg-3 mt-3">
                                            <div class="d-flex flex-column">
                                                <a href="#" class="h-100">
                                                    <div class="img-container">
                                                        <div class="col overflow-hidden px-0">
                                                            <div class="overlay">
                                                                <img src="https://cdn.idcgames.com/img/home/hero-versus-logo-xl.png" class="logo-overlay card-img-overlay d-flex align-items-center img-fluid m-auto">
                                                            </div>
                                                            <div class="overflow-hidden logo-img-container">
                                                                <img class="gameCard-img" src="https://cdn.idcgames.com/img/home/hero-versus-detacado.jpg" alt="...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="card-body text-white position-relative border-top border-green-lighter py-2">
                                                    <div class="d-flex flex-column justify-content-center h-100"> 
                                                        <div><h4 class="card-title h6 text-shadow mb-0">Name </h4></div>
                                                    </div>        
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                        <div class="card small-card flex-column bg-gray-900 border border-green-lighter mb-lg-3 mt-3">
                                            <div class="d-flex flex-column">
                                                <a href="#" class="h-100">
                                                    <div class="img-container">
                                                        <div class="col overflow-hidden px-0">
                                                            <div class="overlay">
                                                                <img src="https://cdn.idcgames.com/img/home/hero-versus-logo-xl.png" class="logo-overlay card-img-overlay d-flex align-items-center img-fluid m-auto">
                                                            </div>
                                                            <div class="overflow-hidden logo-img-container">
                                                                <img class="gameCard-img" src="https://cdn.idcgames.com/img/home/hero-versus-detacado.jpg" alt="...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="card-body text-white position-relative border-top border-green-lighter py-2">
                                                    <div class="d-flex flex-column justify-content-center h-100"> 
                                                        <div><h4 class="card-title h6 text-shadow mb-0">Name of the game really really long</h4></div>
                                                    </div>        
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                        <div class="card small-card flex-column bg-gray-900 border border-green-lighter mb-lg-3 mt-3">
                                            <div class="d-flex flex-column">
                                                <a href="#" class="h-100">
                                                    <div class="img-container">
                                                        <div class="col overflow-hidden px-0">
                                                            <div class="overlay">
                                                                <img src="https://cdn.idcgames.com/img/home/hero-versus-logo-xl.png" class="logo-overlay card-img-overlay d-flex align-items-center img-fluid m-auto">
                                                            </div>
                                                            <div class="overflow-hidden logo-img-container">
                                                                <img class="gameCard-img" src="https://cdn.idcgames.com/img/home/hero-versus-detacado.jpg" alt="...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="card-body text-white position-relative border-top border-green-lighter py-2">
                                                    <div class="d-flex flex-column justify-content-center h-100"> 
                                                        <div><h4 class="card-title h6 text-shadow mb-0">Name of the game really really long game really really long</h4></div>
                                                    </div>        
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                        <div class="card small-card flex-column bg-gray-900 border border-green-lighter mb-lg-3 mt-3">
                                            <div class="d-flex flex-column">
                                                <a href="#" class="h-100">
                                                    <div class="img-container">
                                                        <div class="col overflow-hidden px-0">
                                                            <div class="overlay">
                                                                <img src="https://cdn.idcgames.com/img/home/hero-versus-logo-xl.png" class="logo-overlay card-img-overlay d-flex align-items-center img-fluid m-auto">
                                                            </div>
                                                            <div class="overflow-hidden logo-img-container">
                                                                <img class="gameCard-img" src="https://cdn.idcgames.com/img/home/hero-versus-detacado.jpg" alt="...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="card-body text-white position-relative border-top border-green-lighter py-2">
                                                    <div class="d-flex flex-column justify-content-center h-100"> 
                                                        <div><h4 class="card-title h6 text-shadow mb-0">Name of the game</h4></div>
                                                    </div>        
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                        <div class="card small-card flex-column bg-gray-900 border border-green-lighter mb-lg-3 mt-3">
                                            <div class="d-flex flex-column">
                                                <a href="#" class="h-100">
                                                    <div class="img-container">
                                                        <div class="col overflow-hidden px-0">
                                                            <div class="overlay">
                                                                <img src="https://cdn.idcgames.com/img/home/hero-versus-logo-xl.png" class="logo-overlay card-img-overlay d-flex align-items-center img-fluid m-auto">
                                                            </div>
                                                            <div class="overflow-hidden logo-img-container">
                                                                <img class="gameCard-img" src="https://cdn.idcgames.com/img/home/hero-versus-detacado.jpg" alt="...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="card-body text-white position-relative border-top border-green-lighter py-2">
                                                    <div class="d-flex flex-column justify-content-center h-100"> 
                                                        <div><h4 class="card-title h6 text-shadow mb-0">Name </h4></div>
                                                    </div>        
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                        <div class="card small-card flex-column bg-gray-900 border border-green-lighter mb-lg-3 mt-3">
                                            <div class="d-flex flex-column">
                                                <a href="#" class="h-100">
                                                    <div class="img-container">
                                                        <div class="col overflow-hidden px-0">
                                                            <div class="overlay">
                                                                <img src="https://cdn.idcgames.com/img/home/hero-versus-logo-xl.png" class="logo-overlay card-img-overlay d-flex align-items-center img-fluid m-auto">
                                                            </div>
                                                            <div class="overflow-hidden logo-img-container">
                                                                <img class="gameCard-img" src="https://cdn.idcgames.com/img/home/hero-versus-detacado.jpg" alt="...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="card-body text-white position-relative border-top border-green-lighter py-2">
                                                    <div class="d-flex flex-column justify-content-center h-100"> 
                                                        <div><h4 class="card-title h6 text-shadow mb-0">Name of the game really really long</h4></div>
                                                    </div>        
                                                </div>
                                            </div>
                                        </div>
                                    </div>   
                                </div> 
                            </div>
                            <div class="grid-rectangle d-none">
                                <div class="container-fluid d-flex flex-md-row flex-column pb-5">
                                    <div class="col-md-6 col-12 animated slideInUp fast pl-md-0 pr-lg-5 pr-md-3 px-0">
                                        <div class="d-flex flex-column mx-0">
                                            <a href="#" class="forum-link">
                                                <div class="d-flex flex-row border-bottom border-green-lighter py-3">
                                                    <div class="d-flex align-items-center justify-content-center position-relative pl-3">
                                                        <div class="position-relative">
                                                            <div class="bg-img-container overflow-hidden box-shadow">
                                                                <img class="forum-img" src="img/new-home/zula-338x160.png" alt="...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-sm-row flex-column w-100">
                                                        <div class="col d-flex flex-column justify-content-center">
                                                            <div><h4 class="card-title h6 text-white text-shadow mb-0">Name of the game really really long</h4></div>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </a>
                                            <a href="#" class="forum-link">
                                                <div class="d-flex flex-row border-bottom border-green-lighter py-3">
                                                    <div class="d-flex align-items-center justify-content-center position-relative pl-3">
                                                        <div class="position-relative">
                                                            <div class="bg-img-container overflow-hidden box-shadow">
                                                                <img class="forum-img" src="img/new-home/zula-338x160.png" alt="...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-sm-row flex-column w-100">
                                                        <div class="col d-flex flex-column justify-content-center">
                                                            <div><h4 class="card-title h6 text-white text-shadow mb-0">Name of the game really really long</h4></div>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </a>
                                            <a href="#" class="forum-link">
                                                <div class="d-flex flex-row border-bottom border-green-lighter py-3">
                                                    <div class="d-flex align-items-center justify-content-center position-relative pl-3">
                                                        <div class="position-relative">
                                                            <div class="bg-img-container overflow-hidden box-shadow">
                                                                <img class="forum-img" src="img/new-home/zula-338x160.png" alt="...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-sm-row flex-column w-100">
                                                        <div class="col d-flex flex-column justify-content-center">
                                                            <div><h4 class="card-title h6 text-white text-shadow mb-0">Name of the game really really long</h4></div>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </a>
                                            <a href="#" class="forum-link">
                                                <div class="d-flex flex-row border-bottom border-green-lighter py-3">
                                                    <div class="d-flex align-items-center justify-content-center position-relative pl-3">
                                                        <div class="position-relative">
                                                            <div class="bg-img-container overflow-hidden box-shadow">
                                                                <img class="forum-img" src="img/new-home/zula-338x160.png" alt="...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-sm-row flex-column w-100">
                                                        <div class="col d-flex flex-column justify-content-center">
                                                            <div><h4 class="card-title h6 text-white text-shadow mb-0">Name of the game really really long</h4></div>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </a>
                                            <a href="#" class="forum-link">
                                                <div class="d-flex flex-row border-bottom border-green-lighter py-3">
                                                    <div class="d-flex align-items-center justify-content-center position-relative pl-3">
                                                        <div class="position-relative">
                                                            <div class="bg-img-container overflow-hidden box-shadow">
                                                                <img class="forum-img" src="img/new-home/zula-338x160.png" alt="...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-sm-row flex-column w-100">
                                                        <div class="col d-flex flex-column justify-content-center">
                                                            <div><h4 class="card-title h6 text-white text-shadow mb-0">Name of the game really really long</h4></div>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </a>
                                            <a href="#" class="forum-link">
                                                <div class="d-flex flex-row border-bottom border-green-lighter py-3">
                                                    <div class="d-flex align-items-center justify-content-center position-relative pl-3">
                                                        <div class="position-relative">
                                                            <div class="bg-img-container overflow-hidden box-shadow">
                                                                <img class="forum-img" src="img/new-home/zula-338x160.png" alt="...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-sm-row flex-column w-100">
                                                        <div class="col d-flex flex-column justify-content-center">
                                                            <div><h4 class="card-title h6 text-white text-shadow mb-0">Name of the game really really long</h4></div>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </a>
                                            <a href="#" class="forum-link">
                                                <div class="d-flex flex-row border-bottom border-green-lighter py-3">
                                                    <div class="d-flex align-items-center justify-content-center position-relative pl-3">
                                                        <div class="position-relative">
                                                            <div class="bg-img-container overflow-hidden box-shadow">
                                                                <img class="forum-img" src="img/new-home/zula-338x160.png" alt="...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-sm-row flex-column w-100">
                                                        <div class="col d-flex flex-column justify-content-center">
                                                            <div><h4 class="card-title h6 text-white text-shadow mb-0">Name of the game really really long</h4></div>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </a>
                                            <a href="#" class="forum-link">
                                                <div class="d-flex flex-row border-bottom border-green-lighter py-3">
                                                    <div class="d-flex align-items-center justify-content-center position-relative pl-3">
                                                        <div class="position-relative">
                                                            <div class="bg-img-container overflow-hidden box-shadow">
                                                                <img class="forum-img" src="img/new-home/zula-338x160.png" alt="...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-sm-row flex-column w-100">
                                                        <div class="col d-flex flex-column justify-content-center">
                                                            <div><h4 class="card-title h6 text-white text-shadow mb-0">Name of the game really really long</h4></div>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </a>
                                            <a href="#" class="forum-link">
                                                <div class="d-flex flex-row border-bottom border-green-lighter py-3">
                                                    <div class="d-flex align-items-center justify-content-center position-relative pl-3">
                                                        <div class="position-relative">
                                                            <div class="bg-img-container overflow-hidden box-shadow">
                                                                <img class="forum-img" src="img/new-home/zula-338x160.png" alt="...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-sm-row flex-column w-100">
                                                        <div class="col d-flex flex-column justify-content-center">
                                                            <div><h4 class="card-title h6 text-white text-shadow mb-0">Name of the game really really long</h4></div>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </a>
                                            <a href="#" class="forum-link">
                                                <div class="d-flex flex-row border-bottom border-green-lighter py-3">
                                                    <div class="d-flex align-items-center justify-content-center position-relative pl-3">
                                                        <div class="position-relative">
                                                            <div class="bg-img-container overflow-hidden box-shadow">
                                                                <img class="forum-img" src="img/new-home/zula-338x160.png" alt="...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-sm-row flex-column w-100">
                                                        <div class="col d-flex flex-column justify-content-center">
                                                            <div><h4 class="card-title h6 text-white text-shadow mb-0">Name of the game really really long</h4></div>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </a>
                                            <a href="#" class="forum-link">
                                                <div class="d-flex flex-row border-bottom border-green-lighter py-3">
                                                    <div class="d-flex align-items-center justify-content-center position-relative pl-3">
                                                        <div class="position-relative">
                                                            <div class="bg-img-container overflow-hidden box-shadow">
                                                                <img class="forum-img" src="img/new-home/zula-338x160.png" alt="...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-sm-row flex-column w-100">
                                                        <div class="col d-flex flex-column justify-content-center">
                                                            <div><h4 class="card-title h6 text-white text-shadow mb-0">Name of the game really really long</h4></div>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </a>
                                            <a href="#" class="forum-link">
                                                <div class="d-flex flex-row border-bottom border-green-lighter py-3">
                                                    <div class="d-flex align-items-center justify-content-center position-relative pl-3">
                                                        <div class="position-relative">
                                                            <div class="bg-img-container overflow-hidden box-shadow">
                                                                <img class="forum-img" src="img/new-home/zula-338x160.png" alt="...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-sm-row flex-column w-100">
                                                        <div class="col d-flex flex-column justify-content-center">
                                                            <div><h4 class="card-title h6 text-white text-shadow mb-0">Name of the game really really long</h4></div>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 animated slideInUp fast pr-md-0 pl-lg-5 pr-md-3 px-0">
                                        <div class="d-flex flex-column mx-0">
                                            <a href="#" class="forum-link">
                                                <div class="d-flex flex-row border-bottom border-green-lighter py-3">
                                                    <div class="d-flex align-items-center justify-content-center position-relative pl-3">
                                                        <div class="position-relative">
                                                            <div class="bg-img-container overflow-hidden box-shadow">
                                                                <img class="forum-img" src="img/new-home/zula-338x160.png" alt="...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-sm-row flex-column w-100">
                                                        <div class="col d-flex flex-column justify-content-center">
                                                            <div><h4 class="card-title h6 text-white text-shadow mb-0">Name of the game really really long</h4></div>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </a>
                                            <a href="#" class="forum-link">
                                                <div class="d-flex flex-row border-bottom border-green-lighter py-3">
                                                    <div class="d-flex align-items-center justify-content-center position-relative pl-3">
                                                        <div class="position-relative">
                                                            <div class="bg-img-container overflow-hidden box-shadow">
                                                                <img class="forum-img" src="img/new-home/zula-338x160.png" alt="...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-sm-row flex-column w-100">
                                                        <div class="col d-flex flex-column justify-content-center">
                                                            <div><h4 class="card-title h6 text-white text-shadow mb-0">Name of the game really really long</h4></div>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </a>
                                            <a href="#" class="forum-link">
                                                <div class="d-flex flex-row border-bottom border-green-lighter py-3">
                                                    <div class="d-flex align-items-center justify-content-center position-relative pl-3">
                                                        <div class="position-relative">
                                                            <div class="bg-img-container overflow-hidden box-shadow">
                                                                <img class="forum-img" src="img/new-home/zula-338x160.png" alt="...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-sm-row flex-column w-100">
                                                        <div class="col d-flex flex-column justify-content-center">
                                                            <div><h4 class="card-title h6 text-white text-shadow mb-0">Name of the game really really long</h4></div>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </a>
                                            <a href="#" class="forum-link">
                                                <div class="d-flex flex-row border-bottom border-green-lighter py-3">
                                                    <div class="d-flex align-items-center justify-content-center position-relative pl-3">
                                                        <div class="position-relative">
                                                            <div class="bg-img-container overflow-hidden box-shadow">
                                                                <img class="forum-img" src="img/new-home/zula-338x160.png" alt="...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-sm-row flex-column w-100">
                                                        <div class="col d-flex flex-column justify-content-center">
                                                            <div><h4 class="card-title h6 text-white text-shadow mb-0">Name of the game really really long</h4></div>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </a>
                                            <a href="#" class="forum-link">
                                                <div class="d-flex flex-row border-bottom border-green-lighter py-3">
                                                    <div class="d-flex align-items-center justify-content-center position-relative pl-3">
                                                        <div class="position-relative">
                                                            <div class="bg-img-container overflow-hidden box-shadow">
                                                                <img class="forum-img" src="img/new-home/zula-338x160.png" alt="...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-sm-row flex-column w-100">
                                                        <div class="col d-flex flex-column justify-content-center">
                                                            <div><h4 class="card-title h6 text-white text-shadow mb-0">Name of the game really really long</h4></div>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </a>
                                            <a href="#" class="forum-link">
                                                <div class="d-flex flex-row border-bottom border-green-lighter py-3">
                                                    <div class="d-flex align-items-center justify-content-center position-relative pl-3">
                                                        <div class="position-relative">
                                                            <div class="bg-img-container overflow-hidden box-shadow">
                                                                <img class="forum-img" src="img/new-home/zula-338x160.png" alt="...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-sm-row flex-column w-100">
                                                        <div class="col d-flex flex-column justify-content-center">
                                                            <div><h4 class="card-title h6 text-white text-shadow mb-0">Name of the game really really long</h4></div>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </a>
                                            <a href="#" class="forum-link">
                                                <div class="d-flex flex-row border-bottom border-green-lighter py-3">
                                                    <div class="d-flex align-items-center justify-content-center position-relative pl-3">
                                                        <div class="position-relative">
                                                            <div class="bg-img-container overflow-hidden box-shadow">
                                                                <img class="forum-img" src="img/new-home/zula-338x160.png" alt="...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-sm-row flex-column w-100">
                                                        <div class="col d-flex flex-column justify-content-center">
                                                            <div><h4 class="card-title h6 text-white text-shadow mb-0">Name of the game really really long</h4></div>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </a>
                                            <a href="#" class="forum-link">
                                                <div class="d-flex flex-row border-bottom border-green-lighter py-3">
                                                    <div class="d-flex align-items-center justify-content-center position-relative pl-3">
                                                        <div class="position-relative">
                                                            <div class="bg-img-container overflow-hidden box-shadow">
                                                                <img class="forum-img" src="img/new-home/zula-338x160.png" alt="...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-sm-row flex-column w-100">
                                                        <div class="col d-flex flex-column justify-content-center">
                                                            <div><h4 class="card-title h6 text-white text-shadow mb-0">Name of the game really really long</h4></div>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </a>
                                            <a href="#" class="forum-link">
                                                <div class="d-flex flex-row border-bottom border-green-lighter py-3">
                                                    <div class="d-flex align-items-center justify-content-center position-relative pl-3">
                                                        <div class="position-relative">
                                                            <div class="bg-img-container overflow-hidden box-shadow">
                                                                <img class="forum-img" src="img/new-home/zula-338x160.png" alt="...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-sm-row flex-column w-100">
                                                        <div class="col d-flex flex-column justify-content-center">
                                                            <div><h4 class="card-title h6 text-white text-shadow mb-0">Name of the game really really long</h4></div>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </a>
                                            <a href="#" class="forum-link">
                                                <div class="d-flex flex-row border-bottom border-green-lighter py-3">
                                                    <div class="d-flex align-items-center justify-content-center position-relative pl-3">
                                                        <div class="position-relative">
                                                            <div class="bg-img-container overflow-hidden box-shadow">
                                                                <img class="forum-img" src="img/new-home/zula-338x160.png" alt="...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-sm-row flex-column w-100">
                                                        <div class="col d-flex flex-column justify-content-center">
                                                            <div><h4 class="card-title h6 text-white text-shadow mb-0">Name of the game really really long</h4></div>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </a>
                                            <a href="#" class="forum-link">
                                                <div class="d-flex flex-row border-bottom border-green-lighter py-3">
                                                    <div class="d-flex align-items-center justify-content-center position-relative pl-3">
                                                        <div class="position-relative">
                                                            <div class="bg-img-container overflow-hidden box-shadow">
                                                                <img class="forum-img" src="img/new-home/zula-338x160.png" alt="...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-sm-row flex-column w-100">
                                                        <div class="col d-flex flex-column justify-content-center">
                                                            <div><h4 class="card-title h6 text-white text-shadow mb-0">Name of the game really really long</h4></div>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </a>
                                            <a href="#" class="forum-link">
                                                <div class="d-flex flex-row border-bottom border-green-lighter py-3">
                                                    <div class="d-flex align-items-center justify-content-center position-relative pl-3">
                                                        <div class="position-relative">
                                                            <div class="bg-img-container overflow-hidden box-shadow">
                                                                <img class="forum-img" src="img/new-home/zula-338x160.png" alt="...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-sm-row flex-column w-100">
                                                        <div class="col d-flex flex-column justify-content-center">
                                                            <div><h4 class="card-title h6 text-white text-shadow mb-0">Name of the game really really long</h4></div>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </a>
                                        </div>
                                    </div>    
                                </div>
                            </div>
                        </div>
                    </div>                
                </div>
            </div>
        </section>
    </main>
</template>

<script>
export default {
  name: "SymmetryPortal",
  components: {},
  data() {
    return {};
  },
  computed: {},
  watch: {},
  methods: {
    goTo(link) {
      this.$router.push(link);
    },
  },
};
</script>