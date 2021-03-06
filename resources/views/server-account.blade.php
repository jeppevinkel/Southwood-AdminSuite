@extends('layouts.dashboard.app')

@section('content')

    <div class="flex flex-col md:flex-row">

        <x-sidebar :server-account="$serverAccount">

        </x-sidebar>

        <div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

            <div class="bg-blue-800 p-2 shadow text-xl text-white">
                <h3 class="font-bold pl-2">Dashboard</h3>
            </div>

            <div class="flex flex-wrap">
                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                    <!--Metric Card-->
                    <div class="bg-green-100 border-b-4 border-green-600 rounded-lg shadow-lg p-5">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-green-600"><i class="fa fa-users fa-2x fa-inverse"></i>
                                </div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-600">Online Players</h5>
                                <h3 class="font-bold text-3xl">{{ count($serverAccount->onlinePlayers()) }} <span
                                        class="text-green-500"><i
                                            class="fas fa-caret-up"></i></span></h3>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                    <!--Metric Card-->
                    <div class="bg-orange-100 border-b-4 border-orange-500 rounded-lg shadow-lg p-5">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-orange-600"><i
                                        class="fas fa-users fa-2x fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-600">Total Players</h5>
                                <h3 class="font-bold text-3xl">{{ count($serverAccount->players()) }} <span
                                        class="text-orange-500"><i
                                            class="fas fa-exchange-alt"></i></span></h3>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                    <!--Metric Card-->
                    <div class="bg-yellow-100 border-b-4 border-yellow-600 rounded-lg shadow-lg p-5">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-yellow-600"><i
                                        class="fas fa-user-plus fa-2x fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-600">New Players</h5>
                                <h3 class="font-bold text-3xl">{{ count($serverAccount->newPlayers()) }} <span
                                        class="text-yellow-600"><i
                                            class="fas fa-caret-up"></i></span></h3>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                    <!--Metric Card-->
                    <div class="bg-blue-100 border-b-4 border-blue-500 rounded-lg shadow-lg p-5">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-blue-600"><i class="fas fa-server fa-2x fa-inverse"></i>
                                </div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-600">Server Uptime</h5>
                                <h3 class="font-bold text-3xl">152 days</h3>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                    <!--Metric Card-->
                    <div class="bg-indigo-100 border-b-4 border-indigo-500 rounded-lg shadow-lg p-5">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-indigo-600"><i
                                        class="fas fa-tasks fa-2x fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-600">TBD</h5>
                                <h3 class="font-bold text-3xl">NaN</h3>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                    <!--Metric Card-->
                    <div class="bg-red-100 border-b-4 border-red-500 rounded-lg shadow-lg p-5">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-red-600"><i class="fas fa-inbox fa-2x fa-inverse"></i>
                                </div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-600">Reports</h5>
                                <h3 class="font-bold text-3xl">3 <span class="text-red-500"><i
                                            class="fas fa-caret-up"></i></span></h3>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
            </div>


            <div class="flex flex-row flex-wrap flex-grow mt-2">

                {{--                @foreach($serverAccount->servers as $server)--}}
                {{--                    <div class="w-full md:w-1/2 xl:w-1/3 p-3">--}}
                {{--                        <!--Table Card-->--}}
                {{--                        <div class="bg-white border-transparent rounded-lg shadow-lg">--}}
                {{--                            <div--}}
                {{--                                class="bg-gray-400 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2 flex justify-between">--}}
                {{--                                <h5 class="font-bold uppercase text-gray-600">{{ strip_tags(substr($server->info, 0, strpos($server->info, 'SM119'))) }}</h5>--}}
                {{--                                <h6 class="font-bold uppercase text-gray-600">{{ $server->cur_players }}/{{ $server->max_players }}</h6>--}}
                {{--                            </div>--}}
                {{--                            <div class="p-5">--}}
                {{--                                <table class="w-full p-5 text-gray-700">--}}
                {{--                                    <thead>--}}
                {{--                                    <tr>--}}
                {{--                                        <th class="text-left text-blue-900">Name</th>--}}
                {{--                                        <th class="text-left text-blue-900">Team</th>--}}
                {{--                                        <th class="text-left text-blue-900">RankController</th>--}}
                {{--                                    </tr>--}}
                {{--                                    </thead>--}}

                {{--                                    <tbody>--}}
                {{--                                    @foreach($server->players as $player)--}}
                {{--                                        <tr>--}}
                {{--                                            <td>{{ $player->username }}</td>--}}
                {{--                                            <td>MTF</td>--}}
                {{--                                            <td>Owner</td>--}}
                {{--                                        </tr>--}}
                {{--                                    @endforeach--}}
                {{--                                    <tr>--}}
                {{--                                        <td>Hooman</td>--}}
                {{--                                        <td>CDP</td>--}}
                {{--                                        <td>Moderator</td>--}}
                {{--                                    </tr>--}}
                {{--                                    <tr>--}}
                {{--                                        <td>Person</td>--}}
                {{--                                        <td>MTF</td>--}}
                {{--                                        <td>User</td>--}}
                {{--                                    </tr>--}}
                {{--                                    </tbody>--}}
                {{--                                </table>--}}

                {{--                                <p class="py-2"><a href="#">See More info...</a></p>--}}

                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                        <!--/table Card-->--}}
                {{--                    </div>--}}
                {{--                @endforeach--}}

                @foreach($serverAccount->servers as $server)
                    <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                        <!--Template Card-->
                        <div class="bg-white border-transparent rounded-lg shadow-lg">
                            <div
                                class="bg-gray-400 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2 flex justify-between">
                                <h5 class="font-bold uppercase text-gray-600">{{ strip_tags(substr($server->info, 0, strpos($server->info, 'SM119'))) }}</h5>
                                <h6 class="font-bold uppercase text-gray-600">{{ $server->cur_players }}
                                    /{{ $server->max_players }}</h6>
                            </div>
                            <div class="p-5">
                                <div>
                                    <p><span class="font-bold uppercase">IP:</span> {{ $server->ip }}
                                        :{{ $server->port }}</p>
                                    <p><span class="font-bold uppercase">Pastebin:</span> <a
                                            class="hover:text-blue-800 text-blue-700"
                                            href="https://pastebin.com/{{ $server->pastebin }}"
                                            target="_blank">{{ $server->pastebin }}</a></p>
                                    <p><span class="font-bold uppercase">Version:</span> {{ $server->server_version }}
                                    </p>
                                    <p><span class="font-bold uppercase">EXILED:</span> {{ $server->exiled_version }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!--/Template Card-->
                    </div>
                @endforeach

                @foreach($serverAccount->activeServerTokens() as $serverToken)
                    <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                        <!--Template Card-->
                        <div class="bg-white border-transparent rounded-lg shadow-lg">
                            <div
                                class="bg-gray-400 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2 flex justify-between">
                                <h5 class="font-bold uppercase text-gray-600">Server Token</h5>
                            </div>
                            <div class="p-5">
                                <div>
                                    <p class="inline-block align-middle align-text-middle">Type the following into your
                                        server console <span
                                            class="p-2 bg-gray-300 rounded align-text-middle">sw setup {{ $serverToken->token }}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!--/Template Card-->
                    </div>
                @endforeach

                @if(Auth::user()->getServerRole($serverAccount->id)->hasPermission('server_add'))
                    <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                        <!--Template Card-->
                        <div class="bg-white border-transparent rounded-lg shadow-lg">
                            <div
                                class="bg-gray-400 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2 flex justify-between">
                                <h5 class="font-bold uppercase text-gray-600">Add new</h5>
                            </div>
                            <div class="p-5">
                                <div>
                                    <form method="POST"
                                          action="{{ route('accounts.tokens.store', ['serverAccount' => $serverAccount]) }}">
                                        @csrf
                                        <button
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                            Add new server
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--/Template Card-->
                    </div>
                @endif

            </div>
        </div>
    </div>

    <script>
        /*Toggle dropdown list*/
        function toggleDD(myDropMenu) {
            document.getElementById(myDropMenu).classList.toggle("invisible");
        }

        /*Filter dropdown options*/
        function filterDD(myDropMenu, myDropMenuSearch) {
            var input, filter, ul, li, a, i;
            input = document.getElementById(myDropMenuSearch);
            filter = input.value.toUpperCase();
            div = document.getElementById(myDropMenu);
            a = div.getElementsByTagName("a");
            for (i = 0; i < a.length; i++) {
                if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
                    a[i].style.display = "";
                } else {
                    a[i].style.display = "none";
                }
            }
        }

        // Close the dropdown menu if the user clicks outside of it
        window.onclick = function (event) {
            if (!event.target.matches('.drop-button') && !event.target.matches('.drop-search')) {
                var dropdowns = document.getElementsByClassName("dropdownlist");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (!openDropdown.classList.contains('invisible')) {
                        openDropdown.classList.add('invisible');
                    }
                }
            }
        }
    </script>

@endsection
