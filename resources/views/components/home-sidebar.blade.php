<div class="bg-gray-900 shadow-lg h-16 fixed bottom-0 mt-12 md:relative md:h-screen z-10 w-full md:w-48">
    <div
        class="md:mt-12 md:w-48 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between">
        <ul class="list-reset flex flex-row md:flex-col py-0 md:py-3 px-1 md:px-2 text-center md:text-left">
            <li class="mr-3 flex-1">
                <a href="{{ route('accounts.index') }}"
                   class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 {{ request()->routeIs('accounts.index') ? 'border-blue-600' : 'border-gray-800 hover:border-pink-500' }}">
                    <i class="fas fa-tasks pr-0 md:pr-3 {{ request()->routeIs('accounts.index') ? 'text-blue-600' : '' }}"></i><span
                        class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Home</span>
                </a>
            </li>
            <li class="mr-3 flex-1">
                {{--                <a href="{{ route('accounts.warnings.index', ['serverAccount' => $serverAccount]) }}"--}}
                <a href=""
                   class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 {{ request()->routeIs('accounts') ? 'border-blue-600' : 'border-gray-800 hover:border-purple-500' }}">
                    <i class="fa fa-exclamation-circle pr-0 md:pr-3 {{ request()->routeIs('accounts') ? 'text-blue-600' : '' }}"></i><span
                        class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Something</span>
                </a>
            </li>
            <li class="mr-3 flex-1">
                {{--                <a href="{{ route('accounts.bans.index', ['serverAccount' => $serverAccount]) }}"--}}
                <a href=""
                   class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 {{ request()->routeIs('accounts.bans.index') ? 'border-blue-600' : 'border-gray-800 hover:border-red-500' }}">
                    <i class="fas fa-times-circle pr-0 md:pr-3 {{ request()->routeIs('accounts.bans.index') ? 'text-blue-600' : '' }}"></i><span
                        class="pb-1 md:pb-0 text-xs md:text-base text-white md:text-white block md:inline-block">Something</span>
                </a>
            </li>
            <li class="mr-3 flex-1">
                <a href=""
                   class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-red-500">
                    <i class="fa fa-cog pr-0 md:pr-3"></i><span
                        class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Settings</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<div>
    <!-- Well begun is half done. - Aristotle -->
</div>
