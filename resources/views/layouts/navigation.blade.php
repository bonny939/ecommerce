<header
    x-data="{
        mobileMenuOpen: false,
        cartItemsCount: {{ \App\Helpers\Cart::getCartItemsCount() }},
    }"
    @cart-change.window="cartItemsCount = $event.detail.count"
    class="flex justify-between bg-slate-800 shadow-md text-white py-4 px-8 md:px-16"
>
    <div>
        <a href="{{ route('home') }}" class="flex items-center text-2xl font-semibold">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-8 w-8 mr-2 text-emerald-600"
                viewBox="0 0 20 20"
                fill="currentColor"
            >
                <path
                    fill-rule="evenodd"
                    d="M2 5a2 2 0 012-2h12a2 2 0 012 2v2a2 2 0 01-2 2H4a2 2 0 01-2-2V5z"
                    clip-rule="evenodd"
                />
                <path
                    fill-rule="evenodd"
                    d="M8 9a2 2 0 012-2h2a2 2 0 012 2v6h2a2 2 0 01-2 2H6a2 2 0 01-2-2V9z"
                    clip-rule="evenodd"
                />
            </svg>
            Logo
        </a>
    </div>

    <!-- Mobile Menu -->
    <div
        class="fixed top-0 left-0 w-full h-full bg-slate-900 text-white md:hidden transition-transform duration-300 transform translate-x-full"
        :class="{'translate-x-0': mobileMenuOpen, 'translate-x-full': !mobileMenuOpen}"
    >
        <div class="flex flex-col h-full justify-between">
            <nav class="py-8">
                <ul>
                    <li>
                        <a
                            href="{{ route('cart.index') }}"
                            class="flex items-center py-4 px-6 hover:bg-slate-800"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6 mr-2"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"
                                />
                            </svg>
                            Cart
                            <small
                                x-show="cartItemsCount"
                                x-cloak
                                x-text="cartItemsCount"
                                class="ml-auto py-[2px] px-[8px] rounded-full bg-red-500"
                            ></small>
                        </a>
                    </li>
                    @if (!Auth::guest())
                        <li x-data="{ open: false }" class="relative">
                            <a
                                @click="open = !open"
                                class="flex items-center py-4 px-6 hover:bg-slate-800"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6 mr-2"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                    />
                                </svg>
                                My Account
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5 ml-2"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                            </a>
                            <ul
                                x-show="open"
                                x-cloak
                                class="absolute top-full right-0 bg-slate-800 w-56"
                            >
                                <li>
                                    <a
                                        href="{{ route('profile') }}"
                                        class="flex items-center py-3 px-6 hover:bg-slate-900"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-6 w-6 mr-2"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                            />
                                        </svg>
                                        My Profile
                                    </a>
                                </li>
                                <li>
                                    <a
                                        href="{{ route('order.index') }}"
                                        class="flex items-center py-3 px-6 hover:bg-slate-900"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-6 w-6 mr-2"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"
                                            />
                                        </svg>
                                        My Orders
                                    </a>
                                </li>
                                <li>
                                    <!-- Logout Form -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a
                                            href="{{ route('logout') }}"
                                            class="flex items-center py-3 px-6 hover:bg-slate-900"
                                            onclick="event.preventDefault(); this.closest('form').submit();"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-6 w-6 mr-2"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                                                />
                                            </svg>
                                            Logout
                                        </a>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li>
                            <a
                                href="{{ route('login') }}"
                                class="flex items-center py-4 px-6 hover:bg-slate-800"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6 mr-2"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"
                                    />
                                </svg>
                                Login
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{ route('register') }}"
                                class="inline-flex items-center py-3 px-6 hover:bg-emerald-700"
                            >
                                Register now
                            </a>
                        </li>
                    @endif
                </ul>
            </nav>
            <button
                @click="mobileMenuOpen = !mobileMenuOpen"
                class="p-4 focus:outline-none focus:bg-slate-900"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-8 w-8"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M4 6h16M4 12h16M4 18h16"
                    />
                </svg>
            </button>
        </div>
    </div>
    <!--/ Mobile Menu -->

    <!-- Desktop Menu -->
    <nav class="hidden md:block">
        <ul class="flex items-center space-x-6">
            <li>
                <a
                    href="{{ route('cart.index') }}"
                    class="relative flex items-center py-4 px-6 hover:bg-slate-800"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6 mr-2"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"
                        />
                    </svg>
                    Cart
                    <small
                        x-show="cartItemsCount"
                        x-cloak
                        x-text="cartItemsCount"
                        class="absolute z-10 top-2 -right-3 py-[2px] px-[8px] rounded-full bg-red-500"
                    ></small>
                </a>
            </li>
            @if (!Auth::guest())
                <li x-data="{ open: false }" class="relative">
                    <a
                        @click="open = !open"
                        class="flex items-center py-4 px-6 hover:bg-slate-800"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6 mr-2"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                            />
                        </svg>
                        My Account
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 ml-2"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"
                            />
                        </svg>
                    </a>
                    <ul
                        @click.outside="open = false"
                        x-show="open"
                        x-cloak
                        class="absolute top-full right-0 bg-slate-800 w-48"
                    >
                        <li>
                            <a
                                href="{{ route('profile') }}"
                                class="flex items-center py-3 px-6 hover:bg-slate-900"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6 mr-2"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                    />
                                </svg>
                                My Profile
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{ route('order.index') }}"
                                class="flex items-center py-3 px-6 hover:bg-slate-900"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6 mr-2"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"
                                    />
                                </svg>
                                My Orders
                            </a>
                        </li>
                        <li>
                            <!-- Logout Form -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a
                                    href="{{ route('logout') }}"
                                    class="flex items-center py-3 px-6 hover:bg-slate-900"
                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-6 w-6 mr-2"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                                        />
                                    </svg>
                                    Logout
                                </a>
                            </form>
                        </li>
                    </ul>
                </li>
            @else
                <li>
                    <a
                        href="{{ route('login') }}"
                        class="flex items-center py-4 px-6 hover:bg-slate-800"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6 mr-2"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"
                            />
                        </svg>
                        Login
                    </a>
                </li>
                <li>
                    <a
                        href="{{ route('register') }}"
                        class="py-4 px-6 font-semibold hover:bg-emerald-700"
                    >
                        Register now
                    </a>
                </li>
            @endif
        </ul>
    </nav>
    <!--/ Desktop Menu -->
</header>
