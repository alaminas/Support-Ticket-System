<aside class="vironeer-sidebar">
    <div class="overlay"></div>
    <div class="vironeer-sidebar-header">
        <a href="{{ route('admin.dashboard') }}" class="vironeer-sidebar-logo">
            <img src="{{ asset($settings->media->logo_light) }}" alt="{{ $settings->general->site_name }}" />
        </a>
    </div>
    <div class="vironeer-sidebar-menu" data-simplebar>
        <div class="vironeer-sidebar-links">
            <div class="vironeer-sidebar-links-cont">
                <a href="{{ route('admin.dashboard') }}"
                    class="vironeer-sidebar-link {{ request()->segment(2) == 'dashboard' ? 'current' : '' }}">
                    <p class="vironeer-sidebar-link-title">
                        <span><i class="fa-solid fa-table-columns"></i>{{ admin_trans('Dashboard') }}</span>
                    </p>
                </a>
                <div class="vironeer-sidebar-link  {{ request()->segment(2) == 'members' ? 'active' : '' }}"
                    data-dropdown>
                    <p class="vironeer-sidebar-link-title">
                        <span><i class="fas fa-users"></i>{{ admin_trans('Members') }}</span>
                        <span class="arrow"><i class="fas fa-chevron-right fa-sm"></i></span>
                    </p>
                    <div class="vironeer-sidebar-link-menu">
                        <a href="{{ route('admin.members.users.index') }}"
                            class="vironeer-sidebar-link {{ request()->segment(3) == 'users' ? 'current' : '' }}">
                            <p class="vironeer-sidebar-link-title"><span>{{ admin_trans('Users') }}</span></p>
                        </a>
                        <a href="{{ route('admin.members.agents.index') }}"
                            class="vironeer-sidebar-link {{ request()->segment(3) == 'agents' ? 'current' : '' }}">
                            <p class="vironeer-sidebar-link-title"><span>{{ admin_trans('Agents') }}</span></p>
                        </a>
                        <a href="{{ route('admin.members.admins.index') }}"
                            class="vironeer-sidebar-link {{ request()->segment(3) == 'admins' ? 'current' : '' }}">
                            <p class="vironeer-sidebar-link-title"><span>{{ admin_trans('Admins') }}</span></p>
                        </a>
                    </div>
                </div>
                <a href="{{ route('admin.tickets.index') }}"
                    class="vironeer-sidebar-link {{ request()->segment(2) == 'tickets' ? 'current' : '' }}">
                    <p class="vironeer-sidebar-link-title">
                        <span><i class="fa-solid fa-inbox"></i>{{ admin_trans('Tickets') }}</span>
                    </p>
                </a>
                <a href="{{ route('admin.departments.index') }}"
                    class="vironeer-sidebar-link {{ request()->segment(2) == 'departments' ? 'current' : '' }}">
                    <p class="vironeer-sidebar-link-title">
                        <span><i class="fa-solid fa-table-cells-large"></i>{{ admin_trans('Departments') }}</span>
                    </p>
                </a>
            </div>
           {{--   <div class="vironeer-sidebar-links-cont">
                <div class="vironeer-sidebar-link {{ request()->segment(2) == 'navigation' ? 'active' : '' }}"
                    data-dropdown>
                    <p class="vironeer-sidebar-link-title">
                        <span><i class="fa-solid fa-bars-staggered"></i>{{ admin_trans('Navigation') }}</span>
                        <span class="arrow"><i class="fas fa-chevron-right fa-sm"></i></span>
                    </p>
                    <div class="vironeer-sidebar-link-menu">
                        <a href="{{ route('admin.navbar-menu.index') }}"
                            class="vironeer-sidebar-link {{ request()->segment(3) == 'navbar-menu' ? 'current' : '' }}">
                            <p class="vironeer-sidebar-link-title"><span>{{ admin_trans('Navbar Menu') }}</span></p>
                        </a>
                        <a href="{{ route('admin.footer-menu.index') }}"
                            class="vironeer-sidebar-link {{ request()->segment(3) == 'footer-menu' ? 'current' : '' }}">
                            <p class="vironeer-sidebar-link-title"><span>{{ admin_trans('Footer Menu') }}</span></p>
                        </a>
                    </div>
                </div>
                @if ($settings->actions->knowledgebase_status)
                    <div class="vironeer-sidebar-link  {{ request()->segment(2) == 'knowledgebase' ? 'active' : '' }}"
                        data-dropdown>
                        <p class="vironeer-sidebar-link-title">
                            <span><i class="fa-solid fa-book-open"></i>{{ admin_trans('Knowledge base') }}</span>
                            <span class="arrow"><i class="fas fa-chevron-right fa-sm"></i></span>
                        </p>
                        <div class="vironeer-sidebar-link-menu">
                            <a href="{{ route('admin.knowledgebase.articles.index') }}"
                                class="vironeer-sidebar-link {{ request()->segment(3) == 'articles' ? 'current' : '' }}">
                                <p class="vironeer-sidebar-link-title"><span>{{ admin_trans('Articles') }}</span></p>
                            </a>
                            <a href="{{ route('admin.knowledgebase.categories.index') }}"
                                class="vironeer-sidebar-link  {{ request()->segment(3) == 'categories' ? 'current' : '' }}">
                                <p class="vironeer-sidebar-link-title"><span>{{ admin_trans('Categories') }}</span></p>
                            </a>
                        </div>
                    </div>
                @endif
                <div class="vironeer-sidebar-link {{ request()->segment(2) == 'settings' ? 'active' : '' }}"
                    data-dropdown>
                    <p class="vironeer-sidebar-link-title">
                        <span><i class="fa fa-cog"></i>{{ admin_trans('Settings') }}</span>
                        <span class="arrow"><i class="fas fa-chevron-right fa-sm"></i></span>
                    </p>
                    <div class="vironeer-sidebar-link-menu">
                        <a href="{{ route('admin.settings.general') }}"
                            class="vironeer-sidebar-link {{ request()->segment(3) == 'general' ? 'current' : '' }}">
                            <p class="vironeer-sidebar-link-title"><span>{{ admin_trans('General') }}</span>
                            </p>
                        </a>
                        <a href="{{ route('admin.settings.oauth-providers.index') }}"
                            class="vironeer-sidebar-link {{ request()->segment(3) == 'oauth-providers' ? 'current' : '' }}">
                            <p class="vironeer-sidebar-link-title"><span>{{ admin_trans('OAuth') }}</span></p>
                        </a>
                        <a href="{{ route('admin.settings.smtp.index') }}"
                            class="vironeer-sidebar-link {{ request()->segment(3) == 'smtp' ? 'current' : '' }}">
                            <p class="vironeer-sidebar-link-title"><span>{{ admin_trans('SMTP') }}</span></p>
                        </a>
                        <a href="{{ route('admin.settings.pages.index') }}"
                            class="vironeer-sidebar-link {{ request()->segment(3) == 'pages' ? 'current' : '' }}">
                            <p class="vironeer-sidebar-link-title"><span>{{ admin_trans('Pages') }}</span></p>
                        </a>
                        <a href="{{ route('admin.settings.extensions.index') }}"
                            class="vironeer-sidebar-link {{ request()->segment(3) == 'extensions' ? 'current' : '' }}">
                            <p class="vironeer-sidebar-link-title"><span>{{ admin_trans('Extensions') }}</span></p>
                        </a>
                        <a href="{{ route('admin.settings.translates.index') }}"
                            class="vironeer-sidebar-link {{ request()->segment(3) == 'translates' ? 'current' : '' }}">
                            <p class="vironeer-sidebar-link-title"><span>{{ admin_trans('Translates') }}</span></p>
                        </a>
                        <a href="{{ route('admin.settings.mail-templates.index') }}"
                            class="vironeer-sidebar-link {{ request()->segment(3) == 'mail-templates' ? 'current' : '' }}">
                            <p class="vironeer-sidebar-link-title"><span>{{ admin_trans('Mail Templates') }}</span></p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="vironeer-sidebar-links-cont">
                <div class="vironeer-sidebar-link {{ request()->segment(2) == 'extra' ? 'active' : '' }}"
                    data-dropdown>
                    <p class="vironeer-sidebar-link-title">
                        <span><i class="fas fa-plus-square"></i>{{ admin_trans('Extra features') }}</span>
                        <span class="arrow"><i class="fas fa-chevron-right fa-sm"></i></span>
                    </p>
                    <div class="vironeer-sidebar-link-menu">
                        <a href="{{ route('admin.extra.notice') }}"
                            class="vironeer-sidebar-link {{ request()->segment(3) == 'popup-notice' ? 'current' : '' }}">
                            <p class="vironeer-sidebar-link-title"><span>{{ admin_trans('PopUp Notice') }}</span></p>
                        </a>
                        <a href="{{ route('admin.extra.css') }}"
                            class="vironeer-sidebar-link {{ request()->segment(3) == 'custom-css' ? 'current' : '' }}">
                            <p class="vironeer-sidebar-link-title"><span>{{ admin_trans('Custom CSS') }}</span></p>
                        </a>
                    </div>
                </div>
                <div class="vironeer-sidebar-link {{ request()->segment(2) == 'system' ? 'active' : '' }}"
                    data-dropdown>
                    <p class="vironeer-sidebar-link-title">
                        <span><i class="far fa-question-circle"></i>{{ admin_trans('System') }}</span>
                        <span class="arrow"><i class="fas fa-chevron-right fa-sm"></i></span>
                    </p>
                    <div class="vironeer-sidebar-link-menu">
                        <a href="{{ route('admin.system.info.index') }}"
                            class="vironeer-sidebar-link {{ request()->segment(3) == 'info' ? 'current' : '' }}">
                            <p class="vironeer-sidebar-link-title"><span>{{ admin_trans('Information') }}</span>
                            </p>
                        </a>
                        <a href="{{ route('admin.system.editor-files.index') }}"
                            class="vironeer-sidebar-link {{ request()->segment(3) == 'editor-files' ? 'current' : '' }}">
                            <p class="vironeer-sidebar-link-title"><span>{{ admin_trans('Editor Files') }}</span>
                            </p>
                        </a>
                        <a href="{{ route('admin.system.panel-style') }}"
                            class="vironeer-sidebar-link {{ request()->segment(3) == 'panel-style' ? 'current' : '' }}">
                            <p class="vironeer-sidebar-link-title"><span>{{ admin_trans('Panel Style') }}</span>
                            </p>
                        </a>
                    </div>
                </div>
            </div>--}}
        </div>
    </div>
</aside>
