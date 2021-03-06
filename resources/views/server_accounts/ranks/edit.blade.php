@extends('layouts.app')

@section('content')
    <div class="h-2 bg-blue-700"></div>
    <div class="container mx-auto p-8">
        <div class="mx-auto max-w-md">
            <div class="bg-white rounded shadow">
                <div class="border-b py-8 font-bold text-black text-center text-xl tracking-widest uppercase">
                    {{ __('Update Rank') }}
                </div>

                <form class="bg-grey-lightest px-10 py-10" method="POST"
                      action="{{ route('accounts.ranks.update', ['serverAccount' => $serverAccount, 'rank' => $rank]) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <input class="border w-full p-3 @error('name')  @enderror" name="name" type="text"
                               value="{{ $rank->rank_name }}" placeholder="{{ __('Name') }}" required
                               autocomplete="rankname" autofocus>
                        @error('name')
                        <span class="" role="alert">
                            <strong class="text-red-500">{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <select class="border w-full p-3 @error('color')  @enderror" name="color" required>
                            <option value="default" {{ $rank->badge_color == 'default' ? 'selected' : '' }}>Default
                            </option>
                            <option value="pink" {{ $rank->badge_color == 'pink' ? 'selected' : '' }}>Pink</option>
                            <option value="red" {{ $rank->badge_color == 'red' ? 'selected' : '' }}>Red</option>
                            <option value="brown" {{ $rank->badge_color == 'brown' ? 'selected' : '' }}>Brown</option>
                            <option value="silver" {{ $rank->badge_color == 'silver' ? 'selected' : '' }}>Silver
                            </option>
                            <option value="light_green" {{ $rank->badge_color == 'light_green' ? 'selected' : '' }}>
                                Light green
                            </option>
                            <option value="crimson" {{ $rank->badge_color == 'crimson' ? 'selected' : '' }}>Crimson
                            </option>
                            <option value="cyan" {{ $rank->badge_color == 'cyan' ? 'selected' : '' }}>Cyan</option>
                            <option value="aqua" {{ $rank->badge_color == 'aqua' ? 'selected' : '' }}>Aqua</option>
                            <option value="deep_pink" {{ $rank->badge_color == 'deep_pink' ? 'selected' : '' }}>Deep
                                pink
                            </option>
                            <option value="tomato" {{ $rank->badge_color == 'tomato' ? 'selected' : '' }}>Tomato
                            </option>
                            <option value="yellow" {{ $rank->badge_color == 'yellow' ? 'selected' : '' }}>Yellow
                            </option>
                            <option value="magenta" {{ $rank->badge_color == 'magenta' ? 'selected' : '' }}>Magenta
                            </option>
                            <option value="blue_green" {{ $rank->badge_color == 'blue_green' ? 'selected' : '' }}>Blue
                                green
                            </option>
                            <option value="orange" {{ $rank->badge_color == 'orange' ? 'selected' : '' }}>Orange
                            </option>
                        </select>
                        @error('color')
                        <span class="" role="alert">
                            <strong class="text-red-500">{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input class="border w-full p-3 @error('text')  @enderror" name="text" type="text"
                               value="{{ $rank->badge_text }}" placeholder="{{ __('Badge text') }}" required
                               autocomplete="badgetext">
                        @error('text')
                        <span class="" role="alert">
                            <strong class="text-red-500">{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input class="border w-full p-3 @error('kickPower')  @enderror" name="kickPower" type="number"
                               value="{{ $rank->kick_power }}" placeholder="{{ __('Kick power') }}" required
                               autocomplete="kickPower" min="0" max="255">
                        @error('kickPower')
                        <span class="" role="alert">
                            <strong class="text-red-500">{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input class="border w-full p-3 @error('requiredKickPower')  @enderror" name="requiredKickPower"
                               type="number"
                               value="{{ $rank->required_kick_power }}" placeholder="{{ __('Required kick power') }}"
                               required
                               autocomplete="requiredKickPower" min="0" max="255">
                        @error('requiredKickPower')
                        <span class="" role="alert">
                            <strong class="text-red-500">{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3 flex items-center">
                        <input type="hidden" name="hidden" value="0">
                        <input class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"
                               type="checkbox" name="hidden" id="hidden"
                               value="1" {{ $rank->hidden_by_default ? 'checked' : '' }}>
                        <label class="ml-2 block text-sm leading-5 text-gray-900" for="hidden">
                            {{ __('Hidden by default') }}
                        </label>
                        @error('hidden')
                        <span class="" role="alert">
                            <strong class="text-red-500">{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3 flex items-center">
                        <input type="hidden" name="KickingAndShortTermBanning" value="0">
                        <input class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"
                               type="checkbox" name="KickingAndShortTermBanning" id="KickingAndShortTermBanning"
                               value="1" {{ $rank->permissions & 2 ** 0 ? 'checked' : '' }}>
                        <label class="ml-2 block text-sm leading-5 text-gray-900" for="KickingAndShortTermBanning">
                            {{ __('Kicking and short term banning') }}
                        </label>
                        @error('KickingAndShortTermBanning')
                        <span class="" role="alert">
                            <strong class="text-red-500">{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3 flex items-center">
                        <input type="hidden" name="BanningUpToDay" value="0">
                        <input class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"
                               type="checkbox" name="BanningUpToDay" id="BanningUpToDay"
                               value="2" {{ $rank->permissions & 2 ** 1 ? 'checked' : '' }}>
                        <label class="ml-2 block text-sm leading-5 text-gray-900" for="BanningUpToDay">
                            {{ __('Banning up to a day') }}
                        </label>
                        @error('KickingAndShortTermBanning')
                        <span class="" role="alert">
                            <strong class="text-red-500">{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3 flex items-center">
                        <input type="hidden" name="LongTermBanning" value="0">
                        <input class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"
                               type="checkbox" name="LongTermBanning" id="LongTermBanning"
                               value="4" {{ $rank->permissions & 2 ** 2 ? 'checked' : '' }}>
                        <label class="ml-2 block text-sm leading-5 text-gray-900" for="LongTermBanning">
                            {{ __('Long term banning') }}
                        </label>
                    </div>
                    <div class="mb-3 flex items-center">
                        <input type="hidden" name="ForceclassSelf" value="0">
                        <input class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"
                               type="checkbox" name="ForceclassSelf" id="ForceclassSelf"
                               value="8" {{ $rank->permissions & 2 ** 3 ? 'checked' : '' }}>
                        <label class="ml-2 block text-sm leading-5 text-gray-900" for="ForceclassSelf">
                            {{ __('Forceclass self') }}
                        </label>
                    </div>
                    <div class="mb-3 flex items-center">
                        <input type="hidden" name="ForceclassToSpectator" value="0">
                        <input class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"
                               type="checkbox" name="ForceclassToSpectator" id="ForceclassToSpectator"
                               value="16" {{ $rank->permissions & 2 ** 4 ? 'checked' : '' }}>
                        <label class="ml-2 block text-sm leading-5 text-gray-900" for="ForceclassToSpectator">
                            {{ __('Forceclass to spectator') }}
                        </label>
                    </div>
                    <div class="mb-3 flex items-center">
                        <input type="hidden" name="ForceclassWithoutRestrictions" value="0">
                        <input class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"
                               type="checkbox" name="ForceclassWithoutRestrictions" id="ForceclassWithoutRestrictions"
                               value="32" {{ $rank->permissions & 2 ** 5 ? 'checked' : '' }}>
                        <label class="ml-2 block text-sm leading-5 text-gray-900" for="ForceclassWithoutRestrictions">
                            {{ __('Forceclass without restrictions') }}
                        </label>
                    </div>
                    <div class="mb-3 flex items-center">
                        <input type="hidden" name="GivingItems" value="0">
                        <input class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"
                               type="checkbox" name="GivingItems" id="GivingItems"
                               value="64" {{ $rank->permissions & 2 ** 6 ? 'checked' : '' }}>
                        <label class="ml-2 block text-sm leading-5 text-gray-900" for="GivingItems">
                            {{ __('Giving items') }}
                        </label>
                    </div>
                    <div class="mb-3 flex items-center">
                        <input type="hidden" name="WarheadEvents" value="0">
                        <input class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"
                               type="checkbox" name="WarheadEvents" id="WarheadEvents"
                               value="128" {{ $rank->permissions & 2 ** 7 ? 'checked' : '' }}>
                        <label class="ml-2 block text-sm leading-5 text-gray-900" for="WarheadEvents">
                            {{ __('Warhead events') }}
                        </label>
                    </div>
                    <div class="mb-3 flex items-center">
                        <input type="hidden" name="RespawnEvents" value="0">
                        <input class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"
                               type="checkbox" name="RespawnEvents" id="RespawnEvents"
                               value="256" {{ $rank->permissions & 2 ** 8 ? 'checked' : '' }}>
                        <label class="ml-2 block text-sm leading-5 text-gray-900" for="RespawnEvents">
                            {{ __('Respawn events') }}
                        </label>
                    </div>
                    <div class="mb-3 flex items-center">
                        <input type="hidden" name="RoundEvents" value="0">
                        <input class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"
                               type="checkbox" name="RoundEvents" id="RoundEvents"
                               value="512" {{ $rank->permissions & 2 ** 9 ? 'checked' : '' }}>
                        <label class="ml-2 block text-sm leading-5 text-gray-900" for="RoundEvents">
                            {{ __('Round events') }}
                        </label>
                    </div>
                    <div class="mb-3 flex items-center">
                        <input type="hidden" name="SetGroup" value="0">
                        <input class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"
                               type="checkbox" name="SetGroup" id="SetGroup"
                               value="1024" {{ $rank->permissions & 2 ** 10 ? 'checked' : '' }}>
                        <label class="ml-2 block text-sm leading-5 text-gray-900" for="SetGroup">
                            {{ __('Set group') }}
                        </label>
                    </div>
                    <div class="mb-3 flex items-center">
                        <input type="hidden" name="GameplayData" value="0">
                        <input class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"
                               type="checkbox" name="GameplayData" id="GameplayData"
                               value="2048" {{ $rank->permissions & 2 ** 11 ? 'checked' : '' }}>
                        <label class="ml-2 block text-sm leading-5 text-gray-900" for="GameplayData">
                            {{ __('Gameplay data') }}
                        </label>
                    </div>
                    <div class="mb-3 flex items-center">
                        <input type="hidden" name="Overwatch" value="0">
                        <input class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"
                               type="checkbox" name="Overwatch" id="Overwatch"
                               value="4096" {{ $rank->permissions & 2 ** 12 ? 'checked' : '' }}>
                        <label class="ml-2 block text-sm leading-5 text-gray-900" for="Overwatch">
                            {{ __('Overwatch') }}
                        </label>
                    </div>
                    <div class="mb-3 flex items-center">
                        <input type="hidden" name="FacilityManagement" value="0">
                        <input class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"
                               type="checkbox" name="FacilityManagement" id="FacilityManagement"
                               value="8192" {{ $rank->permissions & 2 ** 13 ? 'checked' : '' }}>
                        <label class="ml-2 block text-sm leading-5 text-gray-900" for="FacilityManagement">
                            {{ __('Facility management') }}
                        </label>
                    </div>
                    <div class="mb-3 flex items-center">
                        <input type="hidden" name="PlayersManagement" value="0">
                        <input class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"
                               type="checkbox" name="PlayersManagement" id="PlayersManagement"
                               value="16384" {{ $rank->permissions & 2 ** 14 ? 'checked' : '' }}>
                        <label class="ml-2 block text-sm leading-5 text-gray-900" for="PlayersManagement">
                            {{ __('Players management') }}
                        </label>
                    </div>
                    <div class="mb-3 flex items-center">
                        <input type="hidden" name="PermissionsManagement" value="0">
                        <input class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"
                               type="checkbox" name="PermissionsManagement" id="PermissionsManagement"
                               value="32768" {{ $rank->permissions & 2 ** 15 ? 'checked' : '' }}>
                        <label class="ml-2 block text-sm leading-5 text-gray-900" for="PermissionsManagement">
                            {{ __('Permissions management') }}
                        </label>
                    </div>
                    <div class="mb-3 flex items-center">
                        <input type="hidden" name="ServerConsoleCommands" value="0">
                        <input class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"
                               type="checkbox" name="ServerConsoleCommands" id="ServerConsoleCommands"
                               value="65536" {{ $rank->permissions & 2 ** 16 ? 'checked' : '' }}>
                        <label class="ml-2 block text-sm leading-5 text-gray-900" for="ServerConsoleCommands">
                            {{ __('Server console commands') }}
                        </label>
                    </div>
                    <div class="mb-3 flex items-center">
                        <input type="hidden" name="ViewHiddenBadges" value="0">
                        <input class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"
                               type="checkbox" name="ViewHiddenBadges" id="ViewHiddenBadges"
                               value="131072" {{ $rank->permissions & 2 ** 17 ? 'checked' : '' }}>
                        <label class="ml-2 block text-sm leading-5 text-gray-900" for="ViewHiddenBadges">
                            {{ __('View hidden badges') }}
                        </label>
                    </div>
                    <div class="mb-3 flex items-center">
                        <input type="hidden" name="ServerConfigs" value="0">
                        <input class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"
                               type="checkbox" name="ServerConfigs" id="ServerConfigs"
                               value="262144" {{ $rank->permissions & 2 ** 18 ? 'checked' : '' }}>
                        <label class="ml-2 block text-sm leading-5 text-gray-900" for="ServerConfigs">
                            {{ __('Server configs') }}
                        </label>
                    </div>
                    <div class="mb-3 flex items-center">
                        <input type="hidden" name="Broadcasting" value="0">
                        <input class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"
                               type="checkbox" name="Broadcasting" id="Broadcasting"
                               value="524288" {{ $rank->permissions & 2 ** 19 ? 'checked' : '' }}>
                        <label class="ml-2 block text-sm leading-5 text-gray-900" for="Broadcasting">
                            {{ __('Broadcasting') }}
                        </label>
                    </div>
                    <div class="mb-3 flex items-center">
                        <input type="hidden" name="PlayerSensitiveDataAccess" value="0">
                        <input class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"
                               type="checkbox" name="PlayerSensitiveDataAccess" id="PlayerSensitiveDataAccess"
                               value="1048576" {{ $rank->permissions & 2 ** 20 ? 'checked' : '' }}>
                        <label class="ml-2 block text-sm leading-5 text-gray-900" for="PlayerSensitiveDataAccess">
                            {{ __('Player sensitive data access') }}
                        </label>
                    </div>
                    <div class="mb-3 flex items-center">
                        <input type="hidden" name="Noclip" value="0">
                        <input class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"
                               type="checkbox" name="Noclip" id="Noclip"
                               value="2097152" {{ $rank->permissions & 2 ** 21 ? 'checked' : '' }}>
                        <label class="ml-2 block text-sm leading-5 text-gray-900" for="Noclip">
                            {{ __('Noclip') }}
                        </label>
                    </div>
                    <div class="mb-3 flex items-center">
                        <input type="hidden" name="AFKImmunity" value="0">
                        <input class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"
                               type="checkbox" name="AFKImmunity" id="AFKImmunity"
                               value="4194304" {{ $rank->permissions & 2 ** 22 ? 'checked' : '' }}>
                        <label class="ml-2 block text-sm leading-5 text-gray-900" for="AFKImmunity">
                            {{ __('AFK immunity') }}
                        </label>
                    </div>
                    <div class="flex">
                        <button
                            class="bg-blue-700 hover:bg-blue-800 w-full p-4 text-sm text-white uppercase font-bold tracking-wider">
                            {{ __('Update') }}
                        </button>
                    </div>
                </form>

                <div class="border-t px-10 py-6">
                    <div class="flex justify-between">
                        <a href="{{ route('accounts.ranks.index', ['serverAccount' => $serverAccount]) }}"
                           class="font-bold text-blue-700 hover:text-primary-dark no-underline">{{ __('Cancel') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
