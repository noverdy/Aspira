@extends('layouts.tailwind')
@section('container')
    <div class="container max-w-screen-xl pb-5">
        <div class="row justify-center">
            <div class="col-12">
                <div class="card lg:w-full mt-4 mx-2 bg-white shadow-xl text-black">
                    <div class="card-body mx-2">
                        <span align="justify">
                            <p class="font-bold">POMODORO INTERVAL</p>
                            <div class="text-sm breadcrumbs">
                                <ul>
                                    <li><a href="/">Beranda</a></li>
                                    <li>Pomodoro Interval</li>
                                </ul>
                            </div>
                        </span>
                    </div>
                </div>
                <div class="card lg:w-full my-4 mx-2 bg-white shadow-xl text-black">
                    <div class="card-body mx-2">
                        <div class="alert text-sm bg-cyan-700 text-white">
                            <div>
                                <span class="uppercase font-bold">
                                    Interval Record
                                </span>
                            </div>
                        </div>
                        <div class="flex justify-between">
                            {{-- @foreach ($interval as $int) --}}
                            <a href=" " class="btn bg-warning hover:bg-yellow-500 border-0 mx-1 text-white text-xs"><i
                                    class="fa-solid fa-pen-to-square fa-lg mr-2"></i>Edit</a>
                            {{-- @endforeach --}}
                            <a href="{{ route('interval.create') }}"
                                class="btn bg-primary hover:bg-primary-focus border-0 mx-1 text-white text-xs"><i
                                    class="fa-solid fa-plus fa-lg mr-2"></i>Record Baru</a>
                        </div>
                        <div class="col-md-4 mt-4 uppercase">
                            @foreach ($users as $user)
                                <div class="progress-group text-sm">
                                    <p class="font-bold">Bisnis & Profit</p>
                                    <span class="float-right"><b>{{ auth()->user()->totalBp }}</b>/04:00:00</span>
                                    <div class="progress my-2 progress-sm">
                                        <div class="progress-bar bg-green-600"
                                            style="width: {{ auth()->user()->percentageBp }}%">
                                        </div>
                                    </div>
                                </div>

                                <div class="progress-group text-sm">
                                    <p class="font-bold">Self-Development</p>
                                    <span class="float-right"><b>{{ auth()->user()->totalSd }}</b>/01:00:00</span>
                                    <div class="progress my-2 progress-sm">
                                        <div class="progress-bar bg-red-600"
                                            style="width: {{ auth()->user()->percentageSd }}%">
                                        </div>
                                    </div>
                                </div>

                                <div class="progress-group text-sm">
                                    <p class="font-bold">Kelembagaan</p>
                                    <span class="float-right"><b>{{ auth()->user()->totalKl }}</b>/00:30:00</span>
                                    <div class="progress my-2 progress-sm">
                                        <div class="progress-bar bg-yellow-400"
                                            style="width: {{ auth()->user()->percentageKl }}%">
                                        </div>
                                    </div>
                                </div>

                                <div class="progress-group text-sm">
                                    <p class="font-bold">Inovasi/Creativity</p>
                                    <span class="float-right"><b>{{ auth()->user()->totalIc }}</b>/00:30:00</span>
                                    <div class="progress my-2 progress-sm">
                                        <div class="progress-bar bg-blue-600"
                                            style="width: {{ auth()->user()->percentageIc }}%">
                                        </div>
                                    </div>
                                </div>
                                <div class="progress-group text-sm">
                                    <p class="font-bold">Morning Briefing & 5R</p>
                                    <span class="float-right"><b>{{ auth()->user()->totalMb }}</b>/00:30:00</span>
                                    <div class="progress my-2 progress-sm">
                                        <div class="progress-bar bg-violet-600"
                                            style="width: {{ auth()->user()->percentageMb }}%">
                                        </div>
                                    </div>
                                </div>

                                <div class="progress-group text-sm">
                                    <p class="font-bold">Technical Planning</p>
                                    <span class="float-right"><b>{{ auth()->user()->totalTp }}</b>/00:30:00</span>
                                    <div class="progress my-2 progress-sm">
                                        <div class="progress-bar bg-teal-600"
                                            style="width: {{ auth()->user()->percentageTp }}%">
                                        </div>
                                    </div>
                                </div>

                                <div class="progress-group text-sm">
                                    <p class="font-bold">Evaluasi</p>
                                    <span class="float-right"><b>{{ auth()->user()->totalEv }}</b>/00:30:00</span>
                                    <div class="progress my-2 progress-sm">
                                        <div class="progress-bar bg-orange-600"
                                            style="width: {{ auth()->user()->percentageEv }}%">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection