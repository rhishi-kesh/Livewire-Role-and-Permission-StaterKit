<nav x-data="sidebar"
    class="sidebar fixed bottom-0 top-0 z-50 h-full min-h-screen w-[260px] shadow-[5px_0_25px_0_rgba(94,92,154,0.1)] transition-all duration-300">
    <div class="h-full bg-white dark:bg-slate-900">
        <div class="flex items-center justify-between px-4 py-3">
            <a href="{{ route('dashboard') }}" class="main-logo flex shrink-0 items-center">
                <img class="ml-[5px] flex-none" width="150" src="{{ asset('storage/' . $systemInformation->logo) }}"
                    alt="image" />
            </a>
            <a href="javascript:;"
                class="collapse-icon flex h-8 w-8 items-center rounded-full transition duration-300 hover:bg-gray-500/10 dark:text-white-light dark:hover:bg-dark-light/10"
                @click="$store.app.toggleSidebar()">
                <svg class="m-auto h-5 w-5" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M13 19L7 12L13 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" class="text-gray-950 dark:text-white" />
                    <path opacity="0.5" d="M16.9998 19L10.9998 12L16.9998 5" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>
        </div>
        <ul class="perfect-scrollbar relative h-[calc(100vh-80px)] space-y-0.5 overflow-y-auto overflow-x-hidden p-4 py-0 font-semibold"
            x-data="{ activeDropdown: 'dashboard' }">
            <li class="nav-item">
                <a target="_blank" href="{{ route('index') }}" class="group sidebargroup">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-world" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                            <path d="M3.6 9h16.8"></path>
                            <path d="M3.6 15h16.8"></path>
                            <path d="M11.5 3a17 17 0 0 0 0 18"></path>
                            <path d="M12.5 3a17 17 0 0 1 0 18"></path>
                         </svg>
                        <span class="text-black pl-3 dark:text-[#506690] dark:group-hover:text-white-dark">Visit Website</span>
                    </div>
                </a>
            </li>
            <h2
                class="-mx-4 mb-1 flex items-center bg-white-light/30 px-7 py-3 font-extrabold uppercase dark:bg-dark dark:bg-opacity-[0.08]">
                <svg class="hidden h-5 w-4 flex-none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"
                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                <span>Home</span>
            </h2>
            <li class="menu nav-item group">
                <button type="button" class="nav-link group" :class="{ 'active': activeDropdown === 'setting' }"
                    @click="activeDropdown === 'setting' ? activeDropdown = null : activeDropdown = 'setting'">
                    <div class="flex items-center">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-settings"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" /><path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" /></svg>
                        <span class="text-black pl-3 dark:text-[#506690] dark:group-hover:text-white-dark">Settings</span>
                    </div>
                    <div :class="{ '!rotate-90': activeDropdown === 'setting' }">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </div>
                </button>
                <ul x-cloak x-show="activeDropdown === 'setting'" x-collapse class="sub-menu text-gray-500">
                    <li x-data="{ subActive: null }">
                        <button type="button"
                            class="before:h-[5px] before:w-[5px] before:rounded before:bg-gray-300 hover:bg-gray-100 before:mr-2 dark:text-[#888ea8] dark:hover:bg-gray-900"
                            @click="subActive === 'error' ? subActive = null : subActive = 'error'">
                            Users
                            <div class="ml-auto" :class="{ '!rotate-90': subActive === 'error' }">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.5"
                                        d="M6.25 19C6.25 19.3139 6.44543 19.5946 6.73979 19.7035C7.03415 19.8123 7.36519 19.7264 7.56944 19.4881L13.5694 12.4881C13.8102 12.2073 13.8102 11.7928 13.5694 11.5119L7.56944 4.51194C7.36519 4.27364 7.03415 4.18773 6.73979 4.29662C6.44543 4.40551 6.25 4.68618 6.25 5.00004L6.25 19Z"
                                        fill="currentColor" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M10.5119 19.5695C10.1974 19.2999 10.161 18.8264 10.4306 18.5119L16.0122 12L10.4306 5.48811C10.161 5.17361 10.1974 4.70014 10.5119 4.43057C10.8264 4.161 11.2999 4.19743 11.5695 4.51192L17.5695 11.5119C17.8102 11.7928 17.8102 12.2072 17.5695 12.4881L11.5695 19.4881C11.2999 19.8026 10.8264 19.839 10.5119 19.5695Z"
                                        fill="currentColor" />
                                </svg>
                            </div>
                        </button>
                        <ul class="sub-menu text-gray-500 ml-2" x-show="subActive === 'error'" x-collapse>
                            @can('user.create')
                                <li>
                                    <a href="{{ route('register') }}">Add User</a>
                                </li>
                            @endcan
                            <li>
                                <a href="{{ route('users') }}">View Users</a>
                            </li>
                        </ul>
                    </li>
                    <li x-data="{ subActive: null }">
                        <button type="button" class="before:h-[5px] before:w-[5px] before:rounded before:bg-gray-300 hover:bg-gray-100 before:mr-2 dark:text-[#888ea8] dark:hover:bg-gray-900"
                            @click="subActive === 'error' ? subActive = null : subActive = 'error'">
                            Role & Permission
                            <div class="ml-auto" :class="{ '!rotate-90': subActive === 'error' }">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.5"
                                        d="M6.25 19C6.25 19.3139 6.44543 19.5946 6.73979 19.7035C7.03415 19.8123 7.36519 19.7264 7.56944 19.4881L13.5694 12.4881C13.8102 12.2073 13.8102 11.7928 13.5694 11.5119L7.56944 4.51194C7.36519 4.27364 7.03415 4.18773 6.73979 4.29662C6.44543 4.40551 6.25 4.68618 6.25 5.00004L6.25 19Z"
                                        fill="currentColor" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M10.5119 19.5695C10.1974 19.2999 10.161 18.8264 10.4306 18.5119L16.0122 12L10.4306 5.48811C10.161 5.17361 10.1974 4.70014 10.5119 4.43057C10.8264 4.161 11.2999 4.19743 11.5695 4.51192L17.5695 11.5119C17.8102 11.7928 17.8102 12.2072 17.5695 12.4881L11.5695 19.4881C11.2999 19.8026 10.8264 19.839 10.5119 19.5695Z"
                                        fill="currentColor" />
                                </svg>
                            </div>
                        </button>
                        <ul class="sub-menu text-gray-500 ml-2" x-show="subActive === 'error'" x-collapse>
                            <li>
                                <a href="{{ route('permission') }}">Permissions</a>
                            </li>
                            <li>
                                <a href="{{ route('role') }}">Roles</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('systemInformation') }}">System Informations</a>
                    </li>
                    <li>
                        <a href="{{ route('smtpSettings') }}">SMTP Settings</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
