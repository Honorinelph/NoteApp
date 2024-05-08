<nav class="bg-gray-800 shadow-lg">
    <div class="container mx-auto px-4">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo ou nom de l'application -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="text-white text-2xl font-bold text-green-400">
                        Ranking Universities Platform </a>
                </div>

                <!-- Liens de navigation -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">

                    <a href="{{ route('user.universities') }}" class="text-white hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium">Universities</a>
                    <a href="{{ route('rankings.classement') }}" class="text-white hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium">Classement</a>
                    <a href="{{ route('notes.index') }}" class="text-white hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium">Notations</a>
                    <a href="{{ route('notations.history') }}" class="text-white hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium">Consulter Historique des notes</a>

                </div>
            </div>

            <!-- Liens d'authentification -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-6 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-black bg-cyan-200 dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentification -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                             onclick="event.preventDefault();
                                             this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>
