<header class="header -type-1 js-header">
    <div data-anim="fade delay-3" class="header__container container">
        <div class="headerMobile__left">
            <button class="header__menuBtn js-menu-button">
                <i class="icon-main-menu"></i>
            </button>
        </div>

        <div class="header__logo">
            <a href="index.html" class="header__logo">
                <img src="{{ asset('assets/images/logo/LocalMoroccoTours_bg.png') }}" alt="logo icon">
            </a>


            <div class="xl:d-none ml-30">
                <div class="header__search js-liverSearch js-form-dd">
                    <i class="icon-search text-18"></i>
                    <input type="text" placeholder="Search destinations or activities" class="js-search"
                        data-x-click="headerSearch">

                    <div class="headerSearchRecent" data-x="headerSearch" data-x-toggle="is-active">
                        <div class="headerSearchRecent__container">
                            <div class="headerSearchRecent__title">
                                <h4 class="text-18 fw-500">Recent Searches</h4>
                            </div>

                            <div class="headerSearchRecent__list js-results">

                                <button class="headerSearchRecent__item js-search-option" data-x-click="headerSearch">
                                    <div class="size-50 bg-white rounded-12 border-1 flex-center">
                                        <i class="icon-pin text-20"></i>
                                    </div>
                                    <div class="ml-10">
                                        <div class="fw-500 js-search-option-target">Phuket</div>
                                        <div class="lh-14 text-14 text-light-2">Thailand, Asia</div>
                                    </div>
                                </button>

                                <button class="headerSearchRecent__item js-search-option" data-x-click="headerSearch">
                                    <div class="size-50 bg-white rounded-12 border-1 flex-center">
                                        <i class="icon-price-tag text-20"></i>
                                    </div>
                                    <div class="ml-10">
                                        <div class="fw-500 js-search-option-target">London Day Trips</div>
                                        <div class="lh-14 text-14 text-light-2">England</div>
                                    </div>
                                </button>

                                <button class="headerSearchRecent__item js-search-option" data-x-click="headerSearch">
                                    <div class="size-50 bg-white rounded-12 border-1 flex-center">
                                        <i class="icon-flag text-20"></i>
                                    </div>
                                    <div class="ml-10">
                                        <div class="fw-500 js-search-option-target">Europe</div>
                                        <div class="lh-14 text-14 text-light-2">Country</div>
                                    </div>
                                </button>


                                <button class="headerSearchRecent__item js-search-option" data-x-click="headerSearch">
                                    <div class="size-50 bg-white rounded-12 border-1 flex-center">
                                        <img src="img/misc/icon.png" alt="image" class="rounded-12">
                                    </div>
                                    <div class="ml-10">
                                        <div class="text-overflow fw-500 js-search-option-target">Centipede Tour -
                                            Guided Arizona Desert Tour by ATV</div>
                                        <div class="lh-14 text-14 text-light-2">Country</div>
                                    </div>
                                </button>


                                <button class="headerSearchRecent__item js-search-option" data-x-click="headerSearch">
                                    <div class="size-50 bg-white rounded-12 border-1 flex-center">
                                        <i class="icon-pin text-20"></i>
                                    </div>
                                    <div class="ml-10">
                                        <div class="fw-500 js-search-option-target">Istanbul</div>
                                        <div class="lh-14 text-14 text-light-2">Turkey</div>
                                    </div>
                                </button>

                                <button class="headerSearchRecent__item js-search-option" data-x-click="headerSearch">
                                    <div class="size-50 bg-white rounded-12 border-1 flex-center">
                                        <i class="icon-pin text-20"></i>
                                    </div>
                                    <div class="ml-10">
                                        <div class="fw-500 js-search-option-target">Berlin</div>
                                        <div class="lh-14 text-14 text-light-2">Germany, Europe</div>
                                    </div>
                                </button>

                                <button class="headerSearchRecent__item js-search-option" data-x-click="headerSearch">
                                    <div class="size-50 bg-white rounded-12 border-1 flex-center">
                                        <i class="icon-pin text-20"></i>
                                    </div>
                                    <div class="ml-10">
                                        <div class="fw-500 js-search-option-target">London</div>
                                        <div class="lh-14 text-14 text-light-2">England, Europe</div>
                                    </div>
                                </button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="headerMobile__right">
            <button class="d-flex">
                <i class="icon-search text-18"></i>
            </button>

            <button class="d-flex ml-20">
                <i class="icon-person text-18"></i>
            </button>
        </div>

        <div class="header__right">

            <div class="headerDropdown lg:d-none js-form-dd">
                <div class="headerDropdown__button " data-x-click="headerDestinations">
                    Destinations
                    <i class="icon-chevron-down text-18"></i>
                </div>

                <div class="headerDropdown__content" data-x="headerDestinations" data-x-toggle="is-active">
                    <div class="tabsMenu">
                        <div class="tabsMenu__container">
                            <div class="tabs js-tabs">
                                <div class="tabsMenu__tabs">
                                    <div class="tabs__controls js-tabs-controls">

                                        <button class="tabs__button js-tabs-button is-tab-el-active"
                                            data-tab-target=".-tab-item-1">Europe</button>

                                        <button class="tabs__button js-tabs-button "
                                            data-tab-target=".-tab-item-2">Asia</button>

                                        <button class="tabs__button js-tabs-button "
                                            data-tab-target=".-tab-item-3">North America</button>

                                        <button class="tabs__button js-tabs-button "
                                            data-tab-target=".-tab-item-4">South America</button>

                                        <button class="tabs__button js-tabs-button "
                                            data-tab-target=".-tab-item-5">Africa</button>

                                        <button class="tabs__button js-tabs-button "
                                            data-tab-target=".-tab-item-6">Oceania</button>

                                        <button class="tabs__button js-tabs-button "
                                            data-tab-target=".-tab-item-7">Polar</button>

                                        <button class="tabs__button js-tabs-button "
                                            data-tab-target=".-tab-item-8">Regions</button>

                                    </div>
                                </div>

                                <div class="tabsMenu__content">
                                    <div class="tabs__content js-tabs-content">

                                        <div class="tabs__pane -tab-item-1 is-tab-el-active">
                                            <div class="tabsMenu__lists">
                                                <div class="tabsMenu-list">
                                                    <div class="tabsMenu-list__title">Europe Travel Guide</div>
                                                    <div class="tabsMenu-list__content">

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Italy Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Spain Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">France Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Portugal Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Turkey Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Albania Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Andorra Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Armenia Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Austria Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Lithuania Tours</a>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="tabsMenu-list">
                                                    <div class="tabsMenu-list__title">Europe Travel Guide</div>
                                                    <div class="tabsMenu-list__content">

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Azerbaijan Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Belgium Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Bosnia Herzegovina Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Bulgaria Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Croatia Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Cyprus Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Iceland Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Ireland Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Kosovo Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Latvia Tours</a>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="tabsMenu-list">
                                                    <div class="tabsMenu-list__title">Europe Travel Guide</div>
                                                    <div class="tabsMenu-list__content">

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Czech Republic Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Denmark Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">England Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Estonia Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Finland Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Georgia Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Germany Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Greece Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Holland Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Hungary Tours</a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tabs__pane -tab-item-2 ">
                                            <div class="tabsMenu__lists">
                                                <div class="tabsMenu-list">
                                                    <div class="tabsMenu-list__title">Europe Travel Guide</div>
                                                    <div class="tabsMenu-list__content">

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Italy Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Spain Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">France Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Portugal Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Turkey Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Albania Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Andorra Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Armenia Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Austria Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Lithuania Tours</a>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="tabsMenu-list">
                                                    <div class="tabsMenu-list__title">Europe Travel Guide</div>
                                                    <div class="tabsMenu-list__content">

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Azerbaijan Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Belgium Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Bosnia Herzegovina Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Bulgaria Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Croatia Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Cyprus Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Iceland Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Ireland Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Kosovo Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Latvia Tours</a>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="tabsMenu-list">
                                                    <div class="tabsMenu-list__title">Europe Travel Guide</div>
                                                    <div class="tabsMenu-list__content">

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Czech Republic Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Denmark Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">England Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Estonia Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Finland Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Georgia Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Germany Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Greece Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Holland Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Hungary Tours</a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tabs__pane -tab-item-3 ">
                                            <div class="tabsMenu__lists">
                                                <div class="tabsMenu-list">
                                                    <div class="tabsMenu-list__title">Europe Travel Guide</div>
                                                    <div class="tabsMenu-list__content">

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Italy Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Spain Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">France Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Portugal Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Turkey Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Albania Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Andorra Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Armenia Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Austria Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Lithuania Tours</a>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="tabsMenu-list">
                                                    <div class="tabsMenu-list__title">Europe Travel Guide</div>
                                                    <div class="tabsMenu-list__content">

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Azerbaijan Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Belgium Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Bosnia Herzegovina Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Bulgaria Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Croatia Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Cyprus Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Iceland Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Ireland Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Kosovo Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Latvia Tours</a>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="tabsMenu-list">
                                                    <div class="tabsMenu-list__title">Europe Travel Guide</div>
                                                    <div class="tabsMenu-list__content">

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Czech Republic Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Denmark Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">England Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Estonia Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Finland Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Georgia Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Germany Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Greece Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Holland Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Hungary Tours</a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tabs__pane -tab-item-4 ">
                                            <div class="tabsMenu__lists">
                                                <div class="tabsMenu-list">
                                                    <div class="tabsMenu-list__title">Europe Travel Guide</div>
                                                    <div class="tabsMenu-list__content">

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Italy Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Spain Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">France Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Portugal Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Turkey Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Albania Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Andorra Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Armenia Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Austria Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Lithuania Tours</a>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="tabsMenu-list">
                                                    <div class="tabsMenu-list__title">Europe Travel Guide</div>
                                                    <div class="tabsMenu-list__content">

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Azerbaijan Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Belgium Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Bosnia Herzegovina Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Bulgaria Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Croatia Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Cyprus Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Iceland Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Ireland Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Kosovo Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Latvia Tours</a>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="tabsMenu-list">
                                                    <div class="tabsMenu-list__title">Europe Travel Guide</div>
                                                    <div class="tabsMenu-list__content">

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Czech Republic Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Denmark Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">England Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Estonia Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Finland Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Georgia Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Germany Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Greece Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Holland Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Hungary Tours</a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tabs__pane -tab-item-5 ">
                                            <div class="tabsMenu__lists">
                                                <div class="tabsMenu-list">
                                                    <div class="tabsMenu-list__title">Europe Travel Guide</div>
                                                    <div class="tabsMenu-list__content">

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Italy Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Spain Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">France Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Portugal Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Turkey Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Albania Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Andorra Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Armenia Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Austria Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Lithuania Tours</a>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="tabsMenu-list">
                                                    <div class="tabsMenu-list__title">Europe Travel Guide</div>
                                                    <div class="tabsMenu-list__content">

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Azerbaijan Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Belgium Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Bosnia Herzegovina Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Bulgaria Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Croatia Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Cyprus Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Iceland Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Ireland Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Kosovo Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Latvia Tours</a>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="tabsMenu-list">
                                                    <div class="tabsMenu-list__title">Europe Travel Guide</div>
                                                    <div class="tabsMenu-list__content">

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Czech Republic Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Denmark Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">England Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Estonia Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Finland Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Georgia Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Germany Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Greece Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Holland Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Hungary Tours</a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tabs__pane -tab-item-6 ">
                                            <div class="tabsMenu__lists">
                                                <div class="tabsMenu-list">
                                                    <div class="tabsMenu-list__title">Europe Travel Guide</div>
                                                    <div class="tabsMenu-list__content">

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Italy Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Spain Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">France Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Portugal Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Turkey Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Albania Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Andorra Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Armenia Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Austria Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Lithuania Tours</a>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="tabsMenu-list">
                                                    <div class="tabsMenu-list__title">Europe Travel Guide</div>
                                                    <div class="tabsMenu-list__content">

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Azerbaijan Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Belgium Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Bosnia Herzegovina Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Bulgaria Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Croatia Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Cyprus Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Iceland Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Ireland Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Kosovo Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Latvia Tours</a>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="tabsMenu-list">
                                                    <div class="tabsMenu-list__title">Europe Travel Guide</div>
                                                    <div class="tabsMenu-list__content">

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Czech Republic Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Denmark Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">England Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Estonia Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Finland Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Georgia Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Germany Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Greece Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Holland Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Hungary Tours</a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tabs__pane -tab-item-7 ">
                                            <div class="tabsMenu__lists">
                                                <div class="tabsMenu-list">
                                                    <div class="tabsMenu-list__title">Europe Travel Guide</div>
                                                    <div class="tabsMenu-list__content">

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Italy Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Spain Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">France Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Portugal Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Turkey Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Albania Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Andorra Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Armenia Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Austria Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Lithuania Tours</a>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="tabsMenu-list">
                                                    <div class="tabsMenu-list__title">Europe Travel Guide</div>
                                                    <div class="tabsMenu-list__content">

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Azerbaijan Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Belgium Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Bosnia Herzegovina Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Bulgaria Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Croatia Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Cyprus Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Iceland Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Ireland Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Kosovo Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Latvia Tours</a>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="tabsMenu-list">
                                                    <div class="tabsMenu-list__title">Europe Travel Guide</div>
                                                    <div class="tabsMenu-list__content">

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Czech Republic Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Denmark Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">England Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Estonia Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Finland Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Georgia Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Germany Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Greece Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Holland Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Hungary Tours</a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tabs__pane -tab-item-8 ">
                                            <div class="tabsMenu__lists">
                                                <div class="tabsMenu-list">
                                                    <div class="tabsMenu-list__title">Europe Travel Guide</div>
                                                    <div class="tabsMenu-list__content">

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Italy Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Spain Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">France Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Portugal Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Turkey Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Albania Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Andorra Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Armenia Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Austria Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Lithuania Tours</a>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="tabsMenu-list">
                                                    <div class="tabsMenu-list__title">Europe Travel Guide</div>
                                                    <div class="tabsMenu-list__content">

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Azerbaijan Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Belgium Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Bosnia Herzegovina Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Bulgaria Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Croatia Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Cyprus Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Iceland Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Ireland Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Kosovo Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Latvia Tours</a>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="tabsMenu-list">
                                                    <div class="tabsMenu-list__title">Europe Travel Guide</div>
                                                    <div class="tabsMenu-list__content">

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Czech Republic Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Denmark Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">England Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Estonia Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Finland Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Georgia Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Germany Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Greece Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Holland Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Hungary Tours</a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="headerDropdown lg:d-none js-form-dd">
                <div class="headerDropdown__button " data-x-click="header-activities">
                    Activities
                    <i class="icon-chevron-down text-18"></i>
                </div>

                <div class="headerDropdown__content" data-x="header-activities" data-x-toggle="is-active">
                    <div class="tabsMenu">
                        <div class="tabsMenu__container">
                            <div class="tabs js-tabs">
                                <div class="tabsMenu__tabs">
                                    <div class="tabs__controls js-tabs-controls">

                                        <button class="tabs__button js-tabs-button is-tab-el-active"
                                            data-tab-target=".-tab-item-1">Top world landmarks</button>

                                        <button class="tabs__button js-tabs-button "
                                            data-tab-target=".-tab-item-2">Food and Nightlife</button>

                                        <button class="tabs__button js-tabs-button "
                                            data-tab-target=".-tab-item-3">Adventure and Sport</button>

                                        <button class="tabs__button js-tabs-button "
                                            data-tab-target=".-tab-item-4">Landscapes and Nature</button>

                                        <button class="tabs__button js-tabs-button "
                                            data-tab-target=".-tab-item-5">Boat Tours</button>

                                        <button class="tabs__button js-tabs-button "
                                            data-tab-target=".-tab-item-6">Water Sports</button>

                                        <button class="tabs__button js-tabs-button "
                                            data-tab-target=".-tab-item-7">Air Tours</button>

                                        <button class="tabs__button js-tabs-button "
                                            data-tab-target=".-tab-item-8">Road Trips</button>

                                    </div>
                                </div>

                                <div class="tabsMenu__content">
                                    <div class="tabs__content js-tabs-content">

                                        <div class="tabs__pane -tab-item-1 is-tab-el-active">
                                            <div class="tabsMenu__lists">
                                                <div class="tabsMenu-list">
                                                    <div class="tabsMenu-list__title">Food and Nightlife</div>
                                                    <div class="tabsMenu-list__content">

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Holi Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Christmas markets Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Day of the Dead Festival Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Food tours Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Party and nightlife Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Rio Carnival Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Pub and bar crawl Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">St Patricks Day Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Cooking classes Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Wine tasting tours Tours</a>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="tabsMenu-list">
                                                    <div class="tabsMenu-list__title">Food and Nightlife</div>
                                                    <div class="tabsMenu-list__content">

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Concerts and shows Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Coffee and tea tours Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Beer and drinks tasting Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Cherry Blossom Tours</a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tabs__pane -tab-item-2 ">
                                            <div class="tabsMenu__lists">
                                                <div class="tabsMenu-list">
                                                    <div class="tabsMenu-list__title">Food and Nightlife</div>
                                                    <div class="tabsMenu-list__content">

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Holi Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Christmas markets Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Day of the Dead Festival Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Food tours Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Party and nightlife Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Rio Carnival Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Pub and bar crawl Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">St Patricks Day Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Cooking classes Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Wine tasting tours Tours</a>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="tabsMenu-list">
                                                    <div class="tabsMenu-list__title">Food and Nightlife</div>
                                                    <div class="tabsMenu-list__content">

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Concerts and shows Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Coffee and tea tours Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Beer and drinks tasting Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Cherry Blossom Tours</a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tabs__pane -tab-item-3 ">
                                            <div class="tabsMenu__lists">
                                                <div class="tabsMenu-list">
                                                    <div class="tabsMenu-list__title">Food and Nightlife</div>
                                                    <div class="tabsMenu-list__content">

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Holi Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Christmas markets Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Day of the Dead Festival Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Food tours Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Party and nightlife Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Rio Carnival Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Pub and bar crawl Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">St Patricks Day Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Cooking classes Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Wine tasting tours Tours</a>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="tabsMenu-list">
                                                    <div class="tabsMenu-list__title">Food and Nightlife</div>
                                                    <div class="tabsMenu-list__content">

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Concerts and shows Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Coffee and tea tours Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Beer and drinks tasting Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Cherry Blossom Tours</a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tabs__pane -tab-item-4 ">
                                            <div class="tabsMenu__lists">
                                                <div class="tabsMenu-list">
                                                    <div class="tabsMenu-list__title">Food and Nightlife</div>
                                                    <div class="tabsMenu-list__content">

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Holi Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Christmas markets Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Day of the Dead Festival Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Food tours Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Party and nightlife Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Rio Carnival Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Pub and bar crawl Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">St Patricks Day Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Cooking classes Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Wine tasting tours Tours</a>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="tabsMenu-list">
                                                    <div class="tabsMenu-list__title">Food and Nightlife</div>
                                                    <div class="tabsMenu-list__content">

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Concerts and shows Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Coffee and tea tours Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Beer and drinks tasting Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Cherry Blossom Tours</a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tabs__pane -tab-item-5 ">
                                            <div class="tabsMenu__lists">
                                                <div class="tabsMenu-list">
                                                    <div class="tabsMenu-list__title">Food and Nightlife</div>
                                                    <div class="tabsMenu-list__content">

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Holi Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Christmas markets Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Day of the Dead Festival Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Food tours Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Party and nightlife Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Rio Carnival Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Pub and bar crawl Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">St Patricks Day Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Cooking classes Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Wine tasting tours Tours</a>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="tabsMenu-list">
                                                    <div class="tabsMenu-list__title">Food and Nightlife</div>
                                                    <div class="tabsMenu-list__content">

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Concerts and shows Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Coffee and tea tours Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Beer and drinks tasting Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Cherry Blossom Tours</a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tabs__pane -tab-item-6 ">
                                            <div class="tabsMenu__lists">
                                                <div class="tabsMenu-list">
                                                    <div class="tabsMenu-list__title">Food and Nightlife</div>
                                                    <div class="tabsMenu-list__content">

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Holi Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Christmas markets Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Day of the Dead Festival Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Food tours Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Party and nightlife Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Rio Carnival Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Pub and bar crawl Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">St Patricks Day Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Cooking classes Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Wine tasting tours Tours</a>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="tabsMenu-list">
                                                    <div class="tabsMenu-list__title">Food and Nightlife</div>
                                                    <div class="tabsMenu-list__content">

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Concerts and shows Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Coffee and tea tours Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Beer and drinks tasting Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Cherry Blossom Tours</a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tabs__pane -tab-item-7 ">
                                            <div class="tabsMenu__lists">
                                                <div class="tabsMenu-list">
                                                    <div class="tabsMenu-list__title">Food and Nightlife</div>
                                                    <div class="tabsMenu-list__content">

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Holi Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Christmas markets Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Day of the Dead Festival Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Food tours Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Party and nightlife Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Rio Carnival Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Pub and bar crawl Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">St Patricks Day Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Cooking classes Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Wine tasting tours Tours</a>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="tabsMenu-list">
                                                    <div class="tabsMenu-list__title">Food and Nightlife</div>
                                                    <div class="tabsMenu-list__content">

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Concerts and shows Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Coffee and tea tours Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Beer and drinks tasting Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Cherry Blossom Tours</a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tabs__pane -tab-item-8 ">
                                            <div class="tabsMenu__lists">
                                                <div class="tabsMenu-list">
                                                    <div class="tabsMenu-list__title">Food and Nightlife</div>
                                                    <div class="tabsMenu-list__content">

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Holi Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Christmas markets Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Day of the Dead Festival Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Food tours Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Party and nightlife Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Rio Carnival Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Pub and bar crawl Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">St Patricks Day Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Cooking classes Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Wine tasting tours Tours</a>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="tabsMenu-list">
                                                    <div class="tabsMenu-list__title">Food and Nightlife</div>
                                                    <div class="tabsMenu-list__content">

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Concerts and shows Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Coffee and tea tours Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Beer and drinks tasting Tours</a>
                                                        </div>

                                                        <div class="tabsMenu-list__item">
                                                            <a href="#">Cherry Blossom Tours</a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="headerDropdown  js-form-dd">
                <div class="headerDropdown__button" data-x-click="header-currency">
                    USD
                    <i class="icon-chevron-down text-18"></i>
                </div>

                <div class="headerDropdown__content" data-x="header-currency" data-x-toggle="is-active">
                    <div class="headerDropdown">
                        <div class="headerDropdown__container">

                            <div class="headerDropdown__item">
                                <button class="">U.S. Dollar</button>
                            </div>

                            <div class="headerDropdown__item">
                                <button class="">Euro</button>
                            </div>

                            <div class="headerDropdown__item">
                                <button class="">British Pound</button>
                            </div>

                            <div class="headerDropdown__item">
                                <button class="">Turkish Lira</button>
                            </div>

                            <div class="headerDropdown__item">
                                <button class="">Canadian Dollar</button>
                            </div>

                            <div class="headerDropdown__item">
                                <button class="">Australian Dollar</button>
                            </div>

                            <div class="headerDropdown__item">
                                <button class="">Swiss Franc</button>
                            </div>

                            <div class="headerDropdown__item">
                                <button class="">Singapore Dollar</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <a href="register.html" class="ml-10">
                Sign up
            </a>

            <a href="login.html" class="button -sm -dark-1 bg-accent-1 rounded-200 text-white ml-30">
                Log in
            </a>

            <button class="header__menuBtn ml-30 js-menu-button">
                <i class="icon-main-menu"></i>
            </button>
        </div>
    </div>
</header>
