<header class="header-dashboard">
    <div class="wrap">
        <div class="header-left">
            <a href="{{ route('admin.dashboard') }}">
                <img class="" id="logo_header_mobile" alt=""
                    src="{{ asset('theme/admin/images/logo/logo.png') }}"
                    data-light="{{ asset('theme/admin/images/logo/logo.png') }}"
                    data-dark="{{ asset('theme/admin/images/logo/logo-dark.png') }}" data-width="154px"
                    data-height="52px" data-retina="{{ asset('theme/admin/images/logo/logo.png') }}">
            </a>
            <div class="button-show-hide">
                <i class="icon-menu-left"></i>
            </div>
            <form class="form-search flex-grow">
                <fieldset class="name">
                    <input type="text" placeholder="Search here..." class="show-search" name="name" tabindex="2"
                        value="" aria-required="true">
                </fieldset>
                <div class="button-submit">
                    <button class="" type="submit"><i class="icon-search"></i></button>
                </div>
            </form>
        </div>
        <div class="header-grid">
            <div class="header-item button-dark-light">
                <i class="icon-moon"></i>
            </div>
            <div class="popup-wrap noti type-header">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="header-item">
                            <span class="text-tiny">1</span>
                            <i class="icon-bell"></i>
                        </span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end has-content" aria-labelledby="dropdownMenuButton1">
                        <li>
                            <h6>Message</h6>
                        </li>
                        <li>
                            <div class="noti-item w-full wg-user active">
                                <div class="image">
                                    <img src="{{ asset('theme/admin/images/avatar/user-11.png') }}" alt="">
                                </div>
                                <div class="flex-grow">
                                    <div class="flex items-center justify-between">
                                        <a href="#" class="body-title">Cameron
                                            Williamson</a>
                                        <div class="time">10:13 PM</div>
                                    </div>
                                    <div class="text-tiny">Hello?</div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noti-item w-full wg-user active">
                                <div class="image">
                                    <img src="{{ asset('theme/admin/images/avatar/user-12.png') }}" alt="">
                                </div>
                                <div class="flex-grow">
                                    <div class="flex items-center justify-between">
                                        <a href="#" class="body-title">Ralph Edwards</a>
                                        <div class="time">10:13 PM</div>
                                    </div>
                                    <div class="text-tiny">Are you there? interested i this...
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noti-item w-full wg-user active">
                                <div class="image">
                                    <img src="{{ asset('theme/admin/images/avatar/user-13.png') }}" alt="">
                                </div>
                                <div class="flex-grow">
                                    <div class="flex items-center justify-between">
                                        <a href="#" class="body-title">Eleanor Pena</a>
                                        <div class="time">10:13 PM</div>
                                    </div>
                                    <div class="text-tiny">Interested in this loads?</div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noti-item w-full wg-user active">
                                <div class="image">
                                    <img src="{{ asset('theme/admin/images/avatar/user-11.png') }}" alt="">
                                </div>
                                <div class="flex-grow">
                                    <div class="flex items-center justify-between">
                                        <a href="#" class="body-title">Jane Cooper</a>
                                        <div class="time">10:13 PM</div>
                                    </div>
                                    <div class="text-tiny">Okay...Do we have a deal?</div>
                                </div>
                            </div>
                        </li>
                        <li><a href="#" class="tf-button w-full">View all</a></li>
                    </ul>
                </div>
            </div>
            <div class="header-item button-zoom-maximize">
                <div class="">
                    <i class="icon-maximize"></i>
                </div>
            </div>
            <div class="popup-wrap user type-header">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton3"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="header-user wg-user">
                            <span class="image">
                                <img src="{{ asset('theme/admin/images/avatar/user-1.png') }}" alt="">
                            </span>
                            <span class="flex flex-column">
                                <span class="body-title mb-2">Kristin Watson</span>
                                <span class="text-tiny">Admin</span>
                            </span>
                        </span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end has-content" aria-labelledby="dropdownMenuButton3">
                        <li>
                            <a href="#" class="user-item">
                                <div class="icon">
                                    <i class="icon-user"></i>
                                </div>
                                <div class="body-title-2">Account</div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="user-item">
                                <div class="icon">
                                    <i class="icon-mail"></i>
                                </div>
                                <div class="body-title-2">Inbox</div>
                                <div class="number">27</div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="user-item">
                                <div class="icon">
                                    <i class="icon-file-text"></i>
                                </div>
                                <div class="body-title-2">Taskboard</div>
                            </a>
                        </li>
                        <li>
                            <a href="setting.html" class="user-item">
                                <div class="icon">
                                    <i class="icon-settings"></i>
                                </div>
                                <div class="body-title-2">Setting</div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="user-item">
                                <div class="icon">
                                    <i class="icon-headphones"></i>
                                </div>
                                <div class="body-title-2">Support</div>
                            </a>
                        </li>
                        <li>
                            <a href="login.html" class="user-item">
                                <div class="icon">
                                    <i class="icon-log-out"></i>
                                </div>
                                <div class="body-title-2">Log out</div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
